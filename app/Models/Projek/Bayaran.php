<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayaran extends Model
{
    use HasFactory;
    public $table = "tblprojek_bayaran";
    public $primaryKey = "bayaran_id";
    public $timestamps = false;
}
