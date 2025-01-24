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
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #000; /* Border for table cells */
            padding: 2px;
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
    </style>
</head>
<body>
    <h3>{{ $header['title'] }}</h3>
    <p>Program / Bahagian / JKN / Institusi : {{ $header['pemilik'] }}</p>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kategori</th>
                <th>Projek</th>
                <th>Fasiliti</th>
                <th style="text-align: right;">Amaun (RM)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projek as $proj)
            <tr>
                <td>{{ $proj->proj_sort }}</td>
                <td>{{ $proj->pro_kat_short_nama }}</td>
                <td>{{ $proj->proj_nama }}</td>
                <td>{{ $proj->fas_name }}</td>
                <td style="text-align: right;">@duit($proj->proj_kos_mohon)</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
