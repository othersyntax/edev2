@extends('layouts.main')
@section('title')
    Capaian
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Had Capaian</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Had Capaian</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="ibox ">
            <div class="ibox-title">
                <h4>Permissions
                <div class="ibox-tools">
                    @can('create permission')
                        <a href="#" class="btn btn-primary float-end" id="add">Tambah Peranan</a>
                    @endcan
                </div>

                </h4>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">#ID</th>
                                <th width="55%">Nama Peranan</th>
                                <th width="25%">Modul</th>
                                <th width="15%">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td class="text-center">{{ $permission->id }}</td>
                                <td>{{ ucfirst($permission->name) }}</td>
                                <td>{{ $permission->modul_id ? getModul($permission->modul_id) : '-' }}</td>
                                <td>
                                    @can('update permission')
                                        <button type="button" value="{{ $permission->id }}" class="btn btn-xs btn-success editbtn">Edit</button>
                                    @endcan
                                    @can('delete permission')
                                        <button type="button" value="{{ $permission->id }}" class="btn btn-xs btn-danger mx-2 deletebtn">Delete</button>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">{{ $permissions->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- ADD MODAL --}}
<div class="modal inmodal fade" id="addPermissionModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Maklumat Had Capaian</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Modul</label>
                            {{ Form::select('modul', dropdownModul(), null, ['class'=>'form-control', 'id'=>'modul']) }}
                        </div>
                        <div class="form-group">
                            <label>Tambah Had Capaian</label>
                            {{ Form::text('name_capaian', null, ['class'=>'form-control', 'id'=>'name_capaian']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary add_permission">Simpan</button>
            </div>
        </div>
    </div>
</div>

{{-- EDIT MODAL --}}
<div class="modal inmodal fade" id="editPermissionModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Had Capaian</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-12">
                        <input type="hidden" id="permission_id_edit" value="">
                        <div class="form-group">
                            <label>Modul</label>
                            {{ Form::select('modul_edit', dropdownModul(), null, ['class'=>'form-control', 'id'=>'modul_edit']) }}
                        </div>
                        <div class="form-group">
                            <label>Tambah Had Capaian</label>
                            {{ Form::text('name_capaian_edit', null, ['class'=>'form-control', 'id'=>'name_capaian_edit']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary edit_permission">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom-js')
<script>
    $(function(){

        $('#add').click(function(e){
            e.preventDefault();
            $('#addPermissionModal').modal('show');
        });

        //SHOW PERMISSION TO EDIT
        $('.editbtn').click(function(){
            let edit_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "get",
                url: "/akses/permissions/"+edit_id+"/edit",
                success: function (response) {
                    $('#permission_id_edit').val(edit_id);
                    $('#modul_edit').val(response.permission.modul_id);
                    $('#name_capaian_edit').val(response.permission.name);
                    $('#editPermissionModal').modal('show');
                }
            });
        });

        // ADD RECORD
        $('.add_permission').click(function (e) {
            e.preventDefault();
            var data = {
                'modul_id': $('#modul').val(),
                'name': $('#name_capaian').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/akses/permissions",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                    } else {
                        swal({
                                title: "Tahniah!!",
                                text: "Maklumat capaian berjaya di simpan",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Ok",
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    $('#addPermissionModal').modal('hide');
                                    location.reload();
                                }
                            }
                        );
                    }
                }
            });
        });

        // UPDATE RECORD
        $('.edit_permission').click(function (e) {
            e.preventDefault();
            let edit_id = $('#permission_id_edit').val();
            var edit_data = {
                'modul_id': $('#modul_edit').val(),
                'name': $('#name_capaian_edit').val()
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "PUT",
                url: "/akses/permissions/"+edit_id,
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
                        $('#editPermissionModal').modal('hide');
                        swal({
                            title: "Had Capaian",
                            text: response.message,
                            type: "success"
                        });
                        location.reload();
                    }
                }
            });

        });

        // SHOW RECORD TO DELETE
        $('.deletebtn').click(function () {
            let del_id = $(this).val();
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
                        $.ajax({
                            // type: "get",
                            url: "/akses/permissions/" + del_id + "/delete",
                            dataType: "json",
                            success: function (response) {
                                if (response.status == 404) {
                                    swal("Dibatalkan", response.message, "error");
                                } else {
                                    swal("Dipadam!", response.message, "success");
                                    location.reload();
                                }
                            }
                        });
                    } else {
                        swal("Dibatalkan", "Rekod Had Capaian tidak dipadam", "error");
                    }
                });
        });

    })
</script>

@endsection
