<?php

namespace App\Http\Controllers\Projek;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Projek\Projek;


class PemantauanPengurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
            // dd($request->method());
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
            if( $request->has('page')) {
                $negeri = session('negeri');
                $daerah = session('daerah');
                $fasiliti = session('fasiliti');
                $subsetia = session('subsetia');
                $kategori = session('kategori');
                $projekProgram = session('projekProgram');
                $pelaksana = session('pelaksana');
                $status = session('status');
                $projek = session('projek');
                $queryType = 2;
            }
            else{
                session()->forget(['negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
            }
        }

        if ($queryType == 1) {
            $query = DB::table('tblprojek as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama');
            if(auth()->user()->role==1){
                $projek = $query->orWhere('a.proj_pemilik', auth()->user()->program_id)
                          ->orWhere('a.proj_pelaksana_agensi', auth()->user()->program_id)->get();
            }
            else{
                $projek = $query->get();
            }
        }
        else{
            $query = DB::table('tblprojek as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                    ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama')
                    ->where(function($q) use ($negeri, $daerah, $fasiliti, $subsetia, $kategori, $projekProgram, $pelaksana, $status, $projek){
                        if(!empty($negeri)){
                            $q->where('a.proj_negeri',$negeri);
                        }
                        if(!empty($daerah)){
                            $q->where('a.proj_daerah',$daerah);
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
                    });
            if(auth()->user()->role==1){
                $projek = $query->orWhere('a.proj_pemilik', auth()->user()->program_id)
                          ->orWhere('a.proj_pelaksana_agensi', auth()->user()->program_id)->get();
            }
            else{
                $projek = $query->get();
            }
            // Belanja?
            // Tanggung?
        }
        $stats = Projek::where('proj_pemilik', auth()->user()->program_id)->where('proj_tahun', date('Y'));
        $jumlah =   $stats->whereIn('proj_status', [1,2,5])->sum('proj_waran');
        $lulus =   $stats->whereIn('proj_status', [1,2,5])->sum('proj_kos_lulus');
        $tangungan =   $stats->where('proj_status', [1,2,5])->sum('proj_kos_sebenar');
        // $jimat1 =  $stats->whereIn('proj_status', [3,4])->sum('proj_waran');
        // $jimat2 =   $stats->where('proj_status', 1)->sum('proj_penjimatan');
        $jimat = DB::table('tblbakul_jimat')
                ->where('bj_program_id', auth()->user()->program_id)
                ->whereIn('bj_kategori', [1,2])
                ->where('bj_status', 1)
                ->sum('bj_amount_jimat');
        // dd($belanja);
        // $belanja = \DB::table('tblprojek_bayaran as a')
        //             ->join('tblprojek as b','a.byr_projk_id','b.projek_id')
        //             ->where('b.proj_pemilik', auth()->user()->program_id)
        //             ->sum('a.byr_amount');
        // dd($belanja);
        $data['jimat'] = $jimat;
        $data['projek'] = $projek;
        $data['tangungan'] = $tangungan;
        $data['jumlah'] = $jumlah;
        $data['lulus'] = $lulus;

        // dd($data);
        return view('app.projek-pengurusan.index', $data);
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
