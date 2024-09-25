@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/switchery/switchery.css") }}" rel="stylesheet">
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
                <strong>Kemaskini</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
<form action="/projek/simpan" method="post">
    @csrf
    <input type="hidden" name="projek_id" value="{{ $projek->projek_id }}">
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
                <input type="hidden" name="proj_daerah_data" value="{{ $projek->proj_daerah}}">
                <input type="hidden" name="proj_fasiliti_id_data" value="{{ $projek->proj_fasiliti_id}}">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('proj_negeri', dropdownNegeri(), $projek->proj_negeri, ['class'=>'form-control', 'id'=>'proj_negeri']) }}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Daerah</label>
                            <span id="list-daerah">
                                {{ Form::select('proj_daerah', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'proj_daerah']) }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fasiliti</label>
                            <span id="list-fasiliti">
                                {{ Form::select('proj_fasiliti_id', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'proj_fasiliti_id']) }}
                            </span>
                        </div>
                    </div>
                </div>
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
                <form action="/projek/simpan" method="post">
                    @csrf
                    <input type="hidden" name="projek_id" value="{{ $projek->projek_id }}">
                    <p class="text-info font-bold">1. MAKLUMAT KOD PROJEK</p>
                    <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Vot</label>
                                {{ Form::text('proj_kod_agensi', $projek->proj_kod_agensi, ['class'=>'form-control', 'id'=>'proj_kod_agensi']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Projek</label>
                                {{ Form::text('proj_kod_projek', $projek->proj_kod_projek, ['class'=>'form-control', 'id'=>'proj_kod_projek']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Setia</label>
                                {{ Form::text('proj_kod_setia', $projek->proj_kod_setia, ['class'=>'form-control', 'id'=>'proj_kod_setia']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Sub Setia</label>
                                {{ Form::text('proj_kod_subsetia', $projek->proj_kod_subsetia, ['class'=>'form-control', 'id'=>'proj_kod_subsetia']) }}
                            </div>
                        </div>
                    </div>
                    <p class="text-info font-bold mt-3">2. MAKLUMAT PROJEK</p>
                    <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori Projek</label>
                                {{ Form::select('proj_kategori_id', dropdownProjekKategori(), $projek->proj_kategori_id, ['class'=>'form-control', 'id'=>'proj_kategori_id']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pemilik</label>
                                {{ Form::select('proj_pemilik', dropdownProgram(), $projek->proj_pemilik, ['class'=>'form-control', 'id'=>'proj_pemilik', 'disabled'=>'true']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tahun</label>
                                {{ Form::text('proj_tahun', $projek->proj_tahun, ['class'=>'form-control', 'id'=>'proj_tahun']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Bulan</label>
                                {{ Form::text('proj_bulan', $projek->proj_bulan, ['class'=>'form-control', 'id'=>'proj_bulan']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Agensi Pelaksana?</label>
                                {{ Form::select('proj_pelaksana', ['1'=>'Pemilik', '2'=>'BPKj' , '3'=>'JKR'], null, ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Projek</label>
                                {{ Form::textarea('proj_nama', $projek->proj_nama, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'3']) }}
                            </div>
                        </div>
                    </div>
                    <p class="text-info font-bold mt-3">3. BUTIRAN PROJEK</p>
                    <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Skop Projek</label>
                                {{ Form::textarea('proj_butiran', $projek->proj_butiran, ['class'=>'form-control', 'id'=>'proj_butiran', 'rows'=>'4']) }}
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                {{ Form::textarea('proj_catatan', $projek->proj_catatan, ['class'=>'form-control', 'id'=>'proj_catatan', 'rows'=>'4']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kos Yang Diluluskan</label>
                                {{ Form::text('proj_kos_lulus', $projek->proj_kos_lulus, ['class'=>'form-control text-right', 'id'=>'proj_kos_lulus']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kos Sebenar</label>
                                {{ Form::text('proj_kos_sebenar', $projek->proj_kos_sebenar, ['class'=>'form-control text-right', 'id'=>'proj_kos_sebenar']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggungan</label>
                                {{ Form::text('proj_tangungan', $projek->proj_tangungan, ['class'=>'form-control text-right', 'id'=>'proj_tangungan']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Penjimatan (jika ada)</label>
                                {{ Form::text('proj_penjimatan', $projek->proj_penjimatan, ['class'=>'form-control text-right', 'id'=>'proj_penjimatan', 'readonly'=>'']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status Projek</label>
                                {{ Form::select('proj_status', ['1'=>'Aktif', '2'=>'Batal', '3'=>'Tukar Tajuk'], $projek->proj_status, ['class'=>'form-control', 'id'=>'proj_status']) }}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Penurunan Kuasa Kepada Ketua Jabatan</label>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" checked class="onoffswitch-checkbox" id="example1">
                                        <label class="onoffswitch-label" for="example1">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <p class="text-info font-bold mt-3">4. MAKLUMAT PERUNTUKAN</p>
                    <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No Waran Peruntukan (F1)</label>
                                <div class="form-control">{{ $projek->proj_waran_no }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>No Waran Peruntukan (F4)</label>
                                {{ Form::text('projd_waran_kecil', $details->projd_waran_kecil, ['class'=>'form-control text-right', 'id'=>'projd_waran_kecil']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Amaun Waran Peruntukan</label>
                                {{ Form::text('projd_waran_amaun', $details->projd_waran_amaun, ['class'=>'form-control text-right', 'id'=>'projd_waran_amaun']) }}
                            </div>
                        </div>
                    </div>
                    <p class="text-info font-bold mt-3">5. STATUS PROJEK</p>
                    <div class="hr-line-dashed"></div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                {{ Form::select('proj_status', ['1'=>'Aktif', '2'=>'Tukar Tajuk', '3'=>'Dibatalkan'], null, ['class'=>'form-control', 'id'=>'proj_status']) }}
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="/projek/senarai" class="btn btn-white btn-sm" type="button">Batal</a>
                            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
@section('custom-js')
  <!-- Switchery -->
  <script src="{{ asset('/template/js/plugins/switchery/switchery.js') }}"></script>
<script>
    $(document).ready(function(){
        // SET DEFAULT VALUE
        let negeriID = $('[name=proj_negeri]').val();
        let daerahID = $('[name=proj_daerah_data]').val();
        let fasilitiID = $('[name=proj_fasiliti_id_data]').val();
        // alert(daerahID);
        if(!daerahID)
            daerahID=99;
        if(!fasilitiID)
            fasilitiID=99;
        getFasiliti(negeriID, 'proj_daerah', '#list-daerah', daerahID);
        getEditFasiliti(daerahID, 'proj_fasiliti_id', '#list-fasiliti', fasilitiID);

        $('#proj_negeri').on('change', function() {
            var parID = $(this).val();
            getFasiliti(parID, 'proj_daerah', '#list-daerah');
            // getFasiliti(cariNegeri, 'proj_fasiliti_id', '#list-fasiliti');
        });

        //GET DAERAH DROPDOWN HTML AJAXCONTROLLER
        function getFasiliti(parID='0', inputname='0', list='0', select='99') {
            let url = "/ajax/ajax-daerah/" + parID + "/" + inputname + "/" + select;
            $.get(url, function(data) {
                $(list).html(data);
                $('#proj_daerah').on('change', function() {
                    var daerahID = $(this).val();
                    var list = '#list-fasiliti';
                    var inputname = 'proj_fasiliti_id';
                    let url = "/ajax/ajax-fasiliti/" + daerahID + "/" + inputname + "/" + select;
                    $.get(url, function(data) {
                        $(list).html(data);
                    });
                });
            });
        }

        $('#proj_kos_sebenar').change(function(){
            let kos = $('#proj_kos_lulus').val();
            let kosBaru = $(this).val();
            let jimat = parseFloat(kos) - parseFloat(kosBaru);
            jimat=jimat.toFixed(2);
            $('#proj_penjimatan').val(jimat);
        });

        function getEditFasiliti(daerahID='0', inputname='0', list='0', select='99'){
            let url = "/ajax/ajax-fasiliti/" + daerahID + "/" + inputname + "/" + select;
            $.get(url, function(data) {
                $(list).html(data);
            });
        }

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });
    });

</script>
@endsection
