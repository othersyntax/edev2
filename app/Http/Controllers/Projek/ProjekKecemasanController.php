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


class ProjekKecemasanController extends Controller
{
    public function showList(){
        return view('app.kecemasan.index');
    }

    public function index(Request $request){
        $queryType = 1; // default click pd menu
        session()->forget(['negeri', 'pelaksana', 'fasiliti', 'kategori', 'status', 'projek']);
        // Statistik

        if( $request->isMethod('post')) {
            $program  =  auth()->user()->program_id;
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
                ->where('c.pro_siling', 'Luar Siling')
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
                    ->where('c.pro_siling', 'Luar Siling')
                    ->where('proj_pemilik', auth()->user()->program_id)
                    ->where(function($q) use ($program, $negeri, $fasiliti, $pelaksana, $kategori, $status, $projek){
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
            // dd($projek);
        }
        $siling = Siling::where('sil_fasiliti_id', auth()->user()->program_id)->select('sil_amount')->first();
        $jumlah = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->sum('proj_kos_mohon');
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

    public function create(){
        return view('app.kecemasan.add');
    }

    public function store(Request $req){
        $validated = $req->validate([
            'proj_negeri' => 'required',
            'proj_daerah' => 'required',
            'proj_fasiliti_id' => 'required',
            'proj_kod_subsetia' => 'required',
            'proj_program' => 'required',
            'proj_kategori_id' => 'required',
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
            'proj_kategori_id.required' => 'Sila pilih kategori projek',
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

        $projek = new ProjekBaru();
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
        if($req->proj_pelaksana==3 || $req->proj_pelaksana==4){
            $projek->proj_pelaksana_agensi = $req->proj_pelaksana_agensi;
        }
        $projek->proj_struktur = $req->proj_struktur;
        $projek->proj_kos_mohon = $req->proj_kos_mohon;
        $projek->proj_tahun = $req->proj_tahun;
        $projek->proj_bulan = $req->proj_bulan;
        $projek->proj_program = $req->proj_program;
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
        $projek->save();
        if($projek){
            return redirect('/permohonan/kecemasan/papar/'.$projek->projek_id);
        }

    }

    public function add2(string $id){
        $data['projek'] = ProjekBaru::find($id);
        return view('app.kecemasan.add2', $data);
    }

    public function upload(Request $req){
        $validator = Validator::make($req->all(), [
            'proj_doc_perihal'=>'required',
            'proj_doc_fail'=>'required|mimes:pdf,xlsx|max:2048',
        ],
        [
            'proj_doc_perihal.required'=>'Sila masukkan perihal dokumen',
            'proj_doc_fail.required'=>'Sila muat naik dokumen',
            'proj_doc_fail.mimes'=>'Hanya dokumen PDF, XLS sahaja dibenarkan',
            'proj_doc_fail.max'=>'Saiz maksimum dokumen adalah 2MB',
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
            $file = $req->file('proj_doc_fail');
            $filename =  $req->projek_id.'-'.time();
            $url = Storage::putFileAs('public/permohonan/dokumen/', $file, $filename . '.' . $file->extension());

            $doc = new ProjekDokumen();
            $doc->proj_doc_projek_id = $req->projek_id;
            $doc->proj_doc_perihal = $req->proj_doc_perihal;
            $doc->proj_doc_fail = 'permohonan/dokumen/'.$filename . '.' . $file->extension();
            $doc->save();

            if($doc){
                // $req->proj_doc_fail->move(public_path('permohonan/dokumen', $filename));
                return response()->json([
                    'status'=>200,
                    'message'=>'Berjaya ditambah'
                ]);
            }
        }

    }

    public function emel(string $id){
        $pemilik = auth()->user()->program_id;
        $mail = Mail::to('usup.keram@moh.gov.my')->send(new MaklumanProjekKecemasan());
        // dd($mail);
        if($mail){
            // ProjekBaru::query()->update([
            //     'sil_emel'=>2
            // ]);
            // ProjekBaru::where([
            //     'proj_pemilik'=>$pemilik
            // ])->query()->update([
            //     'sil_emel'=>2
            // ]);
            // $projek = \DB::table('')

            ProjekBaru::query()->where('projek_id', $id)->update([
                'proj_status'=>2,
                'proj_status_complete' => 2
            ]);
            // ProjekBaru::where('proj_pemilik',$pemilik)->get();
            // $projek->proj_status_complete = 2;
            // $projek->save();
            // if($projek){
                return redirect('/permohonan/kecemasan/main')
                ->with([
                    'title'=>'Berjaya',
                    'msg'=>'Rekod permohonan berjaya dihantar',
                    'type'=>'success'
                ]);
            // }
            // else{
            //     return response()->json([
            //         'status'=>400,
            //         'message'=>'Rekod gagal dikemaskini.'
            //     ]);
            // }

        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }

    public function edit(string $id){
        $data['projek']=ProjekBaru::find($id);
        return view('app.kecemasan.edit', $data);
    }

    public function update(Request $req){
        // dd($req->all());
        $validated = $req->validate([
            'proj_negeri' => 'required',
            'proj_daerah' => 'required',
            'proj_fasiliti_id' => 'required',
            'proj_kod_subsetia' => 'required',
            'proj_program' => 'required',
            'proj_kategori_id' => 'required',
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
            'proj_kategori_id.required' => 'Sila pilih kategori projek',
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
        $projek->proj_kategori_id = $req->proj_kategori_id;
        $projek->proj_nama = $req->proj_nama;
        $projek->proj_skop = $req->proj_skop;
        $projek->proj_justifikasi = $req->proj_justifikasi;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_catatan = $req->proj_catatan;
        $projek->proj_updated_by = auth()->user()->id;
        $projek->save();

        if($projek){
            return redirect('/permohonan/kecemasan/main')
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Rekod permohonan berjaya dikemaskini',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/permohonan/kecemasan/main')
            ->with([
                'title'=>'Gagal',
                'msg'=>'Rekod gagal dikemaskini',
                'type'=>'danger'
            ]);
        }
    }

    public function selesai(string $id){
        $projek = ProjekBaru::find($id);
        $projek->proj_status_complete=2;
        $projek->proj_status=2;
        $projek->save();
        if($projek){
            return redirect('/permohonan/kecemasan/main')
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Maklumat projek telah dihantar dan akan dioproses oleh Pentadbir Projek',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/permohonan/kecemasan/main')
            ->with([
                'title'=>'Gagal',
                'msg'=>'Maklumat projek gagal dihantar',
                'type'=>'error'
            ]);
        }
    }
}
