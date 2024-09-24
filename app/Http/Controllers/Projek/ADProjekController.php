<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Projek\Projek;
use App\Models\Projek\ProjekDetails;
use App\Models\Projek\ProjekUtilities;
use App\Models\BakulJimat;
use App\Models\Waran;

class ADProjekController extends Controller
{
    public function index(Request $request){
        $queryType = 1; // default click pd menu
        if( $request->isMethod('post')) {
            if(auth()->user()->role==1){
                $setProgram = auth()->user()->program_id;
            }
            else{
                $setProgram = $request->program;
            }
            $program  = $setProgram;
            $negeri =  $request->negeri;
            $fasiliti =  $request->fasiliti;
            $kategori  =  $request->kategori;
            $status  =  $request->status;
            $projek  =  $request->projek;
            // dd($request->method());
            session([
                'negeri' => $negeri,
                'fasiliti' => $fasiliti,
                'program' => $program,
                'kategori' => $kategori,
                'status' => $status,
                'projek' => $projek,
            ]);
            $queryType = 2;
        }
        else{
            if( $request->has('page')) {
                $program = session('program');
                $negeri = session('negeri');
                $fasiliti = session('fasiliti');
                $kategori = session('kategori');
                $status = session('status');
                $projek = session('projek');
                $queryType = 2;
            }
            else{
                session()->forget(['negeri', 'fasiliti', 'program', 'kategori', 'status', 'projek']);
            }
        }

        if ($queryType == 1) {
            $query = \DB::table('tblprojek as a')
                ->leftJoin('tblfasiliti as b','a.projek_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_program','d.program_id')
                ->leftJoin('tblfasiliti as e','a.projek_fasiliti_id','e.fas_ptj_code')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_program', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_middle', 'a.proj_kod_group', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name');
            $projek = $query->paginate(15);
            $jumlah =  $query->where('proj_status', 1)->sum('proj_kos_lulus');
            $jimat1 =  Projek::where('proj_status', 2)->sum('proj_kos_lulus');
            $jimat2 =  Projek::where('proj_status', 1)->sum('proj_penjimatan');
            // Belanja?
            // Tanggung?
            // Penjimatan kena ambil kira kos sebenar kurang

        }
        else{
            $query = \DB::table('tblprojek as a')
                    ->leftJoin('tblfasiliti as b','a.projek_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_program','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.projek_fasiliti_id','e.fas_ptj_code')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_program', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_middle', 'a.proj_kod_group', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name')
                    ->where(function($q) use ($negeri, $fasiliti, $program, $kategori, $status, $projek){
                        if(!empty($program)){
                            $q->where('a.proj_program','like', "%{$program}%");
                        }
                        if(!empty($negeri)){
                            $q->where('a.proj_negeri', 'like', "%{$negeri}%");
                        }
                        if(!empty($fasiliti)){
                            $q->where('a.projek_fasiliti_id',$fasiliti);
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

            $projek = $query->paginate(15);
            $jumlah =  $query->where('proj_status', 1)->sum('proj_kos_lulus');
            $jimat1 =  $query->where('proj_status', 2)->sum('proj_kos_lulus');
            $jimat2 =  $query->where('proj_status', 1)->sum('proj_penjimatan');
            // Belanja?
            // Tanggung?
            // dd($projek);
        }
        $data['jimat'] = $jimat1 + $jimat2;
        $data['projek'] = $projek;
        $data['jumlah'] = $jumlah;
        // dd($data);
        return view('app.projek.index', $data);
    }

    public function edit($id){
        $projek = Projek::find($id);
        $details = ProjekDetails::where('projd_projek_id', $id)->first();
        $data['details'] = $details;
        $data['projek'] = $projek;
        return view('app.projek.ubah', $data);
    }

    public function view($id){
        $projek = Projek::find($id);
        $details = ProjekDetails::where('projd_projek_id', $id)->get();
        $utilities = ProjekUtilities::where('projuti_projek_id', $id)->get();
        $waran = Waran::where('waran_projek_id', $id)->get();

        $data['projek'] = $projek;
        $data['details'] = $details;
        $data['waran'] = $waran;
        $data['utilities'] = $utilities;
        return view('app.projek.papar', $data);
    }

    public function store(Request $request){
        $projek = Projek::find($request->projek_id);
        // dd($projek);
        $projek->proj_program = $request->proj_program;
        $projek->proj_kod_agensi = $request->proj_kod_agensi;
        $projek->proj_kod_projek = $request->proj_kod_projek;
        $projek->proj_kod_middle = $request->proj_kod_middle;
        $projek->proj_kod_group = $request->proj_kod_group;
        $projek->proj_bulan = $request->proj_bulan;
        $projek->proj_tahun = $request->proj_tahun;
        $projek->proj_negeri = $request->proj_negeri;
        $projek->proj_nama = $request->proj_nama;
        $projek->proj_butiran = $request->proj_butiran;
        $projek->proj_catatan = $request->proj_catatan;
        $projek->proj_kos_lulus = $request->proj_kos_lulus;
        // $projek->proj_waran = $request->proj_waran;
        $projek->proj_penjimatan = $request->proj_penjimatan;
        $projek->proj_tangungan = $request->proj_tangungan;
        $projek->proj_kos_sebenar = $request->proj_kos_sebenar;
        $projek->proj_status = $request->proj_status;
        $projek->save();
        if($projek){
            // insert penjimatan
            if($request->proj_penjimatan>0){
                // cek rekod dah wujud belum
                $cek = BakulJimat::where('bj_projek_id',  $request->projek_id)->where('bj_program_id', $request->proj_program)->first();
                if($cek){
                    // Update bakul
                    $bakul = BakulJimat::find($cek->bakul_jimat_id);
                    $bakul->bj_amount_jimat = $request->proj_penjimatan;
                    $bakul->bj_updated_by = auth()->user()->id;
                    $bakul->save();
                }
                else{
                    // create bakul
                    $bakul = new BakulJimat();
                    $bakul->bj_projek_id = $request->projek_id;
                    $bakul->bj_program_id = $request->proj_program;
                    $bakul->bj_amount_jimat = $request->proj_penjimatan;
                    $bakul->bj_created_by = auth()->user()->id;
                    $bakul->bj_updated_by = auth()->user()->id;
                    $bakul->save();
                }
            }
            return redirect('/projek/senarai')->with(['success'=>'Rekod berjaya dikemaskini']);
        }
    }
}
