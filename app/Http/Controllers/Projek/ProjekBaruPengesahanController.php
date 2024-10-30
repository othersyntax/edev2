<?php

namespace App\Http\Controllers\Projek;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
use App\Models\Siling;
use Illuminate\Support\Facades\DB;



class ProjekBaruPengesahanController extends Controller
{
    public function showList(){
        return view('app.projek-baru-pengesahan.index');
    }

    public function index(Request $request){
        $queryType = 1; // default click pd menu
        session()->forget(['negeri', 'pelaksana', 'fasiliti', 'kategori', 'status', 'projek']);

        if( $request->isMethod('post')) {
            $negeri =  $request->negeri;
            $daerah =  $request->daerah;
            $pelaksana  =  $request->pelaksana;
            $fasiliti =  $request->fasiliti;
            $kategori  =  $request->kategori;
            $status  =  $request->status;
            $projek  =  $request->projek;

            $queryType = 2;
        }
        else{
            session()->forget(['negeri', 'pelaksana', 'fasiliti', 'kategori', 'status', 'projek']);
        }

        if ($queryType == 1) {
            $query = DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fas_ptj_code')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                ->where('c.pro_siling', 'Siling')
                ->where('proj_pemilik', auth()->user()->program_id);

            $projek = $query->orderBy('proj_sort', 'ASC')->get();

        }
        else{
            $query = DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                    ->where('c.pro_siling', 'Siling')
                    ->where('proj_pemilik', auth()->user()->program_id)
                    ->where(function($q) use ($negeri, $daerah, $fasiliti, $pelaksana, $kategori, $status, $projek){
                        if(!empty($negeri)){
                            $q->where('a.proj_negeri', $negeri);
                        }
                        if(!empty($daerah)){
                            $q->where('a.proj_daerah', $daerah);
                        }
                        if(!empty($fasiliti)){
                            $q->where('a.proj_fasiliti_id',$fasiliti);
                        }
                        if(!empty($kategori)){
                            $q->where('a.proj_kategori_id',$kategori);
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
                    });
            $projek = $query->orderBy('proj_sort', 'ASC')->get();
            // dd($projek);
        }
        $siling = Siling::where('sil_fasiliti_id', auth()->user()->program_id)
                    ->where('sil_status', 1)
                    ->select('sil_amount', 'sil_tahun')->first();
                    // dd($siling);

        $jumlah = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->sum('proj_kos_mohon');
        $data['silingTahun'] = $siling->sil_tahun ? $siling->sil_tahun :'-';
        // dd($jumlah);
        $siling=floatval($siling->sil_amount);
        $jumlah = floatval($jumlah);
        $data['baki'] = $siling - $jumlah;
        $data['siling'] = $siling ? $siling :0.00;
        $data['jumlah'] = $jumlah;
        $data['projek'] = $projek;

        return response()->json([
            'data'=>$data,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
