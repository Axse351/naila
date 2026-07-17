@extends('welcome')
@section('content')
    <section class="section inner-page" id="selesai">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="card shadow text-center">
                        <div class="card-body py-5">

                            @if ($order->status === 'paid')
                                <div class="mb-3" style="font-size: 60px; color:#1B4332;">&#10004;</div>
                                <h3 class="mb-2">Pesanan Selesai!</h3>
                                <p class="text-muted">No. Invoice: {{ $order->invoice_number }}</p>
                                <p class="fw-bold" style="font-size: 20px; color:#1B4332;">
                                    Total Dibayar: Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                </p>
                                <p class="text-success">
                                    Kamu mendapatkan <strong>{{ $order->point_didapat }} poin</strong> dari pesanan ini.
                                </p>
                            @elseif ($order->status === 'menunggu_konfirmasi')
                                <div class="mb-3" style="font-size: 50px; color:#e6a817;">&#9203;</div>
                                <h3 class="mb-2">Menunggu Konfirmasi Admin</h3>
                                <p class="text-muted">No. Invoice: {{ $order->invoice_number }}</p>
                                <p class="text-muted">
                                    Pembayaran kamu sedang diperiksa oleh admin.
                                    Silakan refresh halaman ini secara berkala untuk melihat status terbaru.
                                </p>
                                <button onclick="location.reload();" class="btn btn-outline-success mt-2">
                                    Refresh Status
                                </button>
                            @elseif ($order->status === 'ditolak')
                                <div class="mb-3" style="font-size: 50px; color:#c0392b;">&#10008;</div>
                                <h3 class="mb-2 text-danger">Pembayaran Ditolak</h3>
                                <p class="text-muted">No. Invoice: {{ $order->invoice_number }}</p>
                                <p class="text-muted">
                                    Admin tidak menemukan pembayaran untuk pesanan ini.
                                    Silakan hubungi kami jika kamu merasa sudah membayar.
                                </p>
                            @else
                                <h3 class="mb-2 text-warning">Menunggu Pembayaran</h3>
                                <p class="text-muted">No. Invoice: {{ $order->invoice_number }}</p>
                                <a href="{{ route('pesanan.qris', $order) }}" class="btn btn-success mt-2">
                                    Lanjutkan Pembayaran
                                </a>
                            @endif

                            <div class="mt-4">
                                <a href="{{ route('pesanan.index') }}" class="btn btn-outline-secondary me-2">
                                    Riwayat Pesanan Saya
                                </a>
                                <a href="{{ route('katalog') }}" class="btn btn-success">
                                    Kembali ke Katalog
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
