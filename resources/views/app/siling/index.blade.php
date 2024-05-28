@extends('layouts.main')
@section('title')
    Bandar/Mukim
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
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
                <strong>Penetapan</strong>
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
                <h5>Cari Maklumat Siling</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('neg_negeri_id', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'neg_negeri_id']) }}
                        </div>                            
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Daerah</label>
                            <span id="list-daerah">
                                {{ Form::select('dae_daerah_id', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'dae_daerah_id']) }}
                            </span>
                        </div>                            
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kod Bandar</label>
                            {{ Form::text('ban_kod_bandar_sch', '', ['class'=>'form-control', 'id'=>'ban_kod_bandar_sch']) }}
                        </div>
                    </div>                   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Bandar</label>
                            {{ Form::text('ban_nama_bandar_sch', '', ['class'=>'form-control', 'id'=>'ban_nama_bandar_sch']) }}
                        </div>
                    </div>                   
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <a href="/pentadbiran/bandar" class="btn btn-default">Set Semula</a>
                        <input type="button" class="btn btn-primary float-right" id="carian" value="Carian">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>