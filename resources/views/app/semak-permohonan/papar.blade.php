@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Papar Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Papar</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <input type="hidden" id="page_projek_id" name="page_projek_id" value="{{ $projek->projek_id }}">
    <div class="col-lg-7">
        <div class="ibox product-detail">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        <span class="product-price">
                            {{ $projek->proj_sort }}
                        </span>
                        <h3 class="font-bold m-b-xs">
                            1. PROFIL PROJEK
                        </h3>
                        <p>{{ $projek->proj_nama_admin }}</p>
                        <div class="m-t-md">
                            <h2 class="product-main-price" >RM <span id="main_amaun">@duit($projek->proj_kos_mohon)</span> <small class="text-muted">Kos Dimohon</small> </h2>
                        </div>
                        <hr>

                        <h4>1.1 Maklumat Projek</h4>

                        <div class="normal text-muted">
                            <b>Skop</b><br/>
                            {!! $projek->proj_skop_admin !!}
                            <br/><br/>
                            <b>Justifikasi</b><br/>
                            {!! $projek->proj_justifikasi_admin ? $projek->proj_justifikasi_admin: 'Tiada Rekod' !!}
                        </div>
                        <dl class="row normal m-t-md">
                            <dt class="col-md-4 ">Pemilik</dt>
                            <dd class="col-md-8">{{ $projek->program->prog_name }}</dd>
                            <dt class="col-md-4 ">Kod Sub Projek</dt>
                            <dd class="col-md-8">{{ $projek->proj_kod_agensi }}-{{ $projek->proj_kod_projek }}-{{ $projek->proj_kod_setia }}-{{ $projek->proj_kod_subsetia }}</dd>
                            <dt class="col-md-4 ">Program</dt>
                            <dd class="col-md-8">{{ $projek->proj_program ? $projek->projekProgram->proj_prog_nama : 'Tiada Rekod'  }}</dd>
                            <dt class="col-md-4 ">Pelaksana</dt>
                            <dd class="col-md-8">
                                {{ $projek->proj_pelaksana ? getPelaksana($projek->proj_pelaksana) : 'Tiada Rekod'  }}
                                {{ $projek->proj_pelaksana>2 ? ' - '.$projek->jkr->prog_name : '' }}
                            </dd>
                            @php
                            if(strtotime($projek->proj_laksana_mula)<>0){
                                $mula = \Carbon\Carbon::parse($projek->proj_laksana_mula);
                                $tamat = \Carbon\Carbon::parse($projek->proj_laksana_tamat);
                                $diff = $mula->diffInDays($tamat);
                            }
                            else{
                                $diff = 0;
                            }

                            @endphp
                            <dt class="col-md-4 ">Tarikh  Pelaksanaan</dt>
                            <dd class="col-md-8">{{ strtotime($projek->proj_laksana_mula)>0 ? date('d/m/Y', strtotime($projek->proj_laksana_mula )) : 'Tiada Rekod' }} - {{ strtotime($projek->proj_laksana_tamat)>0 ? date('d/m/Y', strtotime($projek->proj_laksana_tamat)): 'Tiada Rekod' }}</dd>
                            <dt class="col-md-4 ">Tempoh</dt>
                            <dd class="col-md-8">{{ $diff }} hari</dd>
                            <dt class="col-md-4 ">Catatan</dt>
                            <dd class="col-md-8">{{ $projek->proj_catatan ? $projek->proj_catatan : 'Tiada Rekod' }}</dd>
                        </dl>
                        <hr>
                    </div>
                    @if ($projek->proj_wf_sah==2)
                        <form action="/permohonan/semak/pilihan" method="POST">
                            @csrf
                            <input type="hidden" name="projek_id" value="{{ $projek->projek_id }}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><strong>Cadangan</strong></label>
                                    {{ Form::select('proj_status', ['4'=>'--Sila pilih--', '5'=>'Diangkat untuk kelulusan' , '6'=>'Tidak Diangkat untuk kelulusan'], $projek->proj_status, ['class'=>'form-control', 'id'=>'proj_status']) }}
                                </div>
                            </div>
                            <div class="col-md-12">
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
                            <div class="col-md-12">
                                <button type="button" class="btn btn-xs btn-default" onclick="history.back()">Kembali</button>
                                <button type="submit" class="btn btn-xs btn-primary">Simpan</button>
                            </div>
                        </form>
                    @else
                    <div class="col-md-12">
                        <button type="button" class="btn btn-xs btn-default" onclick="history.back()">Kembali</button>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>1.2 Maklumat Lokaliti</h5>
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
                    <div class="col-lg-6">
                        <dl>
                            <dt class="text-uppercase">Negeri</dt>
                            <dd>{{ $projek->proj_negeri ? $projek->negeri->neg_nama_negeri : 'Tiada Rekod' }}</dd>
                            <dt class="text-uppercase">Daerah</dt>
                            <dd>{{ $projek->proj_daerah ? $projek->daerah->dae_nama_daerah : 'Tiada Rekod' }}</dd>
                            <dt class="text-uppercase">Fasiliti</dt>
                            <dd>{{ $projek->proj_fasiliti_id ? $projek->fasiliti->fas_name : 'Tiada Rekod' }}</dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl>
                            <dt class="text-uppercase">Parlimen</dt>
                            <dd>{{ $projek->proj_parlimen ? $projek->proj_parlimen : 'P000 - Tiada Rekod' }}</dd>
                            <dt class="text-uppercase">DUN</dt>
                            <dd>{{ $projek->proj_dun ? $projek->proj_dun : 'N00 - Tiada Rekod' }}</dd>
                        </dl>
                    </div>
                </div>

            </div>
        </div>
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>1.3 Unjuran Kewangan <span id="jum_unjuran" class="badge badge-warning">RM 0</span></h5>
                <div class="ibox-tools">
                    <a class="btn btn-xs btn-default collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="btn btn-xs btn-default close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="15%" class="text-center">#Bil</th>
                                <th width="30%" class="text-center">Tahun</th>
                                <th width="35%" class="text-right">Unjuran</th>
                                <th width="20%">#</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-unjuran">
                            <tr>
                                <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" class="text-right"><b>Jumlah</b></td>
                                <td class="text-right jumUnjuran">RM @duit(0)</td>
                                <td class="text-center"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>1.4 Dokumen Sokongan <span id="jum_dokumen" class="badge badge-warning">0</span></h5>
                <div class="ibox-tools">
                    <a class="btn btn-xs btn-default collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="btn btn-xs btn-default close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="10%" class="text-center">#Bil</th>
                                <th width="65%">Perihal</th>
                                <th width="25%">#</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-dokumen">
                            <tr>
                                <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>Aktiviti Rekod</h5>
                <div class="ibox-tools">
                    <a class="btn btn-xs btn-default collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="btn btn-xs btn-default close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="tab-content">
                    <div id="contact-2" class="tab-pane active">
                        <div class="client-detail">
                            <div class="full-height-scroll">
                                <div id="vertical-timeline" class="vertical-container dark-timeline">
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon navy-bg">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Permohonan Baharu</p>
                                            <p>Usup Keram</p>
                                            <span class="vertical-date small text-muted">2024-06-01 17:25:00</span>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon gray-bg">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Kemaskini Rekod</p>
                                            <p>Usup Keram</p>
                                            <span class="vertical-date small text-muted">2024-06-05 17:25:00</span>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon gray-bg">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Kemaskini Rekod</p>
                                            <p>Norraida Amzah</p>
                                            <span class="vertical-date small text-muted">2024-06-05 17:25:00</span>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon red-bg">
                                            <i class="fa fa-trash"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Tolak Permohonan</p>
                                            <p>Chua Choon Lee</p>
                                            <span class="vertical-date small text-muted">2024-06-05 17:25:00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('app/projek/_modal/add-unjuran')
@include('app/projek/_modal/muat-naik')
@endsection
@section('custom-js')
<!-- Data picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
<script>
$(document).ready(function(){
    //fetchUnjuran();
    fetchDokumen();

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    // LIST UNJURAN
    function fetchUnjuran(){
        let projekID = $('#page_projek_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "/projek/papar/unjuran/senarai/"+projekID,
            dataType: "json",
            success: function (response) {
                var bil=1;
                if(response.unjuran.length>0){
                    $('#tbody-unjuran').html("");
                    let jumUnjuran=parseFloat(0);
                    $.each(response.unjuran, function (key, item) {
                        $('#tbody-unjuran').append('<tr>\
                            <td class="text-center">' + bil + '</td>\
                            <td class="text-center">' + item.proj_unjur_tahun + '</td>\
                            <td class="text-right">' + financial(item.proj_unjur_siling) + '</td>\
                            <td><button type="button" value="' + item.proj_unjuran_id + '" class="btn btn-default btn-xs editUnjuran" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.proj_unjuran_id + '" class="btn btn-default btn-xs deleteUnjuran" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                        jumUnjuran += parseFloat(item.proj_unjur_siling);
                        bil++;
                    });
                    $('.jumUnjuran').html(financial(jumUnjuran))
                    $('#jum_unjuran').html('RM '+financial(jumUnjuran));
                }
                else{
                    $('#tbody-unjuran').html("");
                    $('#tbody-unjuran').append('<tr>\
                        <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>\
                    \</tr>');
                }
            }
        });
    }

    function cekAmaunUnjuran(){
        let currUnjuran  = $('.jumUnjuran').text();
        let currAmaun  = $('#main_amaun').text();
        if(currUnjuran==currAmaun){
            return false;
        }
        else{
            return true;
        }
    }


    // LIST DOKUMEN
    function fetchDokumen(){
        let page_projek_id = $('#page_projek_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "/permohonan/papar/dokumen/senarai/"+page_projek_id,
            dataType: "json",
            success: function (response) {
                var bil=1;
                $('#jum_dokumen').html(response.doc.length);
                if(response.doc.length>0){
                    $('#tbody-dokumen').html("");
                    $.each(response.doc, function (key, item) {
                        $('#tbody-dokumen').append('<tr>\
                            <td class="text-center">' + bil + '</td>\
                            <td>' + item.proj_doc_perihal + '</td>\
                            <td><a href="/storage/'+item.proj_doc_fail+'" title="Papar" target="_blank"><i class="fa fa-search text-navy"></i></a>\
                            <button type="button" value="' + item.proj_document_id + '" class="btn btn-default btn-xs deleteDokumen" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                        bil++;
                    });

                }
                else{
                    $('#tbody-dokumen').html("");
                    $('#tbody-dokumen').append('<tr>\
                        <td colspan="3" class="font-italic text-small text-center">Tiada Rekod</td>\
                    \</tr>');
                }
            }
        });
    }

    function financial(x) {
        return Number.parseFloat(x).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }

    $('form').on('submit', function() {
        let kosLulus = $('#proj_kos_lulus').val();
        let status = $('#proj_status').val();
        // alert(checked);
        if (kosLulus == '') {
            swal("Kos Diluluskan", "Sila Masukkan Kos Yang Diluluskan!!", "error");
            return false;
        } else {
            return true;
        }

        if (status == 4) {
            swal("Cadangan", "Sila Pilih Cadangan Anda!!", "error");
            return false;
        } else {
            return true;
        }
    });
});

</script>
@endsection
