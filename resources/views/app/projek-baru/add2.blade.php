@extends('layouts.main')
@section('title')
    Permohonan Baharu
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/summernote/summernote-bs4.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/daterangepicker/daterangepicker-bs3.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Baharu</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
<form action="/permohonan/baru/simpan" method="post">
    @csrf
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>MAKLUMAT LOKALITI</h5>
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
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Negeri</label>
                            <div class="form-control">{{ $projek->proj_negeri }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Parlimen</label>
                            <div class="form-control">{{ $projek->proj_parlimen }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dewan Undangan Negeri</label>
                            <div class="form-control">{{ $projek->proj_dun }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>MAKLUMAT PROJEK</h5>
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
                <p class="text-info font-bold">1. MAKLUMAT KOD PROJEK</p>
                <div class="hr-line-dashed"></div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Kod Projek</label>
                            <div class="form-control">{{ $projek->proj_kod_agensi }}-{{ $projek->proj_kod_projek }}-{{ $projek->proj_kod_setia }}-{{ $projek->proj_kod_subsetia }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pemilik</label>
                            <div class="form-control">{{ $projek->proj_pemilik }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fasiliti</label>
                            <div class="form-control">{{ $projek->proj_fasiliti_id }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Anggaran Kos (RM)</label>
                            <div class="form-control">@duit($projek->proj_kos_mohon)</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tahun</label>
                            <div class="form-control">{{ $projek->proj_tahun }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bulan</label>
                            <div class="form-control">{{ $projek->proj_bulan }}</div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tempoh Pelaksanaan</label>
                            <div class="form-control">{{ date('d/m/Y', strtotime($projek->proj_laksana_mula)) }} - {{ date('d/m/Y', strtotime($projek->proj_laksana_tamat)) }}</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Projek</label>
                            <div class="form-control">{{ $projek->proj_kategori_id }}</div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Projek</label>
                            <div class="form-control">{{ $projek->proj_nama }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>DOKUMEN SOKONGAN</h5>
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-sm btn-primary float-right" id="add">
                                Muat naik
                            </button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%" class="text-center">#Bil</th>
                                        <th width="80%">Perihal</th>
                                        <th width="10%">#</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-aktiviti">
                                    <tr>
                                        <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>UNJURAN KEWANGAN</h5>
                        <div class="ibox-tools">
                            <button type="button" class="btn btn-sm btn-primary float-right" id="addUnjuran">
                                Tambah
                            </button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%" class="text-center">#Bil</th>
                                        <th width="10%">Tahun</th>
                                        <th width="70%">Unjuran Kewangan</th>
                                        <th width="10%">#</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody-unjuran">
                                    <tr>
                                        <td colspan="4" class="font-italic text-small text-center">Tiada Rekod</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-2">
                    <a href="/permohonan/baru/main" class="btn btn-white btn-sm">Batal</a>
                    <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                    {{-- <button class="btn btn-info btn-sm" type="submit">Simpan dan Salin</button> --}}
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@include('app/projek-baru/_modal/muat-naik')
@include('app/projek-baru/_modal/add-kewangan')
@endsection
@section('custom-js')
<script src="{{ asset("/template/js/plugins/summernote/summernote-bs4.js") }}"></script>
<!-- Date range picker -->
<script src="{{ asset("/template/js/plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/template/js/plugins/select2/select2.full.min.js") }}"></script>
<script>
    $(document).ready(function(){
        //ADD BUTTON CLICK
        $('#add').click(function(e){
            e.preventDefault();

            var baseUrl = (window.location).href;
            var id = baseUrl.split("/").pop();
            // alert(id);
            $('#projek_id').val(id);
            $('#addModal').modal('show');
        });

        $('#addUnjuran').click(function(e){
            e.preventDefault();
            $('#addKewangan').modal('show');
        });


        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $('.btnMuatNaik').click(function(e){
            e.preventDefault();
            // alert('TEST');
            var edit_data = {
                'proj_doc_perihal': $('#proj_doc_perihal').val(),
                'proj_doc_fail': $('#proj_doc_fail').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/permohonan/baru/upload",
                data: edit_data,
                contentType: false,
                // processData: false,
                dataType: "json",
                success: function (response) {
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value +
                                '</li>');
                        });

                    } else {
                        // alert();
                        $('#update_msgList').html("");
                        $('#addModal').find('input').val('');
                        $('#addModal').find('textarea').val('');
                        $('#addModal').modal('hide');
                        // fetchBandar();
                        swal({
                            title: "Dokumen Proje",
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
