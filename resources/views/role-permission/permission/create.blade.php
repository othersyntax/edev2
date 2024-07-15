@extends('layouts.main')
@section('title')
    Capaian
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Tambah Had Capaian</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Had Capaian</strong>
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
                <h4>Tambah Peranan</h4>
                <div class="ibox-tools">
                    <a href="{{ url('/akses/permissions') }}" class="btn btn-danger float-right">Batal</a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ url('/akses/permissions') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Modul</label>
                                {{ Form::select('modul', dropdownModul(), null, ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                <label>Nama Had Capaian</label>
                                {{ Form::text('name', null, ['class'=>'form-control']) }}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
