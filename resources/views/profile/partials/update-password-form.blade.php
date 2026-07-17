<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')

    <div class="mb-3">
        <label for="update_password_current_password" class="form-label">Password Saat Ini</label>
        <input type="password" id="update_password_current_password" name="current_password" class="form-control"
            autocomplete="current-password">
        @error('current_password', 'updatePassword')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="update_password_password" class="form-label">Password Baru</label>
        <input type="password" id="update_password_password" name="password" class="form-control"
            autocomplete="new-password">
        @error('password', 'updatePassword')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="update_password_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
        <input type="password" id="update_password_password_confirmation" name="password_confirmation"
            class="form-control" autocomplete="new-password">
        @error('password_confirmation', 'updatePassword')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex align-items-center gap-3">
        <button type="submit" class="btn btn-success">Simpan</button>

        @if (session('status') === 'password-updated')
            <span class="text-success small">Tersimpan.</span>
        @endif
    </div>
</form>
