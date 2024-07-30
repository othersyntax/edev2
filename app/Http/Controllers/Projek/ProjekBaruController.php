<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
use Carbon\Carbon;

class ProjekBaruController extends Controller
{
    public function index(Request $request){
        $queryType = 1; // default click pd menu
        // Statistik

        if( $request->isMethod('post')) {
            $negeri =  $request->negeri;
            $program  =  $request->program;
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
            if( $request->has('page')) {
                $negeri = session('negeri');
                $pelaksana = session('pelaksana');
                $fasiliti = session('fasiliti');
                $kategori = session('kategori');
                $status = session('status');
                $projek = session('projek');
                $queryType = 2;
            }
            else{
                session()->forget(['negeri', 'program', 'pelaksana', 'fasiliti', 'kategori', 'status', 'projek']);
            }
        }

        if ($queryType == 1) {
            $query = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fas_ptj_code')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete');
            $jumlah =  $query->sum('proj_kos_mohon');
            $lulus =  ProjekBaru::where('proj_status', 2)->sum('proj_kos_mohon');
            $tolak =  ProjekBaru::where('proj_status', 3)->sum('proj_kos_mohon');
            $projek = $query->paginate(15);

        }
        else{
            $query = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fas_ptj_code')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
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
            $tolak =  ProjekBaru::where('proj_status', 2)->sum('proj_kos_mohon');
            $projek = $query->paginate(15);
            // dd($projek);
        }
        $data['tolak'] = 1500000 - $tolak;
        $data['lulus'] = $lulus;
        $data['projek'] = $projek;
        $data['jumlah'] = $jumlah;
        return view('app.projek-baru.index', $data);
    }

    public function create(){
        // $sil = Siling::where('sil_fasiliti_id', auth()->user()->program_id)
        //     ->where('sil_edate', '>', now())
        //     ->where('sil_status', 1)
        //     ->first();
        // if()
        return view('app.projek-baru.add');
    }

    public function store(Request $req){
        $addValidate[]="";
        $addMsgValidate[]="";
        if($req->proj_pelaksana==2){
            $addValidate = [
                'proj_pelaksana_agensi' => 'required',
            ];
            $addMsgValidate = [
                'proj_pelaksana_agensi.required' => 'Sila pilih agensi pelaksana',
            ];
        }

        $validated = $req->validate([
            'proj_kod_subsetia' => 'required',
            'proj_fasiliti_id' => 'required',
            'proj_struktur' => 'required',
            'proj_kos_mohon' => 'required',
            'proj_nama' => 'required',
            'proj_skop' => 'required',
            'proj_justifikasi' => 'required',
            'proj_ulasan_teknikal' => 'required',
        ],
        [
            'proj_kod_subsetia.required' => 'Sila masukkan Kod Subsetia',
            'proj_fasiliti_id.required' => 'Sila pilih fasiliti',
            'proj_struktur.required' => 'Adakah melibatkan struktur',
            'proj_kos_mohon.required' => 'Sila masukkan anggaran kos pelaksanaan',
            'proj_nama.required' => 'Sila nyatakan Nama Projek',
            'proj_skop.required' => 'Sila nyatakan Skop Projek',
            'proj_justifikasi.required' => 'Sila nyatakan Justifikasi Projek',
            'proj_ulasan_teknikal.required' => 'Sila nyatakan Ulasan Unit Kejuruteraan',
        ]);
        // dd($req->all());

        $projek = new ProjekBaru();
        $projek->proj_negeri = $req->proj_negeri;
        $projek->proj_parlimen = $req->proj_parlimen;
        $projek->proj_dun = $req->proj_dun;
        $projek->proj_kod_agensi = $req->proj_kod_agensi;
        $projek->proj_kod_projek = $req->proj_kod_projek;
        $projek->proj_kod_setia = $req->proj_kod_setia;
        $projek->proj_kod_subsetia = $req->proj_kod_subsetia;
        $projek->proj_pemilik = $req->proj_pemilik;
        $projek->proj_pelaksana = $req->proj_pelaksana;
        $projek->proj_pelaksana_agensi = $req->proj_pelaksana_agensi;
        $projek->proj_fasiliti_id = $req->proj_fasiliti_id;
        $projek->proj_kategori_id = $req->proj_kategori_id;
        $projek->proj_struktur = $req->proj_struktur;
        $projek->proj_bulan = $req->proj_bulan;
        $projek->proj_tahun = $req->proj_tahun;
        $projek->proj_nama = $req->proj_nama;
        $projek->proj_skop = $req->proj_skop;
        $projek->proj_justifikasi = $req->proj_justifikasi;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_catatan = $req->proj_catatan;
        $projek->proj_kos_mohon = $req->proj_kos_mohon;
        $projek->proj_laksana_mula = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_mula)->format('Y-m-d');
        // $projek->proj_laksana_mula = date('Y-m-d', strtotime($req->proj_laksana_mula));
        $projek->proj_laksana_tamat = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_tamat)->format('Y-m-d');
        $projek->proj_created_by = auth()->user()->id;
        $projek->proj_updated_by = auth()->user()->id;
        $projek->save();

        if($projek){
            // echo "berjaya";
            return redirect('/permohonan/baru/papar/'.$projek->projek_id);
        }

    }

    public function add2(string $id){
        $data['projek'] = ProjekBaru::find($id);
        return view('app.projek-baru.add2', $data);
    }

    public function upload(Request $req){
        $validator = Validator::make($req->all(), [
            'proj_doc_perihal'=>'required',
            'proj_doc_fail'=>'required|mimes:pdf,xlsx|max:2048',
        ],
        [
            'proj_doc_perihal.required'=>'Sila masukkan perihal dokumen',
            'proj_doc_fail.required'=>'Sila muat naik dokumen',
            // 'proj_doc_fail:mimes'=>'Hanya dokumen PDF, XLS sahaja dibenarkan',
            // 'proj_doc_fail:max'=>'Saiz maksimum dokumen adalah 2MB',
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $filename = time().'.'.$req->file->extension();

            $doc = new ProjekDokumen();
            $doc->proj_doc_perihal = $req->proj_doc_perihal;
            $doc->proj_doc_fail = $req->proj_doc_fail;
            $doc->save();

            if($doc){
                $req->file->move(public_path('permohonan/dokumen', $filename));
                return response()->json([
                    'status'=>200,
                    'message'=>'Berjaya ditambah'
                ]);
            }
        }

    }
}
