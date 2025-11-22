@extends('layouts.main')
@section('title')
    Tambah Maklumat Peruntukan
@endsection
@section('custom-css')
    <link href="{{ asset("/template/css/plugins/footable/footable.core.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
    <!-- Text spinners style -->
    <link href="{{ asset("/template/css/plugins/textSpinners/spinners.css") }}" rel="stylesheet">
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
                <strong>Kemaskini</strong>
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
                <h5>Kemaskini Siling</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('siling.update', $data->siling_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('app.siling.form', ['siling' => $data])
                    <button type="submit" class="btn btn-primary mt-3">Kemaskini</button>
                    <a href="{{ route('siling.index') }}" class="btn btn-white mt-3">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
