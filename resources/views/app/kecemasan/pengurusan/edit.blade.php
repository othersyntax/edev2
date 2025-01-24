@extends('layouts.main')
@section('title')
    Permohonan Kecemasan
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/summernote/summernote-bs4.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Kemaskini</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Kecemsann</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
<form action="/pengurusan/kecemasan/update" method="post">
    @csrf
    <input type="hidden" name="projek_id" value="{{ $projek->projek_id }}">
    <input type="hidden" name="proj_daerah_data" value="{{ $projek->proj_daerah}}">
    <input type="hidden" name="proj_fasiliti_id_data" value="{{ $projek->proj_fasiliti_id}}">
    <input type="hidden" name="proj_pelaksana_agensi_data" value="{{ $projek->proj_pelaksana_agensi}}">
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
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('proj_negeri', dropdownNegeri(), $projek->proj_negeri, ['class'=>'form-control', 'id'=>'proj_negeri']) }}
                            @error('proj_negeri')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Daerah</label>
                            <span id="list-daerah">
                                {{ Form::select('proj_daerah', [''=>'--Sila pilih--'], $projek->proj_daerah, ['class'=>'form-control', 'id'=>'proj_daerah']) }}
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
                                {{ Form::select('proj_fasiliti_id', [''=>'--Sila pilih--'], $projek->proj_fasiliti_id, ['class'=>'form-control', 'id'=>'proj_fasiliti_id']) }}
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
                            {{ Form::text('proj_kod_agensi', 'P42', ['class'=>'form-control', 'id'=>'proj_kod_agensi', 'readonly']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Projek</label>
                            {{ Form::text('proj_kod_projek', '00600', ['class'=>'form-control', 'id'=>'proj_kod_projek', 'readonly']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Setia</label>
                            {{ Form::text('proj_kod_setia', '117', ['class'=>'form-control', 'id'=>'proj_kod_setia', 'readonly']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sub Setia</label>
                            {{ Form::select('proj_kod_subsetia', ['1001'=>'1001', '4001'=>'4001','4003'=>'4003','5003'=>'5003'], $projek->proj_kod_subsetia, ['class'=>'form-control', 'id'=>'proj_kod_subsetia']) }}
                            @error('proj_kod_subsetia')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <p class="text-info font-bold mt-3">2. MAKLUMAT PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemilik</label>
                            {{ Form::select('proj_pemilik', dropdownProgram(), $projek->proj_pemilik, ['class'=>'form-control', 'id'=>'proj_pemilik', 'disabled'=>'true' ]) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Projek Program</label>
                            {{ Form::select('proj_program', dropdownProjekProgram(), $projek->proj_program, ['class'=>'form-control', 'id'=>'proj_program']) }}
                            @error('proj_program')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kategori Projek</label>
                            {{ Form::select('proj_kategori_id', dropdownProjekKategori('xsiling'), $projek->proj_kategori_id, ['class'=>'form-control', 'id'=>'proj_kategori_id']) }}
                            @error('proj_kategori_id')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Melibatkan Struktur</label>
                            {{ Form::select('proj_struktur', [''=>'--Sila Pilih--', '1'=>'Ya', '2'=>'Tidak'], $projek->proj_struktur, ['class'=>'form-control', 'id'=>'proj_struktur']) }}
                            @error('proj_struktur')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="data_1">
                            <label>Tarikh Mula Pelaksanaan</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="proj_laksana_mula" class="form-control" name="proj_laksana_mula" value="{{ date('d/m/Y', strtotime($projek->proj_laksana_mula)) }}" >
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
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="proj_laksana_tamat" name="proj_laksana_tamat" class="form-control" value="{{ date('d/m/Y', strtotime($projek->proj_laksana_tamat)) }}" >
                            </div>
                            @error('proj_laksana_tamat')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    {{ Form::hidden('proj_tahun', $projek->proj_tahun, ['class'=>'form-control', 'id'=>'proj_tahun']) }}
                    {{ Form::hidden('proj_bulan', $projek->proj_bulan, ['class'=>'form-control', 'id'=>'proj_bulan']) }}
                    <div class="col-md-3">
                        <div class="form-group has-success">
                            <label>Anggaran Kos (RM)</label>
                            {{ Form::number('proj_kos_mohon', $projek->proj_kos_mohon, ['class'=>'form-control text-right', 'id'=>'proj_kos_mohon']) }}
                            @error('proj_kos_mohon')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Agensi Pelaksana?</label>
                            {{ Form::select('proj_pelaksana', ['1'=>'Pemilik', '2'=>'BPKj' , '4'=>'JKN', '3'=>'JKR'], $projek->proj_pelaksana, ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
                        </div>
                    </div>
                    <div id="pilihJkr" class="col-md-6" style="display:none">
                        <div class="form-group">
                            <label id="agensiLaksanaTitle">Pelaksana</label>
                            <span id="list-agensi-pelaksana">
                                {{ Form::select('proj_pelaksana_agensi',  [''=>'--Sila pilih--'], $projek->proj_pelaksana_agensi, ['class'=>'form-control', 'id'=>'proj_pelaksana_agensi']) }}
                            </span>
                            @error('proj_pelaksana_agensi')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <p class="text-info font-bold mt-3">3. BUTIRAN PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-1">
                        <div class="form-group">
                            <label>Keutamaan</label>
                            {{ Form::text('proj_sort', $projek->proj_sort, ['class'=>'form-control', 'id'=>'proj_sort']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Projek</label>
                            {{ Form::textarea('proj_nama', $projek->proj_nama_admin, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'3']) }}
                            @error('proj_nama')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group diff-wrapper2">
                            <label>Skop Projek</label>
                            {{ Form::textarea('proj_skop', $projek->proj_skop_admin, ['class'=>'form-control original', 'id'=>'proj_skop', 'rows'=>'3']) }}
                            @error('proj_skop')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                            {{ Form::hidden('original',$projek->proj_skop,['id'=>'original']) }}
                            <label class="text-dark">Skop Projek (Asal)</label>
                            <div class="diff2"></div>
                        </div>
                        <hr>
                        <div class="form-group diff-wrapper3">
                            <label>Justifikasi Projek</label>
                            {{ Form::textarea('proj_justifikasi', $projek->proj_justifikasi_admin, ['class'=>'form-control', 'id'=>'proj_justifikasi', 'rows'=>'3']) }}
                            @error('proj_justifikasi')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                            {{ Form::hidden('oriJustifikasi', $projek->proj_justifikasi, ['id'=>'oriJustifikasi']) }}
                            <label class="text-dark">Justifikasi (Asal)</label>
                            <div class="diff3"></div>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Ulasan Teknikal (JKR / BPKj / Unit Kejuruteraan)</label>
                            {{ Form::textarea('proj_ulasan_teknikal', $projek->proj_ulasan_teknikal, ['class'=>'form-control', 'id'=>'proj_ulasan_teknikal', 'rows'=>'3']) }}
                            @error('proj_ulasan_teknikal')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            {{ Form::textarea('proj_catatan', $projek->proj_catatan, ['class'=>'form-control', 'id'=>'proj_catatan', 'rows'=>'4']) }}
                        </div>
                    </div>
                </div>
                <p class="text-info font-bold mt-3">4. KELULUSAN PERMOHONAN</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Cadangan</strong></label>
                            {{ Form::select('proj_status_admin', ['4'=>'--Sila pilih--', '5'=>'Diangkat untuk kelulusan' , '6'=>'Tidak Diangkat untuk kelulusan'], $projek->proj_status, ['class'=>'form-control', 'id'=>'proj_status_admin']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><strong>Kos Diluluskan (RM)</strong></label>
                            {{ Form::text('proj_kos_lulus',  $projek->proj_kos_lulus, ['class'=>'form-control', 'id'=>'proj_kos_lulus']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><strong>Catatan</strong></label>
                            {{ Form::textarea('proj_catatan_admin', null, ['class'=>'form-control',  'rows'=> 3, 'id'=>'proj_catatan_admin']) }}
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
<!-- Date picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/template/js/plugins/select2/select2.full.min.js") }}"></script>
<!-- SUMMERNOTE -->
<script src="{{ asset("/template/js/plugins/summernote/summernote-bs4.js") }}"></script>
<!-- Diff march patch -->
<script src="{{ asset("/template/js/plugins/diff_match_patch/javascript/diff_match_patch.js") }}"></script>
<!-- jQuery pretty text diff -->
<script src="{{ asset("/template/js/plugins/preetyTextDiff/jquery.pretty-text-diff.min.js") }}"></script>
<script>
    $(document).ready(function(){
        // Initial diff2
        $(".diff-wrapper2").prettyTextDiff({
            originalContent: $('#original').val(),
            changedContent: $('#proj_skop').val(),
            diffContainer: ".diff2"
        });

        $(".diff-wrapper3").prettyTextDiff({
            originalContent: $('#oriJustifikasi').val(),
            changedContent: $('#proj_justifikasi').val(),
            diffContainer: ".diff3"
        });


        $('#proj_skop').summernote();
        $('#proj_justifikasi').summernote();
        $('#proj_ulasan_teknikal').summernote();
        let negeriID = $('[name=proj_negeri]').val();
        let daerahID = $('[name=proj_daerah_data]').val();
        let fasilitiID = $('[name=proj_fasiliti_id_data]').val();
        let laksana = $('[name=proj_pelaksana]').val();
        let agensi = $('[name=proj_pelaksana_agensi_data]').val();
        pilihPelaksana(laksana, agensi);

        if(!daerahID)
            daerahID=99;
        if(!fasilitiID)
            fasilitiID=99;
        getFasiliti(negeriID, 'proj_daerah', '#list-daerah', daerahID);
        getEditFasiliti(daerahID, 'proj_fasiliti_id', '#list-fasiliti', fasilitiID);


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

        $('form').on('submit', function() {
            let kosLulus = $('#proj_kos_lulus').val();
            let status = $('#proj_status_admin').val();
            if (kosLulus == '') {
                swal("Kos Diluluskan", "Sila Masukkan Kos Yang Diluluskan!!", "error");
                return false;
            } else {
                return true;
            }

            if (status < 5) {
                swal("Cadangan", "Sila Pilih Cadangan Anda!!", "error");
                return false;
            } else {
                return true;
            }
        });

    });
</script>

@endsection
