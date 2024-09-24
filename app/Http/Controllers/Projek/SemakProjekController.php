<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
use App\Models\Projek\ProjekDokumen;
use App\Models\Projek\ProjekBaruUnjuran;
use App\Models\Siling;
use App\Mail\MaklumanProjekKecemasan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Mail\MaklumanPermohonanProjek;
use Illuminate\Support\Facades\DB;


class SemakProjekController extends Controller
{
    public function showList(){
        return view('app.semak-permohonan.index');
    }

    public function index(Request $request){
        $queryType = 1; // default click pd menu
        session()->forget(['program','negeri', 'pelaksana', 'fasiliti', 'kategori', 'status', 'projek']);
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
            $projek = DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fas_ptj_code')
                ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'e.fas_name')
                ->get();
        }
        else{
            $query = DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'e.fas_name')
                ->where(function($q) use ($program, $negeri, $fasiliti, $pelaksana, $kategori, $status, $projek){
                    if(!empty($program)){
                        $q->where('a.proj_pemilik', $program);
                    }
                    if(!empty($negeri)){
                        $q->where('a.proj_negeri', $negeri);
                    }
                    if(!empty($fasiliti)){
                        $q->where('a.projek_fasiliti_id',$fasiliti);
                    }
                    if(!empty($pelaksana)){
                        $q->where('a.proj_pelaksana',$pelaksana);
                    }
                    if(!empty($kategori)){
                        $q->where('a.proj_kategori_id',$kategori);
                    }
                    if(!empty($status)){
                        $q->where('a.proj_status',$status);
                    }
                    if(!empty($projek)){
                        $q->where('a.proj_nama','like', "%{$projek}%");
                    }
                });
            $projek = $query->get();
        }
        $siling = Siling::select('sil_amount')->first();
        $jumlah = ProjekBaru::sum('proj_kos_mohon');
        $tolak = ProjekBaru::where('proj_status', 3)->sum('proj_kos_mohon');
        // dd($jumlah);
        $data['baki'] = $siling->sil_amount - $jumlah;
        $data['siling'] = $siling->sil_amount;
        $data['jumlah'] = $jumlah;
        $data['projek'] = $projek;

        return response()->json([
            'data'=>$data,
        ]);
    }


    public function emel(){
        $mail = Mail::to('anas.fikhri@gmail.com')->send(new MaklumanPermohonanProjek());

        if($mail){
            // MaklumanPermohonanProjek::query()->update([
            //     'sil_emel'=>2
            // ]);
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya dihantar'
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }
}
