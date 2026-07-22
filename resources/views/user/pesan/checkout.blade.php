@extends('welcome')
@section('content')
    <section class="section inner-page" id="checkout">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <div class="section-heading text-center mb-4" style="padding-top:50px;">
                        <h2>Ringkasan Pesanan</h2>
                        <span>No. Invoice: {{ $order->invoice_number }}</span>
                    </div>

                    <div class="card shadow">
                        <div class="card-header" style="background-color:#1B4332; color:#fff;">
                            Detail Pesanan
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Harga</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td class="text-center">{{ $item->qty }}</td>
                                            <td class="text-end">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td class="text-end">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-end">Total</th>
                                        <th class="text-end" style="color:#1B4332;">
                                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>

                            <p class="text-muted small mb-1">
                                Metode ambil pesanan:
                                <strong>{{ $order->order_type === 'dine_in' ? 'Dine In' : 'Pick Up' }}</strong>
                            </p>

                            <p class="text-muted small mb-4">
                                Estimasi poin yang akan kamu dapatkan setelah pembayaran dikonfirmasi admin:
                                <strong>{{ $order->items->sum('qty') * 10 }} poin</strong>
                            </p>

                            <a href="{{ route('pesanan.pembayaran', $order) }}" class="btn btn-success w-100">
                                Lanjutkan ke Pembayaran
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
