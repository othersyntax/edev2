<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekGunaBaki extends Model
{
    use HasFactory;
    public $table = "tblprojek_guna_baki";
    public $primaryKey = "projek_id";
    public $timestamps = false;
}
