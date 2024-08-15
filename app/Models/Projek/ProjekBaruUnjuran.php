<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekBaruUnjuran extends Model
{
    use HasFactory;
    public $table = "tblprojek_baru_unjuran";
    public $primaryKey = "proj_unjuran_id";
    public $timestamps = false;
}
