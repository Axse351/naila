@extends('welcome')
@section('content')
    <section class="section" id="pesan">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="card shadow">
                        <div class="card-header" style="background-color:#1B4332; height: 8px;"></div>

                        @if ($product->gambar)
                            <img src="{{ asset('storage/' . $product->gambar) }}" class="card-img-top"
                                style="height: 240px; object-fit: cover;" alt="{{ $product->nama_produk }}">
                        @endif

                        <div class="card-body">
                            <h3>{{ $product->nama_produk }}</h3>

                            @if ($product->deskripsi)
                                <p class="text-muted">{{ $product->deskripsi }}</p>
                            @endif

                            <p class="fw-bold" style="font-size: 20px; color:#1B4332;">
                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                            </p>

                            <span class="text-success small d-block mb-3">
                                Stok tersedia: {{ $product->stok }}
                            </span>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('pesan.store', $product) }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="qty" class="form-label">Jumlah</label>
                                    <input type="number" name="qty" id="qty" class="form-control"
                                        value="{{ old('qty', 1) }}" min="1" max="{{ $product->stok }}" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Metode Ambil Pesanan</label>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="order_type"
                                            id="dine_in" value="dine_in"
                                            {{ old('order_type', 'dine_in') === 'dine_in' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="dine_in">
                                            Dine In (makan di tempat)
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="order_type"
                                            id="pick_up" value="pick_up"
                                            {{ old('order_type') === 'pick_up' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pick_up">
                                            Pick Up (ambil sendiri)
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success w-100">
                                    Lanjut ke Ringkasan Pesanan
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
