<?php

namespace App\Http\Controllers\Projek;

use App\Http\Controllers\Controller;
use App\Traits\Projek\ProjekCountTrait;
use App\Traits\Projek\SilingTrait;
use Illuminate\Http\Request;
use App\Models\Projek\ProjekBaru;
use App\Models\Siling;

class PengesahanProjekController extends Controller
{
    use ProjekCountTrait, SilingTrait;

    public function index(){
        $projek = \DB::table('tblprojek_baru as a')
                ->leftJoin('tblfasiliti as b','a.proj_fasiliti_id','b.fas_ptj_code')
                ->leftJoin('tblprojek_kategori as c','a.proj_kategori_id','c.proj_kategori_id')
                ->leftJoin('tblfasiliti as e','a.proj_fasiliti_id','e.fasiliti_id')
                ->select('a.projek_id', 'c.pro_kat_short_nama', 'a.proj_pemilik', 'c.pro_kat_nama', 'a.proj_kos_mohon', 'a.proj_nama', 'a.proj_sort', 'a.proj_status', 'e.fas_name', 'a.proj_status_complete', 'a.proj_wf_semak', 'a.proj_wf_sah')
                ->where('c.pro_siling', 'Siling')
                ->where('a.proj_pemilik', auth()->user()->program_id)
                ->where('a.proj_tahun', '2025')
                ->where('a.proj_status', 2)
                ->orderBy('a.proj_sort', 'ASC')->get();

        $siling = Siling::where('sil_fasiliti_id', auth()->user()->program_id)
                    ->where('sil_status', 1)
                    ->select('sil_amount', 'sil_tahun', 'sil_sdate', 'sil_edate')->first();
                    //dd($siling);

        $jumlah = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->where('proj_tahun', '2025')->sum('proj_kos_mohon');
        $sambung = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->where('proj_tahun', '2025')->whereIn('proj_kategori_id', [1001,1002])->sum('proj_kos_mohon');
        $data['silingTahun'] = $siling->sil_tahun ? $siling->sil_tahun :'-';
	    $data['silingMula'] = $siling->sil_sdate ? date('d/m/Y', strtotime($siling->sil_sdate)) :'-';
	    $data['silingTamat'] = $siling->sil_edate ? date('d/m/Y', strtotime($siling->sil_edate)) :'-';
        $siling=floatval($siling->sil_amount);
        $jumlah = floatval($jumlah);
        $data['baki'] = $siling - $jumlah;
        $data['sambung'] = $sambung;
        $data['siling'] = $siling;
        $data['jumlah'] = $jumlah;
        $data['projek'] = $projek;
        $data['cekSahProjek'] = $this->cekSahProjek();
        $data['cekCompleteProjek'] = $this->cekCompleteProjek();

        // dd($data);
        return view('app.projek-baru.pengesahan', $data);
    }

    public function view(string $id){
        $data['projek'] = ProjekBaru::find($id);
        return view('app.projek-baru.pengesahan.papar', $data);
    }

    public function sahkanSatu(Request $req){
        // dd($req->all());
        if($req->proj_wf_semak==1){
            return redirect('/permohonan/baru/pengesahan')
            ->with([
                'title'=>'Pengesahan',
                'msg'=>'Sila Pilih Pengsahan',
                'type'=>'warning'
            ]);
        }


        $projek = ProjekBaru::find($req->projek_id);
        $projek->proj_wf_semak = $req->proj_wf_semak;
        $projek->save();

         if($projek){
            return redirect('/permohonan/baru/pengesahan')
            ->with([
                'title'=>'Berjaya',
                'msg'=>'Maklumat projek telah disahkan',
                'type'=>'success'
            ]);
        }
        else{
            return redirect('/permohonan/baru/pengesahan')
            ->with([
                'title'=>'Gagal',
                'msg'=>'Maklumat projek gagal disahkan',
                'type'=>'error'
            ]);
        }
    }

    public function sahkanPukal(Request $req){
        $projekID = $req->projek;

        foreach ($projekID as $proj) {
            $projek_id = $proj['id'];

            $projek = ProjekBaru::where('projek_id',$projek_id)->update([
                'proj_wf_semak'  => 2
             ]);
        }
        return response()->json([
            'status'=>200
        ]);
    }
}
