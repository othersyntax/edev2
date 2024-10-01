<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekProgram extends Model
{
    use HasFactory;
    public $table = "tblprojek_program";
    public $primaryKey = "proj_program_id";
    public $timestamps = false;
}
