@extends('layouts.main')
@section('title')
    Permohonan Projek
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/switchery/switchery.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/summernote/summernote-bs4.css") }}" rel="stylesheet">
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Permohonan Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Permohonan</a>
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
         <div class="ibox">
            <div class="ibox-title">
                <h5>1. MAKLUMAT SILING</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <ul class="sortable-list connectList agile-list" id="todo">
                    <div class="row">
                        @foreach($silingList as $s)
                        <div class="col-md-6">
                            <li class="warning-element">
                                <h4>{{ $s->peruntukan->kod_full }} - {{ $s->peruntukan->keterangan }}</h4>
                                <div class="agile-detail">
                                    <input class="float-right btn btn-xs btn-white" type="radio" id="{{ $s->siling_id }}" name="proj_siling_id" value="{{ $s->siling_id }}">
                                    {{-- <a href="#" class="float-right btn btn-xs btn-white">Tag</a> --}}
                                    <i class="fa fa-credit-card text-default"></i> <span class="text-bold text-primary">RM @duit($s->sil_balance)</span>
                                </div>
                            </li>
                        </div>
                        @endforeach
                    </div>
                </ul>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Vot</label>
                            {{ Form::text('proj_kod_agensi', null, ['class'=>'form-control', 'id'=>'proj_kod_agensi', 'readonly']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Projek</label>
                            {{ Form::text('proj_kod_projek', null, ['class'=>'form-control', 'id'=>'proj_kod_projek', 'readonly']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Setia</label>
                            {{ Form::text('proj_kod_setia', null, ['class'=>'form-control', 'id'=>'proj_kod_setia', 'readonly']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sub Setia</label>
                            {{ Form::text('proj_kod_subsetia', null, ['class'=>'form-control', 'id'=>'proj_kod_subsetia', 'readonly']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>2. MAKLUMAT LOKALITI</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('proj_negeri', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'proj_negeri']) }}
                            @error('proj_negeri')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Daerah</label>
                            <span id="list-daerah">
                                {{ Form::select('proj_daerah', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'proj_daerah']) }}
                            </span>
                            @error('proj_daerah')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fasiliti</label>
                            <span id="list-fasiliti">
                                {{ Form::select('proj_fasiliti_id', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'proj_fasiliti_id']) }}
                            </span>
                            @error('proj_fasiliti_id')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Parlimen</label>
                            {{ Form::text('proj_parlimen', 'P00 - Tiada Rekod', ['class'=>'form-control', 'id'=>'proj_parlimen', 'readonly']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dewan Undangan Negeri</label>
                            {{ Form::text('proj_dun', 'N00 - Tiada Rekod', ['class'=>'form-control', 'id'=>'proj_dun', 'readonly']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>3. MAKLUMAT PROJEK</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemilik</label>
                            {{ Form::select('proj_pemilik', dropdownProgram(), auth()->user()->program_id, ['class'=>'form-control', 'id'=>'proj_pemilik', 'disabled'=>'true' ]) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Program</label>
                            {{ Form::select('proj_program', dropdownProjekProgram(), '100004', ['class'=>'form-control', 'id'=>'proj_program']) }}
                            @error('proj_program')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kategori Projek</label>
                            {{ Form::select('proj_kategori_id', dropdownProjekKategori('siling'), null, ['class'=>'form-control', 'id'=>'proj_kategori_id']) }}
                            @error('proj_kategori_id')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Melibatkan Struktur</label>
                            {{ Form::select('proj_struktur', [''=>'--Sila Pilih--', '1'=>'Ya', '2'=>'Tidak'], null, ['class'=>'form-control', 'id'=>'proj_struktur']) }}
                            @error('proj_struktur')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="data_1">
                            <label>Tarikh Mula Pelaksanaan</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="proj_laksana_mula" class="form-control" name="proj_laksana_mula">
                            </div>
                            @error('proj_laksana_mula')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="data_2">
                            <label>Tarikh Tamat Pelaksanaan</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="proj_laksana_tamat" name="proj_laksana_tamat" class="form-control">
                            </div>
                            @error('proj_laksana_tamat')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    {{ Form::hidden('proj_tahun', null, ['class'=>'form-control', 'id'=>'proj_tahun']) }}
                    {{ Form::hidden('proj_bulan', null, ['class'=>'form-control', 'id'=>'proj_bulan']) }}
                    <div class="col-md-3">
                        <div class="form-group has-success">
                            <label>Anggaran Kos (RM)</label>
                            {{ Form::number('proj_kos_mohon', null, ['class'=>'form-control text-right', 'id'=>'proj_kos_mohon']) }}
                            @error('proj_kos_mohon')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Agensi Pelaksana?</label>
                            {{ Form::select('proj_pelaksana', ['1'=>'Pemilik', '2'=>'BPKj' , '4'=>'JKN', '3'=>'JKR'], null, ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
                        </div>
                    </div>
                    <div id="pilihJkr" class="col-md-6" style="display:none">
                        <div class="form-group">
                            <label id="agensiLaksanaTitle">Pelaksana</label>
                            <span id="list-agensi-pelaksana">
                                {{ Form::select('proj_pelaksana_agensi',  [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'proj_pelaksana_agensi']) }}
                            </span>
                            @error('proj_pelaksana_agensi')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>Keutamaan</label>
                            {{ Form::number('proj_sort', null, ['class'=>'form-control', 'id'=>'proj_sort']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>4. BUTIRAN PROJEK</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Projek</label>
                            {{ Form::textarea('proj_nama', null, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'3']) }}
                            @error('proj_nama')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
			            <div class="form-group">
                            <label>Skop Projek</label>
                            {{ Form::textarea('proj_skop', null, ['class'=>'form-control', 'id'=>'proj_skop', 'rows'=>'4']) }}
                            @error('proj_skop')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Justifikasi Projek</label>
                            {{ Form::textarea('proj_justifikasi', null, ['class'=>'form-control', 'id'=>'proj_justifikasi', 'rows'=>'4']) }}
                            @error('proj_justifikasi')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ulasan Teknikal (JKR / BPKj / Unit Kejuruteraan)</label>
                            {{ Form::textarea('proj_ulasan_teknikal', null, ['class'=>'form-control', 'id'=>'proj_ulasan_teknikal', 'rows'=>'4']) }}
                            @error('proj_ulasan_teknikal')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            {{ Form::textarea('proj_catatan', null, ['class'=>'form-control', 'id'=>'proj_catatan', 'rows'=>'4']) }}
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
                    <a href="/permohonan/baru/main" class="btn btn-white btn-sm">Batal</a>
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                    {{-- <button class="btn btn-info btn-sm" type="submit">Simpan dan Salin</button> --}}
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
@section('custom-js')
<!-- SUMMERNOTE -->
<script src="{{ asset("/template/js/plugins/summernote/summernote-bs4.js") }}"></script>
<!-- Date picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/template/js/plugins/select2/select2.full.min.js") }}"></script>
<script>
    $(document).ready(function(){
        // alert('aa');
        let laksana = $('[name=proj_pelaksana]').val();
        let agensi = $('[name=proj_pelaksana_agensi_data]').val();
        pilihPelaksana(laksana, agensi);
        $('#proj_skop').summernote();
        $('#proj_justifikasi').summernote();
        $('#proj_ulasan_teknikal').summernote();



        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            format: "dd/mm/yyyy",
            keyboardNavigation: false,
            forceParse: false,
            // calendarWeeks: true,
            autoclose: true
        });
        $('#data_2 .input-group.date').datepicker({
            todayBtn: "linked",
            format: "dd/mm/yyyy",
            keyboardNavigation: false,
            forceParse: false,
            // calendarWeeks: true,
            autoclose: true
        });

        $('#proj_laksana_mula').on('change', function(){
            var selDate = $(this).val();
            var spilDate = selDate.split('/');
            $('#proj_bulan').val(getMonth(spilDate[1]));
            $('#proj_tahun').val(spilDate[2])
            // alert(spilDate[0]);
        });

        $('#proj_negeri').on('change', function() {
            var parID = $(this).val();
            getFasiliti(parID, 'proj_daerah', '#list-daerah');
            // getFasiliti(cariNegeri, 'proj_fasiliti_id', '#list-fasiliti');
        });

        $('#proj_status').on('change', function(){
            let pilih = $(this).val();
            pilihStatus(pilih);
        });

        $('#proj_pelaksana').on('change', function(){
            let select = $(this).val();
            pilihPelaksana(select);
            // alert('aa');

        });

        $('input[name="proj_siling_id"]').on('change', function(){
            select = $('input[name="proj_siling_id"]:checked').val();
            let url = "/projekmohon/ajax-peruntukan/" + select;
            $.get(url, function(data) {
                $('#proj_kod_agensi').val(data.peruntukan.kod_agensi);
                $('#proj_kod_projek').val(data.peruntukan.kod_projek);
                $('#proj_kod_setia').val(data.peruntukan.kod_setia);
                $('#proj_kod_subsetia').val(data.peruntukan.kod_subsetia);
            });
        });

        function pilihStatus(pilih){
            if(pilih == 1){
                $('#pilihStatus').hide();
            }
            else{
                $('#pilihStatus').show();
            }
        }
        function pilihPelaksana(select, selectAgensi='99'){
            // alert('aa');
            if(select == 3){
                $('#pilihJkr').show();
                $('#agensiLaksanaTitle').html('Cawangan JKR');
                getAgensiPelaksana('JKR', 'proj_pelaksana_agensi', '#list-agensi-pelaksana', selectAgensi);
            }
            else if(select == 4){
                $('#pilihJkr').show();
                $('#agensiLaksanaTitle').html('JKN Yang Melaksana');
                getAgensiPelaksana('JKN', 'proj_pelaksana_agensi', '#list-agensi-pelaksana', selectAgensi);
            }
            else{
                $('#pilihJkr').hide();
            }
        }


        //GET PELAKSANA AGENSI JKR / JKN
        function getAgensiPelaksana(data='',  inputname='', list='', select='99') {
            let url = "/ajax/ajax-agensi-pelaksana/" + data + "/" + inputname + "/" + select;
            $.get(url, function(data) {
                $(list).html(data);
            });
        }

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

        function getEditFasiliti(daerahID='0', inputname='0', list='0', select='99'){
            let url = "/ajax/ajax-fasiliti/" + daerahID + "/" + inputname + "/" + select;
            $.get(url, function(data) {
                $(list).html(data);
            });
        }

        function getMonth(month){
            let bulan={
                '01': 'Januari',
                '02': 'Februari',
                '03': 'Mac',
                '04': 'April',
                '05': 'Mei',
                '06': 'Jun',
                '07': 'Julai',
                '08': 'Ogos',
                '09': 'September',
                '10': 'Oktober',
                '11': 'November',
                '12': 'Disember'
            };
            return bulan[month];
        }

    });
</script>

@endsection
