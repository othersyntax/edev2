<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekDokumen extends Model
{
    use HasFactory;
    public $table = "tblprojek_baru_dokumen";
    public $primaryKey = "proj_document_id";
    public $timestamps = false;
}
