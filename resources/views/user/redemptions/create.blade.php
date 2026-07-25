@extends('welcome')
@section('content')

    <section class="section inner-page" id="tukar-poin-ajukan">
        <div class="container">

            <div class="section-heading text-center mb-4" style="padding-top:50px;">
                <h2>Ajukan Tukar Poin</h2>
                <span>Poin kamu saat ini: <strong>{{ auth()->user()->point }}</strong></span>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header" style="background-color:#1B4332; color:#fff;">
                            Pilih Jenis Penukaran
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('redemptions.store') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label fw-bold mb-2 d-block">Jenis Promo</label>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input jenis-promo-radio" type="radio" name="jenis_promo"
                                            id="promo-reguler" value="reguler"
                                            data-poin="100" data-butuh-produk="1"
                                            {{ old('jenis_promo') === 'reguler' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="promo-reguler">
                                            Tukar 100 Poin &mdash; bebas pilih 1 produk gratis
                                        </label>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input jenis-promo-radio" type="radio" name="jenis_promo"
                                            id="promo-b5g1" value="b5g1"
                                            data-poin="50" data-butuh-produk="1"
                                            {{ old('jenis_promo') === 'b5g1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="promo-b5g1">
                                            Promo Beli 5 Gratis 1 &mdash; 50 poin, bebas pilih 1 produk gratis
                                        </label>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input jenis-promo-radio" type="radio" name="jenis_promo"
                                            id="promo-couple" value="couple"
                                            data-poin="20" data-butuh-produk="0"
                                            {{ old('jenis_promo') === 'couple' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="promo-couple">
                                            Promo Pasangan &mdash; 20 poin, gratis 1 Alpukat Original (otomatis)
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-4" id="wrapper-produk">
                                    <label for="product_id" class="form-label fw-bold">Pilih Produk Gratis</label>
                                    <select name="product_id" id="product_id" class="form-select">
                                        <option value="">-- Pilih Produk --</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}"
                                                {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                                {{ $product->nama_produk }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <p class="text-muted small">
                                    Kebutuhan poin: <strong id="info-poin">-</strong>. Poin akan langsung dipotong
                                    setelah admin menyetujui permintaan ini.
                                </p>

                                <button type="submit" class="btn btn-success w-100">
                                    Ajukan Sekarang
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const radios = document.querySelectorAll('.jenis-promo-radio');
            const wrapperProduk = document.getElementById('wrapper-produk');
            const infoPoin = document.getElementById('info-poin');

            function updateForm() {
                const checked = document.querySelector('.jenis-promo-radio:checked');
                if (!checked) return;

                infoPoin.textContent = checked.dataset.poin + ' poin';
                wrapperProduk.style.display = checked.dataset.butuhProduk === '1' ? 'block' : 'none';
            }

            radios.forEach(radio => radio.addEventListener('change', updateForm));
            updateForm();
        });
    </script>

@endsection
