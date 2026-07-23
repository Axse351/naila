@extends('welcome')
@section('content')
    <section class="section inner-page" id="profile">
        <div class="container">

            <div class="section-heading text-center">
                <h2>Profil Saya</h2>
                <span>Kelola informasi akun dan lihat poin kamu</span>
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="col-lg-7">

                    <!-- Kartu Poin -->
                    <div class="card shadow mb-4 text-center">
                        <div class="card-header" style="background-color:#1B4332; color:#fff;">
                            Total Poin Kamu
                        </div>
                        <div class="card-body">
                            <p class="fw-bold mb-2" style="font-size: 36px; color:#1B4332;">
                                {{ number_format(auth()->user()->point) }} Poin
                            </p>
                            <span class="text-muted small d-block mb-3">
                                Poin didapat setiap kali pesananmu dikonfirmasi oleh admin.
                            </span>

                            @php
                                $target = 100;
                                $sisaPoin = max($target - auth()->user()->point, 0);
                                $progress = min((auth()->user()->point / $target) * 100, 100);
                            @endphp

                            <div class="progress mb-2" style="height: 10px;">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $progress }}%; background-color:#1B4332;"
                                    aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            @if ($sisaPoin > 0)
                                <span class="text-muted small d-block mb-3">
                                    Kurang <strong>{{ $sisaPoin }} poin</strong> lagi untuk bisa menukar 1 produk
                                    gratis.
                                </span>
                            @else
                                <span class="text-success small d-block mb-3">
                                    Poin kamu sudah cukup untuk menukar 1 produk gratis! Tunjukkan ini ke kasir ya.
                                </span>
                            @endif

                            <hr>

                            <p class="small text-muted mb-1 text-start">
                                <strong>Ketentuan Poin:</strong>
                            </p>
                            <ul class="small text-muted text-start mb-0">
                                <li>Setiap pembelian 1 produk bernilai <strong>10 poin</strong>.</li>
                                <li>Kumpulkan <strong>100 poin</strong> untuk mendapatkan <strong>1 produk gratis</strong>.
                                </li>
                                <li>Minimal penukaran adalah <strong>100 poin</strong>.</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Informasi Profil -->
                    <div class="card shadow mb-4">
                        <div class="card-header" style="background-color:#1B4332; color:#fff;">
                            Informasi Profil
                        </div>
                        <div class="card-body">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Ubah Password -->
                    <div class="card shadow mb-4">
                        <div class="card-header" style="background-color:#1B4332; color:#fff;">
                            Ubah Password
                        </div>
                        <div class="card-body">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Hapus Akun -->
                    <div class="card shadow mb-4">
                        <div class="card-header bg-danger text-white">
                            Hapus Akun
                        </div>
                        <div class="card-body">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
