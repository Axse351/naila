@extends('welcome')
@section('content')

    <section class="section" id="riwayat">
        <div class="container">

            <div class="section-heading text-center mb-4" style="padding-top:50px;">
                <h2>Riwayat Pesanan Saya</h2>
            </div>

            <div class="row">
                <div class="col-lg-10 mx-auto">

                    @forelse ($orders as $order)
                        <div class="card shadow mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <h5 class="mb-1">{{ $order->invoice_number }}</h5>
                                    <span class="text-muted small">
                                        {{ $order->created_at->translatedFormat('d F Y, H:i') }}
                                    </span>
                                    <div class="mt-1">
                                        @foreach ($order->items as $item)
                                            <span class="d-block small text-muted">
                                                {{ $item->nama_produk }} x{{ $item->qty }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="text-end">
                                    <p class="fw-bold mb-1" style="color:#1B4332;">
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </p>

                                    @if ($order->status === 'paid')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif ($order->status === 'menunggu_konfirmasi')
                                        <span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>
                                    @elseif ($order->status === 'ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @else
                                        <span class="badge bg-secondary">Belum Bayar</span>
                                    @endif

                                    <a href="{{ route('pesanan.selesai', $order) }}"
                                        class="btn btn-sm btn-outline-success d-block mt-2">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Kamu belum memiliki pesanan.</p>
                    @endforelse

                    <div class="d-flex justify-content-center mt-3">
                        {{ $orders->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
