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
            <div class="ibox-title bg-success">
                <h5>BELANJA</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right">@duit(275800)</h1>
                <div class="stat-percent font-bold text-info">20%</div>
                <small>Prestasi</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-warning">
                <h5>TANGGUNGAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right">@duit(106120)</h1>
                <div class="stat-percent font-bold text-navy">30% <i class="fa fa-level-up"></i></div>
                <small>Peratusan</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-info">
                <h5>PENJIMATAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right">@duit(86200)</h1>
                <div class="stat-percent font-bold text-success">5% <i class="fa fa-bolt"></i></div>
                <small>Peratusan</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox ">
            <div class="ibox-title bg-primary">
                {{-- <span class="label label-success float-right">{{ date('Y') }}</span> --}}
                <h5>PERUNTUKAN DILULUSKAN</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins text-right text-info"><b>@duit(40886200)</b></h1>
                <div class="stat-percent font-bold text-danger">20%</i></div>
                <small>Prestasi</small>
            </div>
        </div>
    </div>
</div>

{{-- CHART --}}
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5> PROGRAM / BAHAGIAN / INSTITUSI / JKN</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-3">
                        <ul class="stat-list">
                            <li>
                                <h2 class="no-margins">2,346</h2>
                                <small>Total orders in period</small>
                                <div class="stat-percent">48% <i class="fa fa-level-up text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 48%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">4,422</h2>
                                <small>Orders in last month</small>
                                <div class="stat-percent">60% <i class="fa fa-level-down text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">9,180</h2>
                                <small>Monthly income from orders</small>
                                <div class="stat-percent">22% <i class="fa fa-bolt text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 22%;" class="progress-bar"></div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
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
                <h5>Agihan Peruntukan Mengikut Program / Bahagian / Institusi / JKN Bagi BP00600 </h5>
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
                            <th>PROGRAM / BAHAGIAN / INSTITUSI / JKN </th>
                            <th class="text-right">DALAM SILING</th>
                            <th class="text-right">LUAR SILING</th>
                            <th class="text-right">PERUNTUKAN YANG DILULUSKAN </th>
                            <th>PRESTASI BELANJA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Johor</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Kedah</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Kelantan</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Melaka</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Negeri Sembilan</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Pahang</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Perlis</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Perak</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Pulau Pianng</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Selangor</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Terengganu</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Sabah</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Sarawak</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>W.P. Kuala Lumpur</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>W.P. Labuan</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>W.P. Putrajaya</td>
                            <td class="text-right">@duit(1250000)</td>
                            <td class="text-right">@duit(900000)</td>
                            <td class="text-right">@duit(2150000)</td>
                            <td><span class="pie">0.52,1.041</span></td>
                        </tr>
                        </tbody>
                    </table>
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
            [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
            [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
            [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
            [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
            [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
            [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
            [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
            [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
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
                // mode: "time",
                // tickSize: [3, "day"],
                // tickLength: 0,
                // axisLabel: "Date",
                // axisLabelUseCanvas: true,
                // axisLabelFontSizePixels: 12,
                // axisLabelFontFamily: 'Arial',
                // axisLabelPadding: 10,
                // color: "#d5d5d5"
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
                clolor: "#d5d5d5",
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
