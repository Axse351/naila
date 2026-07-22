<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Riwayat pesanan milik user yang login.
     */
    public function index(): View
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items')
            ->latest()
            ->paginate(10);

        return view('user.pesan.index', compact('orders'));
    }

    public function create(Product $product): View
    {
        return view('user.pesan.create', compact('product'));
    }

    public function store(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'qty' => ['required', 'integer', 'min:1', 'max:' . $product->stok],
            'order_type' => ['required', 'in:dine_in,pick_up'],
        ], [
            'qty.max' => 'Jumlah melebihi stok yang tersedia (' . $product->stok . ').',
        ]);

        $qty = (int) $request->qty;
        $subtotal = $product->harga * $qty;

        $order = DB::transaction(function () use ($product, $qty, $subtotal, $request) {
            $order = Order::create([
                'user_id' => auth()->id(),
                'invoice_number' => 'INV-' . strtoupper(Str::random(8)),
                'total_harga' => $subtotal,
                'status' => 'pending',
                'order_type' => $request->order_type,
            ]);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'nama_produk' => $product->nama_produk,
                'harga' => $product->harga,
                'qty' => $qty,
                'subtotal' => $subtotal,
            ]);

            return $order;
        });

        return redirect()->route('pesanan.checkout', $order);
    }

    public function checkout(Order $order): View
    {
        $this->authorizeOrder($order);

        $order->load('items');

        return view('user.pesan.checkout', compact('order'));
    }

    /**
     * Halaman pilih metode pembayaran (QRIS / DANA / Seabank / Tunai).
     */
    public function pembayaran(Order $order): View|RedirectResponse
    {
        $this->authorizeOrder($order);

        if ($order->status !== 'pending') {
            return redirect()->route('pesanan.selesai', $order);
        }

        return view('user.pesan.pembayaran', compact('order'));
    }

    /**
     * User klaim sudah bayar -> status jadi "menunggu_konfirmasi".
     * Poin BELUM diberikan di sini, menunggu ACC admin (lihat Admin\OrderController::approve).
     */
    public function confirm(Request $request, Order $order): RedirectResponse
    {
        $this->authorizeOrder($order);

        $request->validate([
            'payment_method' => ['required', 'in:qris,dana,seabank,tunai'],
        ]);

        if ($order->status === 'pending') {
            $order->update([
                'status' => 'menunggu_konfirmasi',
                'payment_method' => $request->payment_method,
            ]);
        }

        return redirect()->route('pesanan.selesai', $order);
    }

    /**
     * Halaman status pesanan. User bisa refresh untuk lihat update dari admin.
     */
    public function selesai(Order $order): View
    {
        $this->authorizeOrder($order);

        $order->load('items');

        return view('user.pesan.selesai', compact('order'));
    }

    private function authorizeOrder(Order $order): void
    {
        abort_unless($order->user_id === auth()->id(), 403);
    }
}
