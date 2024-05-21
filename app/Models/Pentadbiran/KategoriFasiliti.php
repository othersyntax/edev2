<?php

namespace App\Models\Pentadbiran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriFasiliti extends Model
{
    use HasFactory;
    public $table = "tblfasiliti_kategori";
    public $primaryKey = "faskat_id";
    public $timestamps = false;
}
