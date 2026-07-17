<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
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
     */
    public function approve(Order $order): RedirectResponse
    {
        if ($order->status === 'menunggu_konfirmasi') {
            $point = intdiv((int) $order->total_harga, 10000);

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
