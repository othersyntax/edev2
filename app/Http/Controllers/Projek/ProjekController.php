<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Projek\BakulJimatController;
use App\Models\Projek\Projek;
use App\Models\Projek\ProjekDetails;
use App\Models\Projek\ProjekUtilities;
use App\Models\Projek\Peruntukan;
use App\Models\Projek\Selenggara;
use App\Models\BakulJimat;
use App\Models\Waran;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ProjekExport;
use Auth;

class ProjekController extends Controller
{
    public function index(Request $request){
        $defaulYear=Carbon::now()->year;
        $program = 0;
        $defaultProgram = 0;
        $role = Auth::user()->hasRole(['penyedia', 'user','peraku', 'pengesah', 'pemilik']);
        $queryType = 1; // default click pd menu
        if( $request->isMethod('post')) {
            $program =  $request->program;
            if($defaulYear<>$request->tahun){
                $tahun = $request->tahun;
            }
            else{
                $tahun = $defaulYear;
            }

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
                'program' => $program,
                'tahun' => $tahun,
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
                $program = session('program');
                if(!empty(session('tahun'))){
                    $tahun = session('tahun');
                }
                else{
                    $tahun = $defaulYear;
                }
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
                // dd($tahun);
            }
            else{
                session()->forget(['program','tahun','negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
            }
        }

        if ($queryType == 1) {
            $query = \DB::table('tblprojek as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                ->leftJoin('tblprojek_tukar as f','a.projek_id','f.projt_projek_id')
                ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama', 'f.projt_projek_id');
                if($role){
		        $program = auth()->user()->program_id;
                    $projekData = $query->where(function($q) use ($program) {
                        $q->where('a.proj_pemilik', auth()->user()->program_id)
                            ->orWhere('a.proj_pelaksana_agensi', $program);
                    })
                    ->where('proj_tahun', $defaulYear)
                    ->paginate(15);
                }
                else{
                    $projekData = $query->where('a.proj_tahun', $defaulYear)->paginate(15);
                }
        }
        else{
	        $pemilik = auth()->user()->program_id;
                $query = \DB::table('tblprojek as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                    ->leftJoin('tblprojek_tukar as f','a.projek_id','f.projt_projek_id')
                    ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama', 'f.projt_projek_id')
                    ->where(function($q) use ($role, $pemilik, $program){
			        if($role){
                		$q->where('a.proj_pemilik', $pemilik)->orWhere('a.proj_pelaksana_agensi', $pemilik);
				        $program = auth()->user()->program_id;
            		}
                    })
                    ->where(function($q) use ($program, $tahun, $negeri, $daerah, $fasiliti, $subsetia, $kategori, $projekProgram, $pelaksana, $status, $projek){
                        if(!empty($program)){
                            $q->where('a.proj_pemilik',$program);
                        }
                        if(!empty($tahun)){
                            $q->where('a.proj_tahun',$tahun);
                        }
                        if(!empty($negeri)){
                            $q->where('a.proj_negeri',$negeri);
                        }
                        if(!empty($daerah)){
                            $q->where('a.proj_daerah',$daerah);
                        }
                        if(!empty($fasiliti)){
                            $q->where('a.proj_fasiliti_id', $fasiliti);
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

	        $projekData = $query->paginate(15);
            // Belanja?
            // Tanggung?

        }

        //$stats = Projek::where('proj_pemilik', auth()->user()->program_id)->where('proj_tahun', Carbon::now()->year);
        $sebenar =   $query->whereIn('proj_status', [1,2,5])->sum('proj_kos_sebenar');
        $jumlah =  $query->whereIn('proj_status', [1,2,5])->sum('proj_kos_lulus');

        $tangungan = $query->where('proj_status', [1,5])->sum('proj_tangungan');
        // $jimat1 = $query->whereIn('proj_status', [3,4])->sum('proj_waran');
        // $jimat2 = $query->where('proj_status', 1)->sum('proj_penjimatan');
        // GET JIMAT RECORD
        $listJimat = new BakulJimatController();
        if($program<>0){
            $jimat = $listJimat->totalJimat($program);
        }
        else{
            $jimat = $listJimat->totalJimat();
        }


        $data['jimat'] = $jimat;
        $data['projek'] = $projekData;
        $data['tangungan'] = $tangungan;
        $data['jumlah'] = $jumlah;
        $data['sebenar'] = $sebenar;

        // dd($data);
        return view('app.projek.index', $data);
    }

    public function edit($id){
        $id = Crypt::decryptString($id);
        $projek = Projek::find($id);
        // if($projek->proj_tangungan>0)
        //     $statusList =['1'=>'Aktif', '2'=>'Tukar Tajuk', '5'=>'Selesai', '3'=>'Dibatalkan'];
        // else
        //     $statusList =['1'=>'Aktif', '2'=>'Tukar Tajuk', '3'=>'Dibatalkan'];
        //
        $statusList =['1'=>'Aktif', '5'=>'Selesai', '3'=>'Dibatalkan'];
        $details = ProjekDetails::where('projd_projek_id', $id)->first();
        $data['details'] = $details;
        $data['projek'] = $projek;
        $data['statusList'] = $statusList;
        return view('app.projek.ubah', $data);
    }

    public function view($id){
        $id = Crypt::decryptString($id);
        $projek = Projek::find($id);
        $peruntukan = \DB::select('select * from vwPeruntukanSemasaByProjek where projek_id=?',[$id]);
        $utilities = ProjekUtilities::where('projuti_projek_id', $id)->get();
        $waran = Waran::where('waran_projek_id', $id)->get();

        $data['projek'] = $projek;
        foreach($peruntukan as $peru){
            $data['peruntukan_semasa'] = $peru->pruntukan_semasa;
        }

        // $data['details'] = $details;
        $data['waran'] = $waran;
        $data['utilities'] = $utilities;
        // dd($data);
        return view('app.projek.papar', $data);
    }

    public function store(Request $request){
        // dd($request->all());
        $validated = $request->validate([
            'proj_negeri' => 'required',
            'proj_daerah' => 'required',
            'proj_fasiliti_id' => 'required',
            'proj_program' => 'required',
            'proj_pemilik' => 'required',
            'proj_kategori_id' => 'required',
            'proj_struktur' => 'required',
            'proj_laksana_mula' => 'required',
            'proj_laksana_tamat' => 'required',
            'proj_kos_lulus' => 'required',
            'proj_nama' => 'required',
            'proj_skop' => 'required',
            // 'proj_justifikasi' => 'required',
            // 'proj_ulasan_teknikal' => 'required',
            'proj_pelaksana' => 'required',
            'proj_pelaksana_agensi' => 'required_if:proj_pelaksana,3,4',
            'proj_memo' => 'required_if:proj_status,2,3',

        ],
        [
            'proj_negeri.required' => 'Sila pilih negeri',
            'proj_daerah.required' => 'Sila pilih daerah',
            'proj_fasiliti_id.required' => 'Sila pilih fasiliti',
            'proj_program.required' => 'Sila pilih projek program',
            'proj_pemilik.required' => 'Sila pilih pemilik projek',
            'proj_struktur.required' => 'Adakah melibatkan struktur',
            'proj_laksana_mula.required' => 'Sila masukkan Tarikh Mula Pelaksanaan',
            'proj_laksana_tamat.required' => 'Sila masukkan Tarikh Tamat Pelaksanaan',
            'proj_kos_lulus.required' => 'Sila masukkan anggaran kos pelaksanaan',
            'proj_nama.required' => 'Sila nyatakan Nama Projek',
            'proj_skop.required' => 'Sila nyatakan Skop Projek',
            // 'proj_justifikasi.required' => 'Sila nyatakan Justifikasi Projek',
            // 'proj_ulasan_teknikal.required' => 'Sila nyatakan Ulasan Unit Kejuruteraan',
            'proj_pelaksana.required' => 'Silah pilih pelaksana',
            'proj_pelaksana_agensi.required_if' => 'Sila Pilih Cawangan JKR',
            'proj_memo.required_if' => 'Sila Masukkan Justifikasi Status',
        ]);

        //  dd($request->all());
        $projek = Projek::find($request->projek_id);
        $projek->proj_negeri = $request->proj_negeri;
        $projek->proj_daerah = $request->proj_daerah;
        $projek->proj_fasiliti_id = $request->proj_fasiliti_id;
        $projek->proj_pemilik = $request->proj_pemilik;
        $projek->proj_program = $request->proj_program;
	    $projek->proj_kod_subsetia = $request->proj_kod_subsetia;
        $projek->proj_kategori_id = $request->proj_kategori_id;
        $projek->proj_laksana_mula = Carbon::createFromFormat('d/m/Y', $request->proj_laksana_mula)->format('Y-m-d');
        $projek->proj_laksana_tamat = Carbon::createFromFormat('d/m/Y', $request->proj_laksana_tamat)->format('Y-m-d');
        $projek->proj_tahun = $request->proj_tahun;
        $projek->proj_bulan = $request->proj_bulan;
        $projek->proj_pelaksana = $request->proj_pelaksana;
        if($request->proj_pelaksana==3 || $request->proj_pelaksana==4){
            $projek->proj_pelaksana_agensi = $request->proj_pelaksana_agensi;
        }
        $projek->proj_struktur = $request->proj_struktur;
        $projek->proj_nama = $request->proj_nama;
        $projek->proj_skop = $request->proj_skop;
        $projek->proj_justifikasi = $request->proj_justifikasi;
        // $projek->proj_ulasan_teknikal = $request->proj_ulasan_teknikal;
        $projek->proj_catatan = $request->proj_catatan;
        $projek->proj_kos_lulus = $request->proj_kos_lulus;

        // JIKA ADA PENJIMATAN UPDATE KOS SEBENAR KEPADA TANGGUNG
        if($request->proj_penjimatan>0){
            $projek->proj_kos_sebenar = $request->proj_tangungan;
        }
        $projek->proj_tangungan = $request->proj_tangungan;
        $projek->proj_penjimatan = $request->proj_penjimatan;
	    $projek->proj_waran_no = $request->proj_waran_no;
        $projek->proj_status = $request->proj_status;
        if( $request->proj_status<>1){
            $projek->proj_memo = $request->proj_memo;
        }


        $projek->save();
        // dd($projek);
        if($projek){
            // CEK KUASA PKN BARU MASUK BAKUL
            // if($projek->proj_kuasa_pkn==1){
                // insert penjimatan
                if($request->proj_penjimatan>0 &&  $request->proj_status==1){
                    // cek rekod dah wujud belum
                    $cek = BakulJimat::where('bj_projek_id',  $request->projek_id)->first();
                    $cekPeru = Peruntukan::where('peru_projek_id', $request->projek_id)->where('peru_status', 3)->first();
                    if($cek){
                        // Update bakul
                        $bakul = BakulJimat::find($cek->bakul_jimat_id);
                        $bakul->bj_amount_jimat = $request->proj_penjimatan;
                        $bakul->bj_updated_by = auth()->user()->id;
                        $bakul->save();

                        if($cekPeru){
                            // Update Peruntukan
                            $peruntukan->peru_date = date('Y-m-d');
                            $peruntukan->peru_amaun = -1 * abs($request->proj_penjimatan);
                            $peruntukan->peru_updated_by = auth()->user()->id;
                            $peruntukan->save();
                        }
                        else{
                            // Create Peruntukan
                            $peruntukan = new Peruntukan();
                            $peruntukan->peru_projek_id = $request->projek_id;
                            $peruntukan->peru_date = date('Y-m-d');
                            $peruntukan->peru_jenis_peruntukan = 3;
                            $peruntukan->peru_amaun = -1 * abs($request->proj_penjimatan);
                            $peruntukan->peru_created_by = auth()->user()->id;
                            $peruntukan->peru_updated_by = auth()->user()->id;
                            $peruntukan->save();
                        }

                    }
                    else{
                        // create bakul
                        $bakul = new BakulJimat();
                        $bakul->bj_projek_id = $request->projek_id;
                        $bakul->bj_program_id = $projek->proj_pemilik;
                        $bakul->bj_title = $projek->proj_nama;
                        $bakul->bj_subsetia = $projek->proj_kod_subsetia;
                        $bakul->bj_kuasa_pkn = $projek->proj_kuasa_pkn;
                        $bakul->bj_amount_jimat = $request->proj_penjimatan;
                        $bakul->bj_kategori = $request->proj_status;
                        $bakul->bj_created_by = auth()->user()->id;
                        $bakul->bj_updated_by = auth()->user()->id;
                        $bakul->save();

                        // Create Peruntukan
                        $peruntukan = new Peruntukan();
                        $peruntukan->peru_projek_id = $request->projek_id;
                        $peruntukan->peru_date = date('Y-m-d');
                        $peruntukan->peru_jenis_peruntukan = 3;
                        $peruntukan->peru_amaun = -1 * abs($request->proj_penjimatan);
                        $peruntukan->peru_created_by = auth()->user()->id;
                        $peruntukan->peru_updated_by = auth()->user()->id;
                        $peruntukan->save();

                    }
                    // dd($cek);
                }

                // Tukar Tajuk
                // if($request->proj_status==2){
                //     // cek rekod dah wujud belum
                //     $cek = BakulJimat::where('bj_projek_id',  $request->projek_id)->where('bj_program_id', $request->proj_pemilik)->first();
                //     if(!$cek){
                //         // create bakul
                //         $bakul = new BakulJimat();
                //         $bakul->bj_projek_id = $request->projek_id;
                //         $bakul->bj_program_id = auth()->user()->program_id;
                //         $bakul->bj_title = $projek->proj_nama;
                //         $bakul->bj_subsetia = $projek->proj_kod_subsetia;
                //         $bakul->bj_kuasa_pkn = $projek->proj_kuasa_pkn;
                //         $bakul->bj_amount_jimat = $request->proj_kos_lulus;
                //         $bakul->bj_kategori = $request->proj_status;
                //         $bakul->bj_created_by = auth()->user()->id;
                //         $bakul->bj_updated_by = auth()->user()->id;
                //         $bakul->save();
                //     }
                // }
            // }
            // else{

            // }
            return redirect('/projek/senarai')->with(['success'=>'Rekod berjaya dikemaskini']);
        }
    }

    public function exportExcel(Request $request){
        // dd($request->all());
        $filters = $request->only(['program', 'tahun', 'negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
        return Excel::download(new ProjekExport($filters), 'projek-list.xlsx');
    }

    public function cetakPermohonan(Request $request)
    {
        $role = Auth::user()->hasRole(['penyedia', 'user','peraku', 'pengesah']);
        $filters = $request->only(['program', 'tahun', 'negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
        // dd($filters);
        $pemilik = $filters['program'];
        $tahun = $filters['tahun'];
        $negeri = $filters['negeri'];
        $daerah = $filters['daerah'];
        $fasiliti = $filters['fasiliti'];
        $subsetia = $filters['subsetia'];
        $kategori = $filters['kategori'];
        $projekProgram = $filters['projekProgram'];
        $pelaksana = $filters['pelaksana'];
        $status = $filters['status'];
        $projek = $filters['projek'];

        $projek = \DB::table('tblprojek as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_sub_name', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_pelaksana', 'a.proj_pelaksana_agensi', 'a.proj_kos_lulus', 'a.proj_negeri', 'a.proj_nama', 'a.proj_skop', 'a.proj_justifikasi', 'd.prog_name', 'e.fas_name')
                ->where(function($q) use ( $role, $pemilik){
                    if($role){
                        $q->where('a.proj_pemilik', $pemilik)->orWhere('a.proj_pelaksana_agensi', $pemilik);
                    }
                    else{
                        if (!empty($pemilik)){
                            $q->where('a.proj_pemilik', $pemilik)->orWhere('a.proj_pelaksana_agensi', $pemilik);
                        }
                    }
                })
                ->where(function($q) use ( $tahun, $negeri, $daerah, $fasiliti, $subsetia, $kategori, $projekProgram, $pelaksana,  $status, $projek){
                    if (!empty($tahun)) {
                        $q->where('a.proj_tahun', $tahun);
                    }
                    if (!empty($negeri)) {
                        $q->where('a.proj_negeri', $negeri);
                    }
                    if (!empty($daerah)) {
                        $q->where('a.proj_daerah', $daerah);
                    }
                    if (!empty($fasiliti)) {
                        $q->where('a.proj_fasiliti_id', $fasiliti);
                    }
                    if (!empty($subsetia)) {
                        $q->where('a.proj_kod_subsetia', $subsetia);
                    }
                    if (!empty($kategori)) {
                        $q->where('a.proj_kod_subsetia', $kategori);
                    }
                    if (!empty($projekProgram)) {
                        $q->where('a.proj_program', $projekProgram);
                    }
                    if (!empty($pelaksana)) {
                        $q->where('a.proj_pelaksana', $pelaksana);
                    }
                    if (!empty($status)) {
                        $q->where('a.proj_status', $status);
                    }
                    if (!empty($projek)) {
                        $q->where('a.proj_nama', 'like', "%$projek%");
                    }
                })
                ->orderBy('c.proj_kategori_id', 'ASC')
                ->get()->groupBy('c.pro_sub_name');
        // dd($projek);
         if($role){
            $pemilik = \DB::table('tblprogram')->where('program_id', $pemilik)->select('prog_name')->first();
            $namaPemilik = $pemilik->prog_name;
        }
        else{
            if (!empty($pemilik)){
                $pemilik = \DB::table('tblprogram')->where('program_id', $pemilik)->select('prog_name')->first();
                $namaPemilik = $pemilik->prog_name;
            }
            else{
                $namaPemilik = "Pelbagai";
            }
        }
        $header = [
            'title' => 'SENARAI PROJEK DI BAWAH PERUNTUKAN BP00600 - NAIK TARAF, UBAH SUAI DAN PEMBAIKAN BAGI TAHUN 2025',
            'pemilik' =>  $namaPemilik,
        ];

        $data['projek']= $projek;
        $data['header']= $header;
        // dd( $projek);
        $pdf = Pdf::loadView('app.projek.pdf.cetak-projek', $data)
            ->setPaper('a4', 'landscape'); // Set A4 size and landscape orientation

        // Adjust margins (top and bottom)
        $pdf->setOptions([
            'margin-top' => 10,  // Set top margin (in mm)
            'margin-bottom' => 10, // Set bottom margin (in mm)
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
        ]);

        // Return PDF for download
        return $pdf->stream('permohonan_baharu.pdf');
    }

    public function getSelenggara(string $id){
        $selenggara = Selenggara::where('projt_projek_id', $id)->first();
        if($selenggara)
        {
            return response()->json([
                'status'=>200,
                'selenggara'=> $selenggara,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Rekod tidak dijumpai.'
            ]);
        }
    }
}
