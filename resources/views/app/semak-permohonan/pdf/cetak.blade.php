<!DOCTYPE html>
<html>
<head>
    <title>{{ $header['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #030303;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th, td {
            border: 1px solid #dbdada; /* Border for table cells */
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Light gray background for headers */
            font-weight: bold;
        }

        /* Optional: Styling for print-specific tables */
        .table-bordered {
            border: 1px solid #000;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #000;
        }

        /* For table content overflow */
        td {
            word-wrap: break-word;
        }

        .sizeFontTable{
            font-size:11px
        }

        .sizeFont{
            font-size:12px
        }
    </style>
</head>
<body>
    <p style="text-align: center;">
        <img src="{{ public_path("storage/img/3.png")}}" width="200px" class="image" alt="Logo eDE">
    </p>
    <h4 style="text-align: center;">{{ $header['title'] }}</h4>
    <h4>Program / Bahagian / Institusi / JKN : {{ $header['pemilik'] }}</h4>
    <table class="sizeFontTable">
        <thead>
            <tr style="height:10px">
                <th style="width: 3%; text-align: center;">No.</th>
                <th style="width: 10%;">Kategori</th>
                <th style="width: 15%;">Fasiliti</th>
                <th style="width: 32%;">Nama Projek</th>
                <th style="width: 40%;">Skop Kerja</th>
                <th style="width: 10%; text-align: right;">Amaun (RM)</th>
            </tr>
        </thead>
        <tbody>
            @php
                $jumlah =0;
            @endphp
            @foreach ($projek as $proj)
                <tr>
                    <td style="vertical-align: top; text-align: center;">{{ $proj->proj_sort }}</td>
                    <td style="vertical-align: top;">{{ $proj->pro_sub_name }}</td>
                    <td style="vertical-align: top;">{{ $proj->fas_name }}</td>
                    <td style="vertical-align: top;">{{ $proj->proj_nama }}</td>
                    <td style="vertical-align: top;">{{ $proj->proj_skop }}</td>
                    <td style="vertical-align: top; text-align: right;">@duit($proj->proj_kos_mohon)</td>
                </tr>
                @php
                    $jumlah +=$proj->proj_kos_mohon;
                @endphp
            @endforeach

        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" style="vertical-align: center; text-align: right;"><strong>Jumlah (RM)</strong></td>
                <td style="vertical-align: center; text-align: right;"><strong>@duit($jumlah)</strong></td>
            </tr>
        </tfoot>
    </table>
    <br><br>
    <p class="sizeFont">Tarikh Cetakan: {{ date('d-m-Y') }}</p>
</body>
</html>
