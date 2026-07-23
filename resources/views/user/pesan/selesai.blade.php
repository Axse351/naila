@extends('welcome')
@section('content')
    <section class="section inner-page" id="selesai">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <div class="section-heading text-center mb-4">
                        <h2>Status Pesanan</h2>
                        <span>No. Invoice: {{ $order->invoice_number }}</span>
                    </div>

                    <div class="card shadow mb-4 text-center">
                        <div class="card-body">
                            @if ($order->status === 'paid')
                                <span class="badge bg-success fs-6 mb-3">Pesanan Selesai / Poin Diberikan</span>
                                <p class="text-muted small mb-0">
                                    Kamu mendapatkan <strong>{{ $order->point_didapat }} poin</strong> dari pesanan ini.
                                </p>
                            @elseif ($order->status === 'menunggu_konfirmasi')
                                <span class="badge bg-warning text-dark fs-6 mb-3">Menunggu Konfirmasi Admin</span>
                                <p class="text-muted small mb-0">
                                    Pembayaran kamu sedang diperiksa oleh admin. Poin akan otomatis masuk
                                    setelah pesanan dikonfirmasi.
                                </p>
                            @elseif ($order->status === 'ditolak')
                                <span class="badge bg-danger fs-6 mb-3">Pembayaran Ditolak</span>
                                <p class="text-muted small mb-0">
                                    Silakan hubungi admin melalui WhatsApp di halaman Info jika ini tidak sesuai.
                                </p>
                            @else
                                <span class="badge bg-secondary fs-6 mb-3">Belum Dibayar</span>
                                <a href="{{ route('pesanan.pembayaran', $order) }}" class="btn btn-success d-block mt-3">
                                    Lanjutkan ke Pembayaran
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="card shadow">
                        <div class="card-header" style="background-color:#1B4332; color:#fff;">
                            Detail Pesanan
                        </div>
                        <div class="card-body">
                            <p class="mb-2">
                                Metode ambil pesanan:
                                <strong>{{ $order->order_type === 'dine_in' ? 'Dine In' : 'Pick Up' }}</strong>
                            </p>

                            @if ($order->payment_method)
                                <p class="mb-3">
                                    Metode pembayaran:
                                    <strong>{{ strtoupper($order->payment_method) }}</strong>
                                </p>
                            @endif

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $item->nama_produk }}</td>
                                            <td class="text-center">{{ $item->qty }}</td>
                                            <td class="text-end">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2" class="text-end">Total</th>
                                        <th class="text-end" style="color:#1B4332;">
                                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('pesanan.index') }}" class="btn btn-outline-success">
                            Lihat Semua Riwayat Pesanan
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
