@extends('layouts.main')
@section('title')
    Pengguna
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Kemaskini Pengguna</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Pengguna</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="ibox ">
            <div class="ibox-title">
                <h4>Kemaskini Pengguna</h4>
                <div class="ibox-tools">
                    <a href="{{ url('/akses/users') }}" class="btn btn-danger float-end">Kembali</a>
                </div>
            </div>
            <div class="ibox-content">
                <form action="{{ url('/akses/users/'.$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">MAKLUMAT PERIBADI</h3>
                        <div class="form-group">
                            <label for="">Nama</label>
                            {{ Form::text('name', $user->name, ['class'=>'form-control', 'id'=>'name']) }}
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No. Kad Pengenalan</label>
                            {{ Form::text('nokp',  $user->nokp, ['class'=>'form-control', 'id'=>'nokp']) }}
                            @error('nokp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Gelaran</label>
                            {{ Form::select('gelaran_id', getListgelaran(),  $user->gelaran_id, ['class'=>'form-control', 'id'=>'gelaran_id']) }}
                            @error('gelaran_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">E-mel</label>
                            {{ Form::text('email',  $user->email, ['class'=>'form-control', 'id'=>'email']) }}
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6"><h3 class="m-t-none m-b">MAKLUMAT JAWATAN</h3>
                        <div class="form-group">
                            <label for="">Program</label>
                            {{ Form::select('program_id', dropdownProgram(),  $user->program_id, ['class'=>'form-control program_id']) }}
                            @error('program_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jawatan</label>
                            {{ Form::text('jawatan',  $user->jawatan, ['class'=>'form-control', 'id'=>'jawatan']) }}
                            @error('jawatan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
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
                        </div>
                    </div>
                    <hr>
                    <div class="col-12"><hr></div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Peranan</label>
                            <select name="roles[]" class="form-control" multiple>
                                @foreach ($roles as $role)
                                <option
                                    value="{{ $role }}"
                                    {{ in_array($role, $userRoles) ? 'selected':'' }}
                                >
                                    {{ $role }}
                                </option>
                                @endforeach
                            </select>
                            @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Tahap Capaian</label>
                            {{ Form::select('tahap', [''=>'--Sila pilih--','1'=>'Pengguna', '2'=>'Pentadbir', '3'=>'Super Admin'], $user->role, ['class'=>'form-control','id'=>'tahap']) }}
                            @error('tahap') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Kemaskini</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
