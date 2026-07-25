<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Redemption;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RedemptionController extends Controller
{
    public function index(): View
    {
        $redemptions = Redemption::where('user_id', auth()->id())
            ->with('product')
            ->latest()
            ->paginate(10);

        return view('user.redemptions.index', compact('redemptions'));
    }

    public function create(): View
    {
        $products = Product::aktif()->get();

        return view('user.redemptions.create', compact('products'));
    }

   public function store(Request $request): RedirectResponse
{
    $request->validate([
        'jenis_promo' => ['required', 'in:reguler,b5g1,couple'],
        'product_id' => ['required_unless:jenis_promo,couple', 'nullable', 'exists:products,id'],
    ]);

    $poinDibutuhkan = Redemption::POIN_REQUIRED[$request->jenis_promo];
    $user = auth()->user();

    if ($user->point < $poinDibutuhkan) {
        return redirect()
            ->back()
            ->with('error', "Poin kamu tidak cukup. Dibutuhkan {$poinDibutuhkan} poin, poin kamu saat ini {$user->point}.");
    }

    $adaPending = Redemption::where('user_id', $user->id)
        ->where('status', 'menunggu')
        ->exists();

    if ($adaPending) {
        return redirect()
            ->back()
            ->with('error', 'Kamu masih punya permintaan tukar poin yang sedang diproses.');
    }

    $productId = $request->product_id;

    if ($request->jenis_promo === 'couple') {
        $produkOriginal = Product::where('nama_produk', 'like', '%Alpukat Original%')->first();
        $productId = $produkOriginal?->id;
    }

    Redemption::create([
        'user_id' => $user->id,
        'product_id' => $productId,
        'jenis_promo' => $request->jenis_promo,
        'poin_dipakai' => $poinDibutuhkan,
        'status' => 'menunggu',
    ]);

    return redirect()
        ->route('redemptions.index')
        ->with('success', 'Permintaan tukar poin berhasil diajukan, menunggu konfirmasi admin.');
}
}
