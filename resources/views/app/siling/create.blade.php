@extends('layouts.main')
@section('title')
    Penetapan Siling
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Siling</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Siling</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Tambah</strong>
            </li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Tambah Siling</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('siling.store') }}" method="POST">
                    @csrf
                    @include('app.siling.form')
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    <a href="{{ route('siling.index') }}" class="btn btn-white mt-3">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
