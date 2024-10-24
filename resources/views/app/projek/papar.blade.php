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
                        <h3 class="font-bold m-b-xs">
                            1 PROFIL PROJEK
                        </h3>
                        <p>{{ $projek->proj_nama }}</p>
                        <div class="m-t-md">
                            <h2 class="product-main-price">RM @duit($projek->proj_kos_lulus) <small class="text-muted">Peruntukan Diluluskan</small> </h2>
                        </div>
                        <hr>

                        <h4>1.1 Maklumat Projek</h4>

                        <div class="normal text-muted">
                            <b>Skop</b><br/>
                            {{ $projek->proj_skop }}
                            <br/><br/>
                            <b>Justifikasi</b><br/>
                            {{ $projek->proj_justifikasi ? $projek->proj_justifikasi: 'Tiada Rekod' }}
                        </div>
                        <dl class="row normal m-t-md">
                            <dt class="col-md-4 ">#ID</dt>
                            <dd class="col-md-8">{{ $projek->projek_id }}</dd>
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
                            <dt class="col-md-4 ">Status</dt>
                            <dd class="col-md-8">{{ getStatus($projek->proj_status) }}</dd>
                        </dl>
                    </div>
                    <div class="col-md-12">
                        <a href="/projek/senarai" class="btn btn-xs btn-white">Kembali</a>
                        <a href="/projek/ubah/{{ $projek->projek_id }}" class="btn btn-xs btn-primary">Kemaskini</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>2. Maklumat Perbelanjaan (<span id="jum_kew_bayar_head" class="text-warning">RM 0.00</span>)</h5>
                <div class="ibox-tools">
                    <a href="#" class="btn btn-xs btn-primary" id="addBayaran1">Tambah
                        <i class="fa fa-plus"></i>
                    </a>
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
                                <th width="5%" class="text-center">#Bil</th>
                                <th width="20%">No Rujukan</th>
                                <th width="30%">Perihal</th>
                                <th width="10%" class="text-center">Tarikh</th>
                                <th width="20%" class="text-right">Amaun (RM)</th>
                                <th width="15%">#</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-bayaran">
                            <td colspan="6" class="text-center"><small><i>Tiada rekod</i></small></td>
                        </tbody>
                        <tfoot>
                            <td colspan="4" class="text-right"><b>JUMLAH</b></td>
                            <td class="text-right"><span id="jum_kew_bayar">0.00</span></td>
                            <td></td>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>3. Maklumat Perkara Berbangkit <span id="jum_aktiviti" class="badge badge-primary">0</span></h5>
                <div class="ibox-tools">
                    <a href="#" class="btn btn-xs btn-primary" id="add">Tambah
                        <i class="fa fa-plus"></i>
                    </a>
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
                                <th width="5%" class="text-center">#Bil</th>
                                <th width="25%">No Rujukan</th>
                                <th width="20%">Perihal</th>
                                <th width="10%" class="text-center">Tarikh</th>
                                <th width="25%">Catatan</th>
                                <th width="15%">#</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-aktiviti">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>4. Dokumen Sokongan <span id="jum_dokumen" class="badge badge-primary">0</span></h5>
                <div class="ibox-tools">
                    <a href="#" class="btn btn-xs btn-primary" id="addDokumen">Tambah
                        <i class="fa fa-plus"></i>
                    </a>
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
        <div class="ibox">
            <div class="ibox-title">
                <h5>1.3 Peruntukan</h5>
                <div class="ibox-tools">
                    <a href="#" class="btn btn-xs btn-primary" id="addPeruntukan">Tambah
                        <i class="fa fa-plus"></i>
                    </a>
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
                                <th width="30%">Perihal</th>
                                <th width="20%" class="text-center">Tarikh</th>
                                <th width="20%" class="text-right">Amaun (RM)</th>
                                <th width="15%">#</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-peruntukan">
                            <tr>
                                <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right"><b>Jumlah</b></td>
                                <td class="text-right jumPeruntukan">RM @duit(0)</td>
                                <td class="text-center"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="ibox collapsed">
            <div class="ibox-title">
                <h5>1.4 Unjuran Kewangan</h5>
                <div class="ibox-tools">
                    <a href="#" class="btn btn-xs btn-primary" id="addUnjuran">Tambah
                        <i class="fa fa-plus"></i>
                    </a>
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
@include('app/projek/_modal/add-utiliti')
@include('app/projek/_modal/edit-utiliti')
@include('app/projek/_modal/add-bayaran')
@include('app/projek/_modal/add-unjuran')
@include('app/projek/_modal/add-peruntukan')
@include('app/projek/_modal/muat-naik')
@endsection
@section('custom-js')
<!-- Data picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
<script>
$(document).ready(function(){
    fetchUtiliti();
    fetchBayaran();
    fetchUnjuran();
    fetchPeruntukan();
    fetchDokumen();

    //ADD BUTTON CLICK
    $('#add').click(function(e){
        e.preventDefault();
        $('#addModal').modal('show');
    });

    $(document).on('click', '#addBayaran1', function (e) {
        e.preventDefault();
        $('#bayaran_id_add').val('');
        $('.addBayaran').html('Tambah');
        $('#addModalBayaran').find('input').val('');
        $('#addModalBayaran').find('textarea').val('');
        $('#addModalBayaran').modal('show');
        // alert('cc');
    });

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('#data_1 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
        forceParse: false,
        // calendarWeeks: true,
        autoclose: true
    });
    $('#data_2 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
        forceParse: false,
        // calendarWeeks: true,
        autoclose: true
    });
    $('#data_3 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
        forceParse: false,
        // calendarWeeks: true,
        autoclose: true
    });
    $('#data_4 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
        forceParse: false,
        // calendarWeeks: true,
        autoclose: true
    });

    // LIST RECORD
    function fetchUtiliti(){
        let page_projek_id = $('#page_projek_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "/projek/papar/utiliti/senarai/"+ page_projek_id,
            dataType: "json",
            success: function (response) {
                $('#tbody-aktiviti').html("");
                let bil = 1;
                $('#jum_aktiviti').html(response.utiliti.length);
                if(response.utiliti.length>0){
                    $.each(response.utiliti, function (key, item) {
                        let tarikh = new Date(item.projuti_date);
                        let catatan = item.projuti_catatan?item.projuti_catatan:'-';
                        $('#tbody-aktiviti').append('<tr>\
                            <td class="text-center">' + bil + '</td>\
                            <td>' + item.projuti_ref_no + '</td>\
                            <td>' + item.projuti_perihal + '</td>\
                            <td class="text-center">' + tarikh.toLocaleDateString() + '</td>\
                            <td>' + catatan + '</td>\
                            <td><button type="button" value="' + item.projek_uti_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.projek_uti_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                        bil++;
                    });
                }
                else{
                    $('#tbody-aktiviti').append('<tr>\
                        <td colspan="6" class="text-center"><i>Tiada Rekod</i></td>\
                    \</tr>');
                }
            }
        });
    }
    // LIST RECORD BAYARAN
    function fetchBayaran(){
        let page_projek_id = $('#page_projek_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "/projek/papar/bayaran/senarai/"+ page_projek_id,
            dataType: "json",
            success: function (response) {
                $('#tbody-bayaran').html("");
                if(response.bayaran.length>0){
                    let bil = 1;
                    let jumlah=parseFloat(0);
                    $.each(response.bayaran, function (key, item) {
                        let tarikh = new Date(item.byr_date);
                        $('#tbody-bayaran').append('<tr>\
                            <td class="text-center">' + bil + '</td>\
                            <td>' + item.byr_refno + '</td>\
                            <td>' + item.byr_perihal + '</td>\
                            <td class="text-center">' + tarikh.toLocaleDateString() + '</td>\
                            <td class="text-right">' + financial(item.byr_amount) + '</td>\
                            <td><button type="button" value="' + item.bayaran_id + '" class="btn btn-default btn-xs editBayaran" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.bayaran_id + '" class="btn btn-default btn-xs delBayaran" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                        bil++;
                        jumlah += parseFloat(item.byr_amount);
                    });
                    $('#jum_kew_bayar').html(financial(jumlah));
                    $('#jum_kew_bayar_head').html('RM ' + financial(jumlah));
                }
                else{
                    $('#tbody-bayaran').append('<tr>\
                        <td colspan="6" class="text-center"><i>Tiada Rekod</i></td>\
                    \</tr>');
                }

            }
        });
    }


    // SHOW RECORD TO EDIT
    $(document).on('click', '.editbtn', function (e) {
        e.preventDefault();
        var uti_id = $(this).val();
        $('#myModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/projek/papar/utiliti/" + uti_id,
            success: function (response) {
                if (response.status == 404){
                    $('#myModal').modal('hide');
                    swal({
                        title: "Maklumat Aktiviti",
                        text: response.message,
                        type: "danger"
                    });
                } else {
                    let tarikh1 = new Date(response.utiliti.projuti_date);
                    $('#projek_uti_id').val(uti_id);
                    $('#no_rujukan').val(response.utiliti.projuti_ref_no);
                    $('#perihal').val(response.utiliti.projuti_perihal);
                    $('#tarikh').val(tarikh1.toLocaleDateString());
                    $('#catatan').val(response.utiliti.projuti_catatan);
                }
            }
        });
        $('.btn-close').find('input').val('');
    });

    // SHOW RECORD TO EDIT
    $(document).on('click', '.editBayaran', function (e) {
        e.preventDefault();
        var bayaran_id = $(this).val();
        $('.addBayaran').html('Kemaskini');
        $('#addModalBayaran').modal('show');
        $.ajax({
            type: "GET",
            url: "/projek/papar/bayaran/" + bayaran_id,
            success: function (response) {
                if (response.status == 404){
                    $('#addModalBayaran').modal('hide');
                    swal({
                        title: "Maklumat Kewangan",
                        text: response.message,
                        type: "danger"
                    });
                } else {
                    let tarikh1 = new Date(response.bayaran.byr_date);
                    $('#bayaran_id_add').val(bayaran_id);
                    $('#kew_no_rujukan_add').val(response.bayaran.byr_refno);
                    $('#kew_perihal_add').val(response.bayaran.byr_perihal);
                    $('#kew_tarikh_add').val(tarikh1.toLocaleDateString());
                    $('#kew_amount_add').val(response.bayaran.byr_amount);
                }
            }
        });
        $('.btn-close').find('input').val('');
    });

    // SHOW RECORD TO DELETE
    $(document).on('click', '.deletebtn', function () {
        var projek_uti_id = $(this).val();
        swal({
            title: "Adakah anda pasti?",
            text: "Sila pastikan rekod yang hendak dipadam",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Padam",
            cancelButtonText: "Tidak, Batalkan",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "/projek/papar/utiliti/padam/" + projek_uti_id,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 404) {
                            swal("Dibatalkan", response.message, "error");
                        } else {
                            // fetchBandar();
                            swal("Dipadam!", response.message, "success");
                        }
                        fetchUtiliti();
                    }
                });
            } else {
                swal("Dibatalkan", "Rekod tidak dipadam", "error");
            }
        });
    });

    // SHOW BAYRAN RECORD TO DELETE
    $(document).on('click', '.delBayaran', function () {
        var bayaran_id = $(this).val();
        swal({
            title: "Adakah anda pasti?",
            text: "Sila pastikan rekod yang hendak dipadam",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Padam",
            cancelButtonText: "Tidak, Batalkan",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "/projek/papar/bayaran/padam/" + bayaran_id,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 404) {
                            swal("Dibatalkan", response.message, "error");
                        } else {
                            // fetchBandar();
                            swal("Dipadam!", response.message, "success");
                        }
                        fetchBayaran();
                    }
                });
            } else {
                swal("Dibatalkan", "Rekod bayaran tidak dipadam", "error");
            }
        });
    });


    // UPDATE RECORD
    $(document).on('click', '.updateUtiliti', function (e) {
        e.preventDefault();
        $(this).text('Mengemaskini...');
        var edit_data = {
            'projek_uti_id': $('#projek_uti_id').val(),
            'projuti_ref_no': $('#no_rujukan').val(),
            'projuti_perihal': $('#perihal').val(),
            'projuti_date': $('#tarikh').val(),
            'projuti_catatan': $('#catatan').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/projek/papar/utiliti/kemaskini",
            data: edit_data,
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $('#update_msgList').html("");
                    $('#update_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#update_msgList').append('<li>' + err_value +
                            '</li>');
                    });
                } else {
                    $('#update_msgList').html("");
                    $('#myModal').find('input').val('');
                    $('#myModal').modal('hide');
                    fetchUtiliti();
                    swal({
                        title: "Aktiviti",
                        text: response.message,
                        type: "success"
                    });
                }
            }
        });

    });

    // ADD UTILITI
    $(document).on('click', '.addUtiliti', function (e) {
        e.preventDefault();
        $(this).text('Tambah...');
        var edit_data = {
            'projek_id': $('#page_projek_id').val(),
            'projuti_ref_no': $('#no_rujukan_add').val(),
            'projuti_perihal': $('#perihal_add').val(),
            'projuti_date': $('#tarikh_add').val(),
            'projuti_catatan': $('#catatan_add').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/projek/papar/utiliti/tambah",
            data: edit_data,
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $('#save_msgList_aktiviti').html("");
                    $('#save_msgList_aktiviti').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList_aktiviti').append('<li>' + err_value +
                            '</li>');
                    });
                    // alert('aa');
                } else {
                    $('#save_msgList_aktiviti').html("");
                    $('#addModal').find('input').val('');
                    $('#addModal').find('textarea').val('');
                    $('#addModal').modal('hide');
                    fetchUtiliti();
                    swal({
                        title: "Aktiviti",
                        text: response.message,
                        type: "success"
                    });
                }
            }
        });

    });

    // ADD BAYARAN
    $(document).on('click', '.addBayaran', function (e) {
        e.preventDefault();
        $(this).text('Tambah...');
        var edit_data = {
            'bayaran_id': $('#bayaran_id_add').val(),
            'projek_id': $('#page_projek_id').val(),
            'byr_refno': $('#kew_no_rujukan_add').val(),
            'byr_perihal': $('#kew_perihal_add').val(),
            'byr_amount': $('#kew_amount_add').val(),
            'byr_date': $('#kew_tarikh_add').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/projek/papar/bayaran/tambah",
            data: edit_data,
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $('#save_msgList_kew').html("");
                    $('#save_msgList_kew').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList_kew').append('<li>' + err_value +
                            '</li>');
                    });
                } else {
                    $('#save_msgList_kew').html("");
                    $('#addModalBayaran').find('input').val('');
                    $('#addModalBayaran').find('textarea').val('');
                    $('#addModalBayaran').modal('hide');
                    fetchBayaran();
                    swal({
                        title: "Maklumat Kewangan",
                        text: response.message,
                        type: "success"
                    });
                }
            }
        });

    });

    // UNJURAN KEWANGAN
    $(document).on('click', '#addUnjuran', function (e) {
        e.preventDefault();
        let projekID = $('#page_projek_id').val();
        $('#unjuran_id').val('');
        $('#proj_unjur_projek_id').val(projekID);
        $('#ModalAddUnjuran').find('input').val('');
        $('#ModalAddUnjuran').modal('show');
    });

    // ADD UNJURAN
    $(document).on('click', '.addUnjuran', function (e) {
        e.preventDefault();
        var data = {
            'proj_unjuran_id': $('#unjuran_id').val(),
            'proj_unjur_projek_id': $('#page_projek_id').val(),
            'proj_unjur_tahun': $('#proj_unjur_tahun').val(),
            'proj_unjur_siling': $('#proj_unjur_siling').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/projek/papar/unjuran/simpan",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $('#save_msgList_unjuran').html("");
                    $('#save_msgList_unjuran').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList_unjuran').append('<li>' + err_value + '</li>');
                    });
                } else {
                    $('#ModalAddUnjuran').find('input').val('');
                    $('#save_msgList_unjuran').html("");
                    $('#ModalAddUnjuran').modal('hide');
                    fetchUnjuran();
                    swal({
                        title: "Unjuran Kewangan",
                        text: response.message,
                        type: "success"
                    });
                }
            }
        });

    });

    // SHOW RECORD TO EDIT
    $(document).on('click', '.editUnjuran', function (e) {
        e.preventDefault();
        var unjuran_id = $(this).val();
        $('#ModalAddUnjuran').modal('show');
        $.ajax({
            type: "GET",
            url: "/projek/papar/unjuran/edit/" + unjuran_id,
            success: function (response) {
                if (response.status == 404){
                    $('#ModalAddUnjuran').modal('hide');
                    swal({
                        title: "Maklumat Unjuran",
                        text: response.message,
                        type: "danger"
                    });
                } else {
                    $('#unjuran_id').val(response.unjuran.proj_unjuran_id);
                    $('#proj_unjur_tahun').val(response.unjuran.proj_unjur_tahun);
                    $('#proj_unjur_siling').val(response.unjuran.proj_unjur_siling);
                }
            }
        });
        $('.btn-close').find('input').val('');
    });

    // SHOW UNJURAN TO DELETE
    $(document).on('click', '.deleteUnjuran', function () {
        var unjuranID = $(this).val();
        swal({
            title: "Adakah anda pasti?",
            text: "Sila pastikan rekod yang hendak dipadam",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Padam",
            cancelButtonText: "Tidak, Batalkan",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "get",
                    url: "/projek/papar/unjuran/padam/" + unjuranID,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 404) {
                            swal("Dibatalkan", response.message, "error");
                        } else {
                            fetchUnjuran();
                            swal("Dipadam!", response.message, "success");
                        }
                    }
                });
            } else {
                swal("Dibatalkan", "Rekod unjuran tidak dipadam", "error");
            }
        });
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

    // PERUNTUKAN
    // ADD PERUNTUKAN MODAL
    $(document).on('click', '#addPeruntukan', function (e) {
        e.preventDefault();
        let projekID = $('#page_projek_id').val();
        $('#peruntukan_id').val('');
        $('#ModalAddPeruntukan').find('input').val('');
        $('#ModalAddPeruntukan').modal('show');
    });

    // ADD PERUNTUKAN
    $(document).on('click', '.addPeruntukan', function (e) {
        e.preventDefault();
        var data = {
            'peruntukan_id': $('#peruntukan_id').val(),
            'peru_projek_id': $('#page_projek_id').val(),
            'peru_date': $('#peru_date').val(),
            'peru_jenis_peruntukan': $('#peru_jenis_peruntukan').val(),
            'peru_amaun': $('#peru_amaun').val(),
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/projek/papar/peruntukan/simpan",
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $('#save_msgList_peruntukan').html("");
                    $('#save_msgList_peruntukan').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList_peruntukan').append('<li>' + err_value + '</li>');
                    });
                } else {
                    $('#ModalAddPeruntukan').find('input').val('');
                    $('#save_msgList_peruntukan').html("");
                    $('#ModalAddPeruntukan').modal('hide');
                    fetchPeruntukan();
                    swal({
                        title: "Peruntukan Kewangan",
                        text: response.message,
                        type: "success"
                    });
                }
            }
        });

    });

    // SHOW RECORD TO EDIT
    $(document).on('click', '.editPeruntukan', function (e) {
        e.preventDefault();
        var peruntukan_id = $(this).val();
        $('#ModalAddPeruntukan').modal('show');
        $.ajax({
            type: "GET",
            url: "/projek/papar/peruntukan/edit/" + peruntukan_id,
            success: function (response) {
                if (response.status == 404){
                    $('#ModalAddPeruntukan').modal('hide');
                    swal({
                        title: "Maklumat Peruntukan",
                        text: response.message,
                        type: "danger"
                    });
                } else {
                    let tarikhPrtkn = new Date(response.peruntukan.peru_date);
                    $('#peruntukan_id').val(response.peruntukan.peruntukan_id);
                    $('#peru_date').val(tarikhPrtkn.toLocaleDateString());
                    $('#peru_jenis_peruntukan').val(response.peruntukan.peru_jenis_peruntukan);
                    $('#peru_amaun').val(response.peruntukan.peru_amaun);
                }
            }
        });
        $('.btn-close').find('input').val('');
    });

    // SHOW PERUNTUKAN TO DELETE
    $(document).on('click', '.deletePeruntukan', function () {
        var peruntukan_id = $(this).val();
        swal({
            title: "Adakah anda pasti?",
            text: "Sila pastikan rekod yang hendak dipadam",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Padam",
            cancelButtonText: "Tidak, Batalkan",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function (isConfirm) {
            if (isConfirm) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "get",
                    url: "/projek/papar/peruntukan/padam/" + peruntukan_id,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 404) {
                            swal("Dibatalkan", response.message, "error");
                        } else {
                            fetchPPuntukan();
                            swal("Dipadam!", response.message, "success");
                        }
                    }
                });
            } else {
                swal("Dibatalkan", "Rekod peruntukan tidak dipadam", "error");
            }
        });
    });

    // LIST PERUNTUKAN
    function fetchPeruntukan(){
        let projekID = $('#page_projek_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "get",
            url: "/projek/papar/peruntukan/senarai/"+projekID,
            dataType: "json",
            success: function (response) {
                var bil=1;
                if(response.peruntukan.length>0){
                    $('#tbody-peruntukan').html("");
                    let jumPeruntukan=parseFloat(0);
                    $.each(response.peruntukan, function (key, item) {
                        let tarikh = new Date(item.peru_date);
                        $('#tbody-peruntukan').append('<tr>\
                            <td class="text-center">' + bil + '</td>\
                            <td>' + jenisPeruntuka(item.peru_jenis_peruntukan) + '</td>\
                            <td class="text-center">' + tarikh.toLocaleDateString() + '</td>\
                            <td class="text-right">' + financial(item.peru_amaun) + '</td>\
                            <td><button type="button" value="' + item.peruntukan_id + '" class="btn btn-default btn-xs editPeruntukan" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.peruntukan_id + '" class="btn btn-default btn-xs deletePeruntukan" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                        jumPeruntukan += parseFloat(item.peru_amaun);
                        bil++;
                    });
                    $('.jumPeruntukan').html(financial(jumPeruntukan))
                }
                else{
                    $('#tbody-peruntukan').html("");
                    $('#tbody-peruntukan').append('<tr>\
                        <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>\
                    \</tr>');
                }
            }
        });
    }


    function jenisPeruntuka(jns) {
        if(jns==1)
            return 'Peruntukan Asal';
        else if(jns==2)
            return 'Peruntukan Tambahan';
        else
            return 'Penjimatan / Tukar Tajuk';
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

    $('#addDokumen').click(function(e){
        e.preventDefault();

        var baseUrl = (window.location).href;
        var id = baseUrl.split("/").pop();
        // alert(id);
        $('#projek_id').val(id);
        $('#addModalDokumen').modal('show');
    });

    // Muat Naik
    $("#frmUpload").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "/permohonan/papar/upload",
            type: "POST",
            data:  new FormData(this),
            enctype: 'multipart/form-data',
            contentType: false,
            processData:false,
            success: function(response)
            {
                if (response.status == 400) {
                    $('#save_msgList').html("");
                    $('#save_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#save_msgList').append('<li>' + err_value +
                            '</li>');
                    });
                }
                else {
                    // alert();
                    $('#update_msgList').html("");
                    $('#frmUpload').find('input').val('');
                    $('#frmUpload').find('textarea').val('');
                    $('#addModalDokumen').modal('hide');
                    fetchDokumen();
                    swal({
                        title: "Dokumen Projek",
                        text: response.message,
                        type: "success"
                    });
                }
            }


        });
    }));

    // DELETE DOKUMEN
    $(document).on('click', '.deleteDokumen', function () {
        var dokumenID = $(this).val();
        swal({
                title: "Adakah anda pasti?",
                text: "Sila pastikan rekod yang hendak dipadam",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, Padam",
                cancelButtonText: "Tidak, Batalkan",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "get",
                        url: "/permohonan/papar/dokumen/padam/" + dokumenID,
                        dataType: "json",
                        success: function (response) {
                            if (response.status == 404) {
                                swal("Dibatalkan", response.message, "error");
                            } else {
                                fetchDokumen();
                                swal("Dipadam!", response.message, "success");
                            }
                        }
                    });
                } else {
                    swal("Dibatalkan", "Rekod unjuran tidak dipadam", "error");
                }
            });
        });

    function financial(x) {
        return Number.parseFloat(x).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    }
});
</script>
@endsection
