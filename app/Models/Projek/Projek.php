<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;

    public $table = "tblprojek";
    public $primaryKey = "projek_id";
    public $timestamps = false;
}
