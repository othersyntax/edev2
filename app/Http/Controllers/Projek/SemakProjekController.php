<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
use App\Models\Projek\ProjekDokumen;
use App\Models\Projek\ProjekBaruUnjuran;
use App\Models\Projek\Projek;
use App\Models\Projek\ProjekUtilities;
use App\Models\Siling;
use App\Mail\MaklumanProjekKecemasan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Mail\MaklumanPermohonanProjek;
use Illuminate\Support\Facades\DB;


class SemakProjekController extends Controller
{
    public function List(string $pemilik, Request $request){
        $program =  $pemilik;
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
            if($request->has('page')) {
                $negeri =  session('negeri');
                $daerah =  session('daerah');
                $fasiliti =  session('fasiliti');
                $subsetia  =  session('subsetia');
                $kategori  =  session('kategori');
                $projekProgram  =  session('projekProgram');
                $pelaksana  =  session('pelaksana');
                $status  =  session('status');
                $projek  =  session('projek');
                $queryType = 2;
            }
            else{
                session()->forget(['negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
            }
        }
        if ($queryType == 1) {
            $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_nama_admin', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                ->where('a.proj_pemilik', $program)
                ->where('c.pro_siling', 'Siling')
                ->where('a.proj_tahun', date('Y'))->orderBy('a.proj_kategori_id', 'ASC')->orderBy('a.proj_sort', 'ASC')->paginate(15);
            // $sambung = $query->whereIn('a.proj_kategori_id', [1001,1002])->sum('a.proj_kos_mohon');
            // $jumlah = $query->sum('a.proj_kos_mohon');
        }
        else{
            $projek = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_nama_admin', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                    ->where('a.proj_pemilik', $program)
                    ->where('c.pro_siling', 'Siling')
                    ->where('a.proj_tahun', date('Y'))
                    ->where(function($q) use ( $negeri, $daerah, $fasiliti, $pelaksana, $kategori, $status, $projek){
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
                    })
                    ->orderBy('a.proj_kategori_id', 'ASC')->orderBy('a.proj_sort', 'ASC')->paginate(15);
            // $sambung = $query->whereIn('a.proj_kategori_id', [1001,1002])->sum('a.proj_kos_mohon');
            // $jumlah = $query->sum('a.proj_kos_mohon');



        }
        $jumlah = ProjekBaru::where('proj_pemilik', $program)->where('proj_tahun', 2025)->sum('proj_kos_lulus');
        $lulus = ProjekBaru::where('proj_pemilik', $program)->where('proj_tahun', 2025)->where('proj_status', 5)->sum('proj_kos_lulus');
        $tolak = ProjekBaru::where('proj_pemilik', $program)->where('proj_tahun', 2025)->where('proj_status', 6)->sum('proj_kos_lulus');
        $siling = Siling::where('sil_fasiliti_id', $program)->where('sil_tahun', 2025)->first();

        //PgressBar
        $lulusSemua = ProjekBaru::where('proj_tahun', 2025)->where('proj_status', 5)->sum('proj_kos_lulus');
        $lulusJKN = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblprogram as b', 'a.proj_pemilik', 'b.program_id')
                    ->where('a.proj_status', 5)
                    ->where('a.proj_tahun', 2025)
                    ->where('b.prog_kategori', 'JKN')
                    ->sum('a.proj_kos_lulus');

        $silingSemua = \DB::table('tblsiling as a')
                        ->leftJoin('tblprogram as b', 'a.sil_fasiliti_id', 'b.program_id')
                        ->where('a.sil_tahun', 2025)
                        ->where('b.prog_kategori', 'JKN')
                        ->sum('a.sil_amount');

        $data['lulusSemua']=$lulusSemua;
        $data['lulusJKN']=$lulusJKN;
        $data['silingSemua']=$silingSemua;
        // $siling=floatval($siling);
        // $jumlah = floatval($jumlah);
        $data['tolak'] = $tolak;
        $data['lulus'] = $lulus;
        $data['siling'] = $siling->sil_amount;
        $data['jumlah'] = $jumlah;
        $data['projek'] = $projek;
        $data['pemilik'] = $program;
        // dd($data);
        return view('app.semak-permohonan.index', $data);
    }

    public function salur(Request $request){
        $selectedProjek = $request->input('projek');

        // GET PROGRAM ID
        foreach($selectedProjek as $proj) {
            $projekID = $proj['id'];
            ProjekBaru::where('projek_id',$projekID)->update([
                'proj_status'  => 7
            ]);
            $pindahData = $this->pindahProjek($projekID);
            if($pindahData)
                continue;
            else
                break;

        }
        // $arrProgramID = $programID->toArray();

        return response()->json([
            'status'=>200,
            'message'=>'Projek Telah Dipindahkan ke Modul Pemantauan'
        ]);

    }

    public function pindahProjek(string $id){
        // GET PROJEK SEDIA ADA
        $projek = ProjekBaru::find($id);

        $newProjek = new Projek();
        // SALIN DARI SEDIA ADA KE BAHARU
        $newProjek->proj_negeri = $projek->proj_negeri;
        $newProjek->proj_daerah = $projek->proj_daerah;
        $newProjek->proj_fasiliti_id = $projek->proj_fasiliti_id;
        $newProjek->proj_parlimen = $projek->proj_parlimen;
        $newProjek->proj_dun = $projek->proj_dun;
        $newProjek->proj_kod_agensi = $projek->proj_kod_agensi;
        $newProjek->proj_kod_projek = $projek->proj_kod_projek;
        $newProjek->proj_kod_setia = $projek->proj_kod_setia;
        $newProjek->proj_kod_subsetia = $projek->proj_kod_subsetia;
        $newProjek->proj_pemilik = $projek->proj_pemilik;
        $newProjek->proj_pelaksana = $projek->proj_pelaksana;
        $newProjek->proj_pelaksana_agensi = $projek->proj_pelaksana_agensi;
        $newProjek->proj_struktur = $projek->proj_struktur;
        $newProjek->proj_tahun = $projek->proj_tahun;
        $newProjek->proj_bulan = $projek->proj_bulan;
        $newProjek->proj_kos_lulus = $projek->proj_kos_lulus;
        $newProjek->proj_laksana_mula = $projek->proj_laksana_mula;
        $newProjek->proj_laksana_tamat = $projek->proj_laksana_tamat;
        $newProjek->proj_kategori_id = $projek->proj_kategori_id;
        $newProjek->proj_nama = $projek->proj_nama_admin;
        $newProjek->proj_skop = $projek->proj_skop_admin;
        $newProjek->proj_justifikasi = $projek->proj_justifikasi_admin;
        $newProjek->proj_ulasan_teknikal = $projek->proj_ulasan_teknikal;
        $newProjek->proj_catatan = $projek->proj_catatan;
        $newProjek->proj_kuasa_pkn = $projek->proj_kuasa_pkn;
        $newProjek->proj_created_by = $projek->proj_created_by;
        $newProjek->proj_updated_by = $projek->proj_updated_by;
        // dd($projek);
        $newProjek->save();

        if($newProjek){
            $projUti = new ProjekUtilities();
            $projUti->projuti_projek_id = $newProjek->projek_id;
            $projUti->projuti_perihal = 'Surat pengsahan dan kelulusan';
            $projUti->projuti_ref_no = 'KKM.400-4/2/31 JLD.13(50)';
            $projUti->projuti_date = date('Y-m-d', strtotime('2025-03-25'));
            $projUti->projuti_created_by = auth()->user()->id;
            $projUti->projuti_updated_by = auth()->user()->id;
            $projUti->save();

            $projUti2 = new ProjekUtilities();
            $projUti2->projuti_projek_id = $newProjek->projek_id;
            $projUti2->projuti_perihal = 'Waran Salur';
            $projUti2->projuti_ref_no = 'KKM.400-4/2/31 JLD.13(50)';
            $projUti2->projuti_date = date('Y-m-d', strtotime('2025-03-27'));
            $projUti2->projuti_created_by = auth()->user()->id;
            $projUti2->projuti_updated_by = auth()->user()->id;
            $projUti2->save();

            return true;
        }
        else{
            return false;
        }

    }

    public function indexMain(Request $request){
        $queryType = 1; // default click pd menu
        if( $request->isMethod('post')) {
            $kategori =  $request->kategori;
            $status =  $request->status;
            session(['kategori' => $kategori, 'status' => $status]);
            $queryType = 2;
        }
        else{
            session()->forget(['kategori', 'status']);
        }
        if($queryType==1){
            $pemilik = \DB::table('vwPermohonanFlag')->orderBy('NamaPemilik', 'ASC')->get();
        }
        else{
            $pemilik = \DB::table('vwPermohonanFlag')
            ->where(function($q) use ($kategori, $status){
                if(!empty($kategori)){
                    $q->where('Kategori', $kategori);
                }
                if(!empty($status)){
                    if($status==1){
                        $q->where('Flag','=', 0);
                    }
                    else{
                        $q->where('Flag', '>', 0);
                    }
                }
            })
            ->get();
        }
        $semua = ProjekBaru::where('proj_tahun', 2025);
        $jumlah = $semua->sum('proj_kos_lulus');
        $jumBaharu = $semua->where('proj_kategori_id', 1006)->sum('proj_kos_lulus');
        $semuaBil = ProjekBaru::where('proj_tahun', 2025);
        $bil = $semuaBil->count('projek_id');
        $bilBaharu = $semuaBil->where('proj_kategori_id', 1006)->count('projek_id');
        // $bil = ProjekBaru::where('proj_tahun', 2025)->count('projek_id');
        // $siling = Siling::where('sil_tahun', 2025)->sum('sil_amount');
        $siling = \DB::table('tblsiling as a')
                ->leftJoin('tblprogram as b', 'a.sil_fasiliti_id', 'b.program_id')
                ->where('a.sil_tahun', 2025)
                ->where('b.prog_kategori', 'JKN')
                ->sum('a.sil_amount');

        $data['jumlah'] = $jumlah;
        $data['jumBaharu'] = $jumBaharu;
        $data['jumRevote'] = $jumlah - $jumBaharu;
        $data['bilBaharu'] = $bilBaharu;
        $data['bil'] = $bil;
        $data['bilBaharu'] = $bilBaharu;
        $data['bilRevote'] = $bil - $bilBaharu;
        $data['siling'] = $siling;
        $data['pemilik'] = $pemilik;
        return view('app.semak-permohonan.index-main', $data);
    }


    public function emel(){
        // $mail = Mail::to('anas.fikhri@gmail.com')->send(new MaklumanPermohonanProjek());

        if($mail){
            // MaklumanPermohonanProjek::query()->update([
            //     'sil_emel'=>2
            // ]);
            return response()->json([
                'status'=>200,
                'message'=>'Berjaya dihantar'
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }

    public function papar(string $id){
        $data['projek'] = ProjekBaru::find($id);
        return view('app.semak-permohonan.papar', $data);
    }

    public function kemaskini(Request $req){
        $projek = ProjekBaru::find($req->projek_id);
        $projek->proj_kos_lulus=$req->proj_kos_lulus;
        $projek->proj_catatan_admin=$req->proj_catatan_admin;
        $projek->proj_status=$req->proj_status;
        $projek->proj_updated_by=auth()->user()->id;
        $projek->save();
        if($projek){
                 return redirect('/permohonan/semak/main/'.$projek->proj_pemilik)
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Status Permohonan Projek Telah Dikemaskini',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/permohonan/semak/main/'.$projek->proj_pemilik)
            ->with([
                'title'=>'Gagal',
                'msg'=>'Status Permohonan Projek Gagal Dikemaskini',
                'type'=>'error'
            ]);
        }
    }

    public function edit(string $id){
        $data['projek']=ProjekBaru::find($id);
        return view('app.semak-permohonan.edit', $data);
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

        $projek = ProjekBaru::find($req->projek_id);
        $projek->proj_negeri = $req->proj_negeri;
        $projek->proj_daerah = $req->proj_daerah;
        $projek->proj_fasiliti_id = $req->proj_fasiliti_id;
        $projek->proj_kod_agensi = $req->proj_kod_agensi;
        $projek->proj_kod_projek = $req->proj_kod_projek;
        $projek->proj_kod_setia = $req->proj_kod_setia;
        $projek->proj_kod_subsetia = $req->proj_kod_subsetia;
        $projek->proj_sort = $req->proj_sort;
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
        $projek->proj_nama_admin=$req->proj_nama;
        $projek->proj_skop_admin=$req->proj_skop;
        $projek->proj_justifikasi_admin=$req->proj_justifikasi;
        $projek->proj_ulasan_teknikal = $req->proj_ulasan_teknikal;
        $projek->proj_catatan = $req->proj_catatan;
        $projek->proj_updated_by = auth()->user()->id;
        // dd($projek);
        $projek->save();

        if($projek){
            return redirect('/permohonan/semak/main/'.$projek->proj_pemilik)
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Rekod permohonan berjaya dikemaskini',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/permohonan/semak/main/'.$projek->proj_pemilik)
            ->with([
                'title'=>'Gagal',
                'msg'=>'Rekod gagal dikemaskini',
                'type'=>'danger'
            ]);
        }
    }
}
