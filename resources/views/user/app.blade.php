@extends('welcome')
@section('content')
    <section class="section" id="men">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading text-center" style="padding-top:50px;">
                            <div class="rp-eyebrow justify-content-center">
                                <span class="rp-pick"></span> UMKM ROCKPUKAT
                            </div>
                            <h2>Profil UMKM Rockpukat</h2>
                            <span>Berikut Profil UMKM Rockpukat :</span>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">

                    <!-- Visi Misi -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <h4>Visi</h4>
                                <p>
                                    <li>Menjadi UMKM minuman alpukat kocok yang unggul, inovatif,</li>
                                    <li>dikenal luas oleh masyarakat, dengan mengutamakan</li>
                                    <li>kualitas produk serta pelayanan terbaik di era digital.</li>
                                </p>
                            </div>
                            <div class="card-body">
                                <ol>
                                    <h4>Misi</h4>
                                    <li>1. Menyajikan minuman alpukat kocok dengan bahan berkualitas, higienis, dan cita
                                        rasa yang konsisten.</li>
                                    <li>2. Mengembangkan variasi menu yang kreatif dan mengikuti tren pasar.</li>
                                    <li>3. Membangun brand Rockpukat agar dikenal sebagai minuman sehat dan kekinian.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- STRUKTUR ORGANISASI -->
                    <div class="col-lg-6 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header"></div>
                            <div class="card-body text-center">
                                <img src="{{ asset('assets_user/images/struktur.png') }}"
                                    alt="Struktur Organisasi Rockpukat" class="img-fluid struktur-organisasi">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-5">
                    <div class="btn-group" role="group">
                        <a href="{{ route('login') }}" class="btn btn-outline-success">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-success active">Daftar</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** child Area Starts ***** -->
    <section class="section" id="child">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center" style="padding-top:50px;">
                        <div class="rp-eyebrow justify-content-center">
                            <span class="rp-pick"></span> PENAWARAN SPESIAL
                        </div>
                        <h2>Promo UMKM Rockpukat</h2>
                        <span>Berikut Promo UMKM Rockpukat :</span>
                    </div>
                </div>
            </div>

            <div class="row mt-5">

                <!-- Promo 1 -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100 text-center">
                        <img src="{{ asset('assets_user/images/buy5get1.png') }}" class="card-img-top" alt="Promo Hemat">
                        <div class="card-body">
                            <h4>Promo BUY 1 GET 1</h4>
                            <p>Nikmati penawaran menarik yang hanya didapatkan oleh akun baru.</p>
                            <a href="{{ route('katalog') }}" class="btn btn-success">Lihat Promo</a>
                        </div>
                    </div>
                </div>

                <!-- Promo 2 -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100 text-center">
                        <img src="{{ asset('assets_user/images/buy1get1.png') }}" class="card-img-top" alt="Menu Favorit">
                        <div class="card-body">
                            <h4>PROMO BUY 5 FREE 1</h4>
                            <p>Temukan berbagai menu favorit pelanggan dengan harga lebih murah.</p>
                            <a href="{{ route('katalog') }}" class="btn btn-success">Lihat Promo</a>
                        </div>
                    </div>
                </div>

                <!-- Promo 3 -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100 text-center">
                        <img src="{{ asset('assets_user/images/logo.jpg') }}" class="card-img-top" alt="Promo Spesial">
                        <div class="card-body">
                            <h4>Promo Spesial</h4>
                            <p>Khusus para pecinta Rockpukat spesial dan rahasia</p>
                            <a href="{{ route('katalog') }}" class="btn btn-success">Lihat Promo</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** Child Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <div class="rp-eyebrow justify-content-center">
                            <span class="rp-pick"></span> SIAPA KAMI
                        </div>
                        <h2>Info UMKM Rockpukat :</h2>
                        <span>Berikut Info UMKM Rockpukat :</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="info">
        <div class="container">

            <!-- Tentang -->
            <div class="row align-items-center mb-5">

                <div class="col-lg-5">
                    <img src="{{ asset('assets_user/images/logo.jpg') }}" class="img-fluid rounded shadow" alt="Rockpukat">
                </div>

                <div class="col-lg-7">
                    <h3 class="mb-3">Tentang Rockpukat</h3>

                    <p>
                        Rockpukat merupakan UMKM yang bergerak di bidang makanan ringan
                        berbahan dasar alpukat pilihan. Kami berkomitmen menghadirkan
                        camilan sehat, lezat, dan berkualitas dengan inovasi rasa yang
                        disukai semua kalangan.
                    </p>

                    <div class="row text-center mt-4">
                        <div class="col-md-4">
                            <div class="fitur">
                                <i class="fa fa-leaf"></i>
                                <h6>Bahan Pilihan</h6>
                                <small>Menggunakan bahan berkualitas.</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fitur">
                                <i class="fa fa-heart"></i>
                                <h6>Tanpa Pengawet</h6>
                                <small>Aman dikonsumsi setiap hari.</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fitur">
                                <i class="fa fa-thumbs-up"></i>
                                <h6>Rasa Nikmat</h6>
                                <small>Cita rasa yang disukai semua kalangan.</small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Card -->
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <i class="fa fa-map-marker"></i>
                        <h4>Lokasi</h4>
                        <p>
                            Jl. Raya Karanglewas No.123<br>
                            Purwokerto, Jawa Tengah
                        </p>
                        <a href="#" class="btn-rock">Lihat di Maps</a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <i class="fa fa-phone"></i>
                        <h4>Kontak</h4>
                        <p>0812-3456-7890</p>
                        <p>rockpukat@gmail.com</p>
                        <p>Respon cepat setiap hari</p>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <i class="fa fa-instagram"></i>
                        <h4>Sosial Media</h4>
                        <p>@rockpukat</p>
                        <p>Rockpukat Official</p>
                        <p>@rockpukat.id</p>
                    </div>
                </div>
            </div>

            <!-- Jam Operasional -->
            <div class="jam-operasional">
                <div class="row text-center align-items-center">
                    <div class="col-lg-3">
                        <h3>
                            <i class="fa fa-clock-o"></i>
                            Jam Operasional
                        </h3>
                    </div>
                    <div class="col-lg-3">
                        <strong>Senin - Jumat</strong>
                        08.00 - 20.00
                    </div>
                    <div class="col-lg-3">
                        <strong>Sabtu</strong>
                        09.00 - 21.00
                    </div>
                    <div class="col-lg-3">
                        <strong>Minggu</strong>
                        09.00 - 18.00
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
