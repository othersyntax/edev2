@extends('layouts.main')
@section('title')
    Kemaskini Projek
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
                <input type="hidden" name="proj_pelaksana_agensi_data" value="{{ $projek->proj_pelaksana_agensi}}">
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
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Parlimen</label>
                            <div class="form-control">P.000 - Tiada Rekod</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dewan Undangan Negeri</label>
                            <div class="form-control">N.00 - Tiada Rekod</div>
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
                            <div class="form-control text-right">{{$projek->proj_kod_agensi}}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Projek</label>
                            <div class="form-control text-right">{{$projek->proj_kod_projek}}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Setia</label>
                            <div class="form-control text-right">{{$projek->proj_kod_setia}}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sub Setia</label>
                            {{ Form::select('proj_kod_subsetia', ['1001'=>'1001', '4001'=>'4001','4003'=>'4003','5003'=>'5003'], $projek->proj_kod_subsetia, ['class'=>'form-control', 'id'=>'proj_kod_subsetia']) }}
                        </div>
                    </div>
                </div>
                <p class="text-info font-bold mt-3">2. MAKLUMAT PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemilik</label>
                            @hasanyrole('super-admin|admin')
                            {{ Form::select('proj_pemilik', dropdownProgram(), $projek->proj_pemilik, ['class'=>'form-control', 'id'=>'proj_pemilik']) }}
                            @else
                            {{ Form::select('proj_pemilik1', dropdownProgram(), $projek->proj_pemilik, ['class'=>'form-control', 'id'=>'proj_pemilik1', 'disabled'=>'true']) }}
                            {{ Form::hidden('proj_pemilik',$projek->proj_pemilik) }}
                            @endhasanyrole
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Projek Program</label>
                            @hasanyrole('super-admin|admin')
                            {{ Form::select('proj_program', dropdownProjekProgram(), $projek->proj_program, ['class'=>'form-control', 'id'=>'proj_program']) }}
                            @else
                            {{ Form::select('proj_program1', dropdownProjekProgram(), $projek->proj_program, ['class'=>'form-control', 'id'=>'proj_program1', 'disabled'=>'true']) }}
                            {{ Form::hidden('proj_program',$projek->proj_program) }}
                            @endhasanyrole
                            @error('proj_program')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kategori Projek</label>
                            @hasanyrole('super-admin|admin')
                            {{ Form::select('proj_kategori_id', dropdownProjekKategori(), $projek->proj_kategori_id, ['class'=>'form-control', 'id'=>'proj_kategori_id']) }}
                            @else
                            {{ Form::select('proj_kategori_id1', dropdownProjekKategori(), $projek->proj_kategori_id, ['class'=>'form-control', 'id'=>'proj_kategori_id', 'disabled'=>'true']) }}
                            {{ Form::hidden('proj_kategori_id',$projek->proj_kategori_id) }}
                            @endhasanyrole
                            @error('proj_kategori_id')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Melibatkan Struktur</label>
                            @hasanyrole('super-admin|admin')
                            {{ Form::select('proj_struktur', [''=>'--Sila Pilih--', '1'=>'Ya', '2'=>'Tidak'], $projek->proj_struktur, ['class'=>'form-control', 'id'=>'proj_struktur']) }}
                            @else
                            {{ Form::select('proj_struktur1', [''=>'--Sila Pilih--', '1'=>'Ya', '2'=>'Tidak'], $projek->proj_struktur, ['class'=>'form-control', 'id'=>'proj_struktur','disabled'=>'true']) }}
                            {{ Form::hidden('proj_struktur',$projek->proj_struktur) }}
                            @endhasanyrole
                            @error('proj_struktur')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="data_1">
                            <label>Tarikh Mula Pelaksanaan</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="proj_laksana_mula" class="form-control" name="proj_laksana_mula" value="{{ date('d/m/Y', strtotime($projek->proj_laksana_mula)) }}">
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
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="proj_laksana_tamat" name="proj_laksana_tamat" value="{{ date('d/m/Y', strtotime($projek->proj_laksana_tamat)) }}" class="form-control">
                            </div>
                            @error('proj_laksana_tamat')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Agensi Pelaksana?</label>
                            @hasanyrole('super-admin|admin')
                            {{ Form::select('proj_pelaksana', ['1'=>'Pemilik', '2'=>'BPKj' , '4'=>'JKN', '3'=>'JKR'], $projek->proj_pelaksana, ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
                            @else
                            {{ Form::select('proj_pelaksana1', ['1'=>'Pemilik', '2'=>'BPKj' , '4'=>'JKN', '3'=>'JKR'], $projek->proj_pelaksana, ['class'=>'form-control', 'id'=>'proj_pelaksana','disabled'=>'true']) }}
                            {{ Form::hidden('proj_pelaksana',$projek->proj_pelaksana) }}
                            @endhasanyrole
                            @error('proj_pelaksana')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
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
                </div>
                <p class="text-info font-bold mt-3">3. BUTIRAN PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Projek</label>
                            @hasanyrole('super-admin|admin')
                               {{ Form::textarea('proj_nama', $projek->proj_nama, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'4']) }}
                            @else
                                <div class="form-control">{{ $projek->proj_nama }}</div>
                                {{ Form::hidden('proj_nama', $projek->proj_nama, ['class'=>'form-control', 'id'=>'proj_nama']) }}
                            @endhasanyrole
                            @error('proj_nama')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Skop Projek</label>
                            @hasanyrole('super-admin|admin')
                               {{ Form::textarea('proj_skop', $projek->proj_skop, ['class'=>'form-control', 'id'=>'proj_skop', 'rows'=>'4']) }}
                            @else
                                <div class="form-control">{!! $projek->proj_skop !!}</div>
                                {{ Form::hidden('proj_skop', $projek->proj_skop, ['class'=>'form-control']) }}
                            @endhasanyrole
                            @error('proj_skop')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Justifikasi Projek</label>
                            @hasanyrole('super-admin|admin')
                            {{ Form::textarea('proj_justifikasi', $projek->proj_justifikasi, ['class'=>'form-control', 'id'=>'proj_justifikasi', 'rows'=>'4']) }}
                            @else
                            <div class="form-control">{!! $projek->proj_justifikasi !!}</div>
                            {{ Form::hidden('proj_justifikasi', $projek->proj_skop, ['class'=>'form-control']) }}
                            @endhasanyrole
                        </div>
                        <div class="form-group">
                            <label>Ulasan Teknikal (JKR / BPKj / Unit Kejuruteraan)</label>
                            <div class="form-control">{!! $projek->proj_ulasan_teknikal !!}</div>
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            {{ Form::textarea('proj_catatan', $projek->proj_catatan, ['class'=>'form-control', 'id'=>'proj_catatan', 'rows'=>'4']) }}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <p>
                                Penurunan Kuasa Kepada Ketua Jabatan Untuk Meluluskan Baki Penjimatan Dan Tukar Tajuk / Skop
                            </p>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" {{ $projek->proj_kuasa_pkn==1 ? 'checked' : ''}}  class="onoffswitch-checkbox">
                                    <label class="onoffswitch-label" for="example3">
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
                    {{-- <div class="col-md-3">
                        <div class="form-group">
                            <label>No Waran Peruntukan (F1)</label>
			                {{ Form::text('proj_waran_no', $projek->proj_waran_no, ['class'=>'form-control text-right', 'id'=>'proj_waran_no']) }}
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
                    </div> --}}
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kos Yang Diluluskan</label>
                            {{ Form::text('proj_kos_lulus', $projek->proj_kos_lulus, ['class'=>'form-control text-right', 'id'=>'proj_kos_lulus', 'readonly']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kos Sebenar (RM)</label>
                            {{ Form::text('proj_kos_sebenar', $projek->proj_kos_sebenar, ['class'=>'form-control text-right', 'id'=>'proj_kos_sebenar', 'readonly']) }}
                            @error('proj_kos_sebenar')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tanggungan</label>
                            {{ Form::text('proj_tangungan', $projek->proj_tangungan, ['class'=>'form-control text-right', 'id'=>'proj_tangungan']) }}
                            @error('proj_tangungan')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Penjimatan (jika ada)</label>
                            {{ Form::text('proj_penjimatan', $projek->proj_penjimatan, ['class'=>'form-control text-right', 'id'=>'proj_penjimatan']) }}
                        </div>
                    </div>
                </div>
                <p class="text-info font-bold mt-3">5. STATUS PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('proj_status', $statusList, $projek->proj_status, ['class'=>'form-control', 'id'=>'proj_status']) }}
                            {{-- {{ Form::select('proj_status', ['1'=>'Aktif', '2'=>'Tukar Tajuk', '3'=>'Dibatalkan', '4'=>'Tarik Balik', '5'=>'Selesai'], $projek->proj_status, ['class'=>'form-control', 'id'=>'proj_status']) }} --}}
                        </div>
                    </div>
                    <div id="pilihStatus" class="col-md-6" style="display:none">
                        <div class="form-group">
                            <label>Justifikasi Tukar Tajuk / Tukar Skop / Dibatalkan</label>
                            {{ Form::textarea('proj_memo', $projek->proj_memo, ['class'=>'form-control', 'id'=>'proj_memo', 'rows'=>'4']) }}
                            @error('proj_memo')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                {{ Form::hidden('proj_bulan', $projek->proj_bulan, ['class'=>'form-control', 'id'=>'proj_bulan']) }}
                {{ Form::hidden('proj_tahun', $projek->proj_tahun, ['class'=>'form-control', 'id'=>'proj_tahun']) }}
                <div class="hr-line-dashed"></div>
                <div class="form-group row">
                    <div class="col-sm-4 col-sm-offset-2">
                        <a href="/projek/senarai" class="btn btn-white btn-sm" type="button">Batal</a>
                        <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection
@section('custom-js')
    <!-- Switchery -->
    <script src="{{ asset('/template/js/plugins/switchery/switchery.js') }}"></script>
    <!-- Date picker -->
    <script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
    <!-- Select2 -->
    <script src="{{ asset("/template/js/plugins/select2/select2.full.min.js") }}"></script>
    <!-- SUMMERNOTE -->
    <script src="{{ asset("/template/js/plugins/summernote/summernote-bs4.js") }}"></script>

<script>
    $(document).ready(function(){
 	$('#proj_skop').summernote();
        $('#proj_justifikasi').summernote();
        $('#proj_ulasan_teknikal').summernote();

        // SET DEFAULT VALUE
        let negeriID = $('[name=proj_negeri]').val();
        let daerahID = $('[name=proj_daerah_data]').val();
        let fasilitiID = $('[name=proj_fasiliti_id_data]').val();
        let laksana = $('[name=proj_pelaksana]').val();
        let agensi = $('[name=proj_pelaksana_agensi_data]').val();
        let statusID = $('[name=proj_status]').val();
        pilihPelaksana(laksana, agensi);
        // if(laksana==3){
        //     getAgensiPelaksana('JKR', 'proj_pelaksana_agensi', '#list-agensi-pelaksana', agensi);
        // }
        // if(laksana==4){{
        //     getAgensiPelaksana('JKN', 'proj_pelaksana_agensi', '#list-agensi-pelaksana', agensi);
        // }

        pilihStatus(statusID);

        // alert(daerahID);
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

        });

        function pilihStatus(pilih){
            if(pilih == 1 || pilih == 5){
                $('#pilihStatus').hide();
            }
            else{
                $('#pilihStatus').show();
            }
        }
        function pilihPelaksana(select, selectAgensi='99'){
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

        $('#proj_tangungan').change(function(){
            let kos = $('#proj_kos_sebenar').val();
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


        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });
    });

</script>
@endsection
