<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\MaklumanGunaBaki;
use App\Mail\MaklumanGunaBakiLulus;
use Illuminate\Support\Facades\Mail;
use App\Models\Projek\ProjekBaru;
use App\Models\Projek\Projek;
use App\Models\Projek\Peruntukan;
use App\Models\BakulJimat;
use Carbon\Carbon;

class GunaBakiController extends Controller
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
            $query = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama')
                ->whereIn('a.proj_kategori_id', [1011,1012]);
            if(auth()->user()->role==1){
                $projek = $query->where('a.proj_pemilik', auth()->user()->program_id)->paginate(15);
            }
            else{
                $projek = $query->paginate(15);
            }
            // Belanja?
            // Tanggung?
            // Penjimatan kena ambil kira kos sebenar kurang

        }
        else{
            $query = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                    ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama')
                    ->whereIn('a.proj_kategori_id', [1011,1012])
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
                $projek = $query->where('a.proj_pemilik', auth()->user()->program_id)->paginate(15);
            }
            else{
                $projek = $query->paginate(15);
            }
            // Belanja?
            // Tanggung?

        }
        $data['projek'] = $projek;
        // dd($data);
        return view('app.guna-baki.index', $data);
    }

    public function create(){
        $bakulJimat = \DB::table('tblbakul_jimat')
                        ->where('bj_program_id', auth()->user()->program_id)
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
        $currAmaun = (float)$req->proj_kos_mohon;
        $jumBakiBakul=0;

        foreach($req->sumberKewangan as $data){
            $id = explode('-', $data);
            if ($i == 0) {
                $dataID .= $id[0];
            }
            else{
                $dataID .= ','.$id[0];
            }
            $jumBakiBakul += (float)$id[1];
            $i++;
        }
        if($req->proj_kuasa_pkn==1){
            $projek = new Projek();
            $projek->proj_kos_lulus = $req->proj_kos_mohon;
        }
        else{
            $projek = new ProjekBaru();
            $projek->proj_kos_mohon = $req->proj_kos_mohon;
        }

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
        $projek->proj_tahun = $req->proj_tahun;
        $projek->proj_bulan = $req->proj_bulan;
        $projek->proj_laksana_mula = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_mula)->format('Y-m-d');
        $projek->proj_laksana_tamat = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_tamat)->format('Y-m-d');
        $projek->proj_kategori_id = $req->proj_kategori_id;
        $projek->proj_nama = $req->proj_nama;
        $projek->proj_skop = $req->proj_skop;
        $projek->proj_justifikasi = $req->proj_justifikasi;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_catatan = $req->proj_catatan;
        $projek->proj_created_by = auth()->user()->id;
        $projek->proj_updated_by = auth()->user()->id;
        // dd($projek);
        $projek->save();

        if($projek){
            // KEMASKINI BAKUL JIMAT-> HIDE LIST SELECTED
            $arrData = explode('-', $dataID);
            foreach($arrData as $ad){
                $bakul = \DB::table('tblbakul_jimat')->where('bj_projek_id', $ad)->update(array('bj_status' => 2));
            }


            // CREATE BAKUL JIMAT BAHARU JIKA ADA BAKI
            if($currAmaun < $jumBakiBakul){
                $jumBakiBakul -=$currAmaun;

                $bakul = new BakulJimat();
                $bakul->bj_projek_id = $dataID;
                $bakul->bj_program_id = $projek->proj_pemilik;
                $bakul->bj_title = 'Baki kepada baki penjimatan projek : '.$dataID;
                $bakul->bj_subsetia = $req->proj_kod_setia;
                $bakul->bj_amount_jimat = $jumBakiBakul;
                $bakul->bj_kategori = 1;
                $bakul->bj_created_by = auth()->user()->id;
                $bakul->bj_updated_by = auth()->user()->id;
                $bakul->save();

            }
            // HANTAR EMEL PEMAKLUMAN KEPADA PTD PROJEK JIKA PKN=1 DAN REIDRECK TO PROJEK
            if($req->proj_kuasa_pkn==1){
                // INSERT MAKLUMAT PERUNTUKAN
                $prtkn = new Peruntukan();
                $prtkn->peru_projek_id = $projek->projek_id;
                $prtkn->peru_date = date('Y-m-d');
                $prtkn->peru_jenis_peruntukan = 3;
                $prtkn->peru_amaun = $req->proj_kos_mohon;
                $prtkn->peru_created_by = auth()->user()->id;
                $prtkn->peru_updated_by = auth()->user()->id;
                $prtkn->save();
                return redirect('/projek/papar/'.$projek->projek_id);
            }

            return redirect('/projek/baki/papar/'.$projek->projek_id);
        }
    }

    public function update(Request $req){
        $validated = $req->validate([
            'proj_negeri' => 'required',
            'proj_daerah' => 'required',
            'proj_fasiliti_id' => 'required',
            'proj_kod_subsetia' => 'required',
            'proj_program' => 'required',
            'proj_struktur' => 'required',
            'proj_laksana_mula' => 'required',
            'proj_laksana_tamat' => 'required',
            'proj_kos_mohon' => 'required',
            'proj_pelaksana_agensi' => 'required_if:proj_pelaksana,3,4',
            'proj_nama' => 'required',
            'proj_skop' => 'required',
            'proj_justifikasi' => 'required',
            'proj_ulasan_teknikal' => 'required',
        ],
        [
            'proj_negeri.required' => 'Sila pilih negeri',
            'proj_daerah.required' => 'Sila pilih daerah',
            'proj_fasiliti_id.required' => 'Sila pilih fasiliti',
            'proj_kod_subsetia.required' => 'Sila masukkan Kod Subsetia',
            'proj_program.required' => 'Sila pilih projek program',
            'proj_struktur.required' => 'Adakah melibatkan struktur',
            'proj_laksana_mula.required' => 'Sila masukkan tarikh mula pelaksanaan',
            'proj_laksana_tamat.required' => 'Sila masukkan tarikh tamatpelaksanaan',
            'proj_kos_mohon.required' => 'Sila masukkan anggaran kos pelaksanaan',
            'proj_pelaksana_agensi.required_if' => 'Sila Pilih Cawangan JKR',
            'proj_nama.required' => 'Sila nyatakan Nama Projek',
            'proj_skop.required' => 'Sila nyatakan Skop Projek',
            'proj_justifikasi.required' => 'Sila nyatakan Justifikasi Projek',
            'proj_ulasan_teknikal.required' => 'Sila nyatakan Ulasan Unit Kejuruteraan',
        ]);
        // dd($req->all());

        $projek = ProjekBaru::find($req->projek_id);
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
        $projek->proj_program = $req->proj_program;
        $projek->proj_pelaksana = $req->proj_pelaksana;
        if($req->proj_pelaksana==3 || $req->proj_pelaksana==4){
            $projek->proj_pelaksana_agensi = $req->proj_pelaksana_agensi;
        }
        $projek->proj_struktur = $req->proj_struktur;
        $projek->proj_kos_mohon = $req->proj_kos_mohon;
        $projek->proj_tahun = $req->proj_tahun;
        $projek->proj_bulan = $req->proj_bulan;
        $projek->proj_laksana_mula = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_mula)->format('Y-m-d');
        $projek->proj_laksana_tamat = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_tamat)->format('Y-m-d');
        $projek->proj_nama = $req->proj_nama;
        $projek->proj_skop = $req->proj_skop;
        $projek->proj_justifikasi = $req->proj_justifikasi;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_catatan = $req->proj_catatan;
        $projek->proj_updated_by = auth()->user()->id;
        // dd($projek);
        $projek->save();

        if($projek){
            return redirect('/projek/baki/senarai')
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Rekod permohonan berjaya dikemaskini',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/projek/baki/main/senarai')
            ->with([
                'title'=>'Gagal',
                'msg'=>'Rekod gagal dikemaskini',
                'type'=>'danger'
            ]);
        }
    }


    public function edit(string $id){
        $projek=ProjekBaru::find($id);
        $bakulJimat = Projek::whereIn('projek_id', [$projek->proj_parent_id])->get();

        $data['projek'] = $projek;
        $data['bakulJimat'] = $bakulJimat;
        return view('app.guna-baki.ubah', $data);
    }

    public function add2(string $id){
        $data['projek'] = ProjekBaru::find($id);
        return view('app.guna-baki.add2', $data);
    }

    public function mohon(string $id){
        $penerima = \DB::table('vwuserperanan')
            ->where('program_id', auth()->user()->program_id)
            ->orWhere('role', 2)
            ->select('email')->groupBy('email')->get();

        $arrPenerima = $penerima->toArray();
        $mail = Mail::to($arrPenerima)->send(new MaklumanGunaBaki());
        // dd($mail);
        if($mail){
            $updProjek = ProjekBaru::find($id);
            $updProjek->proj_status=2;
            $updProjek->proj_status_complete=2;
            $updProjek->save();


            return response()->json([
                'status'=>200,
                'message'=>'Pengesahan Berjaya dihantar'
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }

    public function pengesahan(Request $req){
        // UPDATE STATUS PERMOHONAN - SKIP SEMAK DAN SAH
        $projek = ProjekBaru::find($req->projek_id);
        // dd($req->all());
        // BY DEFAULT ANGGAP DAH SEMAK
        $projek->proj_wf_semak = 2;
        if($req->status_permohonan==1){
            $projek->proj_wf_sah = 2;
            $projek->proj_status = 3;
            $projek->proj_status_complete = 3;
        }
        else{
            $projek->proj_wf_sah = 3;
            $projek->proj_status = 3;
            $projek->proj_status_complete = 3;
        }
        $projek->save();

        // GET EMEL PENERIMA
        $penerima = \DB::table('vwuserperanan')
            ->where('program_id', $projek->proj_pemilik)
            ->select('email')->groupBy('email')->get();

        $arrPenerima = $penerima->toArray();
        // MOVE TO PEMANTAUAN
        if($req->status_permohonan==1){
            $copyProj = new Projek();
            $copyProj->proj_parent_id = $projek->proj_parent_id;
            $copyProj->proj_pemilik = $projek->proj_pemilik;
            $copyProj->proj_daerah = $projek->proj_daerah;
            $copyProj->proj_fasiliti_id = $projek->proj_fasiliti_id;
            $copyProj->proj_parlimen = $projek->proj_parlimen;
            $copyProj->proj_dun = $projek->proj_dun;
            $copyProj->proj_kod_agensi = $projek->proj_kod_agensi;
            $copyProj->proj_kod_projek = $projek->proj_kod_projek;
            $copyProj->proj_kod_setia = $projek->proj_kod_setia;
            $copyProj->proj_kod_subsetia = $projek->proj_kod_subsetia;
            $copyProj->proj_program = $projek->proj_program;
            $copyProj->proj_laksana_mula = $projek->proj_laksana_mula;
            $copyProj->proj_laksana_tamat = $projek->proj_laksana_tamat;
            $copyProj->proj_bulan = $projek->proj_bulan;
            $copyProj->proj_tahun = $projek->proj_tahun;
            $copyProj->proj_kategori_id = $projek->proj_kategori_id;
            $copyProj->proj_pelaksana = $projek->proj_pelaksana;
            $copyProj->proj_pelaksana_agensi = $projek->proj_pelaksana_agensi;
            $copyProj->proj_struktur = $projek->proj_struktur;
            $copyProj->proj_nama = $projek->proj_nama;
            $copyProj->proj_skop = $projek->proj_skop;
            $copyProj->proj_justifikasi = $projek->proj_justifikasi;
            $copyProj->proj_ulasan_teknikal = $projek->proj_ulasan_teknikal;
            $copyProj->proj_catatan = $projek->proj_catatan;
            $copyProj->proj_kos_lulus = $req->proj_kos_lulus;
            $copyProj->proj_waran =  $req->proj_kos_lulus;
            $copyProj->proj_kuasa_pkn = $projek->proj_kuasa_pkn;
            $copyProj->proj_created_by = $projek->proj_created_by;
            $copyProj->proj_updated_by = $projek->proj_updated_by;
            $copyProj->save();

            // HANTAR EMEL PEMBERITAHUAN KEPADA PEMOHON-BERJAYA
            $mail = Mail::to($arrPenerima)->send(new MaklumanGunaBakiLulus());

        }
        else{
            // HANTAR EMEL PEMBERITAHUAN KEPADA PEMOHON-GAGAL
        }
        return redirect('/projek/baki/senarai');
    }
}
