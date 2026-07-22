@extends('welcome')
@section('content')
    {{-- ===== PROFIL UMKM ===== --}}
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
                                    Menjadi UMKM minuman alpukat kocok yang unggul, inovatif,
                                    dikenal luas oleh masyarakat, dengan mengutamakan
                                    kualitas produk serta pelayanan terbaik di era digital.
                                </p>
                            </div>
                            <div class="card-body">
                                <h4>Misi</h4>
                                <ol>
                                    <li>Menyajikan minuman alpukat kocok dengan bahan berkualitas, higienis, dan cita rasa
                                        yang konsisten.</li>
                                    <li>Mengembangkan variasi menu yang kreatif dan mengikuti tren pasar.</li>
                                    <li>Membangun brand Rockpukat agar dikenal sebagai minuman sehat dan kekinian.</li>
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

    <!-- ***** Promo Area Starts ***** -->
    <section class="section" id="child">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center" style="padding-top:50px;">
                        <div class="rp-eyebrow justify-content-center">
                            <span class="rp-pick"></span> PENAWARAN SPESIAL
                        </div>
                        <h2>Promo UMKM Rockpukat</h2>
                    </div>
                </div>
            </div>

            <div class="row mt-5">

                <!-- Promo Buy 1 Get 1 -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100 text-center">
                        <img src="{{ asset('assets_user/images/buy1get1.png') }}" class="card-img-top"
                            alt="Promo Buy 1 Get 1">
                        <div class="card-body">
                            <h4>Promo BUY 1 GET 1</h4>
                            <p>Nikmati penawaran menarik yang hanya didapatkan oleh akun baru.</p>
                            <p class="text-danger small mb-2">*Khusus untuk pengguna baru</p>
                            <a href="{{ route('katalog') }}" class="btn btn-success">Lihat Promo</a>
                        </div>
                    </div>
                </div>

                <!-- Promo Buy 5 Get 1 -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100 text-center">
                        <img src="{{ asset('assets_user/images/buy5get1.png') }}" class="card-img-top"
                            alt="Promo Buy 5 Get 1">
                        <div class="card-body">
                            <h4>PROMO BUY 5 GET 1</h4>
                            <p>Beli 5 produk apa saja (varian bebas), gratis 1 produk pilihanmu.</p>
                            <p class="text-danger small mb-2">*Hanya berlaku setiap tanggal 16</p>
                            <a href="{{ route('katalog') }}" class="btn btn-success">Lihat Promo</a>
                        </div>
                    </div>
                </div>

                <!-- Promo Couple -->
                <div class="col-lg-4 mb-4">
                    <div class="card shadow h-100 text-center">
                        <img src="{{ asset('assets_user/images/promo-couple.jpeg') }}" class="card-img-top"
                            alt="Promo Couple">
                        <div class="card-body">
                            <h4>Promo Couple</h4>
                            <p>Beli 2 Rockpukat varian apa saja, gratis 1 Alpukat Original.</p>
                            <a href="{{ route('katalog') }}" class="btn btn-success">Lihat Promo</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** Promo Area Ends ***** -->

    <!-- ***** Info Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center">
                        <div class="rp-eyebrow justify-content-center">
                            <span class="rp-pick"></span> SIAPA KAMI
                        </div>
                        <h2>Info UMKM Rockpukat</h2>
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
                        Rockpukat merupakan UMKM yang bergerak di bidang minuman alpukat kocok
                        berbahan dasar alpukat pilihan. Kami berkomitmen menghadirkan
                        minuman sehat, lezat, dan berkualitas dengan inovasi rasa yang
                        disukai semua kalangan. #Enaknya Dikocokin!
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

            <!-- Card Lokasi / Kontak / Sosmed -->
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <i class="fa fa-map-marker"></i>
                        <h4>Lokasi</h4>
                        <p>
                            Jalan Tentara Pelajar, Grage Mall Cirebon.<br>
                            Pintu keluar Grage Mall Cirebon, Jalan Samiaji.
                        </p>
                        <a href="https://maps.app.goo.gl/ZWj8oDjkWArtPkDq7" target="_blank" rel="noopener"
                            class="btn-rock">
                            Lihat di Maps
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <i class="fa fa-whatsapp"></i>
                        <h4>Kontak</h4>
                        <p>Keluhan &amp; testimoni, chat langsung ya!</p>
                        <a href="https://wa.me/628978401995?text=Halo%20Rockpukat%2C%20saya%20mau%20bertanya"
                            target="_blank" rel="noopener" class="btn-rock">
                            Chat via WhatsApp
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4">
                    <div class="info-card">
                        <i class="fa fa-instagram"></i>
                        <h4>Sosial Media</h4>
                        <p class="mb-2">
                            <a href="https://www.instagram.com/rockpukatdotcom?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                target="_blank" rel="noopener">
                                <i class="fa fa-instagram"></i> @rockpukatdotkom
                            </a>
                        </p>
                        <p class="mb-0">
                            <a href="https://www.tiktok.com/@rockpukatdotkom?_r=1&_t=ZS-98BotK3WlOO" target="_blank"
                                rel="noopener">
                                <i class="fa fa-music"></i> @rockpukatdotkom (TikTok)
                            </a>
                        </p>
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
                        <strong>Senin - Kamis</strong><br>
                        10.00 - 18.00
                    </div>
                    <div class="col-lg-3">
                        <strong>Jumat - Sabtu</strong><br>
                        13.00 - 18.00
                    </div>
                    <div class="col-lg-3">
                        <strong>Minggu</strong><br>
                        LIBUR
                    </div>
                </div>
            </div>

            <!-- S&K Poin & Benefit Daftar Akun -->
            <div class="row mt-5">
                <div class="col-lg-6 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header" style="background-color:#1B4332; color:#fff;">
                            Syarat &amp; Ketentuan Poin
                        </div>
                        <div class="card-body">
                            <ul class="mb-0">
                                <li>Setiap pembelian 1 produk bernilai <strong>10 poin</strong>.</li>
                                <li>Kumpulkan <strong>100 poin</strong> untuk mendapatkan 1 produk secara gratis.</li>
                                <li>Minimal penukaran poin adalah <strong>100 poin</strong>.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-header" style="background-color:#1B4332; color:#fff;">
                            Keuntungan Daftar Akun
                        </div>
                        <div class="card-body">
                            <ul class="mb-0">
                                <li>Dapatkan poin setiap pembelian, bisa ditukar produk gratis.</li>
                                <li>Akses promo Buy 1 Get 1 khusus pengguna baru.</li>
                                <li>Riwayat pesanan tersimpan rapi dan mudah dilacak.</li>
                                <li>Info promo terbaru lebih dulu dari yang lain.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ***** Info Area Ends ***** -->
@endsection
