<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekUtilities extends Model
{
    use HasFactory;
    public $table = "tblprojek_utilities";
    public $primaryKey = "projek_uti_id";
    public $timestamps = false;
}
