<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waran extends Model
{
    use HasFactory;
    public $table = "tblwaran";
    public $primaryKey = "waran_id";
    public $timestamps = false;
}
