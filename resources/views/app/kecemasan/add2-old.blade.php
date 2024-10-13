@extends('layouts.main')
@section('title')
    Kecemasan
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/summernote/summernote-bs4.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/daterangepicker/daterangepicker-bs3.css") }}" rel="stylesheet">
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
                <strong>Kecemasan</strong>
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
                            1.1 PROFIL PROJEK
                        </h3>
                        <p>{{ $projek->proj_nama }}</p>
                        <div class="m-t-md">
                            <h2 class="product-main-price">RM @duit($projek->proj_kos_lulus) <small class="text-muted">Peruntukan Diluluskan</small> </h2>
                        </div>
                        <hr>

                        <h4>Maklumat Projek</h4>

                        <div class="normal text-muted">
                            <b>Skop</b><br/>
                            {{ $projek->proj_skop }}
                            <br/><br/>
                            <b>Justifikasi</b><br/>
                            {{ $projek->proj_justifikasi ? $projek->proj_justifikasi: 'Tiada Rekod' }}
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
@include('app/kecemasan/_modal/muat-naik')
@include('app/kecemasan/_modal/add-kewangan')
@endsection
@section('custom-js')
<script src="{{ asset("/template/js/plugins/summernote/summernote-bs4.js") }}"></script>
<!-- Date range picker -->
<script src="{{ asset("/template/js/plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/template/js/plugins/select2/select2.full.min.js") }}"></script>
<script>
    $(document).ready(function(){
        fetchUnjuran();
        fetchDokumen();
        //ADD BUTTON CLICK
        $('#add').click(function(e){
            e.preventDefault();

            var baseUrl = (window.location).href;
            var id = baseUrl.split("/").pop();
            // alert(id);
            $('#projek_id').val(id);
            $('#addModal').modal('show');
        });

        $('#addUnjuran').click(function(e){
            e.preventDefault();
            let projekID = $('#projek_id_allval').val();
            $('#proj_unjur_projek_id').val(projekID);
            $('#addKewangan').modal('show');
        });


        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        // Muat Naik
        $("#frmUpload").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url: "/permohonan/kecemasan/upload",
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
                        $('#addModal').modal('hide');
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

        // ADD UNJURAN
        $(document).on('click', '.addUnjuran', function (e) {
            e.preventDefault();
            var data = {
                'proj_unjur_projek_id': $('#proj_unjur_projek_id').val(),
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
                url: "/permohonan/kecemasan/unjuran/simpan",
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
                        $('#addKewangan').find('input').val('');
                        $('#save_msgList_unjuran').html("");
                        $('#addKewangan').modal('hide');
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

        // LIST UNJRUAN
        function fetchUnjuran(){
            let projekID = $('#projek_id_allval').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "/permohonan/kecemasan/unjuran/senarai/"+projekID,
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
                                <td><button type="button" value="' + item.proj_unjuran_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
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

        // LIST UNJRUAN
        function fetchDokumen(){
            let projekID = $('#projek_id_allval').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "/permohonan/kecemasan/dokumen/senarai/"+projekID,
                dataType: "json",
                success: function (response) {
                    var bil=1;
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


        // SHOW RECORD TO DELETE
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
                            url: "/permohonan/kecemasan/unjuran/padam/" + unjuranID,
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
                            url: "/permohonan/kecemasan/dokumen/padam/" + dokumenID,
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
