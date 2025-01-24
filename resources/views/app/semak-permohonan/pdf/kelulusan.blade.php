<!DOCTYPE html>
<html>
<head>
    <style>
        @page {
            margin: 100px 25px; /* Top, Right, Bottom, Left margins */
        }

        body {
            margin: 0;
            padding: 0;
        }

        .header {
            position: fixed;
            top: -80px;
            left: 0;
            right: 0;
            height: 50px;
            text-align: right;
            font-size: 12px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: left;
            font-size: 10px;
        }

        .content {
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .sizeFontTable{
            font-size:11px
        }

        .sizeFont{
            font-size:10px
        }
        .sizeFont2{
            font-size:12px
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
            width: 24%; /* Adjust width as needed */
        }

        .right {
            float: right;
            width: 72%; /* Adjust width as needed */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <p class="text-right text-bold sizeFont">Rujukan: KKM.400-4/2/31 Jilid 12 (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)<br>
            LAMPIRAN I</p>
    </div>

    <!-- Main Content -->
    <div class="content">
        <p class="sizeFontTable text-bold" style="text-align: center;">{{ $header['title'] }}</p>
        <div class="clearfix sizeFontTable">
            <div class="left">NAMA PROJEK</div>
            <div class="right">: NAIK TARAF, UBAH SUAI DAN PEMBAIKAN DI FASILITI KESIHATAN TAHUN 2025</div>
        </div>
        <div class="clearfix sizeFontTable">
            <div class="left">KOD PROJEK</div>
            <div class="right">: P42 00600 117 1001</div>
        </div>
        <div class="clearfix sizeFontTable">
            <div class="left">PROGRAM / BAHAGIAN / INSTITUSI / JKN</div>
            <div class="right">: {{ Str::upper($header['pemilik']) }}</div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Header 1</th>
                    <th>Header 2</th>
                    <th>Header 3</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 100; $i++)
                <tr>
                    <td>Row {{ $i }} - Col 1</td>
                    <td>Row {{ $i }} - Col 2</td>
                    <td>Row {{ $i }} - Col 3</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <!-- Footer -->
    <div class="footer">
        <script type="text/php">
            if (isset($pdf)) {
                $pdf->page_script('
                    $font = $fontMetrics->get_font("Arial, sans-serif");
                    $size = 8;
                    $pageText = "Muka surat " . $PAGE_NUM . " / " . $PAGE_COUNT;
                    $y = 550;
                    $x = 760;
                    $pdf->text($x, $y,$pageText, $font, $size);
                ');
            }
        </script>
    </div>
</body>
</html>
