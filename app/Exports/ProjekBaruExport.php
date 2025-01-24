<?php

namespace App\Exports;

use App\Models\Projek\ProjekBaru;
use App\Models\Pentadbiran\Program;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProjekBaruExport implements FromView
{
    // private $projek;

    // public function __construct() {
    //     // $this->projek = \DB::table('tblprojek_baru as a')
    //     //         ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
    //     //         ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
    //     //         ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
    //     //         ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fas_ptj_code')
    //     //         ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
    //     //         ->where('c.pro_siling', 'Siling')
    //     //         ->where('proj_pemilik', auth()->user()->program_id)
    //     //         ->orderBy('proj_sort', 'ASC')->get();
    //     $this->projek = ProjekBaru::limit(5);
    // }

//     public function view(): View
//     {
//         return view('app.projek-baru.export');
//     }

    public function view(): View
    {
        $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblfasiliti as d','a.proj_fasiliti_id','d.fasiliti_id')
                ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                ->leftJoin('ddsa_kod_negeri as f','d.fas_negeri_id','f.neg_negeri_id')
                ->leftJoin('ddsa_kod_daerah as g','d.fas_daerah_id','g.dae_daerah_id')
                ->select('a.*', 'c.pro_kat_nama', 'd.fas_name','e.proj_prog_nama', 'f.neg_nama_negeri', 'g.dae_nama_daerah')
                ->where('c.pro_siling', 'Siling')
                ->where('a.proj_pemilik', auth()->user()->program_id)
                ->orderBy('a.proj_sort', 'ASC')->get();
        $header = Program::where('program_id', auth()->user()->program_id)->select('prog_name')->first();
        $data['header'] = $header;
        $data['projek'] = $projek;
        return view('app.projek-baru.export', $data);
    }

    public function cetak(string $id): View
    {
        $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblfasiliti as d','a.proj_fasiliti_id','d.fasiliti_id')
                ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                ->leftJoin('ddsa_kod_negeri as f','d.fas_negeri_id','f.neg_negeri_id')
                ->leftJoin('ddsa_kod_daerah as g','d.fas_daerah_id','g.dae_daerah_id')
                ->select('a.*', 'c.pro_kat_nama', 'd.fas_name','e.proj_prog_nama', 'f.neg_nama_negeri', 'g.dae_nama_daerah')
                ->where('c.pro_siling', 'Siling')
                ->where('a.proj_pemilik', $id)
                ->orderBy('a.proj_sort', 'ASC')->get();
        $header = Program::where('program_id', $id)->select('prog_name')->first();
        $data['header'] = $header;
        $data['projek'] = $projek;
        return view('app.projek-baru.export', $data);
    }

}
