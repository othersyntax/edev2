@extends('layouts.main')
@section('title')
    Permohonan Projek
@endsection
@section('custom-css')
    <link href="{{ asset("/template/css/plugins/footable/footable.core.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/plugins/datapicker/datepicker3.css") }}" rel="stylesheet">
    <!-- Text spinners style -->
    <link href="{{ asset("/template/css/plugins/textSpinners/spinners.css") }}" rel="stylesheet">
@endsection

@section('breadcrumb')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Senarai Permohonan Projek</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Projek</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Pengesahan</strong>
            </li>
        </ol>
    </div>
</div>
@endsection

@section('content')
{{-- @inject('SilingTrait', 'App\Traits\Projek\SilingTrait') --}}
<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <span id="siling-tahun" class="label label-success float-right">2024</span>
                <h5>SILING (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="siling">0.00</b></h1>
                <div class="stat-percent font-bold text-success" id="siling-tarikh">
                </div>
                <small>Tempoh</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>REVOTE / SAMBUNGAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="sambung">0.00</b></h1>
                <div class="stat-percent font-bold text-success peratusSambung">
                    0%
                </div>
                <small>Peratusan</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>BAKI SILING (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="baki">0.00</b></h1>
                <div class="stat-percent font-bold text-success peratusBaki">
                    0%
                </div>
                <small>Peratusan</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-success">
                <h5>JUMLAH (RM)</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right"><b id="jumlah">0.00</b></h1>
                <div class="stat-percent font-bold text-success peratusMohon">
                    0%
                </div>
                <small>Peratusan</small>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>Senarai Projek</h5>
                <div class="ibox-tools">
                    @if(cekSiling(auth()->user()->program_id))
                        @hasanyrole(['pengesah'])
                            @if(true)
                                <button type="button" class="btn btn-xs btn-warning" id="hantarProjek">
                                    <span id="perakuButton"></span> Hantar Permohonan <i class="fa fa-envelope"></i>
                                </button>
                            @endif
                        @endhasanyrole
                    @endif
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <input type="hidden" id="bil-rekod">
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
				                <th width="5%" class="text-center">Keutamaan</th>
                                <th width="10%">Kategori</th>
                                <th width="20%">Fasiliti</th>
                                <th width="50%">Projek</th>
                                <th width="10%" class="text-right">Amaun (RM)</th>
                                <th width="5%" class="text-center">Status</th>
                            </tr>
                        </thead>
                        @foreach ($projek as $proj)
                            <tr>
                                <td class="text-center">{{ $proj->proj_sort }}</td>
                                <td>{{ $proj->pro_kat_short_nama }}</td>
                                <td>{{ $proj->fas_name }}</td>
                                <td>{{ $proj->proj_nama }}</td>
                                <td class="text-right">@duit($proj->proj_kos_mohon)</td>
                                <td class="text-center">
                                    @php
                                        if($proj->proj_wf_sah==1){
                                            echo '<input type="checkbox" class="peraku-checkbox" data-id="'.$proj->projek_id.'">';
                                        }
                                        else if($proj->proj_wf_sah==2){
                                            echo '<span class="badge badge-primary">Diperaku</span>';
                                        }
                                        else{
                                            echo '<span class="badge badge-warning">Tidak Diperaku</span>';
                                        }

                                    @endphp

                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('custom-js')
<!-- Date range picker -->
<script src="{{ asset("/template/js/plugins/datapicker/bootstrap-datepicker.js") }}"></script>
<script>
// HANTAR UNTUK PERAKUAN
$(document).on('click', '#hantarProjek', function (e) {
    e.preventDefault();
    document.getElementById("perakuButton").classList.add("loading");
    document.getElementById("perakuButton").classList.add("open-circle");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "post",
        url: "/permohonan/baru/maklum-hantar",
        data: null,
        success: function (response) {
            if (response.status == 400) {
                swal("Gagal", response.message, "error");
                document.getElementById("sahButton").classList.remove("loading");
                document.getElementById("sahButton").classList.remove("open-circle");
            } else {
                window.location.href = '/permohonan/baru/main';
            }
        }
    });
});

</script>
@endsection
