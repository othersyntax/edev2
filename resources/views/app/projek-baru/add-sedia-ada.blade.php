@extends('layouts.main')
@section('title')
    Permohonan Baharu
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
    <link href="{{ asset('/template/css/plugins/footable/footable.core.css') }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Projek Sambungan / Revote</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Sambungan / Revote</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>1. MAKLUMAT PROJEK REVOTE / SAMBUNGAN</h5>
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
                    <div class="col-sm-8">
                        <small>** Hanya projek yang masih aktif sahaja yang akan dipaparkan. Sila pastikan semua maklumat status projek telah dikemaskini</small>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control form-control-sm m-b-xs" id="filter2" placeholder="Cari projek">
                    </div>
                </div>

                <table class="footable2 table table-stripped" data-page-size="10" data-filter=#filter2>
                    <thead>
                        <tr>
                            <th width="5%" class="text-center">#Bil</th>
                            <th width="50%">Projek</th>
                            <th width="20%" class="text-center">Pelaksana</th>
                            <th width="10%" class="text-center">Kod Subsetia</th>
                            <th class="text-right" width="10%">Kos Yang Diluluskan</th>
                            <th width="5%" class="text-center">Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($projek->count()>0)
                            @php
                                $bil=1;
                            @endphp
                            @foreach ($projek as $proj)
                                <tr>
                                    <td class="text-center">{{ $bil++ }}</td>
                                    <td>{{ $proj->proj_nama }}</td>
                                    <td class="text-center">{{ $proj->proj_kod_subsetia }}</td>
                                    <td class="text-center">{{ $proj->proj_kod_subsetia }}</td>
                                    <td class="text-right">@duit($proj->proj_kos_lulus)</td>
                                    <td class="text-center">
                                        <div><label><input name="projekSediaAda" id="{{ $proj->projek_id }}" type="radio" value="{{ $proj->projek_id }}"></label></div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="font-italic text-small text-center">Tiada Rekod</td>
                            </tr>
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">
                                <ul class="pagination float-right"></ul>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>2. PENGESAHAN DAN PERAKUAN</h5>
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
                <fieldset>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">Saya mengesahkan bahawa projek yang dipilih adalah projek yang tidak dapat dinayar pada tahun semasa dan projek yang masih dalam pelaksanaan.</label>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="ibox-content">
            <div class="form-group row">
                <div class="col-sm-4 col-sm-offset-2">
                    <a href="/permohonan/baru/main" class="btn btn-white btn-sm">Batal</a>
                    <button class="btn btn-primary btn-sm float-end pilihProjek" type="button">Pilih</button>
                    {{-- <button class="btn btn-info btn-sm" type="submit">Simpan dan Salin</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@include('app/guna-baki/_modal/update_bakul')
@endsection
@section('custom-js')
<!-- Date picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/template/js/plugins/select2/select2.full.min.js") }}"></script>
<script src="{{ asset('/template/js/plugins/footable/footable.all.min.js') }}"></script>
<script>
    $(document).ready(function(){

        $('.footable').footable();
        $('.footable2').footable();

        // $('form').on('submit', function() {
        //     let checked = $('input[name="acceptTerms"]:checked').length;
        //     if (checked == 0) {
        //         swal("Pengesahan", "Sila sahkan perakuan di Para 2", "error");
        //         return false;
        //     }
        //     return true;

        // });/permohonan/baru/salin/{id}
        $('.pilihProjek').on('click', function() {
            let checked = $('input[name="acceptTerms"]:checked').length;
            if (checked == 0) {
                swal("Pengesahan", "Sila sahkan perakuan di Para 2", "error");
                return false;
            }
            else{
                let projek = $('input[name="projekSediaAda"]:checked').val();
                // alert(projek);
                window.location.href = "/permohonan/baru/salin/" + projek + "/sambung";
            }

        });

    });
</script>

@endsection
