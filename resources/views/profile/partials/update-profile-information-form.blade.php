<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}"
            required autofocus>
        @error('name')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control"
            value="{{ old('email', $user->email) }}" required>
        @error('email')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div class="mt-2">
                <p class="small text-muted mb-1">
                    Email kamu belum terverifikasi.
                    <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline">
                        Kirim ulang email verifikasi.
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="small text-success mb-0">
                        Link verifikasi baru sudah dikirim ke email kamu.
                    </p>
                @endif
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">No HP</label>
        <input type="text" id="no_hp" name="no_hp" class="form-control"
            value="{{ old('no_hp', $user->no_hp) }}">
        @error('no_hp')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex align-items-center gap-3">
        <button type="submit" class="btn btn-success">Simpan</button>

        @if (session('status') === 'profile-updated')
            <span class="text-success small">Tersimpan.</span>
        @endif
    </div>
</form>
