<?php

namespace App\Http\Controllers\Projek\Pengurusan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
use App\Models\Siling;
use App\Mail\MaklumanProjekKecemasan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class KecemasanController extends Controller
{
    // public function main(){
    //     return view('app.kecemasan.pengurusan.index');
    // }

    public function index(Request $request){
        $queryType = 1; // default click pd menu
        if( $request->isMethod('post')) {
            $program =  $request->program;
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
                'program' => $program,
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
                $program =  session('program');
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
                session()->forget(['program', 'negeri','daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
            }
        }
        if ($queryType == 1) {
            $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_nama_admin', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')
                ->where('c.pro_siling', 'Luar Siling')
                ->orderBy('a.proj_sort', 'ASC')->paginate(15);
        }
        else{
            $projek = \DB::table('tblprojek_baru as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                    ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kod_agensi', 'a.proj_kod_projek', 'a.proj_kod_setia', 'a.proj_kod_subsetia', 'a.proj_kos_mohon', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_nama_admin', 'a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name', 'a.proj_status_complete')

                    ->where('c.pro_siling', 'Luar Siling')
                    ->where('a.proj_tahun', '2025')
                    ->where(function($q) use ( $negeri, $daerah, $fasiliti, $pelaksana, $kategori, $status, $projek){
                        if(!empty($program)){
                            $q->where('a.proj_pemilik', $program);
                        }
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
                    ->orderBy('a.proj_sort', 'ASC')->paginate(15);

        }
        $data['projek'] = $projek;
        return view('app.kecemasan.pengurusan.index', $data);
    }

    public function edit(string $id){
        $data['projek']=ProjekBaru::find(decrypt($id));
        return view('app.kecemasan.pengurusan.edit', $data);
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
        $projek->proj_kos_lulus=$req->proj_kos_lulus;
        $projek->proj_catatan_admin=$req->proj_catatan_admin;
        $projek->proj_status=$req->proj_status_admin;
        $projek->proj_updated_by=auth()->user()->id;
        // dd($projek);
        $projek->save();

        if($projek){
            return redirect('/pengurusan/kecemasan/main')
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Rekod permohonan berjaya dikemaskini',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/pengurusan/kecemasan/main')
            ->with([
                'title'=>'Gagal',
                'msg'=>'Rekod gagal dikemaskini',
                'type'=>'danger'
            ]);
        }
    }

    public function cetakPermohonan(string $id)
    {
        $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_sub_name', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_pelaksana', 'a.proj_pelaksana_agensi', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama_admin', 'a.proj_skop_admin', 'a.proj_justifikasi_admin', 'a.proj_catatan_admin','a.proj_sort', 'a.proj_status', 'd.prog_name', 'e.fas_name')
                ->where('a.proj_pemilik', decrypt($id))
                ->whereIn('a.proj_kategori_id', [1003,1004,1007,1009,1010])
                ->where('a.proj_status', '5')
                ->get();
        // dd($projek);
        $pemilik = \DB::table('tblprogram')->where('program_id',  decrypt($id))->select('prog_name')->first();
        $header = [
            'title' => 'KELULUSAN PERUNTUKAN BP00600 - NAIK TARAF, UBAH SUAI DAN PEMBAIKAN',
            'title2' => 'DI LUAR SILING TAHUNAN BILANGAN 1/2025',
            'pemilik' => $pemilik->prog_name,
        ];

        $data['projek']= $projek;
        $data['header']= $header;

        $pdf = Pdf::loadView('app.kecemasan.pdf.kelulusan', $data)
            ->setPaper('a4', 'landscape'); // Set A4 size and landscape orientation

        // Adjust margins (top and bottom)
        $pdf->setOptions([
            // 'margin-top' => 20,  // Set top margin (in mm)
            // 'margin-bottom' => 10, // Set bottom margin (in mm)
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
        ]);

        // Return PDF for download
        return $pdf->stream('permohonan_kecemasan.pdf');
    }

    
}
