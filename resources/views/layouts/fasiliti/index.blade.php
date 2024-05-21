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
                                <label>Jenis Carian</label>
                                {{ Form::select('carian_type', ['Kod'=>'Kod Ptj', 'Negeri'=>'Negeri' , 'kodkate'=>'Kod Kategori Fasiliti'], session('carian_type'), ['class'=>'form-control', 'id'=>'carian_type']) }}
                                    
                                </select>
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
                            <a href="/pentadbiran/fasiliti" class="btn btn-default">Set Semula</a>
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
                                <th class="text-center">Nama Fasiliti</th>
                                <th class="text-center">Kod Kategori Fasiliti</th>
                                <th class="text-center">Kod Negeri</th>
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
                            <label>Kod Kategori Fasiliti</label>
                            {{ Form::text('fas_kat_kod_add', null, ['class'=>'form-control fas_kat_kod_add']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>ID Negeri</label>
                            {{ Form::text('fas_negeri_id_add', null, ['class'=>'form-control fas_negeri_id_add']) }}
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

<div class="modal inmodal fade" id="editStateModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kemaskini Maklumat Fasiliti</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="fas_negeri_id_edit">                   
                <div class="row">
                    <div class="col-lg-12">
                        <ul id="save_msgList"></ul>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod PTJ Fasiliti</label>
                            {{ Form::text('fas_ptj_code_edit', null, ['class'=>'form-control fas_ptj_code_edit', 'id'=> 'fas_ptj_code_edit']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label>Nama Fasiliti </label>
                            {{ Form::text('fas_name_edit', null, ['class'=>'form-control fas_name_edit', 'id'=> 'fas_name_edit']) }}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Kod Kategori Fasiliti</label>
                            {{ Form::text('fas_kat_kod_edit', null, ['class'=>'form-control fas_kat_kod_edit', 'id'=> 'fas_kat_kod_edit']) }}
                        </div>                          
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>ID Negeri</label>
                            {{ Form::text('fas_negeri_id_edit', null, ['class'=>'form-control fas_negeri_id_edit', 'id'=> 'fas_negeri_id_edit']) }}
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
                            <td class="text-center">' + item.fas_name + '</td>\
                            <td class="text-center">' + item.fas_kat_kod + '</td>\
                            <td class="text-center">' + item.fas_negeri_id + '</td>\
                            <td><button type="button" value="' + item.fasiliti_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                            <button type="button" value="' + item.fasiliti_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                        \</tr>');
                    });
                }
            });
}
//delete
$(document).on('click', '.deletebtn', function () 
{
            var fasiliti_id = $(this).val();
            $('#DeleteModal').modal('show');
            $('#deleteing_id').val(fasiliti_id);
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
                url: "/pentadbiran/fasiliti/padam/" + id,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 404) {
                        $('.delete_state').text('Ya, Padam');
                    } else { 
                        $('.delete_state').text('Ya, Padam');
                        $('#DeleteModal').modal('hide');
                        fetchFasiliti();
                    }
                }
           });
});
//update
$(document).on('click', '.update_state', function (e) {
            e.preventDefault();

            $(this).text('Kemaskini');
            // alert(id);

            var edit_data = {
                'fasiliti_id': $('#fasiliti_id_edit').val(),
                'fas_ptj_code': $('#fas_ptj_code_edit').val(),
                'fas_name': $('#fas_name_edit').val(),
                'fas_kat_kod': $('fas_kat_kod_edit').val(),
                'fas_negeri_id': $('fas_negeri_id_edit').val(),
                
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
                        $('.update_state').text('Kemaskini');
                    } else {
                        $('#update_msgList').html("");
                        // toastr.success(response.message);
                        // $('#editStateModal').find('input').val('');
                        // $('.update_state').text('Kemaskini');
                        $('#editStateModal').modal('hide');
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
                'fas_kat_kod': $('.fas_kat_kod_add').val(),
                'fas_negeri_id': $('.fas_negeri_id_add').val(),
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
                    }
                }
            });

});


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
                        $('#fas_kat_kod_edit').val(response.fasiliti.fas_kat_kod);                        
                        $('#fas_negeri_id_edit').val(response.fasiliti.fas_negeri_id);
                        $('#fasiliti_id_edit').val(fasiliti_id);
                    }
                }
            });
            $('.btn-close').find('input').val('');
});










    });

</script>
@endsection