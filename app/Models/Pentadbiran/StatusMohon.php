<?php

namespace App\Models\Pentadbiran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusMohon extends Model
{
    use HasFactory;
    public $table = "tblprojek_mohon_status";
    public $primaryKey = "status_id";
    public $timestamps = false;
}
