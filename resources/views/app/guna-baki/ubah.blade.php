@extends('layouts.main')
@section('title')
    Permohonan Baharu
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
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
<form action="/projek/baki/update" method="post">
    @csrf
    <input type="hidden" name="projek_id" value="{{ $projek->projek_id }}">
    <input type="hidden" name="proj_daerah_data" value="{{ $projek->proj_daerah}}">
    <input type="hidden" name="proj_fasiliti_id_data" value="{{ $projek->proj_fasiliti_id}}">
    <input type="hidden" name="proj_pelaksana_agensi_data" value="{{ $projek->proj_pelaksana_agensi}}">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>SUMBER KEWANGAN</h5>
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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">#Bil</th>
                                <th width="70%">Projek</th>
                                <th width="10%" class="text-center">Kod Subsetia</th>
                                <th class="text-right" width="15%">Penjimatan (RM)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($bakulJimat->count()>0)
                                @php
                                    $bil=1;
                                @endphp
                                @foreach ($bakulJimat as $item)
                                    <tr>
                                        <td class="text-center">{{ $bil++ }}</td>
                                        <td>{{ $item->proj_nama }}</td>
                                        <td class="text-center">{{ $item->proj_kod_subsetia }}</td>
                                        <td class="text-right">@duit($item->proj_penjimatan)</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                            {{ Form::select('proj_kod_subsetia', ['1001'=>'1001', '4001'=>'4001','4003'=>'4003'], $projek->proj_kod_subsetia, ['class'=>'form-control', 'id'=>'proj_kod_subsetia']) }}
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
                            {{ Form::select('proj_pemilik', dropdownProgram(), auth()->user()->program_id, ['class'=>'form-control', 'id'=>'proj_pemilik', 'disabled'=>'true' ]) }}
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
                            {{ Form::select('proj_kategori_id', dropdownProjekKategori('tukar'), $projek->proj_kategori_id, ['class'=>'form-control', 'id'=>'proj_kategori_id', 'disabled'=>'true']) }}
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
                            {{ Form::number('proj_kos_mohon', $projek->proj_kos_mohon, ['class'=>'form-control text-right', 'id'=>'proj_kos_mohon', 'readonly']) }}
                            @error('proj_kos_mohon')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Agensi Pelaksana?</label>
                            {{ Form::select('proj_pelaksana', ['1'=>'Pemilik', '2'=>'BPKj'], $projek->proj_pelaksana, ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Projek</label>
                            {{ Form::textarea('proj_nama', $projek->proj_nama, ['class'=>'form-control', 'id'=>'proj_nama', 'rows'=>'3']) }}
                            @error('proj_nama')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Skop Projek</label>
                            {{ Form::textarea('proj_skop', $projek->proj_skop, ['class'=>'form-control', 'id'=>'proj_skop', 'rows'=>'3']) }}
                            @error('proj_skop')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Justifikasi Projek</label>
                            {{ Form::textarea('proj_justifikasi', $projek->proj_justifikasi, ['class'=>'form-control', 'id'=>'proj_justifikasi', 'rows'=>'3']) }}
                            @error('proj_justifikasi')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
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
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-2">
                    <a href="/projek/baki/senarai" class="btn btn-white btn-sm">Batal</a>
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
<script>
    $(document).ready(function(){
        // alert('aa');
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

    });
</script>

@endsection
