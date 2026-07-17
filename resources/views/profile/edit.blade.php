@extends('welcome')
@section('content')
    <section class="section" id="profile">
        <div class="container">

            <div class="section-heading text-center" style="padding-top:50px;">
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
                            <p class="fw-bold mb-0" style="font-size: 36px; color:#1B4332;">
                                {{ number_format(auth()->user()->point) }} Poin
                            </p>
                            <span class="text-muted small">
                                Poin didapat setiap kali pesananmu dikonfirmasi oleh admin.
                            </span>
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
