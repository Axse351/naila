<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class KatalogController extends Controller
{
    public function index(): View
    {
        $products = Product::aktif()->latest()->paginate(9);

        return view('user.katalog', compact('products'));
    }

    public function pesan(Product $product): RedirectResponse
    {
        // Untuk sekarang produk langsung "dipesan".
        // Nanti bisa disambungkan ke keranjang/checkout sesuai activity diagram kamu.
        return redirect()
            ->route('katalog')
            ->with('success', 'Produk "' . $product->nama_produk . '" berhasil ditambahkan ke pesanan.');
    }
}
