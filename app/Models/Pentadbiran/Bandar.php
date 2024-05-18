<?php

namespace App\Models\Pentadbiran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandar extends Model
{
    use HasFactory;
    public $table = "ddsa_kod_bandar";
    public $primaryKey = "ban_bandar_id";
    public $timestamps = false;

}
