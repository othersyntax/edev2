@extends('layouts.main')
@section('title')
    Kategori Projek
@endsection
@yield('custom-css')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Kategori Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Kategori Projek</strong>
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
                <h5>Carian Kategori Projek</h5>
            </div>
            <div class="ibox-content">
                <form role="form">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Carian</label>{{--Untuk Search--}}
                                {{ Form::select('carian_type', ['proj_kategori_id'=>'ID Projek', 'pro_kat_nama'=>'Nama Kategori Projek' , 'pro_siling'=>'Jenis Siling'], session('carian_type'), ['class'=>'form-control', 'id'=>'carian_type']) }}

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
                            <a href="/pentadbiran/kategori-projek" class="btn btn-default">Set Semula</a> {{--Untuk Reset Carian--}}
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
                <h5>Senarai Kategori Projek </h5>
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
                                <th>Nama Singkatan Projek</th>
                                <th>Nama Projek</th>
                                <th>Siling Projek</th>
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
                                <label>Nama Singkatan Projek</label>
                                {{ Form::text('pro_kat_short_nama_add', null, ['class'=>'form-control pro_kat_short_nama_add']) }}
                            </div>
                        </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Nama Projek</label>
                                    {{ Form::text('pro_kat_nama_add', null, ['class'=>'form-control pro_kat_nama_add']) }}
                                </div>                          
                            </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Siling Projek</label>
                            {{ Form::select('pro_siling_add', dropdownProKateSiling(), null, ['class'=>'form-control pro_siling_add']) }}
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

{{--Untuk Edit // belom siap--}}
{{--<div class="modal inmodal fade" id="editStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Kategori Projek</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="proj_kategori_id_edit">                   
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Nama Singkatan Projek</label>
                            {{ Form::text('pro_kat_short_nama_edit', null, ['class'=>'form-control', 'id'=> 'pro_kat_short_nama_edit']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nama Projek</label>
                            {{ Form::text('pro_kat_nama_edit', null, ['class'=>'form-control', 'id'=>'pro_kat_nama_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <label>Siling Projek</label>
                            {{ Form::select('pro_siling_edit', dropdownProKateSiling(), null, ['class'=>'form-control pro_siling_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('pro_kat_status_edit', ['1'=>'Aktif', '2'=>'Tidak Aktif'], null, ['class'=>'form-control', 'id'=>'pro_kat_status_edit']) }}
                        </div>
                    </div>
                </div>                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary update_prokategori">Kemaskini</button>
            </div>
        </div>
    </div>
</div>--}}

<div class="modal inmodal fade" id="editStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Kategori Fasiliti</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="proj_kategori_id_edit">                   
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Nama Singkatan Kategori Projek</label>
                            {{ Form::text('pro_kat_short_nama_edit', null, ['class'=>'form-control', 'id'=> 'pro_kat_short_nama_edit']) }}
                        </div>                          
                    </div>
                    
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Nama Kategori Projek</label>
                            {{ Form::text('pro_kat_nama_edit', null, ['class'=>'form-control', 'id'=>'pro_kat_nama_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kategori Siling</label>
                            {{ Form::select('pro_siling_edit',['Siling'=>'Siling', 'Luar Siling'=>'Luar Siling'], null, ['class'=>'form-control', 'id'=>'pro_siling_edit']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('pro_kat_status_edit', ['1'=>'Aktif', '2'=>'Tidak Aktif'], null, ['class'=>'form-control', 'id'=>'pro_kat_status_edit']) }}
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
</div>

@endsection



{{-- Java --}}
@section('custom-js')
<script>
        $(document).ready(function()
    {
        fetchKategoriProjek();

        // FIND RECORD
        $('#carian').click(function(e){
            e.preventDefault();
            $carian_type = $('#carian_type').val();
            $carian_text = $('#carian_text').val();
            fetchKategoriProjek($carian_type, $carian_text);
        });
       

        // ADD BUTTON CLICK
        $('#add').click(function(e)
        {
            e.preventDefault();
            $('#addStateModal').modal('show');
        });
     

        //READ CONTENT FROM DB
        function fetchKategoriProjek(carian_type='', carian_text=''){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: "/pentadbiran/kategori-projek/ajax-all",
                    data:{
                            carian_type:carian_type,
                            carian_text:carian_text,
                        },
                    dataType: "json",
                    success: function (response) {
                        // console.log(response);
                        $('tbody').html("");
                        $.each(response.KategoriProjek, function (key, item) {
                            $('tbody').append('<tr>\
                                <td class="text-center">' + item.proj_kategori_id + '</td>\
                                <td>' + item.pro_kat_short_nama + '</td>\
                                <td>' + item.pro_kat_nama + '</td>\
                                <td>' + item.pro_siling + '</td>\
                                <td class="text-center">' + getStatus(item.pro_kat_status) + '</td>\
                                <td><button type="button" value="' + item.proj_kategori_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                                <button type="button" value="' + item.proj_kategori_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                            \</tr>');
                        });
                    }
                });
        }

        // ADD RECORD
        $(document).on('click', '.add_state', function (e) {
                e.preventDefault();

                 $(this).text('Menyimpan');

                     var data = {
                         'pro_kat_short_nama': $('.pro_kat_short_nama_add').val(),
                         'pro_kat_nama': $('.pro_kat_nama_add').val(),
                         'pro_siling': $('.pro_siling_add').val(),
                
                     }

                  $.ajaxSetup({
                       headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       }
                 });

             $.ajax({
                type: "POST",
                url: "/pentadbiran/kategori-projek/simpan",
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
                            title: "Program",
                            text: response.message,
                            type: "success"
                        });
                        fetchKategoriProjek();
                    }
                }
                 });

        });

        //delete
        $(document).on('click', '.deletebtn', function () {
            var proj_kategori_id = $(this).val();
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
                            url: "/pentadbiran/kategori-projek/padam/" + proj_kategori_id,
                            dataType: "json",
                            success: function (response) {
                                if (response.status == 404) {
                                    swal("Dibatalkan", response.message, "error");
                                } else {
                                    fetchKategoriProjek();
                                    swal("Dipadam!", response.message, "success");
                                }
                            }
                        });
                    } else {
                        swal("Dibatalkan", "Rekod tidak dipadam", "error");
                    }
                });
        });

        // SHOW EDIT RECORD
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var proj_kategori_id = $(this).val();
            // alert(neg_negeri_id);
            $('#editStateModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/pentadbiran/kategori-projek/ubah/" + proj_kategori_id,
                success: function (response) {
                    if (response.status == 404){
                        // $('#success_message').addClass('alert alert-success');
                        // $('#success_message').text(response.message);
                        $('#editStateModal').modal('hide');
                    } else {

                        $('#proj_kategori_id_edit').val(response.KategoriProjek.proj_kategori_id);                        
                        $('#pro_kat_short_nama_edit').val(response.KategoriProjek.pro_kat_short_nama);                        
                        $('#pro_kat_nama_edit').val(response.KategoriProjek.pro_kat_nama);
                        $('#pro_kat_statuss_edit').val(response.KategoriProjek.pro_kat_status).change();
                        $('#proj_kategori_id_edit').val(proj_kategori_id);
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
                
                'proj_kategori_id': $('#proj_kategori_id_edit').val(),
                'pro_kat_short_nama': $('#pro_kat_short_nama_edit').val(),
                'pro_kat_nama': $('#pro_kat_nama_edit').val(),
                'pro_kat_status': $('#pro_kat_status_edit').val(),
                'pro_siling': $('#pro_siling_edit').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/kategori-projek/kemaskini",
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
                            title: "Kategori Projek",
                            text: response.message,
                            type: "success"
                        });
                        fetchKategoriProjek();
                    }
                }
            });

        });
        

    });
       
    </script>
@endsection



  


