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
                            @if($cekSahProjek)
                                <button type="button" class="btn btn-xs btn-warning" id="sahProjek">
                                    <span id="sahButton"></span> Hantar Untuk Perakuan <i class="fa fa-envelope"></i>
                                </button>
                            @endif
                            <button type="button" class="btn btn-xs btn-primary" id="sahkanProjek">
                                Disahkan <i class="fa fa-check"></i>
                            </button>
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
                                <th width="15%">Fasiliti</th>
                                <th width="45%">Projek</th>
                                <th width="10%" class="text-right">Amaun (RM)</th>
                                <th width="5%" class="text-center">#<input type="checkbox" id="checkAll"></th>
                                <th width="10%" class="text-center">#</th>
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
                                        if($proj->proj_wf_semak==1){
                                            echo '<input type="checkbox" class="sahkan-checkbox" data-id="'.$proj->projek_id.'">';
                                        }
                                        else if($proj->proj_wf_semak==2){
                                            echo '<span class="badge badge-primary">Disahkan</span>';
                                        }
                                        else{
                                            echo '<span class="badge badge-warning">Tidak Disahkan</span>';
                                        }

                                    @endphp

                                </td>
                                <td class="text-center">
                                    <a href="/permohonan/baru/pengesahan/papar/{{ $proj->projek_id }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
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
    @if(Session::has('msg'))
        var title = "{{ Session::get('title') }}";
        var mesej = "{{ Session::get('msg') }}";
        var type = "{{ Session::get('type') }}";
        swal({
            title: title,
            text: mesej,
            type: type
        });
    @endif

    $(document).ready(function(){
        // CHECK ALL CHECKBOX
        $('#checkAll').change(function() {
            $('.sahkan-checkbox').prop('checked', this.checked);
        });

        $(document).on('click', '#sahkanProjek', function (e) {
            e.preventDefault();

            let selectedProjek = [];
            $('.sahkan-checkbox:checked').each(function() {
                let projekID = $(this).data('id');

                // Push user details to array
                selectedProjek.push({
                    id: projekID
                });
            });

            if (selectedProjek.length > 0) {
                $.ajax({
                    url: '/permohonan/baru/pengesahan-pukal',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // Include CSRF token
                        projek: selectedProjek
                    },
                    success: function (response) {
                        if (response.status === 200) {
                            swal({
                                title: "Berjaya!",
                                text: "Pengesahan Telah Berjaya, Sila hantar untuk Perakuan",
                                type: "success",
                                timer: 3000 // Auto close after 2 seconds
                            });
                            window.location.href = '/permohonan/baru/pengesahan';
                        }
                    }
                });
            }
            else{
                swal("Tiada Rekod", "Sila pilih sekurang-kurangnya satu rekod", "error");
            }
        });

       // HANTAR UNTUK PERAKUAN
        $(document).on('click', '#sahProjek', function (e) {
            e.preventDefault();
            document.getElementById("sahButton").classList.add("loading");
            document.getElementById("sahButton").classList.add("open-circle");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "/permohonan/baru/maklum-pengesahan",
                data: null,
                success: function (response) {
                    if (response.status == 400) {
                        swal("Gagal", response.message, "error");
                        document.getElementById("sahButton").classList.remove("loading");
                        document.getElementById("sahButton").classList.remove("open-circle");
                    } else {
                        // swal("Berjaya", "", "success");
                    //    swal({
                    //         title: "Berjaya!",
                    //         text: "Pengesahan Projek Telah Berjaya",
                    //         type: "success",
                    //         timer: 3000 // Auto close after 2 seconds
                    //     }).then(() => {
                            window.location.href = response.redirect_url;
                        // });

                    }
                }
            });
        });

    });

</script>
@endsection
