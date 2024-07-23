<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekBaru extends Model
{
    use HasFactory;
    public $table = "tblprojek_baru";
    public $primaryKey = "projek_id";
    public $timestamps = false;
}
