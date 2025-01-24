<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Projek\Projek;
use App\Models\Projek\ProjekDetails;
use App\Models\Projek\ProjekUtilities;
use App\Models\BakulJimat;
use App\Models\Waran;
use Carbon\Carbon;

class ProjekController extends Controller
{
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
            // dd($request->method());
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
            if( $request->has('page')) {
                $program = session('program');
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
                session()->forget(['program','negeri', 'daerah', 'fasiliti', 'subsetia', 'kategori', 'projekProgram', 'pelaksana', 'status', 'projek']);
            }
        }

        if ($queryType == 1) {
            $query = \DB::table('tblprojek as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama');
            if(auth()->user()->role==1){
                $projekData = $query->where(function($q) {
        			$q->where('a.proj_pemilik', auth()->user()->program_id)
              			->orWhere('a.proj_pelaksana_agensi', auth()->user()->program_id);
    			  })
    			  ->where('proj_tahun', Carbon::now()->year)
    			  ->get();            
	    }
            else{
                $projekData = $query->where('a.proj_tahun', Carbon::now()->year)->get();
            }
        }
        else{
	    $role = auth()->user()->role;
	    $pemilik = auth()->user()->program_id;
            $query = \DB::table('tblprojek as a')
                    ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fasiliti_id')
                    ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                    ->leftJoin('tblprogram as d','a.proj_pemilik','d.program_id')
                    ->leftJoin('tblprojek_program as e','a.proj_program','e.proj_program_id')
                    ->select('a.*', 'c.pro_kat_short_nama', 'c.pro_kat_nama', 'd.prog_name', 'b.fas_name', 'e.proj_prog_nama')		    
                    ->where(function($q) use ($program, $negeri, $daerah, $fasiliti, $subsetia, $kategori, $projekProgram, $pelaksana, $status, $projek, $role, $pemilik){
			if($role==1){
                		$q->where('a.proj_pemilik', $pemilik)->orWhere('a.proj_pelaksana_agensi', $pemilik);
            		}
                        if(!empty($program)){
                            $q->where('a.proj_pemilik',$program);
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
         
	$projekData = $query->where('a.proj_tahun', Carbon::now()->year)->get();
            // Belanja?
            // Tanggung?
        }
        $stats = Projek::where('proj_pemilik', auth()->user()->program_id)->where('proj_tahun', date('Y'));
        $jumlah =   $stats->whereIn('proj_status', [1,2,5])->whereNotIn('proj_kategori_id', [1011, 1012])->sum('proj_waran');
        $lulus =   $stats->whereIn('proj_status', [1,2,5])->whereNotIn('proj_kategori_id', [1011, 1012])->sum('proj_kos_lulus');
        $tangungan =   $stats->where('proj_status', [1,5])->sum('proj_kos_sebenar');
        // $jimat1 =  $stats->whereIn('proj_status', [3,4])->sum('proj_waran');
        // $jimat2 =   $stats->where('proj_status', 1)->sum('proj_penjimatan');
        $jimat = \DB::table('tblbakul_jimat')
                ->where('bj_program_id', auth()->user()->program_id)
                ->whereIn('bj_kategori', [1,2])
                ->where('bj_status', 1)
                ->sum('bj_amount_jimat');
        // dd($belanja);
        // $belanja = \DB::table('tblprojek_bayaran as a')
        //             ->join('tblprojek as b','a.byr_projk_id','b.projek_id')
        //             ->where('b.proj_pemilik', auth()->user()->program_id)
        //             ->sum('a.byr_amount');
        // dd($belanja);
        $data['jimat'] = $jimat;
        $data['projek'] = $projekData;
        $data['tangungan'] = $tangungan;
        $data['jumlah'] = $jumlah;
        $data['lulus'] = $lulus;

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
        // $details = ProjekDetails::where('projd_projek_id', $id)->get();
        $utilities = ProjekUtilities::where('projuti_projek_id', $id)->get();
        $waran = Waran::where('waran_projek_id', $id)->get();

        $data['projek'] = $projek;
        // $data['details'] = $details;
        $data['waran'] = $waran;
        $data['utilities'] = $utilities;
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

        // dd($request->all());
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
        // $projek->proj_justifikasi = $request->proj_justifikasi;
        // $projek->proj_ulasan_teknikal = $request->proj_ulasan_teknikal;
        $projek->proj_catatan = $request->proj_catatan;
        $projek->proj_kos_lulus = $request->proj_kos_lulus;
        $projek->proj_kos_sebenar = $request->proj_kos_sebenar;
        $projek->proj_tangungan = $request->proj_tangungan;
        $projek->proj_penjimatan = $request->proj_penjimatan;
	    $projek->proj_waran_no = $request->proj_waran_no;
        $projek->proj_status = $request->proj_status;
        if( $request->proj_status<>1){
            $projek->proj_memo = $request->proj_memo;
        }


        $projek->save();
        if($projek){
            // CEK KUASA PKN BARU MASUK BAKUL
            // if($projek->proj_kuasa_pkn==1){
                // insert penjimatan
                if($request->proj_penjimatan>0 &&  $request->proj_status==1){
                    // cek rekod dah wujud belum
                    $cek = BakulJimat::where('bj_projek_id',  $request->projek_id)->first();
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
                        $bakul->bj_program_id = $projek->proj_pemilik;
                        $bakul->bj_title = $projek->proj_nama;
                        $bakul->bj_subsetia = $projek->proj_kod_subsetia;
                        $bakul->bj_kuasa_pkn = $projek->proj_kuasa_pkn;
                        $bakul->bj_amount_jimat = $request->proj_penjimatan;
                        $bakul->bj_kategori = $request->proj_status;
                        $bakul->bj_created_by = auth()->user()->id;
                        $bakul->bj_updated_by = auth()->user()->id;
                        $bakul->save();
                    }
                    // dd($cek);
                }

                // Tukar Tajuk
                if($request->proj_status==2){
                    // cek rekod dah wujud belum
                    $cek = BakulJimat::where('bj_projek_id',  $request->projek_id)->where('bj_program_id', $request->proj_pemilik)->first();
                    if(!$cek){
                        // create bakul
                        $bakul = new BakulJimat();
                        $bakul->bj_projek_id = $request->projek_id;
                        $bakul->bj_program_id = auth()->user()->program_id;
                        $bakul->bj_title = $projek->proj_nama;
                        $bakul->bj_subsetia = $projek->proj_kod_subsetia;
                        $bakul->bj_kuasa_pkn = $projek->proj_kuasa_pkn;
                        $bakul->bj_amount_jimat = $request->proj_kos_lulus;
                        $bakul->bj_kategori = $request->proj_status;
                        $bakul->bj_created_by = auth()->user()->id;
                        $bakul->bj_updated_by = auth()->user()->id;
                        $bakul->save();
                    }
                }
            // }
            // else{

            // }
            return redirect('/projek/senarai')->with(['success'=>'Rekod berjaya dikemaskini']);
        }
    }
}
