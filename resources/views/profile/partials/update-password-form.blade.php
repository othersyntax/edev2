<form method="post" action="{{ route('password.update') }}">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Katalaluan sedia ada</label>
                <input class="form-control" type="password" name="current_password" id="current_password">
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Katalaluan baharu</label>
                <input class="form-control" type="password" name="password" id="password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Sahkan katalaluan baharu</label>
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</form>
