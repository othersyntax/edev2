<form method="post" action="{{ route('password.update') }}">
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="">Gelaran</label>
            {{ Form::select('gelaran_id', getListgelaran(),  $user->gelaran_id, ['class'=>'form-control', 'id'=>'gelaran_id']) }}
            @error('gelaran_id') <span class="text-danger">{{ $message }}</span> @enderror
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



    </div>

</div>
</form>

