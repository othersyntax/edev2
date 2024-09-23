@extends('layouts.main')
@section('title')
    Pengguna
@endsection
@yield('custom-css')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Pengguna</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Pengguna</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')

{{--Untuk Search--}}
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Carian Maklumat Pengguna</h5>
            </div>
            <div class="ibox-content">
                <form role="form">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Carian</label>{{--Untuk Search--}}
                                {{ Form::select('carian_type', ['name'=>'Nama', 'email'=>'Emel' , 'program_id'=>'Program ID'], session('carian_type'), ['class'=>'form-control', 'id'=>'carian_type']) }}

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9 ">
                            <div class="form-group">
                                <label>Katakunci</label> {{--Untuk key Search--}}
                               {{ Form::text('carian_text', session('carian_text'), ['class'=>'form-control', 'id'=>'carian_text']) }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <a href="/pentadbiran/pengguna" class="btn btn-default">Set Semula</a> {{--Untuk Reset Carian--}}
                            <input type="button" class="btn btn-primary float-right" id="carian" value="Carian">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{--Untuk Table--}}
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Senarai Program </h5>
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
                                <th>Nama</th>
                                <th>Emel</th>
                                <th>Program ID</th>
                                <th class="text-center">Role</th>
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

{{-- Add --}}
<div class="modal inmodal fade" id="addStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Maklumat Pengguna</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nama</label>
                                {{ Form::text('name_add', null, ['class'=>'form-control name_add']) }}
                            </div>
                        </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Emel</label>
                                    {{ Form::text('email_add', null, ['class'=>'form-control email_add']) }}
                                </div>                          
                            </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Program ID</label>
                            {{ Form::text('program_id_add', null, ['class'=>'form-control program_id_add']) }}
                        </div>                         
                    </div> 
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Katalalulan</label>
                            {{ Form::text('password_add', null, ['class'=>'form-control password_add']) }}
                        </div>                         
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary add_state">Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="editStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Pengguna</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_edit">                   
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama</label>
                            {{ Form::text('name_edit', null, ['class'=>'form-control', 'id'=> 'name_edit']) }}
                        </div>                          
                    </div>
                    
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Email</label>
                            {{ Form::text('email_edit', null, ['class'=>'form-control', 'id'=>'email_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Program ID</label>
                            {{ Form::text('program_id_edit', null, ['class'=>'form-control', 'id'=>'program_id_edit']) }}
                        </div>                          
                    </div>
                </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary update_faskategori">Kemaskini</button>
            </div>
        </div>
    </div>
</div>


{{--Untuk Delete // siap--}}
<div class="modal inmodal fade" id="DeleteModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Padam Maklumat</h4>
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
</div>



@endsection

@section('custom-js')
<script>
        $(document).ready(function()
    {
        fecthPengguna();

        // FIND RECORD
        $('#carian').click(function(e){
            e.preventDefault();
            $carian_type = $('#carian_type').val();
            $carian_text = $('#carian_text').val();
            fecthPengguna($carian_type, $carian_text);
        });

        //READ CONTENT FROM DB
        function fecthPengguna(carian_type='', carian_text=''){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "/pentadbiran/pengguna/ajax-all",
                    data:{
                            carian_type:carian_type,
                            carian_text:carian_text,
                        },
                    dataType: "json",
                    success: function (response) {
                         //console.log(response);
                        $('tbody').html("");
                        $.each(response.Pengguna, function (key, item) {
                            $('tbody').append('<tr>\
                                <td class="text-center">' + item.id + '</td>\
                                <td>' + item.name + '</td>\
                                <td>' + item.email + '</td>\
                                <td>' + item.program_id + '</td>\
                                <td class="text-center">' + item.role + '</td>\
                                <td><button type="button" value="' + item.id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                                <button type="button" value="' + item.id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                            \</tr>');
                        });
                    }
                });
                // alert("abcd");
        }

          // ADD BUTTON CLICK
          $('#add').click(function(e)
        {
            e.preventDefault();
            $('#addStateModal').modal('show');
        });

        // ADD RECORD
        $(document).on('click', '.add_state', function (e) {
                e.preventDefault();

                 $(this).text('Menyimpan');

                     var data = {
                         'name': $('.name_add').val(),
                         'email': $('.email_add').val(),
                         'program_id': $('.program_id_add').val(),
                         'password': $('.password_add').val(),
                
                     }

                  $.ajaxSetup({
                       headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                 });

             $.ajax({
                type: "POST",
                url: "/pentadbiran/pengguna/simpan",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_state').text('Simpan');
                    } else {
                        $('#save_msgList').html("");
                        // toastr.success(response.message);
                        $('#addStateModal').find('input').val('');
                        $('.add_kategori').text('Simpan');
                        $('#addStateModal').modal('hide');
                        swal({
                            title: "Pengguna",
                            text: response.message,
                            type: "success"
                        });
                        fecthPengguna();
                    }
                }
                 });

        });

        // SHOW EDIT RECORD
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var id = $(this).val();
            // alert(neg_negeri_id);
            $('#editStateModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/pentadbiran/pengguna/ubah/" + id,
                success: function (response) {
                    if (response.status == 404){
                        // $('#success_message').addClass('alert alert-success');
                        // $('#success_message').text(response.message);
                        $('#editStateModal').modal('hide');
                    } else {

                        $('#id_edit').val(response.User.id);                        
                        $('#name_edit').val(response.User.name);                        
                        $('#email_edit').val(response.User.email);                        
                        $('#program_id_edit').val(response.User.program_id);
                        $('#id_edit').val(id);
                    }
                }
            });
            $('.btn-close').find('input').val('');
        });

        // UPDATE RECORD
        $(document).on('click', '.update_faskategori', function (e) {
            e.preventDefault();

            $(this).text('Kemaskini');
            // alert(id);

            var edit_data = {
                
                'id': $('#id_edit').val(),
                'name': $('#name_edit').val(),
                'email': $('#email_edit').val(),
                'program_id': $('#program_id_edit').val(),
               
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/pengguna/kemaskini",
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
                        $('.update_faskategori').text('Kemaskini');
                    } else {
                        $('#update_msgList').html("");
                        // toastr.success(response.message);
                        // $('#editStateModal').find('input').val('');
                        // $('.update_faskategori').text('Kemaskini');
                        $('#editStateModal').modal('hide');
                        swal({
                            title: "Pengguna",
                            text: response.message,
                            type: "success"
                        });
                        fecthPengguna();
                    }
                }
            });

        });


        //delete
        $(document).on('click', '.deletebtn', function () {
            var id = $(this).val();
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
                            url: "/pentadbiran/pengguna/padam/" + id,
                            dataType: "json",
                            success: function (response) {
                                if (response.status == 404) {
                                    swal("Dibatalkan", response.message, "error");
                                } else {
                                    fecthPengguna();
                                    swal("Dipadam!", response.message, "success");
                                }
                            }
                        });
                    } else {
                        swal("Dibatalkan", "Rekod tidak dipadam", "error");
                    }
                });
        });
       
    
    
    
    });

</script>
@endsection