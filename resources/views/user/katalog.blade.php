@extends('welcome')
@section('content')
    <section class="section inner-page" id="katalog">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading text-center" style="padding-top:50px;">
                        <h2>Katalog Menu Rockpukat</h2>
                        <span>Berikut Daftar Menu Alpukat Kocok Kami :</span>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success text-center mt-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row mt-5">

                @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card shadow h-100">
                            <div class="card-header" style="background-color:#1B4332; height: 8px;"></div>

                            @if ($product->gambar)
                                <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top"
                                    style="height: 220px; object-fit: cover;" alt="{{ $product->nama_produk }}">
                            @else
                                <div class="d-flex align-items-center justify-content-center bg-light"
                                    style="height: 220px;">
                                    <span class="text-muted">Tidak ada gambar</span>
                                </div>
                            @endif

                            <div class="card-body d-flex flex-column">
                                @if ($product->kategori)
                                    <span class="badge mb-2"
                                        style="background-color:#1B4332; color:#fff; width: fit-content;">
                                        {{ $product->kategori }}
                                    </span>
                                @endif

                                <h4>{{ $product->nama_produk }}</h4>

                                @if ($product->deskripsi)
                                    <p class="text-muted" style="font-size: 14px;">
                                        {{ Str::limit($product->deskripsi, 90) }}
                                    </p>
                                @endif

                                <div class="mt-auto">
                                    <p class="fw-bold mb-1" style="font-size: 18px; color:#1B4332;">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </p>

                                    @if ($product->stok > 0)
                                        <span class="text-success small d-block mb-2">
                                            Stok tersedia: {{ $product->stok }}
                                        </span>

                                        <a href="{{ route('pesan', $product) }}" class="btn btn-success w-100">
                                            Beli Sekarang
                                        </a>
                                    @else
                                        <span class="text-danger small d-block mb-2">
                                            Stok habis
                                        </span>
                                        <button class="btn btn-secondary w-100" disabled>
                                            Stok Habis
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12 text-center">
                        <p class="text-muted">Belum ada produk yang tersedia saat ini.</p>
                    </div>
                @endforelse

            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>

        </div>
    </section>
@endsection
