<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
class ProjekRuncitController extends Controller
{
    public function index(Request $request){
        $queryType = 1; // default click pd menu
        session()->forget(['negeri', 'program', 'pelaksana', 'fasiliti', 'kategori', 'status', 'projek']);
        // Statistik

        if( $request->isMethod('post')) {
            $program  =  $request->program;
            $negeri =  $request->negeri;
            $pelaksana  =  $request->pelaksana;
            $fasiliti =  $request->fasiliti;
            $kategori  =  $request->kategori;
            $status  =  $request->status;
            $projek  =  $request->projek;
            // dd($request->method());
            session([
                'negeri' => $negeri,
                'program' => $program,
                'pelaksana' => $pelaksana,
                'fasiliti' => $fasiliti,
                'kategori' => $kategori,
                'status' => $status,
                'projek' => $projek
            ]);
            $queryType = 2;
        }
        else{
            session()->forget(['negeri', 'program', 'pelaksana', 'fasiliti', 'kategori', 'status', 'projek']);
        }

        if ($queryType == 1) {
            $query = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fas_ptj_code')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                ->where('proj_pemilik', auth()->user()->program_id);

            $projek = $query->get();

        }
        else{
            $query = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                    ->where('proj_pemilik', auth()->user()->program_id)
                    ->where(function($q) use ($program, $negeri, $fasiliti, $pelaksana, $kategori, $status, $projek){
                        if(!empty($program)){
                            $q->where('a.proj_pemilik','like', "%{$program}%");
                        }
                        if(!empty($negeri)){
                            $q->where('a.proj_negeri', $negeri);
                        }
                        if(!empty($fasiliti)){
                            $q->where('a.projek_fasiliti_id',$fasiliti);
                        }
                        if(!empty($pelaksana)){
                            $q->where('a.proj_pelaksana_agensi',$pelaksana);
                        }
                        if(!empty($kategori)){
                            $q->where('a.proj_kod_group','like', "%{$kategori}%");
                        }
                        if(!empty($status)){
                            $q->where('a.proj_status',$status);
                        }
                        if(!empty($projek)){
                            $q->where('a.proj_nama','like', "%{$projek}%");
                        }
                    });
            $projek = $query->get();
            // dd($projek);
        }
        // $siling = Siling::where('sil_fasiliti_id', auth()->user()->program_id)->select('sil_amount')->first();
        // $jumlah = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->sum('proj_kos_mohon');
        // $tolak = ProjekBaru::where('proj_status', 3)->sum('proj_kos_mohon');
        // dd($jumlah);
        // $data['baki'] = $siling->sil_amount - $jumlah;
        // $data['siling'] = $siling->sil_amount;
        // $data['jumlah'] = $jumlah;
        $data['projek'] = $projek;

        return response()->json([
            'data'=>$data,
        ]);
    }

    public function create(){
        // $sil = Siling::where('sil_fasiliti_id', auth()->user()->program_id)
        //     ->where('sil_edate', '>', now())
        //     ->where('sil_status', 1)
        //     ->first();
        // if()
        return view('app.projek-runcit.add');
    }
}
