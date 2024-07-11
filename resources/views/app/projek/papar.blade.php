@extends('layouts.main')
@section('title')
    Kemaskini Projek
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
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
    <div class="col-lg-9">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Maklumat Projek</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Kod Subprojek</label><br>
                            <b>{{ $projek->proj_kod_agensi }}-{{ $projek->proj_kod_projek }}-{{ $projek->proj_kod_middle }}-{{ $projek->proj_kod_group }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Negeri</label><br>
                            <b>{{ $projek->proj_negeri }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Bulan dan Tahun</label><br>
                            <b>{{ $projek->proj_bulan }}, {{ $projek->proj_tahun }}</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Program</label><br>
                            <b>{{ $projek->proj_program }}</b>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-uppercase">Kos Sebenar (RM)</label><br>
                            <b>@duit($projek->proj_kos_sebenar)</b>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="text-uppercase">Nama Projek</label><br>
                            <b>{{ $projek->proj_nama }}</b>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="text-uppercase">Keterangan</label><br>
                            <b>{{ $projek->proj_butiran }}</b>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="text-uppercase">Catatan</label><br>
                            <b>{{ $projek->proj_catatan }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Maklumat Aktiviti</h5>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th width="5%" class="text-center">#Bil</th>
                        <th width="20%">No Rujukan</th>
                        <th width="25%">Perihal</th>
                        <th width="10%">Tarikh</th>
                        <th width="30%">Catatan</th>
                        <th width="10%">#</th>
                    </tr>
                    </thead>
                    <tbody>
                        @php
                            $bil=1;
                        @endphp
                        @foreach ($utilities as $uti)
                            <tr>
                                <td class="text-center">{{ $bil++ }}</td>
                                <td>{{ $uti->projuti_ref_no }}</td>
                                <td>{{ $uti->projuti_perihal }}</td>
                                <td>{{ $uti->projuti_date }}</td>
                                <td>{{ $uti->projuti_catatan }}</td>
                                <td>
                                    <button type="button" value="{{ $uti->projek_uti_id }}" class="btn btn-default btn-xs editbtn" title="Kemaskini"><i class="fa fa-pencil text-navy"></i></button>
                                    <button type="button" value="{{ $uti->projek_uti_id }}" class="btn btn-default btn-xs deletebtn" title="Padam"><i class="fa fa-close text-danger"></i></button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-lg-3">
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
@include('app/projek/_modal/edit-utiliti')
@endsection
@section('custom-js')
<script>
$(document).ready(function(){
    $('.editbtn').on('click', function(){
        $('#myModal').modal('show');
    });

    // SHOW RECORD TO EDIT
    $('.editbtn').on('click', function(e){
        e.preventDefault();
        var uti_id = $(this).val();
        // alert(neg_negeri_id);
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
                    $('#projek_uti_id').val(uti_id);
                    $('#no_rujukan').val(response.utiliti.projuti_ref_no);
                    $('#perihal').val(response.utiliti.projuti_perihal);
                    $('#tarikh').val(response.utiliti.projuti_date);
                    $('#catatan').val(response.utiliti.projuti_catatan);

                }
            }
        });
        $('.btn-close').find('input').val('');
    });

    // SHOW RECORD TO DELETE
    $('.deletebtn').on('click', function () {
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
});
</script>
@endsection
