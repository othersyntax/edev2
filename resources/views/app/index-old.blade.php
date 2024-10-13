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
                {{-- <span class="label label-success float-right">{{ date('Y') }}</span> --}}
                <h5>PERUNTUKAN (RM)</h5>
            </div>
            <div class="ibox-content">
                <small>Peruntukan Yang Diluluskan</small>
                <h1 class="no-margins text-right text-success"><strong>@duit(50000000)</strong></h1>
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
                <h1 class="no-margins text-right">@duit(0)</h1>
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-primary" style="width: 92.3%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">92.3%</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                <h5>BAKI (RM)</h5>
            </div>
            <div class="ibox-content">
                <small>Baki Peruntukan</small>
                <h1 class="no-margins text-right">@duit(0)</h1>
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-primary" style="width: 7.7%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">7.7%</div>
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
                <h1 class="no-margins text-right">@duit(0)</h1>
                <div class="progress mt-2">
                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 55.47%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">55.47%</div>
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
                    <h2 class="font-bold">0</h2>
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
                    <h2 class="font-bold">0</h2>
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
                    <h2 class="font-bold">0</h2>
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
                    <h2 class="font-bold">0</h2>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CHART --}}
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>PEMILIK</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                    </div>
                    <div class="col-sm-12 text-right">
                        <small class="text-info"><strong>PERHATIAN: </strong>Sila klik pada bar dan line chart untuk maklulmat lanjut</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- RESPONSIVE TABLE --}}
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Agihan Peruntukan Mengikut Pemilik Bagi BP00600 </h5>
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
                    <div class="col-sm-9 m-b-xs">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-sm" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-primary" type="button">Go!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>

                            <th>#</th>
                            <th>PEMILIK</th>
                            <th class="text-right">SILING (RM)</th>
                            <th class="text-right">LUAR SILING (RM)</th>
                            <th class="text-right">PERUNTUKAN YANG DILULUSKAN (RM)</th>
                            <th>PRESTASI BELANJA (%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Johor</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 35%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kedah</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 55%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">55%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kelantan</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 15%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"15%>15%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Melaka</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 5%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">5%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Negeri Sembilan</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 85%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">85%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Pahang</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 65%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">65%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Perlis</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 85%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">85%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Perak</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 55%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">55%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Pulau Pianng</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 15%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Selangor</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 40%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">40%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Terengganu</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 35%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Sabah</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 55%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">55%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Sarawak</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 15%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>W.P. Kuala Lumpur</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 50%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">50%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>W.P. Labuan</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 45%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">45%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>W.P. Putrajaya</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated progress-bar-info" style="width: 35%" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100">35%</div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="col-sm-12 text-right">
                        <small><strong>PERHATIAN: </strong>Peratusan prestasi belanja adalah diuukur mengikut Purata Perbelanjaan Nasional sehingga 31 Ogos 2024 iaitu: 30%</small>
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
    $(document).ready(function() {
        // $('.i-checks').iCheck({
        //     checkboxClass: 'icheckbox_square-green',
        //     radioClass: 'iradio_square-green',
        // });

        $('.chart').easyPieChart({
            barColor: '#f8ac59',
//                scaleColor: false,
            scaleLength: 5,
            lineWidth: 4,
            size: 80
        });

        $('.chart2').easyPieChart({
            barColor: '#1c84c6',
//                scaleColor: false,
            scaleLength: 5,
            lineWidth: 4,
            size: 80
        });

        var data2 = [
            [gd(2012, 1, 1), 688], [gd(2012, 1, 2), 450], [gd(2012, 1, 3), 550], [gd(2012, 1, 4), 500],
            [gd(2012, 1, 5), 350], [gd(2012, 1, 6), 320], [gd(2012, 1, 7), 500], [gd(2012, 1, 8), 400],
            [gd(2012, 1, 9), 250], [gd(2012, 1, 10), 500], [gd(2012, 1, 11), 550], [gd(2012, 1, 12), 650],
            [gd(2012, 1, 13), 300], [gd(2012, 1, 14), 500], [gd(2012, 1, 15), 600], [gd(2012, 1, 16), 700],
            [gd(2012, 1, 17), 200], [gd(2012, 1, 18), 400], [gd(2012, 1, 19), 800], [gd(2012, 1, 20), 700],
            [gd(2012, 1, 21), 600], [gd(2012, 1, 22), 290], [gd(2012, 1, 23), 600], [gd(2012, 1, 24), 420],
            [gd(2012, 1, 25), 700], [gd(2012, 1, 26), 250], [gd(2012, 1, 27), 700], [gd(2012, 1, 28), 880],
            [gd(2012, 1, 29), 100], [gd(2012, 1, 30), 300], [gd(2012, 1, 31), 800]
        ];

        var data3 = [
            [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
            [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
            [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
            [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
            [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
            [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
            [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
            [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
        ];


        var dataset = [
            {
                label: "Jumlah",
                data: data3,
                color: "#1ab394",
                bars: {
                    show: true,
                    align: "center",
                    barWidth: 24 * 60 * 60 * 600,
                    lineWidth:0
                }

            }, {
                label: "Belanja",
                data: data2,
                yaxis: 2,
                color: "#1C84C6",
                lines: {
                    lineWidth:1,
                        show: true,
                        fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.2
                        }, {
                            opacity: 0.4
                        }]
                    }
                },
                splines: {
                    show: false,
                    tension: 0.6,
                    lineWidth: 1,
                    fill: 0.1
                },
            }
        ];


        var options = {
            xaxis: {
                mode: "day",
                tickSize: [3, "day"],
                tickLength: 0,
                axisLabel: "Date",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Arial',
                axisLabelPadding: 10,
                color: "#d5d5d5"
            },
            yaxes: [{
                position: "left",
                max: 1070,
                color: "#d5d5d5",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Arial',
                axisLabelPadding: 3
            }, {
                position: "right",
                clolor: 'red',
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: ' Arial',
                axisLabelPadding: 67
            }
            ],
            legend: {
                noColumns: 1,
                labelBoxBorderColor: "#000000",
                position: "nw"
            },
            grid: {
                hoverable: false,
                borderWidth: 0
            }
        };

        function gd(year, month, day) {
            return new Date(year, month - 1, day).getTime();
        }

        var previousPoint = null, previousLabel = null;

        $.plot($("#flot-dashboard-chart"), dataset, options);
    });
</script>
@endsection
