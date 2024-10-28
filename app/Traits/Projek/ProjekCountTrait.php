<?php
namespace App\Traits\Projek;
use App\Models\Projek\ProjekBaru;

trait ProjekCountTrait
{
    public function getNextNumber(){
        $sort = ProjekBaru::where('proj_pemilik', auth()->user()->program_id)->count();
        return $sort + 1;
    }

}
