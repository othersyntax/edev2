<?php

namespace App\Models\Pentadbiran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProjek extends Model
{
   
    use HasFactory;
    public $table = "tblprojek_kategori";
    public $primaryKey = "proj_kategori_id";
    public $timestamps = false;
}
