<?php

namespace App\Models\Pentadbiran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = "tblprogram";
    public $primaryKey = "program_id";
    public $timestamps = false;
}
