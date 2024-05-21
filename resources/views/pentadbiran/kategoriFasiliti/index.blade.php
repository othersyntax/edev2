@extends('layouts.main')
@section('title')
    Kategori Fasiliti
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Kategori Fasiliti</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Kategori Fasiliti</strong>
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
                <h5>Carian Maklumat Permohonan</h5>
            </div>
            <div class="ibox-content">
                <form role="form">
                    <div class="row">                    
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Jenis Carian</label>
                                {{ Form::select('carian_type', ['Kod'=>'Kod Kategori-Fasiliti', 'Deskripsi'=>'Deskripsi Kategori-Fasiliti'], session('carian_type'), ['class'=>'form-control', 'id'=>'carian_type']) }}
                            </div>                            
                        </div>
                        <div class="col-sm-9 ">
                            <div class="form-group">
                                <label>Katakunci</label>
                                {{ Form::text('carian_text', session('carian_text'), ['class'=>'form-control', 'id'=>'carian_text']) }}
                            </div>
                        </div>                   
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <a href="/pentadbiran/kategori-fasiliti" class="btn btn-default">Set Semula</a>
                            <input type="button" class="btn btn-primary float-right" id="carian" value="Carian">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Senarai Kategori Fasiliti </h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-primary float-right" id="add">
                        Tambah
                    </button>
            </div>
            <div class="ibox-content">
                {{-- <div class="row">
                    <div class="col-sm-5 m-b-xs"><select class="form-control-sm form-control input-s-sm inline">
                        <option value="0">Option 1</option>
                        <option value="1">Option 2</option>
                        <option value="2">Option 3</option>
                        <option value="3">Option 4</option>
                    </select>
                    </div>
                    <div class="col-sm-4 m-b-xs">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-sm btn-white ">
                                <input type="radio" name="options" id="option1" autocomplete="off" checked> Day
                            </label>
                            <label class="btn btn-sm btn-white active">
                                <input type="radio" name="options" id="option2" autocomplete="off"> Week
                            </label>
                            <label class="btn btn-sm btn-white">
                                <input type="radio" name="options" id="option3" autocomplete="off"> Month
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group"><input placeholder="Search" type="text" class="form-control form-control-sm"> <span class="input-group-append"> <button type="button" class="btn btn-sm btn-primary">Go!
                        </button> </span></div>

                    </div>
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#ID</th>
                                <th class="text-center">Kod</th>
                                <th>Kategori-Fasiliti</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($negeri as $neg)
                                <tr>
                                    <td class="text-center">{{ $neg->neg_negeri_id }}</td>
                                    <td class="text-center">{{ $neg->neg_kod_negeri }}</td>
                                    <td>{{ $neg->neg_nama_negeri }}</td>
                                    <td class="text-center">{{ $neg->neg_status }}</td>
                                    <td>
                                        <a href="#"><i class="fa fa-pencil text-navy" title="Kemakini"></i></a>
                                        <a href="#"><i class="fa fa-close text-danger" title="Padam"></i></a>
                                    </td>
                                </tr>         
                            @endforeach                                                --}}
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

{{--MODAL--}}
<div class="modal inmodal fade" id="addStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Maklumat Kategori Fasiliti</h4>
            </div>
            <div class="modal-body">                    
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod Kategori Fasiliti</label>
                            {{ Form::text('faskat_kod_add', null, ['class'=>'form-control faskat_kod_add']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Kategori Fasiliti</label>
                            {{ Form::text('faskat_desc_add', null, ['class'=>'form-control faskat_desc_add']) }}
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
                <h4 class="modal-title">Kemaskini Maklumat Kategori Fasiliti</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="faskat_id_edit">                   
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod Kategori Fasiliti</label>
                            {{ Form::text('faskat_kod_edit', null, ['class'=>'form-control', 'id'=> 'faskat_kod_edit']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Kategori Fasiliti</label>
                            {{ Form::text('faskat_desc_edit', null, ['class'=>'form-control', 'id'=>'faskat_desc_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('faskat_status_edit', ['1'=>'Aktif', '2'=>'Tidak Aktif'], null, ['class'=>'form-control', 'id'=>'faskat_status_edit']) }}
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

<div class="modal inmodal fade" id="DeleteModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Padam Kategori Fasiliti</h4>
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

</div>

@endsection

@section('custom-js')
<script>
    $(document).ready(function(){
        fetchKategoriFasiliti();

        // ADD BUTTON CLICK
        $('#add').click(function(e){ 
            e.preventDefault();
            $('#addStateModal').modal('show');  
        });

        // SEARCH BUTTON CLICK
        $('#carian').click(function(e){
            e.preventDefault();
            $carian_type = $('#carian_type').val();
            $carian_text = $('#carian_text').val();
            fetchKategoriFasiliti($carian_type, $carian_text);
        });

        // SHOW EDIT RECORD
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var faskat_id = $(this).val();
            // alert(neg_negeri_id);
            $('#editStateModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/pentadbiran/kategori-fasiliti/ubah/" + faskat_id,
                success: function (response) {
                    if (response.status == 404){
                        // $('#success_message').addClass('alert alert-success');
                        // $('#success_message').text(response.message);
                        $('#editStateModal').modal('hide');
                    } else {
                        $('#faskat_kod_edit').val(response.kategoriFasiliti.faskat_kod);                        
                        $('#faskat_desc_edit').val(response.kategoriFasiliti.faskat_desc);
                        $('#faskat_status_edit').val(response.kategoriFasiliti.faskat_status).change();
                        $('#faskat_id_edit').val(faskat_id);
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
                'faskat_id': $('#faskat_id_edit').val(),
                'faskat_kod': $('#faskat_kod_edit').val(),
                'faskat_desc': $('#faskat_desc_edit').val(),
                'faskat_status': $('#faskat_status_edit').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/kategori-fasiliti/kemaskini",
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
                        fetchKategoriFasiliti();
                    }
                }
            });

        });

        // SHOW RECORD TO DELETE
        $(document).on('click', '.deletebtn', function () {
            var faskat_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(faskat_id);
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
                url: "/pentadbiran/kategori-fasiliti/padam/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('.delete_state').text('Ya, Padam');
                    } else { 
                        $('.delete_state').text('Ya, Padam');
                        $('#DeleteModal').modal('hide');
                        fetchKategoriFasiliti();
                    }
                }
            });
        });
        
        // SHOW RECORD TO DELETE
        $(document).on('click', '.deletebtn', function () {
            var faskat_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(faskat_id);
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
                url: "/pentadbiran/kategori-fasiliti/padam/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('.delete_state').text('Ya, Padam');
                    } else { 
                        $('.delete_state').text('Ya, Padam');
                        $('#DeleteModal').modal('hide');
                        fetchKategoriFasiliti();
                    }
                }
            });
        });

        // ADD RECORD
        $(document).on('click', '.add_state', function (e) {
            e.preventDefault();

            $(this).text('Menyimpan');

            var data = {
                'faskat_kod': $('.faskat_kod_add').val(),
                'faskat_desc': $('.faskat_desc_add').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/kategori-fasiliti/simpan",
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
                        fetchKategoriFasiliti();
                    }
                }
            });

        });

        function fetchKategoriFasiliti(carian_type='', carian_text=''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
 
            $.ajax({
                type: "post",
                url: "/pentadbiran/kategori-fasiliti/ajax-all1",
                data:{
                        carian_type:carian_type,
                        carian_text:carian_text
                    },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.kategoriFasiliti, function (key, item) {
                        $('tbody').append('<tr>\
                            <td class="text-center">' + item.faskat_id + '</td>\
                            <td class="text-center">' + item.faskat_kod + '</td>\
                            <td class="text-center">' + item.faskat_desc + '</td>\
                            <td class="text-center">' + item.faskat_status + '</td>\
                            <td><button type="button" value="' + item.faskat_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.faskat_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                    });
                }
            });    
        }
    });
    </script>
@endsection