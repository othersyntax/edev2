<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Selenggara extends Model
{
    use HasFactory;
    public $table = "tblprojek_tukar";
    public $primaryKey = "proj_tukar_id";
    public $timestamps = false;
}
