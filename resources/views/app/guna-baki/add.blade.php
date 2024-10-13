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
        <h2>Guna Baki</h2>
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
<form action="/projek/baki/simpan" method="post">
    @csrf
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>MAKLUMAT SUMBER KEWANGAN</h5>
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
                                <th width="50%">Projek</th>
                                <th width="10%" class="text-center">Kod Subsetia</th>
                                <th width="15%" class="text-center">Kategori</th>
                                <th class="text-right" width="10%">Penjimatan</th>
                                <th width="10%" class="text-center">Pilih</th>
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
                                        <td class="text-center"><span class="badge {{ $item->bj_kategori == 1 ? 'badge-primary' : 'badge-warning'}}">{{ getStatusJimat($item->bj_kategori) }}</span></td>
                                        <td class="text-right">@duit($item->bj_amount_jimat)</td>
                                        <td class="text-center">
                                            <div><label><input name="sumberKewangan[]" class="pilihJimat" id="{{ $item->bakul_jimat_id }}" type="checkbox" value="{{ $item->bj_projek_id.'-'.$item->bj_amount_jimat }}"></label></div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="font-italic text-small text-center">Tiada Rekod</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-10 text-right">
                        JUMLAH :
                    </div>
                    <div class="col-md-2 text-right">
                        <h3 id="jum-select">0.00</h3>
                    </div>
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
                            {{ Form::text('proj_parlimen', null, ['class'=>'form-control', 'id'=>'proj_parlimen']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dewan Undangan Negeri</label>
                            {{ Form::text('proj_dun', null, ['class'=>'form-control', 'id'=>'proj_dun']) }}
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
                            {{ Form::select('proj_kod_subsetia', ['1001'=>'1001', '4001'=>'4001','4003'=>'4003'], null, ['class'=>'form-control', 'id'=>'proj_kod_subsetia']) }}
                            {{-- {{ Form::text('proj_kod_subsetia', null, ['class'=>'form-control', 'id'=>'proj_kod_subsetia']) }} --}}
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
                            <label>Agensi Pelaksana?</label>
                            {{ Form::select('proj_pelaksana', ['1'=>'Pemilik', '2'=>'BPKj' , '3'=>'JKR'], null, ['class'=>'form-control', 'id'=>'proj_pelaksana']) }}
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
                    <div id="pilihJkr" class="col-md-6" style="display:none">
                        <div class="form-group">
                            <label>Cawangan JKR</label>
                            {{ Form::select('proj_pelaksana_agensi', getListJKR(), null, ['class'=>'form-control', 'id'=>'proj_pelaksana_agensi']) }}
                            @error('proj_pelaksana_agensi')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Anggaran Kos (RM)</label>
                            <div class="form-control text-right" id="vwAnggaranKos">0.00</div>
                            {{ Form::hidden('proj_kos_mohon', null, ['class'=>'form-control text-right', 'id'=>'proj_kos_mohon']) }}
                        </div>
                    </div>

                </div>
                <p class="text-info font-bold mt-3">3. BUTIRAN PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group" id="data_1">
                            <label>Tarikh Mula Pelaksanaan</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="proj_laksana_mula" class="form-control" name="proj_laksana_mula">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" id="data_2">
                            <label>Tarikh Tamat Pelaksanaan</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="proj_laksana_tamat" name="proj_laksana_tamat" class="form-control">
                            </div>
                        </div>
                    </div>
                    {{ Form::hidden('proj_tahun', null, ['class'=>'form-control', 'id'=>'proj_tahun']) }}
                    {{ Form::hidden('proj_bulan', null, ['class'=>'form-control', 'id'=>'proj_bulan']) }}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Projek</label>
                            {{ Form::select('proj_kategori_id', dropdownProjekKategori('tukar'), null, ['class'=>'form-control', 'id'=>'proj_kategori_id']) }}
                            @error('proj_kategori_id')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                    </div>
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
                            {{ Form::textarea('proj_skop', null, ['class'=>'form-control', 'id'=>'proj_skop', 'rows'=>'3']) }}
                            @error('proj_skop')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Justifikasi Projek</label>
                            {{ Form::textarea('proj_justifikasi', null, ['class'=>'form-control', 'id'=>'proj_justifikasi', 'rows'=>'3']) }}
                            @error('proj_justifikasi')
                                <span class="text-danger">{{ $message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Ulasan Teknikal (JKR / BPKj / Unit Kejuruteraan)</label>
                            {{ Form::textarea('proj_ulasan_teknikal', null, ['class'=>'form-control', 'id'=>'proj_ulasan_teknikal', 'rows'=>'3']) }}
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
                    <a href="/permohonan/baru/senarai" class="btn btn-white btn-sm">Batal</a>
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
        let amount = 0;

        $('.pilihJimat').change(function(){
            pjVal = $(this).val();
            bjArray = pjVal.split("-");
            amount += Number(bjArray[1]);
            $('#jum-select').html(financial(amount));
            $('#vwAnggaranKos').html(financial(amount));
            $('#proj_kos_mohon').val(amount);
            // alert(amount);));
            // alert(amount);
        });

        function financial(x) {
            return Number.parseFloat(x).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }

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
        //ON CHANGE NEGERI DROPDOWN EVENT
        $('#proj_negeri').on('change', function() {
            var parID = $(this).val();
            getFasiliti(parID, 'proj_daerah', '#list-daerah');
            // getFasiliti(cariNegeri, 'proj_fasiliti_id', '#list-fasiliti');
        });

        $('#proj_laksana_mula').on('change', function(){
            var selDate = $(this).val();
            var spilDate = selDate.split('/');
            $('#proj_bulan').val(getMonth(spilDate[1]));
            $('#proj_tahun').val(spilDate[2])
            // alert(spilDate[0]);
        });


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

            if(select == 3){
                $('#pilihJkr').show();
            }
            else{
                $('#pilihJkr').hide();
            }
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
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
                        // $('#proj_fasiliti_id').on('change', function() {});
                        // alert('AA');
                        $('#proj_parlimen').val('P02 - Tiada Rekod');
                        $('#proj_dun').val('N22 - Tiada Rekod');
                    });
                });
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
