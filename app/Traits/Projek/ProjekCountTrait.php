<?php
namespace App\Traits\Projek;
use App\Models\Projek\ProjekBaru;

trait ProjekCountTrait
{
    public function getNextNumber(){
        $sort = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->where('proj_tahun', '2025')->count();
        return $sort + 1;
    }

    public function cekSahProjek(){
        $projek = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->whereIn('proj_wf_semak',[1,3])->where('proj_tahun', '2025')->count();
        if($projek==0){
            return true;
        }
        return false;
    }

    public function cekPerakuProjek(){
        $projek = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->whereIn('proj_wf_sah',[1,3])->where('proj_tahun', '2025')->count();
        if($projek==0){
            return true;
        }
        return false;
    }

    public function cekCompleteProjek(){
        $projek = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->where('proj_status_complete',2)->where('proj_tahun', '2025')->count();
        if($projek==0){
            return true;
        }
        return false;
    }

}
