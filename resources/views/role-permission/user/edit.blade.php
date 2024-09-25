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
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">E-mel</label>
                            <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control" />
                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Katalaluan</label>
                            <input type="text" name="password" class="form-control" />
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div> --}}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Program</label>
                            {{ Form::select('program_id', dropdownProgram(), $user->program_id, ['class'=>'form-control program_id']) }}
                            @error('program_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Role</label>
                            {{ Form::select('role', ['1'=>'Pengguna', '2'=>'Pentadbir', '3'=>'Super Admin'], $user->role, ['class'=>'form-control']) }}
                            @error('program_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
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
