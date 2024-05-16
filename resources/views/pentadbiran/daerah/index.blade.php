@extends('layouts.main')
@section('title')
    Daerah
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Daerah</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Daerah</strong>
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
                <h5>Carian Maklumat Daerah</h5>
            </div>
            <div class="ibox-content">
                <div class="row">                    
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Jenis Carian</label>
                            {{ Form::select('carian_type', ['Kod'=>'Kod Daerah', 'Negeri'=>'Negeri', 'Daerah'=>'Daerah'],null, ['class'=>'form-control', 'id'=>'carian_type']) }}
                        </div>                            
                    </div>
                    <div class="col-sm-9 ">
                        <div class="form-group">
                            <label>Katakunci</label>
                            {{ Form::text('carian_text', '', ['class'=>'form-control', 'id'=>'carian_text']) }}
                        </div>
                    </div>                   
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <a href="/pentadbiran/daerah" class="btn btn-default">Set Semula</a>
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
                                <th class="text-center">Kod Daerah</th>
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
<div class="modal inmodal fade" id="addDaerahModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Maklumat Daerah</h4>
            </div>
            <div class="modal-body">                    
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Kod Daerah</label>
                            {{ Form::text('dae_kod_daerah_add', null, ['class'=>'form-control dae_kod_daerah_add']) }}
                        </div>                          
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Daerah</label>
                            {{ Form::text('dae_nama_daerah_add', null, ['class'=>'form-control dae_nama_daerah_add']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('dae_kod_negeri_add', dropdownNegeri(), null, ['class'=>'form-control dae_kod_negeri_add']) }}
                        </div>                          
                    </div>
                </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary add_daerah">Simpan</button>
            </div>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
{{-- <div class="modal inmodal fade" id="editStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Negeri</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="neg_negeri_id_edit">                   
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod Negeri</label>
                            {{ Form::text('dae_kod_daerah_edit', null, ['class'=>'form-control', 'id'=> 'dae_kod_daerah_edit']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::text('dae_nama_daerah_edit', null, ['class'=>'form-control', 'id'=>'dae_nama_daerah_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('dae_status_edit', ['1'=>'Aktif', '2'=>'Tidak Aktif'], null, ['class'=>'form-control', 'id'=>'dae_status_edit']) }}
                        </div>
                    </div>
                </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary update_state">Kemaskini</button>
            </div>
        </div>
    </div>
</div> --}}

{{-- DELETE MODAL --}}
{{-- <div class="modal inmodal fade" id="DeleteModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Padam Negeri</h4>
            </div>
            <div class="modal-body">
                <h4>Adakah anda pasti?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger delete_state">Ya, Padam</button>
            </div>
        </div>
    </div>
</div> --}}
@endsection
@section('custom-js')
<script>
    $(document).ready(function(){
        // LOAD DATA WHEN OPEN THIS PAGE
        fetchDaerah();

        // ADD BUTTON CLICK
        $('#add').click(function(e){ 
            e.preventDefault();
            $('#addDaerahModal').modal('show');  
        });
       
        // SEARCH BUTTON CLICK
        $('#carian').click(function(e){
            e.preventDefault();
            $carian_type = $('#carian_type').val();
            $carian_text = $('#carian_text').val();
            fetchDaerah($carian_type, $carian_text);
        });
        

        // LIST RECORD
        function fetchDaerah(carian_type='', carian_text=''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/pentadbiran/daerah/ajax-all",
                data:{
                        carian_type:carian_type,
                        carian_text:carian_text
                    },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.daerah, function (key, item) {
                        $('tbody').append('<tr>\
                            <td class="text-center">' + item.dae_daerah_id + '</td>\
                            <td class="text-center">' + item.dae_kod_daerah + '</td>\
                            <td>' + item.dae_nama_daerah + '</td>\
                            <td>' + item.neg_nama_negeri + '</td>\
                            <td>' + item.dae_status + '</td>\
                            <td><button type="button" value="' + item.dae_daerah_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.dae_daerah_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                    });
                }
            });    
        }

        // ADD RECORD
        $(document).on('click', '.add_daerah', function (e) {
            e.preventDefault();

            $(this).text('Menyimpan');

            var data = {
                'dae_kod_daerah': $('.dae_kod_daerah_add').val(),
                'dae_nama_daerah': $('.dae_nama_daerah_add').val(),
                'dae_kod_negeri': $('.dae_kod_negeri_add').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/daerah/simpan",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_daerah').text('Simpan');
                    } else {
                        $('#save_msgList').html("");
                        // toastr.success(response.message);
                        $('#addDaerahModal').find('input').val('');
                        $('.add_daerah').text('Simpan');
                        $('#addDaerahModal').modal('hide');
                        fetchDaerah();
                    }
                }
            });

        });

        // SHOW RECORD TO EDIT
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var neg_negeri_id = $(this).val();
            // alert(neg_negeri_id);
            $('#editStateModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/pentadbiran/daerah/ubah/" + neg_negeri_id,
                success: function (response) {
                    if (response.status == 404){
                        // $('#success_message').addClass('alert alert-success');
                        // $('#success_message').text(response.message);
                        $('#editStateModal').modal('hide');
                    } else {
                        $('#dae_kod_daerah_edit').val(response.negeri.dae_kod_daerah);                        
                        $('#dae_nama_daerah_edit').val(response.negeri.dae_nama_daerah);
                        $('#dae_status_edit').val(response.negeri.dae_status).change();
                        $('#neg_negeri_id_edit').val(neg_negeri_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');
        });

        // UPDATE RECORD
        $(document).on('click', '.update_state', function (e) {
            e.preventDefault();

            $(this).text('Kemaskini');
            var edit_data = {
                'dae_kod_daerah': $('.dae_kod_daerah_edit').val(),
                'dae_nama_daerah': $('.dae_nama_daerah_edit').val(),
                'dae_kod_negeri': $('.dae_kod_negeri_edit').val(),
                'neg_status': $('.neg_status_edit').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/daerah/kemaskini",
                data: edit_data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#update_msgList').html("");
                        $('#update_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#update_msgList').append('<li>' + err_value +
                                '</li>');
                        });
                        $('.update_state').text('Kemaskini');
                    } else {
                        $('#update_msgList').html("");
                        // toastr.success(response.message);
                        // $('#editStateModal').find('input').val('');
                        // $('.update_state').text('Kemaskini');
                        $('#editStateModal').modal('hide');
                        fetchDaerah();
                    }
                }
            });

        });

        // SHOW RECORD TO DELETE
        $(document).on('click', '.deletebtn', function () {
            var neg_negeri_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(neg_negeri_id);
        });

        // DELETE RECORD
        $(document).on('click', '.delete_state', function (e) {
            e.preventDefault();

            $(this).text('Memadam');
            var id = $('#deleteing_id').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                url: "/pentadbiran/daerah/padam/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('.delete_state').text('Ya, Padam');
                    } else { 
                        $('.delete_state').text('Ya, Padam');
                        $('#DeleteModal').modal('hide');
                        fetchDaerah();
                    }
                }
            });
        });

    });
</script>
@endsection