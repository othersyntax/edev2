<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\ExportProjek; // Masukkan kelas ExportProjek
use Maatwebsite\Excel\Facades\Excel; // Masukkan facade Excel

class ProjekExportController extends Controller
{
    public function export()
{
    return Excel::download(new ExportProjek, 'Senarai_Projek.xlsx'); // Eksport ke Excel
}

}
