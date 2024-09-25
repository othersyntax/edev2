@extends('layouts.main')
@section('title')
    Permohonan Baharu
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
                <strong>Baharu</strong>
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
                <input type="hidden" id="projek_id_allval" value="{{ $projek->projek_id }}">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Negeri</label>
                            <div class="form-control">{{ $projek->proj_negeri }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Parlimen</label>
                            <div class="form-control">{{ $projek->proj_parlimen }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dewan Undangan Negeri</label>
                            <div class="form-control">{{ $projek->proj_dun }}</div>
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
                            <label>Kod Projek</label>
                            <div class="form-control">{{ $projek->proj_kod_agensi }}-{{ $projek->proj_kod_projek }}-{{ $projek->proj_kod_setia }}-{{ $projek->proj_kod_subsetia }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemilik</label>
                            <div class="form-control">{{ $projek->proj_pemilik }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fasiliti</label>
                            <div class="form-control">{{ $projek->proj_fasiliti_id }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Anggaran Kos (RM)</label>
                            <div class="form-control">@duit($projek->proj_kos_mohon)</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tahun</label>
                            <div class="form-control">{{ $projek->proj_tahun }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bulan</label>
                            <div class="form-control">{{ $projek->proj_bulan }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tempoh Pelaksanaan</label>
                            <div class="form-control">{{ date('d/m/Y', strtotime($projek->proj_laksana_mula)) }} - {{ date('d/m/Y', strtotime($projek->proj_laksana_tamat)) }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Projek</label>
                            <div class="form-control">{{ $projek->proj_kategori_id }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Projek</label>
                            <div class="form-control">{{ $projek->proj_nama }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
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
            <div class="col-lg-6">
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
                                        <th width="15%" class="text-center">#Bil</th>
                                        <th width="30%" class="text-center">Tahun</th>
                                        <th width="35%" class="text-right">Unjuran Kewangan</th>
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
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="ibox-content">
            <a href="/permohonan/baru/main" class="btn btn-white btn-sm">Batal</a>
            <a href="/permohonan/baru/main" class="btn btn-warning btn-sm float-right">Selesai</a>
        </div>
    </div>
</div>
@include('app/projek-baru/_modal/muat-naik')
@include('app/projek-baru/_modal/add-kewangan')
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
                url: "/permohonan/baru/upload",
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
                url: "/permohonan/baru/unjuran/simpan",
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
                url: "/permohonan/baru/unjuran/senarai/"+projekID,
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
                url: "/permohonan/baru/dokumen/senarai/"+projekID,
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
                            url: "/permohonan/baru/unjuran/padam/" + unjuranID,
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
                            url: "/permohonan/baru/dokumen/padam/" + dokumenID,
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
