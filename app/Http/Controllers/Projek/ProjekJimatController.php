<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
use App\Models\BakulJimat;

class ProjekJimatController extends Controller
{
    public function index(Request $request){
        $queryType = 1; // default click pd menu
        // Statistik

        if( $request->isMethod('post')) {
            $negeri =  $request->negeri;
            $fasiliti =  $request->fasiliti;
            $program  =  $request->program;
            $kodProjek  =  $request->kodProjek;
            $projek  =  $request->projek;
            // dd($request->method());
            session([
                'negeri' => $negeri,
                'fasiliti' => $fasiliti,
                'program' => $program,
                'kodProjek' => $kodProjek,
                'projek' => $projek,
            ]);
            $queryType = 2;
        }
        else{
            if( $request->has('page')) {
                $negeri = session('negeri');
                $fasiliti = session('fasiliti');
                $kodProjek = session('kodProjek');
                $projek = session('projek');
                $queryType = 2;
            }
            else{
                session()->forget(['negeri', 'fasiliti', 'kodProjek', 'projek']);
            }
        }

        if ($queryType == 1) {
            $query = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.projek_fasiliti_id','b.fasiliti_id')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_program','d.program_id')
                ->leftJoin('tblfasiliti as e','a.projek_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_program', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_middle', 'a.proj_kod_group', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name');
            $jumlah =  $query->sum('proj_kos_mohon');
            $lulus =  ProjekBaru::where('proj_status', 2)->sum('proj_kos_mohon');
            $tolak =  ProjekBaru::where('proj_status', 3)->sum('proj_kos_mohon');
            $projek = $query->paginate(15);

        }
        else{
            $query = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.projek_fasiliti_id','b.fasiliti_id')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_program','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.projek_fasiliti_id','e.fasiliti_id')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_program', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_middle', 'a.proj_kod_group', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name')
                    ->where(function($q) use ($negeri, $fasiliti, $program, $kodProjek, $projek){
                        if(!empty($negeri)){
                            $q->where('a.proj_negeri', $negeri);
                        }
                        if(!empty($fasiliti)){
                            $q->where('a.projek_fasiliti_id',$fasiliti);
                        }
                        if(!empty($program)){
                            $q->where('a.proj_program','like', "%{$program}%");
                        }
                        if(!empty($kodProjek)){
                            $q->where('a.proj_kod_group','like', "%{$kodProjek}%");
                        }
                        if(!empty($projek)){
                            $q->where('a.proj_nama','like', "%{$projek}%");
                        }
                    });
            $jumlah =  $query->sum('proj_kos_mohon');
            $lulus =  ProjekBaru::where('proj_status', 2)->sum('proj_kos_mohon');
            $tolak =  ProjekBaru::where('proj_status', 3)->sum('proj_kos_mohon');
            $projek = $query->paginate(15);
            // dd($projek);
        }
        $data['tolak'] = $tolak;
        $data['lulus'] = $lulus;
        $data['projek'] = $projek;
        $data['jumlah'] = $jumlah;
        return view('app.projek-penjimatan.index', $data);
    }

    public function create(){
        $bakulJimat = \DB::table('tblbakul_jimat as a')
                        ->join('tblprojek as b','a.bj_projek_id','b.projek_id')
                        ->select('a.*','b.proj_nama','b.proj_kod_subsetia')
                        // ->where('a.bj_program_id', auth()->user()->program_id)
                        ->get();
        $data['bakulJimat'] = $bakulJimat;
        // dd($data);
        return view('app.projek-penjimatan.add', $data);
    }

    public function update(Request $request){
        $bakul = BakulJimat::find($request->bakul_jimat_id);
        $bakul->bj_title = $request->bj_title;
        $bakul->bj_subsetia = $request->bj_subsetia;
        $bakul->bj_kategori = $request->bj_kategori;
        $bakul->bj_amount_jimat = $request->bj_amount_jimat;
        $bakul->bj_status = $request->bj_status;
        $bakul->bj_created_by = auth()->user()->id;
        $bakul->bj_updated_by = auth()->user()->id;
        $bakul->save();
        if($bakul)
        {
            return response()->json([
                'status'=>200,
                'message'=>'Penjimatan Berjaya Dikemaskini'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }

    public function edit(string $id){
        $bakulJimat = BakulJimat::find($id);
        if($bakulJimat)
        {
            return response()->json([
                'status'=>200,
                'jimat'=> $bakulJimat,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }

    public function delete(string $id){
        $bakulJimat = BakulJimat::find($id);
        if($bakulJimat)
        {
            $bakulJimat->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Maklumat penjimatan.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Maklumat Penjimatan Tidak Wujud'
            ]);
        }
    }
}
