@extends('layouts.main')
@section('title')
    Penetapan Siling
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
    <!-- Text spinners style -->
    <link href="{{ asset("/template/css/plugins/textSpinners/spinners.css") }}" rel="stylesheet">

    <link href="{{ asset("/template/css/plugins/clockpicker/clockpicker.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Siling</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Siling</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Penetapan</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Cari Maklumat Siling</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Program / Bahagian / Institusi / JKN</label>
                            {{ Form::select('sil_program_id_cari', dropdownProgram(), null, ['class'=>'form-control', 'id'=>'sil_program_id_cari']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('sil_status_cari', [''=>'--Sila Pilih--','1'=>'Buka', '2'=>'Tutup'], null, ['class'=>'form-control', 'id'=>'sil_status_cari']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <a href="/siling/senarai" class="btn btn-default">Set Semula</a>
                        <input type="button" class="btn btn-primary float-right" id="carian" value="Carian">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Senarai Siling</h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-sm btn-warning" id="emelPemakluman">
                        <span id="emelButton"></span> Emel Pemakluman
                    </button>
                    <button type="button" class="btn btn-sm btn-primary" id="addSiling">
                        Tambah
                    </button>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">#ID</th>
                                <th width="30%">Pemilik</th>
                                <th width="10%">Fasa</th>
                                <th width="5%">Mula</th>
                                <th width="5%">Tamat</th>
                                <th width="10%" class="text-right">Amaun</th>
                                <th width="10%" class="text-right">Baki</th>
                                <th width="10%">Status</th>
                                <th width="15%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>
@include('app/siling/_modal/add')
@include('app/siling/_modal/edit')

@endsection
@section('custom-js')\
<!-- Date range picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>

<!-- Clock picker -->
<script src="{{ asset("/template/js/plugins/clockpicker/clockpicker.js") }}"></script>
<script>
    $(document).ready(function(){
        // LOAD DATA WHEN OPEN THIS PAGE
        fetchSiling();

        $('.clockpicker').clockpicker();

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

        //ADD BUTTON CLICK
        $('#addSiling').click(function(e){
            e.preventDefault();
            $('#ModulAddSiling').modal('show');
        });

        // // SEARCH BUTTON CLICK
        $('#carian').click(function(e){
            e.preventDefault();
            sil_program_id_cari = $('#sil_program_id_cari').val();
            sil_status_cari = $('#sil_status_cari').val();
            fetchSiling(sil_program_id_cari, sil_status_cari);
        });


        // LIST RECORD
        function fetchSiling(sil_program_id_cari='', sil_status_cari=''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: "/siling/showList",
                data:{
                    sil_program_id:sil_program_id_cari,
                    sil_status:sil_status_cari
                },
                dataType: "json",
                success: function (response) {
                    // var sil-status="";

                    $('tbody').html("");
                    $.each(response.siling, function (key, item) {
                        let amount = financial(item.sil_amount);
                        let baki = financial(item.sil_balance);
                        let Starikh = new Date(item.sil_sdate);
                        let Etarikh = new Date(item.sil_edate);
                        let status = "";
                        let emel = "";
                        if(item.sil_status == 1){
                            status = '<span class="badge badge-primary">Buka</span>';
                        }
                        else {
                            status = '<span class="badge badge-warning">Tutup</span>';
                        }
                        if(item.sil_emel==1){
                            emel = '<button type="button" value="' + item.siling_id + '" class="btn btn-default btn-xs emel" title="Emel"><i class="fa fa-envelope text-warning"></i></button>';
                        }
                        else{
                            emel = '<button type="button" class="btn btn-default btn-xs emel" title="Telah Emel"><i class="fa fa-envelope text-primary"></i></button>'
                        }

                        $('tbody').append('<tr>\
                            <td class="text-center">' + item.siling_id + '</td>\
                            <td>' + item.prog_name + '</td>\
                            <td>Fasa 1</td>\
                            <td>' + Starikh.toLocaleDateString() + '</td>\
                            <td>' + Etarikh.toLocaleDateString() + '</td>\
                            <td class="text-right">' + amount + '</td>\
                            <td class="text-right">' + baki + '</td>\
                            <td>' + status + '</td>\
                            <td><button type="button" value="' + item.siling_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>'+ emel +'\
                            <button type="button" value="' + item.siling_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                    });
                }
            });
        }

        function financial(x) {
            return Number.parseFloat(x).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }

        // ADD RECORD
        $(document).on('click', '.simpanSiling', function (e) {
            e.preventDefault();
            $(this).text('Menyimpan');
            var data = {
                'sil_program_id': $('#sil_program_id_add').val(),
                'sil_tahun': $('#sil_tahun_add').val(),
                'sil_sdate': $('#sil_sdate_add').val(),
                'sil_edate': $('#sil_edate_add').val(),
                'sil_amount': $('#sil_amount_add').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/siling/senarai",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.simpanSiling').text('Simpan');
                    } else {
                        $('#save_msgList').html("");
                        $('#ModulAddSiling').find('input').val('');
                        $('#ModulAddSiling').find('select').val('');
                        $('#save_msgList').html("");
                        $('.simpanSiling').text('Simpan');
                        $('#ModulAddSiling').modal('hide');
                        fetchSiling();
                        swal({
                            title: "Penetapan Siling",
                            text: response.message,
                            type: "success"
                        });
                    }
                }
            });
        });

        // SHOW RECORD TO EDIT
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var siling_id = $(this).val();
            // alert(neg_negeri_id);
            $('#ModulEditSiling').modal('show');
            $.ajax({
                type: "GET",
                url: "/siling/senarai/" + siling_id + "/edit",
                success: function (response) {
                    if (response.status == 404){
                        $('#ModulEditSiling').modal('hide');
                        swal({
                            title: "Kemaskini Siling",
                            text: response.message,
                            type: "danger"
                        });
                    } else {
                        let Starikh = new Date(response.siling.sil_sdate);
                        let Etarikh = new Date(response.siling.sil_edate);
                        $('#siling_id_edit').val(siling_id);
                        $('#sil_program_id_edit').val(response.siling.sil_fasiliti_id);
                        $('#sil_tahun_edit').val(response.siling.sil_tahun);
                        $('#sil_sdate_edit').val(Starikh.toLocaleDateString())
                        $('#sil_edate_edit').val(Etarikh.toLocaleDateString());
                        $('#sil_amount_edit').val(response.siling.sil_amount);
                        $('#sil_status_edit').val(response.siling.sil_status);
                    }
                }
            });
        });

        // UPDATE RECORD
        $(document).on('click', '.updateSiling', function (e) {
            e.preventDefault();
            $(this).text('Mengemaskini...');
            let upd_id = $('#siling_id_edit').val();
            // alert(upd_id);
            var edit_data = {
                'sil_program_id': $('#sil_program_id_edit').val(),
                'sil_tahun': $('#sil_tahun_edit').val(),
                'sil_sdate': $('#sil_sdate_edit').val(),
                'sil_edate': $('#sil_edate_edit').val(),
                'sil_amount': $('#sil_amount_edit').val(),
                'sil_status': $('#sil_status_edit').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/siling/senarai/update/"+ upd_id,
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
                        $('.updateSiling').text('Kemaskini');
                    } else {
                        $('#update_msgList').html("");
                        $('#ModulEditSiling').find('input').val('');
                        $('#ModulEditSiling').find('select').val('');
                        $('.updateSiling').text('Kemaskini');
                        $('#ModulEditSiling').modal('hide');
                        fetchSiling();
                        swal({
                            title: "Kemaskini Siling",
                            text: response.message,
                            type: "success"
                        });
                    }
                }
            });
        });

        // HANTAR EMEL PEMAKLUMAN
        $(document).on('click', '#emelPemakluman', function (e) {
            e.preventDefault();
            document.getElementById("emelButton").classList.add("loading");
            document.getElementById("emelButton").classList.add("open-circle");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/siling/senarai/emel",
                data: null,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        swal("Gagal", response.message, "error");
                    } else {
                        fetchSiling();
                        swal({
                            title: "Emel Pemakluman",
                            text: response.message,
                            type: "success"
                        });
                        document.getElementById("emelButton").classList.remove("loading");
                        document.getElementById("emelButton").classList.remove("open-circle");
                    }
                }
            });
        });

        // SHOW RECORD TO DELETE
        $(document).on('click', '.deletebtn', function () {
            var siling_id = $(this).val();
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
                            type: "DELETE",
                            url: "/siling/senarai/" + siling_id,
                            dataType: "json",
                            success: function (response) {
                                if (response.status == 404) {
                                    swal("Dibatalkan", response.message, "error");
                                } else {
                                    fetchSiling();
                                    swal("Dipadam!", response.message, "success");
                                }
                            }
                        });
                    }
                    else {
                        swal("Dibatalkan", "Penetapan siling tidak dipadam", "error");
                    }

            });
        });
    });
</script>
@endsection
