@extends('layouts.main')
@section('title')
    Dashboard
@endsection
@section('custom-css')
    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">

    <link href="{{ asset("/template/css/plugins/iCheck/custom.css") }}" rel="stylesheet">
@endsection
@section('content')
{{-- TOP BOX AMOUNT --}}
<div class="row">
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <span class="label label-success float-right">{{ date('Y') }}</span>
                <h5>PERUNTUKAN (RM)</h5>
            </div>
            <div class="ibox-content">
                <small>Peruntukan Yang Diluluskan</small>
                <h1 class="no-margins text-right text-success"><strong>@duit($lulus)</strong></h1>
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-success" style="width: 100%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <h5>AGIHAN WARAN (RM)</h5>
            </div>
            <div class="ibox-content">
                <small>Jumlah Waran Yang Diagihkan</small>
                <h1 class="no-margins text-right">@duit($waran)</h1>
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-primary" style="width: 100%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <h5>BAKI (RM)</h5>
            </div>
            @php
                $baki = floatVal($lulus) - floatVal($belanja);
                $perBaki = $lulus>0 ? $baki / $lulus * 100 : 0;
                $perBelanja = $lulus>0 ? $belanja / $lulus * 100 : 0;
                $sedang = $bilangan - $selesai - $belumLaksana;
            @endphp
            <div class="ibox-content">
                <small>Baki Peruntukan</small>
                <h1 class="no-margins text-right">@duit($baki)</h1>
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-primary" style="width: {{ number_format($perBaki,2) }}%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">{{ number_format($perBaki,2) }}%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <h5>BELANJA (RM)</h5>
            </div>
            <div class="ibox-content">
                <small>Jumlah Yang Telah Dibelanjakan</small>
                <h1 class="no-margins text-right">@duit($belanja)</h1>
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: {{ number_format($perBelanja,2) }}%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">{{ number_format($perBelanja,2) }}%</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="widget style1 blue-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-tasks fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span class="text-uppercase">Jumlah Projek</span>
                    <h2 class="font-bold">{{ $bilangan }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-bookmark fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span class="text-uppercase">Pra Pelaksanaan</span>
                    <h2 class="font-bold">{{ $belumLaksana }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-bookmark fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span class="text-uppercase">Dalam Pelaksanaan</span>
                    <h2 class="font-bold">{{ $sedang }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="widget style1 lazur-bg">
            <div class="row">
                <div class="col-4">
                    <i class="fa fa-bookmark fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                    <span class="text-uppercase">Pasca Pelaksanaan</span>
                    <h2 class="font-bold">{{ $selesai }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- RESPONSIVE TABLE --}}
<div class="row">
    <div class="col-lg-4">
        <div class="ibox">
            <div class="ibox-title">
                <h5>PENGUMUMAN </h5>
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
                    <div class="col-sm-12">
                        <div class="alert alert-success">
                            <b>UNTUK MAKLUMAN</b><br>
                            Kerjasama semua pemilik projek dimohon untuk mengemaskini maklumat projek dan status pembayaran dari semasa ke semasa.<br>Terima kasih.<br><br>
                            <b>UNIT BAJET RMK</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>SENARAI TUGAS SAYA </h5>
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
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center" width="5%">#BIL</th>
                            <th width="80%">TINDAKAN</th>
                            <th class="text-center" width="15%">TARIKH</th>
                            <th class="text-center" width="5%">#</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $bil=1;
                            @endphp
                            @if ($mytask->count()>0)
                                @foreach ($mytask as $item)
                                    <tr>
                                        <td class="text-center">{{ $bil++ }}</td>
                                        <td><a href="{{ $item->task_link }}">{{ $item->task_desc }}</a></td>
                                        <td class="text-center">{{ date('d/m/Y', strtotime($item->task_date)) }}</td>
                                        <td class="text-center">
                                            <a href="{{ $item->task_link }}" class="btn btn-default btn-xs" title="Papar"><i class="fa fa-search text-warning"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5"><p class="text-center text-bold"><em>Tiada Rekod</em></p></td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Agihan Peruntukan Mengikut Kategori</h5>
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
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>KATEGORI</th>
                            <th class="text-right">SILING (RM)</th>
                            <th class="text-right">BELANJA (RM)</th>
                            <th class="text-right">BAKI (RM)</th>
                            <th>PRESTASI BELANJA (%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>Siling Fasa 1</td>
                            <td class="text-right">@duit(0)</td>
                            <td class="text-right">@duit(0)</td>
                            <td class="text-right">@duit(0)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 0%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>Siling Fasa 2</td>
                            <td class="text-right">@duit(0)</td>
                            <td class="text-right">@duit(0)</td>
                            <td class="text-right">@duit(0)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 0%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>Kecemasan</td>
                            <td class="text-right">@duit(0)</td>
                            <td class="text-right">@duit(0)</td>
                            <td class="text-right">@duit(0)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 0%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">0%</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="col-sm-12 text-right">
                        <small><strong>PERHATIAN: </strong>Peratusan prestasi belanja adalah diuukur mengikut Purata Perbelanjaan Nasional sehingga {{ date('d/m/Y')}} iaitu: 30%</small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
@section('custom-js')
<!-- Flot -->
<script src="{{ asset("/template/js/plugins/flot/jquery.flot.js") }}"></script>
<script src="{{ asset("/template/js/plugins/flot/jquery.flot.tooltip.min.js") }}"></script>
<script src="{{ asset("/template/js/plugins/flot/jquery.flot.spline.js") }}"></script>
<script src="{{ asset("/template/js/plugins/flot/jquery.flot.resize.js") }}"></script>
<script src="{{ asset("/template/js/plugins/flot/jquery.flot.pie.js") }}"></script>
<script src="{{ asset("/template/js/plugins/flot/jquery.flot.symbol.js") }}"></script>
<script src="{{ asset("/template/js/plugins/flot/jquery.flot.time.js") }}"></script>
<!-- jQuery UI -->
<script src="{{ asset("/template/js/plugins/jquery-ui/jquery-ui.min.js") }}"></script>

<script src="{{ asset("/template/js/inspinia.js") }}"></script>
<script src="{{ asset("/template/js/plugins/pace/pace.min.js") }}"></script>

<!-- Jvectormap -->
<script src="{{ asset("/template/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js") }}"></script>
<script src="{{ asset("/template/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}"></script>

<!-- EayPIE -->
<script src="{{ asset("/template/js/plugins/easypiechart/jquery.easypiechart.js") }}"></script>

<!-- Sparkline -->
<script src="{{ asset("/template/js/plugins/sparkline/jquery.sparkline.min.js") }}"></script>

<script>

</script>
@endsection
