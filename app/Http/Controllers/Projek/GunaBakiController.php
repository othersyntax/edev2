<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Projek\ProjekBaru;
use Carbon\Carbon;

class GunaBakiController extends Controller
{
    // public function index(Request $request){
    //     $queryType = 1; // default click pd menu
    //     if( $request->isMethod('post')) {
    //         $negeri =  $request->negeri;
    //         $fasiliti =  $request->fasiliti;
    //         $kategori  =  $request->kategori;
    //         $projekProgram  =  $request->projekProgram;
    //         $pelaksana  =  $request->pelaksana;
    //         $status  =  $request->status;
    //         $projek  =  $request->projek;
    //         // dd($request->method());
    //         session([
    //             'negeri' => $negeri,
    //             'fasiliti' => $fasiliti,
    //             'kategori' => $kategori,
    //             'projekProgram' => $projekProgram,
    //             'pelaksana' => $pelaksana,
    //             'status' => $status,
    //             'projek' => $projek,
    //         ]);
    //         $queryType = 2;
    //     }
    //     else{
    //         if( $request->has('page')) {
    //             $negeri = session('negeri');
    //             $fasiliti = session('fasiliti');
    //             $kategori = session('kategori');
    //             $projekProgram = session('projekProgram');
    //             $pelaksana = session('pelaksana');
    //             $status = session('status');
    //             $projek = session('projek');
    //             $queryType = 2;
    //         }
    //         else{
    //             session()->forget(['negeri', 'fasiliti', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
    //         }
    //     }

    //     if ($queryType == 1) {
    //         $query = \DB::table('tblprojek as a')
    //             ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
    //             ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
    //             ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
    //             ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
    //             ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama');
    //         if(auth()->user()->role==1){
    //             $projek = $query->where('a.proj_pemilik', auth()->user()->program_id)->paginate(15);
    //         }
    //         else{
    //             $projek = $query->paginate(15);
    //         }
    //         $jumlah =  $query->where('proj_status', 1)->sum('proj_kos_lulus');
    //         $jimat1 =  Projek::where('proj_status', 2)->sum('proj_kos_lulus');
    //         $jimat2 =  Projek::where('proj_status', 1)->sum('proj_penjimatan');
    //         // Belanja?
    //         // Tanggung?
    //         // Penjimatan kena ambil kira kos sebenar kurang

    //     }
    //     else{
    //         $query = \DB::table('tblprojek as a')
    //                 ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
    //                 ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
    //                 ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
    //                 ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
    //                 ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama')
    //                 ->where(function($q) use ($negeri, $fasiliti, $kategori, $projekProgram, $pelaksana, $status, $projek){
    //                     if(!empty($negeri)){
    //                         $q->where('a.proj_negeri',$negeri);
    //                     }
    //                     if(!empty($fasiliti)){
    //                         $q->where('a.proj_fasiliti_id',$fasiliti);
    //                     }
    //                     if(!empty($kategori)){
    //                         $q->where('a.proj_kategori_id',$kategori);
    //                     }
    //                     if(!empty($projekProgram)){
    //                         $q->where('a.proj_program',$projekProgram);
    //                     }
    //                     if(!empty($pelaksana)){
    //                         $q->where('a.proj_pelaksana',$pelaksana);
    //                     }
    //                     if(!empty($status)){
    //                         $q->where('a.proj_status',$status);
    //                     }
    //                     if(!empty($projek)){
    //                         $q->where('a.proj_nama','like', "%{$projek}%");
    //                     }
    //                 });
    //         if(auth()->user()->role==1){
    //             $projek = $query->where('a.proj_pemilik', auth()->user()->program_id)->paginate(15);
    //         }
    //         else{
    //             $projek = $query->paginate(15);
    //         }
    //         $jumlah =  $query->where('proj_status', 1)->sum('proj_kos_lulus');
    //         $jimat1 =  $query->where('proj_status', 2)->sum('proj_kos_lulus');
    //         $jimat2 =  $query->where('proj_status', 1)->sum('proj_penjimatan');
    //         // Belanja?
    //         // Tanggung?

    //     }
    //     // dd($projek);
    //     $data['jimat'] = $jimat1 + $jimat2;
    //     $data['projek'] = $projek;
    //     $data['jumlah'] = $jumlah;
    //     // dd($data);
    //     return view('app.projek.index', $data);
    // }

    public function create(){
        $bakulJimat = \DB::table('tblbakul_jimat as a')
                        ->join('tblprojek as b','a.bj_projek_id','b.projek_id')
                        ->select('a.*','b.proj_nama','b.proj_kod_subsetia')
                        ->where('a.bj_program_id', auth()->user()->program_id)
                        ->where('bj_status', 1)
                        ->get();
        $data['bakulJimat'] = $bakulJimat;
        // dd($data);
        return view('app.guna-baki.add', $data);
    }

    public function store(Request $req){
        $validated = $req->validate([
            'proj_negeri' => 'required',
            'proj_kod_subsetia' => 'required',
            'proj_fasiliti_id' => 'required',
            'proj_kategori_id' => 'required',
            'proj_struktur' => 'required',
            'proj_kos_mohon' => 'required',
            'proj_nama' => 'required',
            'proj_skop' => 'required',
            'proj_justifikasi' => 'required',
            'proj_ulasan_teknikal' => 'required',
        ],
        [
            'proj_negeri.required' => 'Sila pilih negeri',
            'proj_kod_subsetia.required' => 'Sila masukkan Kod Subsetia',
            'proj_fasiliti_id.required' => 'Sila pilih fasiliti',
            'proj_kategori_id.required' => 'Sila pilih kategori projek',
            'proj_struktur.required' => 'Adakah melibatkan struktur',
            'proj_kos_mohon.required' => 'Sila masukkan anggaran kos pelaksanaan',
            'proj_nama.required' => 'Sila nyatakan Nama Projek',
            'proj_skop.required' => 'Sila nyatakan Skop Projek',
            'proj_justifikasi.required' => 'Sila nyatakan Justifikasi Projek',
            'proj_ulasan_teknikal.required' => 'Sila nyatakan Ulasan Unit Kejuruteraan',
        ]);
        $dataID='';
        $i=0;

        foreach($req->sumberKewangan as $data){
            $id = explode('-', $data);
            if ($i == 0) {
                $dataID .= $id[0];
            }
            else{
                $dataID .= ','.$id[0];
            }
            $i++;

        }
        // dd($arrData);
        $projek = new ProjekBaru();
        $projek->proj_parent_id = $dataID;
        $projek->proj_negeri = $req->proj_negeri;
        $projek->proj_daerah = $req->proj_daerah;
        $projek->proj_fasiliti_id = $req->proj_fasiliti_id;
        $projek->proj_parlimen = 1;
        $projek->proj_dun = 1;
        $projek->proj_kod_agensi = $req->proj_kod_agensi;
        $projek->proj_kod_projek = $req->proj_kod_projek;
        $projek->proj_kod_setia = $req->proj_kod_setia;
        $projek->proj_kod_subsetia = $req->proj_kod_subsetia;
        $projek->proj_pemilik =auth()->user()->program_id;
        $projek->proj_pelaksana = $req->proj_pelaksana;
        if($req->proj_pelaksana==3){
            $projek->proj_pelaksana_agensi = $req->proj_pelaksana_agensi;
        }
        $projek->proj_struktur = $req->proj_struktur;
        $projek->proj_kos_mohon = $req->proj_kos_mohon;
        $projek->proj_tahun = $req->proj_tahun;
        $projek->proj_bulan = $req->proj_bulan;
        $projek->proj_laksana_mula = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_mula)->format('Y-m-d');
        $projek->proj_laksana_tamat = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_tamat)->format('Y-m-d');
        $projek->proj_kategori_id = $req->proj_kategori_id;
        $projek->proj_nama = $req->proj_nama;
        $projek->proj_skop = $req->proj_skop;
        $projek->proj_justifikasi = $req->proj_justifikasi;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_catatan = $req->proj_catatan;
        $projek->proj_created_by = auth()->user()->id;
        $projek->proj_updated_by = auth()->user()->id;
        // dd($projek);
        $projek->save();

        if($projek){
            // KEMASKINI BAKUL JIMAT-> HIDE LIST SELECTED
            $arrData = explode(',', $dataID);
            foreach($arrData as $ad){
                $bakul = \DB::table('tblbakul_jimat')->where('bj_projek_id', $ad)->update(array('bj_status' => 2));
            }

            if($bakul){
                return redirect('/permohonan/baru/papar/'.$projek->projek_id);
            }
            else{
                echo "GAGAL";
            }
            // echo "berjaya";

        }
    }
}
