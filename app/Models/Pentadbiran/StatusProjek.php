<?php

namespace App\Models\Pentadbiran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusProjek extends Model
{
    use HasFactory;

    protected $table = 'tblprojek_status_pemantauan';
    protected $primaryKey = 'status_id';
    public $timestamps = true;

    protected $fillable = [
        'status',
    ];
}
