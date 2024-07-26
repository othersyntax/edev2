@extends('layouts.main')
@section('title')
    Program
@endsection
@yield('custom-css')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Program</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Program</strong>
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
                <h5>Carian Program</h5>
            </div>
            <div class="ibox-content">
                <form role="form">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Carian</label>{{--Untuk Search--}}
                                {{ Form::select('carian_type', ['prog_name'=>'Program', 'Negeri'=>'Negeri'], session('carian_type'), ['class'=>'form-control', 'id'=>'carian_type']) }}

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
                            <a href="/pentadbiran/program" class="btn btn-default">Set Semula</a> {{--Untuk Reset Carian--}}
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
                                <th class="text-center">Kod</th>
                                <th>Nama Program</th>
                                <th class="text-center">Status</th>
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
                <h4 class="modal-title">Tambah Maklumat Program</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Kod</label>
                                {{ Form::text('prog_code_add', null, ['class'=>'form-control prog_code_add']) }}
                            </div>
                        </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nama Program</label>
                                    {{ Form::text('prog_name_add', null, ['class'=>'form-control prog_name_add']) }}
                                </div>                          
                            </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('prog__negri_id_add', dropdownNegeri(), null, ['class'=>'form-control prog__negri_id_add']) }}
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

{{--Untuk Edit //--}}
<div class="modal inmodal fade" id="editStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Program</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="program_id_edit">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod Program</label>
                            {{ Form::text('prog_code_edit', null, ['class'=>'form-control' , 'id'=> 'prog_code_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Nama Program </label>
                            {{ Form::text('prog_name_edit', null, ['class'=>'form-control' , 'id'=> 'prog_name_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-8">
                            <div class="form-group">
                                <label>Status </label>
                                {{ Form::text('prog_status_edit', null, ['class'=>'form-control' , 'id'=> 'prog_status_edit']) }}
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>ID Negeri</label>
                            {{ Form::select('prog__negri_id_edit', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'prog__negri_id_edit']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary update_prog">Kemaskini</button>
            </div>
        </div>
    </div>
</div>


@endsection



{{-- Java --}}
@section('custom-js')
<script>
        $(document).ready(function()
    {
        fetchProgram();

        // FIND RECORD
        $('#carian').click(function(e){
            e.preventDefault();
            $carian_type = $('#carian_type').val();
            $carian_text = $('#carian_text').val();
            fetchProgram($carian_type, $carian_text);
        });

     // ADD BUTTON CLICK
     $('#add').click(function(e)
        {
            e.preventDefault();
            $('#addStateModal').modal('show');
        });

//READ CONTENT FROM DB
            function fetchProgram(carian_type='', carian_text='')
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/pentadbiran/program/ajax-all",
                data:{
                        carian_type:carian_type,
                        carian_text:carian_text,
                    },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.Program, function (key, item) {
                        $('tbody').append('<tr>\
                            <td class="text-center">' + item.program_id + '</td>\
                            <td class="text-center">' + item.prog_code + '</td>\
                            <td>' + item.prog_name + '</td>\
                            <td class="text-center">' + item.prog_status + '</td>\
                            <td><button type="button" value="' + item.program_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.program_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                    });
                }
            });
        }



//delete
            $(document).on('click', '.deletebtn', function () 
        {
            var program_id = $(this).val();
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
                            url: "/pentadbiran/program/padam/" + program_id,
                            dataType: "json",
                            success: function (response) {
                                if (response.status == 404) {
                                    swal("Dibatalkan", response.message, "error");
                                } else {
                                    fetchProgram();
                                    swal("Dipadam!", response.message, "success");
                                }
                            }
                        });
                    } else {
                        swal("Dibatalkan", "Rekod Program tidak dipadam", "error");
                    }
                });
        });





// add
            $(document).on('click', '.add_state', function (e) {
                e.preventDefault();

                 $(this).text('Menyimpan');

                     var data = {
                         'prog_code': $('.prog_code_add').val(),
                         'prog_name': $('.prog_name_add').val(),
                         'prog__negri_id': $('.prog__negri_id_add').val(),
                
                     }

                  $.ajaxSetup({
                       headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                 });

             $.ajax({
                type: "POST",
                url: "/pentadbiran/program/simpan",
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
                        $('.add_program').text('Simpan');
                        $('#addStateModal').modal('hide');
                        swal({
                            title: "Program",
                            text: response.message,
                            type: "success"
                        });
                        fetchProgram();
                    }
                }
                 });

            });
 //edit
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var program_id = $(this).val();
            // alert(neg_negeri_id);
            $('#editStateModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/pentadbiran/program/ubah/" + program_id,
                success: function (response) {
                    if (response.status == 404){
                        // $('#success_message').addClass('alert alert-success');
                        // $('#success_message').text(response.message);
                        $('#editStateModal').modal('hide');
                    } else {
                        $('#program_id_edit').val(response.program.program_id);                        
                        $('#prog_name_edit').val(response.program.prog_name);
                        $('#prog_status_edit').val(response.program.prog_status).change();
                        $('#prog__negri_id_edit').val(response.program.prog__negri_id).change();
                        $('#prog_code_edit').val(response.program.prog_code);   
                    }
                }
            });
            $('.btn-close').find('input').val('');
        });


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
        
 // UPDATE RECORD
            $(document).on('click', '.update_prog', function (e) {
            e.preventDefault();

            $(this).text('Kemaskini');
            // alert(id);

            var edit_data = {
                'program_id': $('#program_id_edit').val(),
                'prog_name': $('#prog_name_edit').val(),
                'prog_status': $('#prog_status_edit').val(),
                'prog__negri_id': $('#prog__negri_id_edit').val(),
                'prog_code': $('#prog_code_edit').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/program/kemaskini",
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
                        $('.update_prog').text('Kemaskini');
                    } else {
                        $('#update_msgList').html("");
                        // toastr.success(response.message);
                        // $('#editStateModal').find('input').val('');
                        // $('.update_faskategori').text('Kemaskini');
                        $('#editStateModal').modal('hide');
                        swal({
                            title: "Program",
                            text: response.message,
                            type: "success"
                        });
                        fetchProgram();
                    }
                }
            });

        });


    });
       
    </script>
@endsection



  


