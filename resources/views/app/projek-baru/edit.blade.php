@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Baharu</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Maklumat Projek</h5>
            </div>
            <div class="ibox-content">
                <form action="/projek/simpan" method="post">
                    @csrf
                    <input type="hidden" name="projek_id" value="{{ $projek->projek_id }}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kod Agensi</label>
                                {{ Form::text('proj_kod_agensi', $projek->proj_kod_agensi, ['class'=>'form-control', 'id'=>'proj_kod_agensi']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kod Projek</label>
                                {{ Form::text('proj_kod_projek', $projek->proj_kod_projek, ['class'=>'form-control', 'id'=>'proj_kod_projek']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kod </label>
                                {{ Form::text('proj_kod_middle', $projek->proj_kod_middle, ['class'=>'form-control', 'id'=>'proj_kod_middle']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kod Kumpulan</label>
                                {{ Form::text('proj_kod_group', $projek->proj_kod_group, ['class'=>'form-control', 'id'=>'proj_kod_group']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Negeri</label>
                                {{ Form::text('proj_negeri', $projek->proj_negeri, ['class'=>'form-control', 'id'=>'proj_negeri']) }}
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                {{ Form::text('proj_tahun', $projek->proj_tahun, ['class'=>'form-control', 'id'=>'proj_tahun']) }}
                            </div>
                            <div class="form-group">
                                <label>Kos Sebenar</label>
                                {{ Form::text('proj_kos_sebenar', $projek->proj_kos_sebenar, ['class'=>'form-control', 'id'=>'proj_kos_sebenar']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bulan</label>
                                {{ Form::text('proj_bulan', $projek->proj_bulan, ['class'=>'form-control', 'id'=>'proj_bulan']) }}
                            </div>
                            <div class="form-group">
                                <label>Program</label>
                                {{ Form::text('proj_program', $projek->proj_program, ['class'=>'form-control', 'id'=>'proj_program']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Projek</label>
                                {{ Form::textarea('proj_nama', $projek->proj_nama, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'4']) }}
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                {{ Form::textarea('proj_butiran', $projek->proj_butiran, ['class'=>'form-control', 'id'=>'proj_butiran', 'rows'=>'4']) }}
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                {{ Form::textarea('proj_catatan', $projek->proj_catatan, ['class'=>'form-control', 'id'=>'proj_catatan', 'rows'=>'4']) }}
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-white btn-sm" type="button">Batal</button>
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
@endsection
