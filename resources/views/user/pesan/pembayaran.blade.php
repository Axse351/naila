@extends('welcome')
@section('content')
    <section class="section inner-page" id="pembayaran">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="section-heading text-center mb-4" style="padding-top:50px;">
                        <h2>Pilih Metode Pembayaran</h2>
                        <span>No. Invoice: {{ $order->invoice_number }}</span>
                    </div>

                    <div class="card shadow text-center mb-4">
                        <div class="card-body">
                            <p class="fw-bold mb-0" style="font-size: 22px; color:#1B4332;">
                                Total: Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pesanan.confirm', $order) }}">
                        @csrf

                        <div class="card shadow mb-3">
                            <div class="card-body">

                                <!-- QRIS -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method" id="qris"
                                        value="qris" checked>
                                    <label class="form-check-label fw-bold" for="qris">QRIS</label>

                                    <div class="mt-2 text-center">
                                        <img src="{{ asset('assets_user/images/qris.jpeg') }}" alt="QRIS Rockpukat"
                                            class="img-fluid" style="max-width: 220px;">
                                        <p class="text-muted small mt-2 mb-0">
                                            Scan kode QRIS di atas menggunakan aplikasi e-wallet atau mobile banking kamu.
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <!-- DANA -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method" id="dana"
                                        value="dana">
                                    <label class="form-check-label fw-bold" for="dana">E-Wallet (DANA)</label>

                                    <div class="mt-2 small text-muted">
                                        Transfer ke DANA: <strong>08978401995</strong>
                                    </div>
                                </div>

                                <hr>

                                <!-- Seabank -->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="payment_method" id="seabank"
                                        value="seabank">
                                    <label class="form-check-label fw-bold" for="seabank">Transfer Bank (Seabank)</label>

                                    <div class="mt-2 small text-muted">
                                        Seabank a.n <strong>Naila Khaerunisa</strong><br>
                                        No. Rekening: <strong>901431758281</strong>
                                    </div>
                                </div>

                                <hr>

                                <!-- Tunai -->
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="tunai"
                                        value="tunai">
                                    <label class="form-check-label fw-bold" for="tunai">Tunai / Bayar di Tempat</label>

                                    <div class="mt-2 small text-muted">
                                        Bayar langsung saat mengambil pesanan (dine in / pick up).
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Saya Sudah / Akan Membayar
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
