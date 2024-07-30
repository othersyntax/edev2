<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BakulJimat extends Model
{
    use HasFactory;
    public $table = "tblbakul_jimat";
    public $primaryKey = "bakul_jimat_id";
    public $timestamps = false;
}
