@extends('layouts.main')
@section('title')
    Pengguna
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Tambah Pengguna</h2>
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
        {{-- @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif --}}
        <div class="ibox ">
            <div class="ibox-title">
                <h4>Tambah Pengguna</h4>
                <div class="ibox-tools">
                    <a href="{{ url('/akses/users') }}" class="btn btn-danger float-end">Kembali</a>
                </div>
            </div>
            <div class="ibox-content">
                <form action="/akses/users" method="POST">
                @csrf              
                <div class="row">                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="name" class="form-control" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">E-mel</label>
                            <input type="text" name="email" class="form-control" />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Katalaluan</label>
                            <input type="password" name="password" class="form-control" />
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Peranan</label>
                            <select name="roles[]" class="form-control" multiple>
                                <option value="">--Pilih Peranan--</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>                                  
                </div>
                </form>                
            </div>
        </div>
    </div>
</div>
@endsection