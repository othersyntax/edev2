<form method="post" action="{{ route('profile.update') }}">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="">Gelaran</label>
                {{ Form::select('gelaran_id', getListgelaran(),  $user->gelaran_id, ['class'=>'form-control', 'id'=>'gelaran_id']) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Nama</label>
                {{ Form::text('name',  $user->name, ['class'=>'form-control', 'id'=>'name', 'readonly']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">No. Kad Pengenalan</label>
                {{ Form::text('nokp',  $user->nokp, ['class'=>'form-control', 'id'=>'nokp']) }}
                @error('nokp') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>ID / E-mel</label>
                {{ Form::text('email',  $user->email, ['class'=>'form-control', 'id'=>'email', 'readonly']) }}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Jawatan</label>
                {{ Form::text('jawatan',  $user->jawatan, ['class'=>'form-control', 'id'=>'jawatan']) }}
                @error('jawatan') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="">Gred <small>Cth: (M48)</small></label>
                {{ Form::text('gred',  $user->gred, ['class'=>'form-control', 'id'=>'gred']) }}
                @error('gred') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">No. Telefon Pejabat</small></label>
                {{ Form::text('nophone_office',  $user->nophone_office, ['class'=>'form-control', 'id'=>'nophone_office']) }}
                @error('nophone_office') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">No. Telefon Bimbit</small></label>
                {{ Form::text('nophone_mobile', $user->nophone_mobile, ['class'=>'form-control', 'id'=>'nophone_mobile']) }}
                @error('nophone_mobile') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
            </div>
        </div>
    </div>
</form>

