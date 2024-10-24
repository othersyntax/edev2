@extends('layouts.main')
@section('title')
    Fasiliti
@endsection
@yield('custom-css')
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Fasiliti</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Fasiliti</strong>
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
                <h5>Carian Maklumat Fasiliti</h5>
            </div>
            <div class="ibox-content">
                <form role="form">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Carian</label>{{--Untuk Search--}}
                                {{ Form::select('carian_type', ['Kod'=>'Kod PTJ', 'Negeri'=>'Negeri' , 'kodkate'=>'Kategori'], session('carian_type'), ['class'=>'form-control', 'id'=>'carian_type']) }}

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
                            <a href="/pentadbiran/fasiliti" class="btn btn-default">Set Semula</a> {{--Untuk Reset Carian--}}
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
                <h5>Senarai Fasiliti </h5>
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
                                <th class="text-center">Kod PTJ</th>
                                <th>Nama Fasiliti</th>
                                <th class="text-center">Negeri</th>
                                <th class="text-center">Daerah</th>
                                <th class="text-center">Kategori</th>
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


{{--Untuk Add // siap--}}
<div class="modal inmodal fade" id="addStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Maklumat Fasiliti</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod PTJ Fasiliti</label>
                            {{ Form::text('fas_ptj_code_add', null, ['class'=>'form-control fas_ptj_code_add']) }}
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Nama Fasiliti </label>
                            {{ Form::text('fas_name_add', null, ['class'=>'form-control fas_name_add']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kategori</label>
                            {{ Form::select('fas_jenis_add', dropdownKatefas(), null, ['class'=>'form-control fas_jenis_add']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::select('neg_nama_negeri_add', dropdownNegeri(), null, ['class'=>'form-control neg_nama_negeri_add']) }}
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

{{--Untuk Edit //  siap--}}
<div class="modal inmodal fade" id="editStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Fasiliti</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="fasiliti_id_edit">
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod Fasiliti</label>
                            {{ Form::text('fas_ptj_code_edit', null, ['class'=>'form-control' , 'id'=> 'fas_ptj_code_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Nama Fasiliti </label>
                            {{ Form::text('fas_name_edit', null, ['class'=>'form-control' , 'id'=> 'fas_name_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kategori Fasiliti</label>
                            {{ Form::select('fas_jenis_edit', dropdownKatefas(), null, ['class'=>'form-control', 'id'=>'fas_jenis_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>ID Negeri</label>
                            {{ Form::select('fas_negeri_id_edit', dropdownNegeri(), null, ['class'=>'form-control', 'id'=>'fas_negeri_id_edit']) }}
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('fas_ptj_level_edit', ['1'=>'Aktif', '2'=>'Tidak Aktif'], null, ['class'=>'form-control', 'id'=>'fas_ptj_level_edit']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary update_fas">Kemaskini</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('custom-js')
<script>
    $(document).ready(function(){


        fetchFasiliti();
// FIND RECORD
        $('#carian').click(function(e){
            e.preventDefault();
            $carian_type = $('#carian_type').val();
            $carian_text = $('#carian_text').val();
            fetchFasiliti($carian_type, $carian_text);
        });

        // ADD BUTTON CLICK
        $('#add').click(function(e)
        {
            e.preventDefault();
            $('#addStateModal').modal('show');
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


        //READ CONTENT FROM DB
        function fetchFasiliti(carian_type='', carian_text=''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/pentadbiran/fasiliti/ajax-all",
                data:{
                        carian_type:carian_type,
                        carian_text:carian_text,
                    },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.fasiliti, function (key, item) {
                        $('tbody').append('<tr>\
                            <td class="text-center">' + item.fasiliti_id + '</td>\
                            <td class="text-center">' + item.fas_ptj_code + '</td>\
                            <td>' + item.fas_name + '</td>\
                            <td class="text-center">' + item.neg_nama_negeri + '</td>\
                            <td class="text-center">' + item.dae_nama_daerah + '</td>\
                            <td class="text-center">' + item.fas_jenis + '</td>\
                            <td class="text-center">' + getStatus(item.fas_ptj_level) + '</td>\
                            <td><button type="button" value="' + item.fasiliti_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.fasiliti_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                    });
                }
            });
        }

        //delete
        $(document).on('click', '.deletebtn', function () {
            var fasiliti_id = $(this).val();
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
                            url: "/pentadbiran/fasiliti/padam/" + fasiliti_id,
                            dataType: "json",
                            success: function (response) {
                                if (response.status == 404) {
                                    swal("Dibatalkan", response.message, "error");
                                } else {
                                    fetchFasiliti();
                                    swal("Dipadam!", response.message, "success");
                                }
                            }
                        });
                    } else {
                        swal("Dibatalkan", "Rekod fasiliti tidak dipadam", "error");
                    }
                });
        });



        // UPDATE RECORD
        $(document).on('click', '.update_fas', function (e) {
            e.preventDefault();

            $(this).text('Kemaskini');
            // alert(id);

            var edit_data = {
                'fasiliti_id': $('#fasiliti_id_edit').val(),
                'fas_ptj_code': $('#fas_ptj_code_edit').val(),
                'fas_name': $('#fas_name_edit').val(),
                'fas_jenis': $('#fas_jenis_edit').val(),
                'fas_ptj_level': $('#fas_ptj_level_edit').val(),
                'fas_negeri_id': $('#fas_negeri_id_edit').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/fasiliti/kemaskini",
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
                        $('.update_fas').text('Kemaskini');
                    } else {
                        $('#update_msgList').html("");
                        // toastr.success(response.message);
                        // $('#editStateModal').find('input').val('');
                        // $('.update_faskategori').text('Kemaskini');
                        $('#editStateModal').modal('hide');
                        swal({
                            title: "Fasiliti",
                            text: response.message,
                            type: "success"
                        });
                        fetchFasiliti();
                    }
                }
            });

        });


        // add
        $(document).on('click', '.add_state', function (e) {
            e.preventDefault();

            $(this).text('Menyimpan');

            var data = {
                'fas_ptj_code': $('.fas_ptj_code_add').val(),
                'fas_name': $('.fas_name_add').val(),
                'fas_jenis': $('.fas_jenis_add').val(),
                'fas_negeri_id': $('.neg_nama_negeri_add').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/fasiliti/simpan",
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
                        fetchFasiliti();
                        swal({
                            title: "Fasiliti",
                            text: response.message,
                            type: "success"
                        });
                    }
                }
            });

         });

        //edit
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var fasiliti_id = $(this).val();
            // alert(neg_negeri_id);
            $('#editStateModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/pentadbiran/fasiliti/ubah/" + fasiliti_id,
                success: function (response) {
                    if (response.status == 404){
                        // $('#success_message').addClass('alert alert-success');
                        // $('#success_message').text(response.message);
                        $('#editStateModal').modal('hide');
                    } else {
                        $('#fas_ptj_code_edit').val(response.fasiliti.fas_ptj_code);
                        $('#fas_name_edit').val(response.fasiliti.fas_name);
                        $('#fas_jenis_edit').val(response.fasiliti.fas_jenis);
                        $('#fas_negeri_id_edit').val(response.fasiliti.fas_negeri_id);
                        $('#fas_ptj_level_edit').val(response.fasiliti.fas_ptj_level).change();
                        $('#fasiliti_id_edit').val(fasiliti_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');
        });



    });
</script>
@endsection
