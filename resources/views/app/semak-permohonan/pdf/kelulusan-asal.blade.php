<!DOCTYPE html>
<html>
<head>
    <title>{{ $header['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        @page {
            margin: 50px;
        }

        h1 {
            color: #030303;
        }

        /* Table styling */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #dbdada; /* Border for table cells */
            padding: 5px;
            text-align: left;
            word-wrap: break-word; /* Ensure long words break correctly */
        }

        th {
            background-color: #a09e9e; /* Light gray background for headers */
            font-weight: bold;
        }

        /* Optional: Styling for print-specific tables */
        table .table-bordered {
            border: 1px solid #000;
        }

        table .table-bordered th,
        table .table-bordered td {
            border: 1px solid #000;
        }

        /* Prevent table headers from being cut */
        /* thead {
            display: table-header-group;
        } */

        /* Prevent table footers from being cut */
        /* tfoot {
            display: table-footer-group;
        } */

        /* Avoid cutting off content inside table rows */
        tr {
            page-break-inside: avoid;
        }

        .sizeFontTable{
            font-size:11px
        }

        .sizeFont{
            font-size:10px
        }
        .sizeFont2{
            font-size:13px
        }
        .text-right {
            text-align: right;
        }

        .text-bold {
            font-weight: bold;
        }

        .text-white {
            color: rgb(250, 250, 253); /* Sets the font color to blue */
        }

        .left {
            float: left;
            width: 26%; /* Adjust width as needed */
        }

        .right {
            float: right;
            width: 70%; /* Adjust width as needed */
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .thin-hr {
            height: 1px; /* Sets the line thickness */
            background-color: black; /* Sets the line color */
            border: none; /* Removes any default borders */
        }


        .header {
            position: fixed;
            top: -40px;
            left: 0;
            right: 0;
            margin bottom 30px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: right;
            font-size: 10px;
        }

        /* .page-number:after {
            content: counter(page) " daripada " counter(pages);
        } */

        .baris-baru {
            margin-bottom: 30px; /* or margin-top, margin-left, margin-right */
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class="header">
        <p class="text-right text-bold sizeFont">Rujukan: KKM.400-4/2/31 Jilid &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br>
        LAMPIRAN I</p>
    </div>
    <div class="table-container">
        <p class="sizeFont2 text-bold" style="text-align: center;">{{ $header['title'] }}</p>
        <div class="clearfix sizeFont2">
            <div class="left">NAMA PROJEK</div>
            <div class="right">: NAIK TARAF, UBAH SUAI DAN PEMBAIKAN DI FASILITI KESIHATAN TAHUN 2025</div>
        </div>
        <div class="clearfix sizeFont2">
            <div class="left">KOD PROJEK</div>
            <div class="right">: P42 00600 117 1001</div>
        </div>
        <div class="clearfix sizeFont2">
            <div class="left">PROGRAM / BAHAGIAN / INSTITUSI / JKN</div>
            <div class="right">: {{ Str::upper($header['pemilik']) }}</div>
        </div>

        <table class="table sizeFontTable">
            <thead>
                <tr style="height:10px">
                    <th style="width: 3%; text-align: center;">BIL.</th>
                    <th style="width: 18%;">NAMA PROJEK</th>
                    <th style="width: 30%;">SKOP PROJEK</th>
                    <th style="width: 27%;">JUSTIFIKASI PROJEK</th>
                    <th style="width: 10%;">AGENSI PELAKSANA</th>
                    <th style="width: 5%; text-align: right;">ANGGARAN KOS (RM)</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $jumlah =0;
                    $bilTotal=0;
                @endphp
                @foreach($projek as $kategori => $projall)
                    @php
                        $subJum = 0;
                        $bil=1;
                    @endphp
                    @foreach ($projall as $proj)
                        <tr>
                            <td style="vertical-align: top; text-align: center;">{{ $bil++ }}</td>
                            <td style="vertical-align: top;">
				{{ $proj->proj_nama_admin }}<br>
				@if($proj->proj_catatan_admin <> '')
				    <small><i>(Catatan: {{ $proj->proj_catatan_admin }})</i></small>
				@endif
			    </td>
                            <td style="vertical-align: top;">{!! $proj->proj_skop_admin !!}</td>
                            <td style="vertical-align: top;">{!! $proj->proj_justifikasi_admin !!}</td>
                            <td style="vertical-align: top;">
                                @if ($proj->proj_pelaksana ==1)
                                    {{ getProgram($proj->proj_pemilik) }}
                                @elseif ($proj->proj_pelaksana ==2)
                                    {{ getPelaksana($proj->proj_pelaksana) }}
                                @else
                                    {{ getProgram($proj->proj_pelaksana_agensi) }}
                                @endif
			    </td>
                            <td style="vertical-align: top; text-align: right;">@duit($proj->proj_kos_lulus)</td>
                        </tr>
                        @php
                            $subJum +=$proj->proj_kos_lulus;
                            $jumlah +=$proj->proj_kos_lulus;
                            $bilTotal++
                        @endphp
                    @endforeach
                    <tr class="text-bold">
                        <td colspan="5" class="text-bold text-bold" style="vertical-align: center; text-align: right;">JUMLAH PROJEK {{ Str::upper($kategori) }}</td>
                        <td class="text-bold text-bold" style="vertical-align: center; text-align: right;">@duit($subJum)</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="text-white" style="background-color: #07034f;">
                    <td class="text-bold" style="vertical-align: center; text-align: center;">{{ $bilTotal }}</td>
                    <td colspan="4" class="text-bold" style="vertical-align: center; text-align: right;">JUMLAH KESELURUHAN (RM)</td>
                    <td class="text-bold" style="vertical-align: center; text-align: right;">@duit($jumlah)</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="page-break"></div>
    <p class="sizeFont2 text-bold">KEPUTUSAN DAN ULASAN PEGAWAI PENGAWAL</p><br>
    <p class="sizeFont2" style="text-align: justify;">
        Saya <strong>BERSETUJU / TIDAK BERSETUJU</strong> dengan cadangan agihan siling peruntukan pembangunan BP00600 - Naik Taraf, Ubah Suai dan Pembaikan tahun 2025 di bawah kod projek P42 00600 117 1001 bagi <strong>{{ $header['pemilik'] }}</strong> dengan kos keseluruhan sebanyak <strong>RM</strong><strong>@duit($jumlah)</strong>.
    </p>
    <p class="sizeFont2 baris-baru">ULASAN :</p>
    <hr class="thin-hr baris-baru">
    <hr class="thin-hr baris-baru">
    <p class="sizeFont2 text-bold" style="text-align: center; margin-top: 100px">
        ............................................................................<br>
        (DATO' SRI SURIANI BINTI DATO' AHMAD) <br>
        Ketua Setiausaha <br>
        Kementerian Kesihatan Malaysia <br><br>
        <span style="margin-right: 150px;">Tarikh:</span>
    </p>
    <div class="footer1">
        <script type="text/php">
            if (isset($pdf)) {
                $pdf->page_script('
                    $font = $fontMetrics->get_font("Arial, sans-serif");
                    $size = 8;
                    $pageText = "Muka surat " .$PAGE_NUM . " / " . $PAGE_COUNT;
                    $y = 560;
                    $x = 745;
                    $pdf->text($x, $y,$pageText, $font, $size);
                ');
            }
        </script>
        {{-- Muka surat <span class="page-number"></span> --}}
    </div>
</body>
</html>
