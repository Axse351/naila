@extends('welcome')
@section('content')
    <section class="section" id="qris">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">

                    <div class="section-heading text-center mb-4">
                        <h2>Pembayaran QRIS</h2>
                        <span>No. Invoice: {{ $order->invoice_number }}</span>
                    </div>

                    <div class="card shadow text-center">
                        <div class="card-body">
                            <p class="fw-bold" style="font-size: 22px; color:#1B4332;">
                                Total: Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </p>

                            <img src="{{ asset('assets_user/images/qris.png') }}" alt="QRIS Rockpukat"
                                class="img-fluid my-3" style="max-width: 280px;">

                            <p class="text-muted small">
                                Scan kode QRIS di atas menggunakan aplikasi e-wallet atau mobile banking kamu.
                            </p>

                            <form method="POST" action="{{ route('pesanan.confirm', $order) }}" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">
                                    Saya Sudah Membayar
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
