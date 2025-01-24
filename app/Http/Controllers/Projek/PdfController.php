<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function index()
    {
        $pemilik = \DB::table('tblprogram')->where('program_id', auth()->user()->program_id)->select('prog_name')->first();
        $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                ->where('c.pro_siling', 'Siling')
                ->where('proj_pemilik', auth()->user()->program_id)->orderBy('proj_sort', 'ASC')->get();
        $namaPemilik = $pemilik->prog_name;
        $header = [
            'title' => 'Senarai Projek Baharu',
            'pemilik' => $namaPemilik,
        ];

        $data['projek']= $projek;
        $data['header']= $header;
        // Render Blade view to PDF
        $pdf = Pdf::loadView('app.projek-baru.pdf.cetak', $data)->setPaper('a4', 'landscape');

        // Return PDF for download
        return $pdf->download('projek-baharu.pdf');
    }

    public function cetakPermohonan(string $id)
    {
        $pemilik = \DB::table('tblprogram')->where('program_id', $id)->select('prog_name')->first();
        $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_sub_name', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_skop', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                ->where('c.pro_siling', 'Siling')
                ->where('a.proj_pemilik', $id)
                ->orderBy('a.proj_sort', 'ASC')->get();
        $namaPemilik = $pemilik->prog_name;
        $header = [
            'title' => 'SENARAI PERMOHONAN PERUNTUKAN BP00600 TAHUN 2025',
            'pemilik' => $namaPemilik,
        ];

        $data['projek']= $projek;
        $data['header']= $header;
        // Render Blade view to PDF
        $pdf = Pdf::loadView('app.semak-permohonan.pdf.cetak', $data)->setPaper('a4', 'landscape');

        // Return PDF for download
        return $pdf->download('permohonan_baharu.pdf');
    }
}
