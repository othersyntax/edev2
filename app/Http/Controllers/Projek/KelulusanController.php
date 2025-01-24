<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
use App\Models\Siling;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class KelulusanController extends Controller
{
    public function index(Request $request){
        $queryType = 1; // default click pd menu
        if( $request->isMethod('post')) {
            $negeri =  $request->negeri;
            $daerah =  $request->daerah;
            $fasiliti =  $request->fasiliti;
            $subsetia  =  $request->subsetia;
            $kategori  =  $request->kategori;
            $projekProgram  =  $request->projekProgram;
            $pelaksana  =  $request->pelaksana;
            $status  =  $request->status;
            $projek  =  $request->projek;

            session([
                'negeri' => $negeri,
                'daerah' => $daerah,
                'fasiliti' => $fasiliti,
                'subsetia' => $subsetia,
                'kategori' => $kategori,
                'projekProgram' => $projekProgram,
                'pelaksana' => $pelaksana,
                'status' => $status,
                'projek' => $projek,
            ]);

            $queryType = 2;
        }
        else{
            if($request->has('page')) {
                $negeri =  session('negeri');
                $daerah =  session('daerah');
                $fasiliti =  session('fasiliti');
                $subsetia  =  session('subsetia');
                $kategori  =  session('kategori');
                $projekProgram  =  session('projekProgram');
                $pelaksana  =  session('pelaksana');
                $status  =  session('status');
                $projek  =  session('projek');
                $queryType = 2;
            }
            else{
                session()->forget(['negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
            }
        }
        if ($queryType == 1) {
            $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                ->where('a.proj_status', '5')
                ->where('c.pro_siling', 'Siling')
                ->where('a.proj_tahun', '2025')
                ->orderBy('c.proj_kategori_id', 'ASC')->paginate(15);
        }
        else{
            $projek = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                    ->where('a.proj_status', '5')
                    ->where('c.pro_siling', 'Siling')
                    ->where('a.proj_tahun', '2025')
                    ->where(function($q) use ( $negeri, $daerah, $fasiliti, $pelaksana, $kategori, $status, $projek){
                        if(!empty($negeri)){
                            $q->where('a.proj_negeri', $negeri);
                        }
                        if(!empty($daerah)){
                            $q->where('a.proj_daerah', $daerah);
                        }
                        if(!empty($fasiliti)){
                            $q->where('a.proj_fasiliti_id',$fasiliti);
                        }
                        if(!empty($subsetia)){
                            $q->where('a.proj_kod_subsetia',$subsetia);
                        }
                        if(!empty($kategori)){
                            $q->where('a.proj_kategori_id',$kategori);
                        }
                        if(!empty($projekProgram)){
                            $q->where('a.proj_program',$projekProgram);
                        }
                        if(!empty($pelaksana)){
                            $q->where('a.proj_pelaksana',$pelaksana);
                        }
                        if(!empty($status)){
                            $q->where('a.proj_status',$status);
                        }
                        if(!empty($projek)){
                            $q->where('a.proj_nama','like', "%{$projek}%");
                        }
                    })
                    ->orderBy('c.proj_kategori_id', 'ASC')->paginate(15);
            // $sambung = $query->whereIn('a.proj_kategori_id', [1001,1002])->sum('a.proj_kos_mohon');
            // $jumlah = $query->sum('a.proj_kos_mohon');



        }
        $jumlah = ProjekBaru::where('proj_status', '5')->where('proj_tahun', 2025)->sum('proj_kos_lulus');
        $lulus = ProjekBaru::where('proj_status', '5')->where('proj_tahun', 2025)->where('proj_status', 5)->sum('proj_kos_lulus');
        $tolak = ProjekBaru::where('proj_status', '5')->where('proj_tahun', 2025)->where('proj_status', 6)->sum('proj_kos_lulus');
        $siling = Siling::where('sil_tahun', 2025)->sum('sil_amount');

        //PgressBar
        $lulusSemua = ProjekBaru::where('proj_tahun', 2025)->where('proj_status', 5)->sum('proj_kos_lulus');
        $lulusJKN = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblprogram as b', 'a.proj_pemilik', 'b.program_id')
                    ->where('a.proj_status', 5)
                    ->where('a.proj_tahun', 2025)
                    ->where('b.prog_kategori', 'JKN')
                    ->sum('a.proj_kos_lulus');

        $silingSemua = \DB::table('tblsiling as a')
                        ->leftJoin('tblprogram as b', 'a.sil_fasiliti_id', 'b.program_id')
                        ->where('a.sil_tahun', 2025)
                        ->where('b.prog_kategori', 'JKN')
                        ->sum('a.sil_amount');

        $data['lulusSemua']=$lulusSemua;
        $data['lulusJKN']=$lulusJKN;
        $data['silingSemua']=$silingSemua;
        // $siling=floatval($siling);
        // $jumlah = floatval($jumlah);
        $data['tolak'] = $tolak;
        $data['lulus'] = $lulus;
        $data['siling'] = $siling;
        $data['jumlah'] = $jumlah;
        $data['projek'] = $projek;
        // dd($data);
        return view('app.semak-permohonan.lulus', $data);
    }

    public function cetakPermohonan(string $id)
    {
        $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_sub_name', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_pelaksana', 'a.proj_pelaksana_agensi', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_nama_admin', 'a.proj_skop_admin', 'a.proj_justifikasi_admin', 'a.proj_catatan_admin','a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name')
                ->where('a.proj_pemilik', $id)
                ->where('c.pro_siling', 'Siling')
                ->where('a.proj_status', '5')
                ->orderBy('c.proj_kategori_id', 'ASC')
                ->get()->groupBy('pro_sub_name');
        // dd($projek);
        $pemilik = \DB::table('tblprogram')->where('program_id', $id)->select('prog_name')->first();
        $header = [
            'title' => 'SENARAI PROJEK DI BAWAH PERUNTUKAN BP00600 - NAIK TARAF, UBAH SUAI DAN PEMBAIKAN BAGI TAHUN 2025',
            'pemilik' => $pemilik->prog_name,
        ];

        $data['projek']= $projek;
        $data['header']= $header;

        $pdf = Pdf::loadView('app.semak-permohonan.pdf.kelulusan-asal1', $data)
            ->setPaper('a4', 'landscape'); // Set A4 size and landscape orientation

        // Adjust margins (top and bottom)
        $pdf->setOptions([
            'margin-top' => 10,  // Set top margin (in mm)
            'margin-bottom' => 10, // Set bottom margin (in mm)
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
        ]);

        // Return PDF for download
        return $pdf->stream('permohonan_baharu.pdf');
    }
}
