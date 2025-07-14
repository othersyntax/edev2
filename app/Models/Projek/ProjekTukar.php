<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekTukar extends Model
{
    use HasFactory;
    public $table = "tblprojek_tukar";
    public $primaryKey = "proj_tukar_id";
    public $timestamps = false;

    public function projek()
    {
        return $this->belongsTo(\App\Models\Projek\Projek::class, 'projt_projek_id', 'projek_id');
    }
}
