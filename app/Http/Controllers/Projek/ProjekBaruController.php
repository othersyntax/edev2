<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Projek\Projek;
use App\Models\Projek\ProjekBaru;
use App\Models\Projek\ProjekDokumen;
use App\Models\Projek\ProjekBaruUnjuran;
use App\Models\Siling;
use App\Models\Task;
use App\Mail\MaklumanProjekBaharu;
use App\Mail\MaklumanPerakuanProjek;
use App\Mail\MaklumanPengesahanProjek;
use App\Mail\MaklumanHantarProjek;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Traits\Projek\ProjekCountTrait;
use App\Exports\ProjekBaruExport;
use Maatwebsite\Excel\Facades\Excel;

class ProjekBaruController extends Controller
{
    use ProjekCountTrait;

    public function showList(){
        return view('app.projek-baru.index');
    }

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
            session()->forget(['negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
        }
        if ($queryType == 1) {
            $query = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                ->where('c.pro_siling', 'Siling')
                ->where('proj_pemilik', auth()->user()->program_id);

            $projek = $query->orderBy('proj_sort', 'ASC')->get();

        }
        else{
            $query = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_negeri', 'a.proj_nama', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
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
            $projek = $query->orderBy('proj_sort', 'ASC')->get();
            // dd($projek);
        }
        $siling = Siling::where('sil_fasiliti_id', auth()->user()->program_id)
                    ->where('sil_status', 1)
                    ->select('sil_amount', 'sil_tahun', 'sil_sdate', 'sil_edate')->get();
        // dd($siling);
        $jumSiling=0;
        $siling2=0;
        foreach( $siling as $sil){
            $data['silingTahun'] = $sil->sil_tahun;
            $data['silingMula'] = date('d/m/Y', strtotime($sil->sil_sdate));
            $data['silingTamat'] = date('d/m/Y', strtotime($sil->sil_edate));
            $jumSiling = $jumSiling + $sil->sil_amount;
        }

        $jumlah = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->whereIn('proj_kategori_id', ['1001','1002','1006','1008'])->where('proj_tahun', '2025')->sum('proj_kos_mohon');
        $sambung = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->where('proj_tahun', '2025')->whereIn('proj_kategori_id', [1001,1002])->sum('proj_kos_mohon');
        // $data['silingTahun'] = $siling->sil_tahun ? $siling->sil_tahun :'-';
	    // $data['silingMula'] = $siling->sil_sdate ? date('d/m/Y', strtotime($siling->sil_sdate)) :'-';
	    // $data['silingTamat'] = $siling->sil_edate ? date('d/m/Y', strtotime($siling->sil_edate)) :'-';
        $siling2=floatval($jumSiling);
        $jumlah = floatval($jumlah);
        $data['baki'] = $siling2 - $jumlah;
        $data['sambung'] = $sambung;
        $data['siling'] =$siling2;
        $data['jumlah'] = $jumlah;
        $data['projek'] = $projek;

        return response()->json([
            'data'=>$data,
        ]);
    }

    public function create(){
        $data['sortNumber'] = $this->getNextNumber();
        return view('app.projek-baru.add', $data);
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
        if(empty($req->proj_sort)){
            $projek->proj_sort = $this->getNextNumber();
        }
        else{
            $projek->proj_sort = $req->proj_sort;
        }

        $projek->proj_kod_subsetia = $req->proj_kod_subsetia;
        $projek->proj_pemilik =auth()->user()->program_id;
        $projek->proj_program = $req->proj_program;
        $projek->proj_pelaksana = $req->proj_pelaksana;
        if($req->proj_pelaksana==3 || $req->proj_pelaksana==4){
            $projek->proj_pelaksana_agensi = $req->proj_pelaksana_agensi;
        }
        $projek->proj_struktur = $req->proj_struktur;
        $projek->proj_kos_mohon = $req->proj_kos_mohon;
        $projek->proj_kos_lulus = $req->proj_kos_mohon;
        $projek->proj_tahun = 2025;
        $projek->proj_bulan = $req->proj_bulan;
        $projek->proj_laksana_mula = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_mula)->format('Y-m-d');
        $projek->proj_laksana_tamat = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_tamat)->format('Y-m-d');
        $projek->proj_kategori_id = $req->proj_kategori_id;
        $projek->proj_nama = $req->proj_nama;
        $projek->proj_nama_admin = $req->proj_nama;
        $projek->proj_skop = $req->proj_skop;
        $projek->proj_skop_admin = $req->proj_skop;
        $projek->proj_justifikasi = $req->proj_justifikasi;
        $projek->proj_justifikasi_admin = $req->proj_justifikasi;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_catatan = $req->proj_catatan;
        $projek->proj_created_by = auth()->user()->id;
        $projek->proj_updated_by = auth()->user()->id;
        // dd($projek);
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

    public function edit(string $id){
        $data['projek']=ProjekBaru::find($id);
        return view('app.projek-baru.edit', $data);
    }

    public function salin(string $id, string $sumber){
        $data['sortNumber'] = $this->getNextNumber();
        if($sumber=='baru'){
            $data['projek']=ProjekBaru::find($id);
        }
        else{
            $projek = Projek::find($id);
            $projek->proj_kategori_id = '';
            $projek->proj_kos_mohon = '';
            $projek->proj_laksana_mula = '';
            $projek->proj_laksana_tamat = '';
            $data['projek']=$projek;
        }
        return view('app.projek-baru.salin', $data);
    }

    public function sambungan(){
        $data['projek']=Projek::where('proj_pemilik', auth()->user()->program_id)
                                ->where('proj_status', 1)->get();
        return view('app.projek-baru.add-sedia-ada', $data);
    }

    public function update(Request $req){
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
        $projek->proj_sort = $req->proj_sort;
        $projek->proj_pemilik =auth()->user()->program_id;
        $projek->proj_program = $req->proj_program;
        $projek->proj_pelaksana = $req->proj_pelaksana;
        if($req->proj_pelaksana==3 || $req->proj_pelaksana==4){
            $projek->proj_pelaksana_agensi = $req->proj_pelaksana_agensi;
        }
        $projek->proj_struktur = $req->proj_struktur;
        $projek->proj_kos_mohon = $req->proj_kos_mohon;
        $projek->proj_kos_lulus = $req->proj_kos_mohon;
        $projek->proj_tahun = 2025;
        $projek->proj_bulan = $req->proj_bulan;
        $projek->proj_laksana_mula = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_mula)->format('Y-m-d');
        $projek->proj_laksana_tamat = Carbon::createFromFormat('d/m/Y', $req->proj_laksana_tamat)->format('Y-m-d');
        $projek->proj_kategori_id = $req->proj_kategori_id;
        $projek->proj_nama = $req->proj_nama;
        $projek->proj_nama_admin = $req->proj_nama;
        $projek->proj_skop = $req->proj_skop;
        $projek->proj_skop_admin = $req->proj_skop;
        $projek->proj_justifikasi = $req->proj_justifikasi;
        $projek->proj_justifikasi_admin = $req->proj_justifikasi;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_catatan = $req->proj_catatan;
        $projek->proj_updated_by = auth()->user()->id;
        // dd($projek);
        $projek->save();

        if($projek){
            return redirect('/permohonan/baru/main')
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Rekod permohonan berjaya dikemaskini',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/permohonan/baru/main')
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
                 return redirect('/permohonan/baru/main')
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Maklumat projek telah dihantar untuk semakan',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/permohonan/baru/main')
            ->with([
                'title'=>'Gagal',
                'msg'=>'Maklumat projek gagal dihantar',
                'type'=>'error'
            ]);
        }
    }

    public function semakan(){
        $projek=ProjekBaru::query()
            ->where('proj_pemilik', auth()->user()->program_id) // Specify the condition (role)
	    ->where('proj_status_complete', 1)
            ->update(['proj_status' => 2]); // Update the status field

        // $transWF = TransWF::query();

        // NOTIFY PENGESAH
        $penerima = \DB::table('vwuserperanan')
            ->whereIn('program_id', [auth()->user()->program_id])
            ->whereIn('peranan', ['pengesah'])
            ->select('email')->groupBy('email')->get();

        $arrPenerima = $penerima->toArray();

        // CREATE TASK
        $pengesah = \DB::table('vwuserperanan')
            ->whereIn('program_id', [auth()->user()->program_id])
            ->whereIn('peranan', ['pengesah'])
            ->pluck('id');

        $task = new Task();
        $task->task_user_id = $pengesah->implode(',');
        $task->task_desc = 'Pengesahan Permohonan Projek Baharu (Siling) Tahun 2025';
        $task->task_link = 'permohonan/baru/pengesahan';
        $task->task_date = date('Y-m-d H:i:s');
        $task->task_created_by = auth()->user()->id;
        $task->task_updated_by = auth()->user()->id;
        $task->save();

        if($task){
            $mail = Mail::to($arrPenerima)->send(new MaklumanPengesahanProjek());
            $mail = true;
            if($mail){
                return redirect('/permohonan/baru/main')
                ->with([
                    'title'=>'Berjaya',
                    'msg'=>'Maklumat projek telah dihantar pengesahan',
                    'type'=>'success'
                ]);
            }
            else{
                return redirect('/permohonan/baru/main')
                ->with([
                    'title'=>'Gagal',
                    'msg'=>'Maklumat projek gagal dihantar',
                    'type'=>'error'
                ]);
            }
        }
        else{
            return redirect('/permohonan/baru/main')
            ->with([
                'title'=>'Gagal',
                'msg'=>'Maklumat projek gagal dihantar (Task)',
                'type'=>'error'
            ]);
        }


    }

    public function maklumPengesahan(){
        // Update Projek Status telah peraku
        $projek=ProjekBaru::query()
            ->where('proj_pemilik', auth()->user()->program_id)
	    ->where('proj_status_complete', 1)
            ->update(['proj_status' => 3]);

        $taskUpdate = Task::query()
            ->whereRaw('FIND_IN_SET(?, task_user_id)', [auth()->user()->id])->where('task_status', 1)
            ->update(['task_status' => 2]);
        // NOTIFY PENGESAH
        $penerima = \DB::table('vwuserperanan')
            ->whereIn('program_id', [auth()->user()->program_id])
            ->whereIn('peranan', ['peraku'])
            ->select('email')->groupBy('email')->get();

        $arrPenerima = $penerima->toArray();
        // dd($penerima);

        // CREATE TASK
        $pengesah = \DB::table('vwuserperanan')
            ->whereIn('program_id', [auth()->user()->program_id])
            ->whereIn('peranan', ['peraku'])
            ->pluck('id');

        $task = new Task();
        $task->task_user_id = $pengesah->implode(',');
        $task->task_desc = 'Perakuan Permohonan Projek Baharu (Siling) Tahun 2025';
        $task->task_link = 'permohonan/baru/perakuan';
        $task->task_date = date('Y-m-d H:i:s');
        $task->task_created_by = auth()->user()->id;
        $task->task_updated_by = auth()->user()->id;
        $task->save();

        $mail = Mail::to($arrPenerima)->send(new MaklumanPerakuanProjek());

        if($mail){
            return response()->json([
                'status'=>200,
                'message'=>'Pengesahan Berjaya dihantar',
                'redirect_url' => route('projekBaruMain', ['msg' => 'Rekod Berjaya Dihantar Untuk Perakuan', 'title'=>'Berjaya', 'type'=>'success'])
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Rekod gagal dihantar.'
            ]);
        }
    }
    public function maklumPerakuan(){
        // Update Projek Status telah peraku
        $projek=ProjekBaru::query()
            ->where('proj_pemilik', auth()->user()->program_id)
	    ->where('proj_status_complete', 1)
            ->update(['proj_status' => 4]);

        $taskUpdate = Task::query()
            ->whereRaw('FIND_IN_SET(?, task_user_id)', [auth()->user()->id])->where('task_status', 1)
            ->update(['task_status' => 2]);

        // NOTIFY PENGESAH
        $penerima = \DB::table('vwuserperanan')
            ->whereIn('program_id', [auth()->user()->program_id])
            ->whereIn('peranan', ['pengesah'])
            ->select('email')->groupBy('email')->get();

        $arrPenerima = $penerima->toArray();
        // dd($penerima);

        // CREATE TASK
        $pengesah = \DB::table('vwuserperanan')
            ->whereIn('program_id', [auth()->user()->program_id])
            ->whereIn('peranan', ['pengesah'])
            ->pluck('id');

        $task = new Task();
        $task->task_user_id = $pengesah->implode(',');
        $task->task_desc = 'Penghantaran Permohonan Projek Baharu (Siling) Tahun 2025';
        $task->task_link = 'permohonan/baru/hantar-permohonan';
        $task->task_date = date('Y-m-d H:i:s');
        $task->task_created_by = auth()->user()->id;
        $task->task_updated_by = auth()->user()->id;
        $task->save();

        $mail = Mail::to($arrPenerima)->send(new MaklumanHantarProjek());

        if($mail){
            return response()->json([
                'status'=>200,
                'message'=>'Perakuan Berjaya dihantar'
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Rekod gagal dihantar.'
            ]);
        }
    }

    public function hantarPermohonan(Request $req){
        // NOTIFY PENGESAH
        $penerima = \DB::table('vwuserperanan')
            ->whereIn('peranan', ['super-admin','admin'])
            ->select('email')->groupBy('email')->get();
        $program = getProgram(auth()->user()->program_id);
        $arrPenerima = $penerima->toArray();
        $mail = Mail::to($arrPenerima)->send(new MaklumanProjekBaharu($program));
        if($mail){
            $taskUpdate = Task::query()
                ->whereRaw('FIND_IN_SET(?, task_user_id)', [auth()->user()->id])->where('task_status', 1)
                ->update(['task_status' => 2]);

            $projek=ProjekBaru::query()
                ->where('proj_pemilik', auth()->user()->program_id)->where('proj_status_complete', 1)->where('proj_status', 4)
                ->update(['proj_status_complete' => 2]); // Update the status field

            // CREATE TASK TO
            $admin = \DB::table('vwuserperanan')
                ->whereIn('peranan', ['super-admin','admin'])
                ->pluck('id');

            $task = new Task();
            $task->task_user_id = $admin->implode(',');
            $task->task_desc = 'Penghantaran Permohonan Projek Baharu (Siling) Tahun 2025, '.getProgram(auth()->user()->program_id);
            $task->task_link = '/permohonan/semak/main/'.auth()->user()->program_id;
            $task->task_date = date('Y-m-d H:i:s');
            $task->task_created_by = auth()->user()->id;
            $task->task_updated_by = auth()->user()->id;
            $task->save();

            if($projek){
                return response()->json([
                    'status'=>200,
                    'message'=>'Permohonan Projek Berjaya dihantar'
                ]);
            }
            else{
                return response()->json([
                    'status'=>400,
                    'message'=>'Permohonan gagal dikemaskini.'
                ]);
            }
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Permohonan gagal dihantar.'
            ]);
        }
    }

    public function exportExcel(){
        return Excel::download(new ProjekBaruExport, 'projek-baru.xlsx');
    }

    public function delete(string $id){
        $projek = ProjekBaru::find($id);
        if($projek )
        {
            $projek ->delete();
            return redirect('/permohonan/baru/main')
                ->with([
                    'title'=>'Berjaya',
                    'msg'=>'Maklumat projek Berjaya Dipadam',
                    'type'=>'success'
            ]);
        }
        else
        {
            return redirect('/permohonan/baru/main')
                ->with([
                    'title'=>'Gagal',
                    'msg'=>'Maklumat projek gagal dipadam',
                    'type'=>'error'
           ]);
        }
    }

}
