<?php
namespace App\Traits\Projek;
use App\Models\Siling;

trait SilingTrait
{
    public function cekSiling(string $id){
        $sil = Siling::where('sil_fasiliti_id', $id)
                ->where('sil_edate', '>', now())
                ->where('sil_status', 1)
                ->last();

        if($sil)
            return true;
        else

        return false;
    }
}
