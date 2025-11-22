<?php

namespace App\Models\Pentadbiran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKerja extends Model
{
use HasFactory;


protected $table = 'tblprojek_jeniskerja';
protected $primaryKey = 'id';
public $timestamps = true;


protected $fillable = [
'jenis_kerja',
'status'
];
}
