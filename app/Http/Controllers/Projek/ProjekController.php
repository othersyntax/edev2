<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projek\Projek;
use App\Models\Projek\ProjekDetails;
use App\Models\Projek\ProjekUtilities;
use App\Models\Waran;

class ProjekController extends Controller
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
                $program = session('program');
                $kodProjek = session('kodProjek');
                $projek = session('projek');
                $queryType = 2;
            }
            else{
                session()->forget(['negeri', 'fasiliti', 'program', 'kodProjek', 'projek']);
            }
        }

        if ($queryType == 1) {
            $query = \DB::table('tblprojek as a')
                ->leftJoin('tblfasiliti as b','a.projek_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_program', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_middle', 'a.proj_kod_group', 'a.proj_bulan', 'a.proj_tahun', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status');
            $jumlah =  $query->sum('proj_kos_lulus');
            $projek = $query->paginate(15);

        }
        else{
            $query = \DB::table('tblprojek as a')
                    ->leftJoin('tblfasiliti as b','a.projek_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_program', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_middle', 'a.proj_kod_group', 'a.proj_bulan', 'a.proj_tahun', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'a.proj_kos_lulus')
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
            $jumlah =  $query->sum('proj_kos_lulus');
            $projek = $query->paginate(15);
            // dd($projek);
        }
        $data['projek'] = $projek;
        $data['jumlah'] = $jumlah;
        // dd($data);
        return view('app.projek.index', $data);
    }

    public function edit($id){
        $projek = Projek::find($id);
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
        $projek->proj_kos_sebenar = $request->proj_kos_sebenar;
        $projek->save();
        if($projek){
            return redirect('/projek/senarai')->with(['success'=>'Rekod berjaya dikemaskini']);
        }
    }
}
