@extends('layouts.main')
@section('title')
    Bandar/Mukim
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Bandar / Mukim</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Bandar / Mukim</strong>
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
                <h5>Carian Maklumat Bandar / Mukim</h5>
            </div>
            <div class="ibox-content">
                <div class="row">                    
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('neg_negeri_id', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'neg_negeri_id']) }}
                        </div>                            
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Daerah</label>
                            <span id="list-daerah">
                                {{ Form::select('dae_daerah_id', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'dae_daerah_id']) }}
                            </span>
                        </div>                            
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Kod Bandar</label>
                            {{ Form::text('ban_kod_bandar_sch', '', ['class'=>'form-control', 'id'=>'ban_kod_bandar_sch']) }}
                        </div>
                    </div>                   
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Bandar</label>
                            {{ Form::text('ban_nama_bandar_sch', '', ['class'=>'form-control', 'id'=>'ban_nama_bandar_sch']) }}
                        </div>
                    </div>                   
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <a href="/pentadbiran/bandar" class="btn btn-default">Set Semula</a>
                        <input type="button" class="btn btn-primary float-right" id="carian" value="Carian">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Senarai Daerah</h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-primary float-right" id="add">
                        Tambah
                    </button>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#ID</th>
                                <th class="text-center">Kod Bandar</th>
                                <th>Bandar</th>
                                <th>Daerah</th>
                                <th>Negeri</th>
                                <th>Status</th>
                                <th>Tindakan</th>
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

{{-- ADD MODAL --}}
<div class="modal inmodal fade" id="addBandarModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Maklumat Bandar / Mukim</h4>
            </div>
            <div class="modal-body">                    
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('neg_negeri_id_add', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'neg_negeri_id_add']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Daerah</label>
                            <span id="list-daerah-add">
                                {{ Form::select('dae_daerah_id_add', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'dae_daerah_id_add']) }}
                            </span>
                        </div>                          
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Kod Bandar / Mukim</label>
                            {{ Form::text('ban_kod_bandar_add', null, ['class'=>'form-control', 'id'=>'ban_kod_bandar_add']) }}
                        </div>                          
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Bandar / Mukim</label>
                            {{ Form::text('ban_nama_bandar_add', null, ['class'=>'form-control', 'id'=>'ban_nama_bandar_add']) }}
                        </div>
                    </div>                    
                </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary add_bandar">Simpan</button>
            </div>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal inmodal fade" id="editBandarModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Bandar/Mukim</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="ban_bandar_id_edit">                   
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('neg_negeri_id_edit', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'neg_negeri_id_edit']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Daerah</label>
                            <span id="list-daerah-edit">
                                {{ Form::select('dae_daerah_id_edit', [''=>'--Sila pilih--'], null, ['class'=>'form-control', 'id'=>'dae_daerah_id_edit']) }}
                            </span>
                        </div>                          
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Kod Bandar / Mukim</label>
                            {{ Form::text('ban_kod_bandar_edit', null, ['class'=>'form-control', 'id'=>'ban_kod_bandar_edit']) }}
                        </div>                          
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Bandar / Mukim</label>
                            {{ Form::text('ban_nama_bandar_edit', null, ['class'=>'form-control', 'id'=>'ban_nama_bandar_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('ban_status_edit', ['1'=>'Aktif', '2'=>'Tidak Aktif'], null, ['class'=>'form-control', 'id'=>'ban_status_edit']) }}
                        </div>
                    </div>
                </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary update_bandar">Kemaskini</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')

<!-- Sweet alert -->
<script src="{{ asset("/template/js/plugins/sweetalert/sweetalert.min.js") }}"></script>
<script>
    $(document).ready(function(){
        // LOAD DATA WHEN OPEN THIS PAGE
        fetchBandar();

        //ON CHANGE NEGERI DROPDOWN EVENT
        $('#neg_negeri_id').change(function() {
            var cari_kod_negeri = $(this).val();
            getDaerah(cari_kod_negeri, 'dae_daerah_id', '#list-daerah');
        });

        $('#neg_negeri_id_add').change(function() {
            var add_kod_negeri = $(this).val();
            getDaerah(add_kod_negeri, 'dae_daerah_id_add', '#list-daerah-add');
        });
    
        $('#neg_negeri_id_edit').change(function() {
            var edit_kod_negeri = $(this).val();
            getDaerah(edit_kod_negeri, 'dae_daerah_id_edit', '#list-daerah-edit');
        });

        //ADD BUTTON CLICK
        $('#add').click(function(e){ 
            e.preventDefault();
            $('#addBandarModal').modal('show');  
        });
       
        // SEARCH BUTTON CLICK
        $('#carian').click(function(e){
            e.preventDefault();
            neg_negeri_id = $('#neg_negeri_id').val();
            dae_daerah_id = $('#dae_daerah_id').val();
            ban_kod_bandar = $('#ban_kod_bandar_sch').val();
            ban_nama_bandar = $('#ban_nama_bandar_sch').val();
            fetchBandar(neg_negeri_id, dae_daerah_id, ban_kod_bandar, ban_nama_bandar);
        });
        

        // LIST RECORD
        function fetchBandar(neg_negeri_id='', dae_daerah_id='', ban_kod_bandar='', ban_nama_bandar=''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/pentadbiran/bandar/ajax-all",
                data:{
                        neg_negeri_id:neg_negeri_id,
                        dae_daerah_id:dae_daerah_id,
                        ban_kod_bandar:dae_daerah_id,
                        ban_nama_bandar:ban_nama_bandar
                    },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.bandar, function (key, item) {
                        $('tbody').append('<tr>\
                            <td class="text-center">' + item.ban_bandar_id + '</td>\
                            <td class="text-center">' + item.ban_kod_bandar + '</td>\
                            <td>' + item.ban_nama_bandar + '</td>\
                            <td>' + item.dae_nama_daerah + '</td>\
                            <td>' + item.neg_nama_negeri + '</td>\
                            <td>' + item.ban_status + '</td>\
                            <td><button type="button" value="' + item.ban_bandar_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.ban_bandar_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                    });
                }
            });    
        }

        // ADD RECORD
        $(document).on('click', '.add_bandar', function (e) {
            e.preventDefault();

            $(this).text('Menyimpan');

            var data = {
                'ban_kod_bandar': $('#ban_kod_bandar_add').val(),
                'ban_nama_bandar': $('#ban_nama_bandar_add').val(),
                'ban_kod_daerah': $('#dae_daerah_id_add').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/bandar/simpan",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_bandar').text('Simpan');
                    } else {
                        $('#save_msgList').html("");
                        $('#addBandarModal').find('input').val('');
                        $('#addBandarModal').find('select').val('');
                        $('#save_msgList').html("");
                        $('.add_bandar').text('Simpan');
                        $('#addBandarModal').modal('hide');
                        fetchBandar();
                        swal({
                            title: "Bandar/Mukim",
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
            var ban_bandar_id = $(this).val();
            // alert(neg_negeri_id);
            $('#editBandarModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/pentadbiran/bandar/ubah/" + ban_bandar_id,
                success: function (response) {
                    if (response.status == 404){
                        $('#editBandarModal').modal('hide');
                        swal({
                            title: "Bandar/Mukim",
                            text: response.message,
                            type: "danger"
                        });
                    } else {
                        $('#ban_bandar_id_edit').val(ban_bandar_id);
                        $('#neg_negeri_id_edit').val(response.bandar.neg_negeri_id).change();
                        getDaerah(response.bandar.neg_negeri_id, 'dae_daerah_id_edit', '#list-daerah-edit', response.bandar.ban_kod_daerah);                      
                        $('#ban_kod_bandar_edit').val(response.bandar.ban_kod_bandar);
                        $('#ban_nama_bandar_edit').val(response.bandar.ban_nama_bandar)
                        $('#ban_status_edit').val(response.bandar.ban_status).change();                        
                    }
                }
            });
            $('.btn-close').find('input').val('');
        });

        // UPDATE RECORD
        $(document).on('click', '.update_bandar', function (e) {
            e.preventDefault();
            $(this).text('Mengemaskini...');
            var edit_data = {
                'ban_bandar_id': $('#ban_bandar_id_edit').val(),
                'ban_kod_daerah': $('#dae_daerah_id_edit').val(),
                'ban_kod_bandar': $('#ban_kod_bandar_edit').val(),
                'ban_nama_bandar': $('#ban_nama_bandar_edit').val(),
                'ban_status': $('#ban_status_edit').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/bandar/kemaskini",
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
                        $('.update_bandar').text('Kemaskini');
                    } else {
                        $('#update_msgList').html("");
                        $('#editBandarModal').find('input').val('');
                        $('#editBandarModal').find('select').val('');
                        $('.update_bandar').text('Kemaskini');
                        $('#editBandarModal').modal('hide');
                        fetchBandar();
                        swal({
                            title: "Bandar/Mukim",
                            text: response.message,
                            type: "success"
                        });
                    }
                }
            });

        });

        // SHOW RECORD TO DELETE
        $(document).on('click', '.deletebtn', function () {
            var ban_bandar_id = $(this).val();
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
                            url: "/pentadbiran/bandar/padam/" + ban_bandar_id,
                            dataType: "json",
                            success: function (response) {
                                if (response.status == 404) {
                                    swal("Dibatalkan", response.message, "error");
                                } else {                                     
                                    fetchBandar();
                                    swal("Dipadam!", response.message, "success");
                                }
                            }
                        });                        
                    } else {
                        swal("Dibatalkan", "Rekod bandar tidak dipadam", "error");
                    }
                });
        });

        //GET DAERAH DROPDOWN HTML AJAXCONTROLLER
        function getDaerah(neg_kod_negeri, inputname, list, select='99') {
            var url = "/ajax/ajax-daerah/" + neg_kod_negeri + "/" + inputname+ "/" + select;
            $.get(url, function(data) {
                $(list).html(data);
            });
        }
    
    });
</script>
@endsection