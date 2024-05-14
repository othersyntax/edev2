@extends('layouts.main')
@section('title')
    Negeri
@endsection
@yield('custom-css')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Negeri</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Negeri</strong>
            </li>
        </ol>
    </div>
</div>    
@endsection

@section('content')
    FORM
@endsection
@yield('custom-js')