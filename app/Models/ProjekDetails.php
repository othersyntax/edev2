<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekDetails extends Model
{
    use HasFactory;
    public $table = "tblprojek_details";
    public $primaryKey = "projek_details_id";
    public $timestamps = false;
}
