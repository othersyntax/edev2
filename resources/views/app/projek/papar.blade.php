@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Papar Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Papar</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Maklumat Projek</h5>
                <input type="hidden" id="page_projek_id" value="{{ $projek->projek_id }}">
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Kod Subprojek</label>
                            <div class="form-control">
                                {{ $projek->proj_kod_agensi }}-{{ $projek->proj_kod_projek }}-{{ $projek->proj_kod_middle }}-{{ $projek->proj_kod_group }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Negeri</label>
                            <div class="form-control">{{ $projek->proj_negeri }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Bulan dan Tahun</label>
                            <div class="form-control">{{ $projek->proj_bulan }}, {{ $projek->proj_tahun }}</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Program</label>
                            <div class="form-control">{{ $projek->proj_program }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Fasiliti</label>
                            <div class="form-control">{{ $projek->proj_program }}</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Peruntukan Diluluskan (RM)</label>
                            <div class="form-control">@duit($projek->proj_kos_lulus)</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Nama Projek</label>
                            <div class="form-control">{{ $projek->proj_nama }}</div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="text-uppercase">Keterangan</label>
                            <div class="form-control">
                                {{ $projek->proj_butiran }}
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="text-uppercase">Catatan</label>
                            <div class="form-control">
                                {{ $projek->proj_catatan }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Maklumat Aktiviti</h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-sm btn-primary float-right" id="add">
                        Tambah
                    </button>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">#Bil</th>
                                <th width="25%">No Rujukan</th>
                                <th width="20%">Perihal</th>
                                <th width="10%">Tarikh</th>
                                <th width="30%">Catatan</th>
                                <th width="10%">#</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-aktiviti">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Maklumat Kewangan</h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-sm btn-primary float-right" id="addBayaran1">
                        Tambah
                    </button>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">#Bil</th>
                                <th width="25%">No Rujukan</th>
                                <th width="20%">Perihal</th>
                                <th width="10%">Tarikh</th>
                                <th width="30%" class="text-right">Amaun (RM)</th>
                                <th width="10%">#</th>
                            </tr>
                        </thead>
                        <tbody id="tbody-bayaran">
                            <td colspan="6" class="text-center"><small><i>Tiada rekod</i></small></td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Maklumat Program</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group">
                    <label class="text-uppercase">Jenis Program</label>
                    <div class="form-control">
                        Program / JKN / Bahagian
                    </div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">Nama Program</label>
                    <div class="form-control">JKN Kedah</div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">Fasiliti</label>
                    <div class="form-control">Klinik Kesihatan Alor Setar</div>
                </div>
            </div>
        </div>
        <div class="ibox bg-gray-25">
            <div class="ibox-title">
                <h5>Maklumat Kelulusan</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="form-group">
                    <label class="text-uppercase">Tarikh Waran Peruntukan</label>
                    <div class="form-control">21/04/2024</div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">Amaun Waran Peruntukan</label>
                    <div class="form-control">@duit($projek->proj_kos_sebenar)</div>
                </div>
                <div class="form-group">
                    <label class="text-uppercase">Tarikh SST Dikeluarkan</label>
                    <div class="form-control">21/04/2024</div>
                </div>
            </div>
        </div>
        <div class="ibox selected">
            <div class="ibox-content">
                <div class="tab-content">
                    <div id="contact-2" class="tab-pane active">
                        <div class="client-detail">
                            <div class="full-height-scroll">
                                <strong>Aktiviti Rekod</strong>
                                <div id="vertical-timeline" class="vertical-container dark-timeline">
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon navy-bg">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Permohonan Baharu</p>
                                            <p>Usup Keram</p>
                                            <span class="vertical-date small text-muted">2024-06-01 17:25:00</span>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon gray-bg">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Kemaskini Rekod</p>
                                            <p>Usup Keram</p>
                                            <span class="vertical-date small text-muted">2024-06-05 17:25:00</span>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon gray-bg">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Kemaskini Rekod</p>
                                            <p>Norraida Amzah</p>
                                            <span class="vertical-date small text-muted">2024-06-05 17:25:00</span>
                                        </div>
                                    </div>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon red-bg">
                                            <i class="fa fa-trash"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <p>Tolak Permohonan</p>
                                            <p>Chua Choon Lee</p>
                                            <span class="vertical-date small text-muted">2024-06-05 17:25:00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">

    </div>
    <div class="col-lg-4">
    </div>
</div>
@include('app/projek/_modal/add-utiliti')
@include('app/projek/_modal/edit-utiliti')
@include('app/projek/_modal/add-bayaran')
@endsection
@section('custom-js')
<!-- Data picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
<script>
$(document).ready(function(){
    fetchUtiliti();

    //ADD BUTTON CLICK
    $('#add').click(function(e){
        e.preventDefault();
        $('#addModal').modal('show');
    });

    $(document).on('click', '#addBayaran1', function (e) {
        e.preventDefault();
        $('#addModalBayaran').modal('show');
        // alert('cc');
    });

    $('#data_1 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
        forceParse: false,
        // calendarWeeks: true,
        autoclose: true
    });
    $('#data_2 .input-group.date').datepicker({
        format: "dd/mm/yyyy",
        keyboardNavigation: false,
        forceParse: false,
        // calendarWeeks: true,
        autoclose: true
    });

    // LIST RECORD
    function fetchUtiliti(){
        let page_projek_id = $('#page_projek_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "get",
            url: "/projek/papar/utiliti/senarai/"+ page_projek_id,
            dataType: "json",
            success: function (response) {
                $('#tbody-aktiviti').html("");
                let bil = 1;
                $.each(response.utiliti, function (key, item) {
                    let tarikh = new Date(item.projuti_date);
                    $('#tbody-aktiviti').append('<tr>\
                        <td class="text-center">' + bil + '</td>\
                        <td>' + item.projuti_ref_no + '</td>\
                        <td>' + item.projuti_perihal + '</td>\
                        <td>' + tarikh.toLocaleDateString() + '</td>\
                        <td>' + item.projuti_catatan + '</td>\
                        <td><button type="button" value="' + item.projek_uti_id + '" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>\
                        <button type="button" value="' + item.projek_uti_id + '" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button></td>\
                    \</tr>');
                    bil++;
                });
            }
        });
    }

    // SHOW RECORD TO EDIT
    $(document).on('click', '.editbtn', function (e) {
        e.preventDefault();
        var uti_id = $(this).val();
        $('#myModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/projek/papar/utiliti/" + uti_id,
            success: function (response) {
                if (response.status == 404){
                    $('#myModal').modal('hide');
                    swal({
                        title: "Maklumat Aktiviti",
                        text: response.message,
                        type: "danger"
                    });
                } else {
                    let tarikh1 = new Date(response.utiliti.projuti_date);
                    $('#projek_uti_id').val(uti_id);
                    $('#no_rujukan').val(response.utiliti.projuti_ref_no);
                    $('#perihal').val(response.utiliti.projuti_perihal);
                    $('#tarikh').val(tarikh1.toLocaleDateString());
                    $('#catatan').val(response.utiliti.projuti_catatan);
                }
            }
        });
        $('.btn-close').find('input').val('');
    });



    // SHOW RECORD TO DELETE
    $(document).on('click', '.deletebtn', function () {
        var projek_uti_id = $(this).val();
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
                    url: "/projek/utiliti/padam/" + projek_uti_id,
                    dataType: "json",
                    success: function (response) {
                        if (response.status == 404) {
                            swal("Dibatalkan", response.message, "error");
                        } else {
                            // fetchBandar();
                            swal("Dipadam!", response.message, "success");
                        }
                    }
                });
            } else {
                swal("Dibatalkan", "Rekod bandar tidak dipadam", "error");
            }
        });
    });

    // UPDATE RECORD
    $(document).on('click', '.updateUtiliti', function (e) {
        e.preventDefault();
        $(this).text('Mengemaskini...');
        var edit_data = {
            'projek_uti_id': $('#projek_uti_id').val(),
            'projuti_ref_no': $('#no_rujukan').val(),
            'projuti_perihal': $('#perihal').val(),
            'projuti_date': $('#tarikh').val(),
            'projuti_catatan': $('#catatan').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/projek/papar/utiliti/kemaskini",
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
                    $('#update_msgList').html("");
                    $('#myModal').find('input').val('');
                    $('#myModal').modal('hide');
                    fetchUtiliti();
                    swal({
                        title: "Aktiviti",
                        text: response.message,
                        type: "success"
                    });
                }
            }
        });

    });
});
</script>
@endsection
