<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Nilai poin per 1 produk (sesuai S&K: 1 produk = 10 poin).
     */
    private const POINT_PER_PRODUK = 10;

    public function index(): View
    {
        $orders = Order::with('user', 'items')
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order): View
    {
        $order->load('user', 'items.product');

        return view('admin.orders.show', compact('order'));
    }

    /**
     * Admin ACC pembayaran -> status "paid", poin dikreditkan, stok dikurangi.
     * Poin dihitung dari jumlah produk (qty) yang dibeli, bukan dari nominal rupiah.
     */
    public function approve(Order $order): RedirectResponse
    {
        if ($order->status === 'menunggu_konfirmasi') {
            $totalQty = $order->items->sum('qty');
            $point = $totalQty * self::POINT_PER_PRODUK;

            DB::transaction(function () use ($order, $point) {
                $order->update([
                    'status' => 'paid',
                    'paid_at' => now(),
                    'point_didapat' => $point,
                ]);

                $order->user->increment('point', $point);

                foreach ($order->items as $item) {
                    $item->product?->decrement('stok', $item->qty);
                }
            });

            return redirect()
                ->route('admin.orders.index')
                ->with('success', 'Pesanan ' . $order->invoice_number . ' berhasil dikonfirmasi.');
        }

        return redirect()
            ->route('admin.orders.index')
            ->with('error', 'Pesanan ini tidak dalam status menunggu konfirmasi.');
    }

    /**
     * Admin tolak pembayaran (misal transfer tidak masuk).
     */
    public function reject(Order $order): RedirectResponse
    {
        if ($order->status === 'menunggu_konfirmasi') {
            $order->update(['status' => 'ditolak']);

            return redirect()
                ->route('admin.orders.index')
                ->with('success', 'Pesanan ' . $order->invoice_number . ' ditolak.');
        }

        return redirect()->route('admin.orders.index');
    }
}
