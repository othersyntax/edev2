@extends('layouts.main')
@section('title')
    Negeri
@endsection
@section('custom-css')
<link href="{{ asset("/template/css/plugins/iCheck/custom.css") }}" rel="stylesheet">
@endsection
@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Negeri</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Pentadbiran</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Negeri</strong>
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
                <h5>Carian Maklumat Negeri</h5>
            </div>
            <div class="ibox-content">
                <div class="row">                    
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Jenis Carian</label>
                            {{ Form::select('carian_type', ['Kod'=>'Kod Negeri', 'Negeri'=>'Negeri'],null, ['class'=>'form-control', 'id'=>'carian_type']) }}
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
                        <a href="/pentadbiran/negeri" class="btn btn-default">Set Semula</a>
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
                <h5>Senarai Negeri </h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-primary float-right" id="add">
                        Tambah
                    </button>
                </div>
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
                                <th class="text-center">Kod Negeri</th>
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
{{-- MODAL --}}

<div class="modal inmodal fade" id="addStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Tambah Maklumat Negeri</h4>
            </div>
            <div class="modal-body">                    
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod Negeri</label>
                            {{ Form::text('neg_kod_negeri_add', null, ['class'=>'form-control neg_kod_negeri_add']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::text('neg_nama_negeri_add', null, ['class'=>'form-control neg_nama_negeri_add']) }}
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
                <h4 class="modal-title">Kemaskini Maklumat Negeri</h4>
            </div>
            <div class="modal-body">
                <input type="text" id="neg_negeri_id_edit">                   
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod Negeri</label>
                            {{ Form::text('neg_kod_negeri_edit', null, ['class'=>'form-control', 'id'=> 'neg_kod_negeri_edit']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Negeri</label>
                            {{ Form::text('neg_nama_negeri_edit', null, ['class'=>'form-control', 'id'=>'neg_nama_negeri_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Status</label>
                            {{ Form::select('neg_status_edit', ['1'=>'Aktif', '2'=>'Tidak Aktif'], null, ['class'=>'form-control', 'id'=>'neg_status_edit']) }}
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
</div>
@endsection
@section('custom-js')
<script>
    $(document).ready(function(){
        // LOAD DATA WHEN OPEN THIS PAGE
        fetchNegeri();

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
            fetchNegeri($carian_type, $carian_text);
        });
        

        // LIST RECORD
        function fetchNegeri(carian_type='', carian_text=''){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/pentadbiran/negeri/ajax-all",
                data:{
                        carian_type:carian_type,
                        carian_text:carian_text
                    },
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    $('tbody').html("");
                    $.each(response.negeri, function (key, item) {
                        $('tbody').append('<tr>\
                            <td class="text-center">' + item.neg_negeri_id + '</td>\
                            <td class="text-center">' + item.neg_kod_negeri + '</td>\
                            <td>' + item.neg_nama_negeri + '</td>\
                            <td>' + item.neg_status + '</td>\
                            <td><button type="button" value="' + item.neg_negeri_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.neg_negeri_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
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
                'neg_kod_negeri': $('.neg_kod_negeri_add').val(),
                'neg_nama_negeri': $('.neg_nama_negeri_add').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/pentadbiran/negeri/simpan",
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
                        fetchNegeri();
                    }
                }
            });

        });

        // EDIT RECORD
        $(document).on('click', '.editbtn', function (e) {
            e.preventDefault();
            var neg_negeri_id = $(this).val();
            // alert(neg_negeri_id);
            $('#editStateModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/pentadbiran/negeri/ubah/" + neg_negeri_id,
                success: function (response) {
                    if (response.status == 404){
                        // $('#success_message').addClass('alert alert-success');
                        // $('#success_message').text(response.message);
                        $('#editStateModal').modal('hide');
                    } else {
                        $('#neg_kod_negeri_edit').val(response.negeri.neg_kod_negeri);                        
                        $('#neg_nama_negeri_edit').val(response.negeri.neg_nama_negeri);
                        $('#neg_status_edit').val(response.negeri.neg_status).change();
                        $('#neg_negeri_id_edit').val(neg_negeri_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');
        });
    });
</script>
@endsection