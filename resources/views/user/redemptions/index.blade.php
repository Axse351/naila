@extends('welcome')
@section('content')

    <section class="section inner-page" id="tukar-poin">
        <div class="container">

            <div class="section-heading text-center mb-4" style="padding-top:50px;">
                <h2>Riwayat Tukar Poin</h2>
                <span>Poin kamu saat ini: <strong>{{ auth()->user()->point }}</strong></span>
            </div>

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            <div class="row">
                <div class="col-lg-10 mx-auto">

                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('redemptions.create') }}" class="btn btn-success">
                            + Ajukan Tukar Poin
                        </a>
                    </div>

                    @forelse ($redemptions as $redemption)
                        <div class="card shadow mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">
                                <div>
                                    <h5 class="mb-1">
                                        {{ \App\Models\Redemption::labelPromo($redemption->jenis_promo) }}
                                    </h5>
                                    <span class="text-muted small">
                                        {{ $redemption->created_at->translatedFormat('d F Y, H:i') }}
                                        &middot;
                                        Produk: {{ $redemption->product->nama_produk ?? '-' }}
                                        &middot;
                                        {{ $redemption->poin_dipakai }} poin
                                    </span>
                                </div>

                                <div class="text-end">
                                    @if ($redemption->status === 'menunggu')
                                        <span class="badge bg-warning text-dark">Menunggu Konfirmasi</span>
                                    @elseif ($redemption->status === 'disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @else
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-muted">Kamu belum pernah mengajukan tukar poin.</p>
                    @endforelse

                    <div class="d-flex justify-content-center mt-3">
                        {{ $redemptions->links() }}
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
