@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/summernote/summernote-bs4.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/daterangepicker/daterangepicker-bs3.css") }}" rel="stylesheet">
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
<form action="/projek/simpan" method="post">
    @csrf
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>MAKLUMAT LOKALITI</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Parlimen</label>
                            <div class="form-control">P.140 - Segamat</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dewan Undangan Negeri</label>
                            <div class="form-control">N.02 - Jementah</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Program</label>
                            {{ Form::select('proj_program', dropdownProgram(), null, ['class'=>'form-control', 'id'=>'proj_program']) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('proj_negeri', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'proj_negeri']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fasiliti</label>
                            {{ Form::select('proj_fasiliti_id', dropdownFasiliti(), null, ['class'=>'form-control', 'id'=>'proj_fasiliti_id']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>MAKLUMAT PROJEK</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <p class="text-info font-bold">1. MAKLUMAT KOD PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Vot</label>
                            {{ Form::text('proj_kod_agensi', 'P42', ['class'=>'form-control', 'id'=>'proj_kod_agensi']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Projek</label>
                            {{ Form::text('proj_kod_projek', '00600', ['class'=>'form-control', 'id'=>'proj_kod_projek']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Setia</label>
                            {{ Form::text('proj_kod_middle', '117', ['class'=>'form-control', 'id'=>'proj_kod_middle']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sub Setia</label>
                            {{ Form::text('proj_kod_group', null, ['class'=>'form-control', 'id'=>'proj_kod_group']) }}
                        </div>
                    </div>
                </div>
                <p class="text-info font-bold mt-3">2. MAKLUMAT PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Projek</label>
                            {{ Form::select('proj_kategori_id', dropdownProjekKategori(), null, ['class'=>'form-control', 'id'=>'proj_kategori_id']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemilik</label>
                            {{ Form::select('proj_program', dropdownProgram(), null, ['class'=>'form-control', 'id'=>'proj_program']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tahun</label>
                            {{ Form::text('proj_tahun', date('Y'), ['class'=>'form-control', 'id'=>'proj_tahun']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bulan</label>
                            {{ Form::text('proj_bulan', date('F'), ['class'=>'form-control', 'id'=>'proj_bulan']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Melibatkan Struktur</label>
                            {{ Form::select('projd_jenis_perolehan', [''=>'--Sila Pilih--', '1'=>'Ya', '2'=>'Tidak'], null, ['class'=>'form-control', 'id'=>'projd_jenis_perolehan']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Agensi Pelaksana?</label>
                            {{ Form::select('proj_pelaksana', ['1'=>'Pemilik', '2'=>'JKR'], null, ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
                        </div>
                    </div>
                    <div id="pilihJkr" class="col-md-6" style="display:none">
                        <div class="form-group">
                            <label>Cawangan JKR</label>
                            {{ Form::select('proj_pelaksan', getListJKR(), null, ['class'=>'form-control', 'id'=>'proj_status']) }}
                        </div>
                    </div>

                </div>
                <p class="text-info font-bold mt-3">3. BUTIRAN PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Projek</label>
                            {{ Form::textarea('proj_nama', null, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'3']) }}
                        </div>
                        <div class="form-group">
                            <label>Skop Projek</label>
                            {{ Form::textarea('proj_nama', null, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'3']) }}
                            <div class="summernote">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Justifikasi Projek</label>
                            {{ Form::textarea('proj_nama', null, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'3']) }}
                            <div class="summernote">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ulasan Teknikal (JKR / BPKj / Unit Kejuruteraan)</label>
                            {{ Form::textarea('proj_nama', null, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'3']) }}
                            <div class="summernote">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            {{ Form::textarea('proj_catatan', null, ['class'=>'form-control', 'id'=>'proj_catatan', 'rows'=>'4']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Anggaran Kos (RM)</label>
                            {{ Form::text('proj_kos_sebenar', null, ['class'=>'form-control text-right', 'id'=>'proj_kos_sebenar']) }}
                        </div>
                    </div>
                </div>

                <p class="text-info font-bold mt-3">5. CADANGAN PELAKSANAAN PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Jenis Dokumen</label>
                            {{ Form::select('projd_jenis_perolehan', [''=>'--Sila Pilih--', '1'=>'Inden', '2'=>'SST'], null, ['class'=>'form-control', 'id'=>'projd_jenis_perolehan']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tarikh Inden / SST</label>
                            {{ Form::text('projd_jeinis_perolehan', null, ['class'=>'form-control', 'id'=>'projd_jeinis_perolehan']) }}
                        </div>
                    </div>
                    <div class="form-group" id="data_5">
                        <label class="font-normal">Tempoh Pelaksanaan</label>
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="form-control-sm form-control" name="start" placeholder="Tarikh Mula"/>
                            <span class="input-group-addon">hingga</span>
                            <input type="text" class="form-control-sm form-control" name="end" placeholder="Tarikh Tamat" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>DOKUMEN SOKONGAN</h5>
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-sm btn-primary float-right" id="add">
                                Muat naik
                            </button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%" class="text-center">#Bil</th>
                                        <th width="80%">Perihal</th>
                                        <th width="10%">#</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-aktiviti">
                                    <tr>
                                        <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>UNJURAN KEWANGAN</h5>
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-sm btn-primary float-right" id="addUnjuran">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%" class="text-center">#Bil</th>
                                        <th width="10%">Tahun</th>
                                        <th width="70%">Unjuran Kewangan</th>
                                        <th width="10%">#</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-unjura">
                                    <tr>
                                        <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white btn-sm" type="button">Batal</button>
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                    <button class="btn btn-info btn-sm" type="submit">Simpan dan Salin</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@include('app/projek-baru/_modal/muat-naik')
@include('app/projek-baru/_modal/add-kewangan')
@endsection
@section('custom-js')
<script src="{{ asset("/template/js/plugins/summernote/summernote-bs4.js") }}"></script>
<!-- Date range picker -->
<script src="{{ asset("/template/js/plugins/daterangepicker/daterangepicker.js") }}"></script>
<script>
    $(document).ready(function(){
        //ADD BUTTON CLICK
        $('#add').click(function(e){
            e.preventDefault();
            $('#addModal').modal('show');
        });

        $('#addUnjuran').click(function(e){
            e.preventDefault();
            $('#addKewangan').modal('show');
        });

        $('#proj_pelaksana').on('change', function(){
            let select = $(this).val();

            if(select == 2){
                $('#pilihJkr').show();
            }
            else{
                $('#pilihJkr').hide();
            }
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('.summernote').summernote();
    });
</script>

@endsection
