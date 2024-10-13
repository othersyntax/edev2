<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjekBaru extends Model
{
    use HasFactory;
    public $table = "tblprojek_baru";
    public $primaryKey = "projek_id";
    public $timestamps = false;

    protected $fillable = [
        'proj_status_complete',
    ];

    function negeri(){
        return $this->belongsTo(\App\Models\Negeri::class, 'proj_negeri', 'neg_negeri_id');
    }

    function daerah(){
        return $this->belongsTo(\App\Models\Daerah::class, 'proj_daerah', 'dae_daerah_id');
    }

    function program(){
        return $this->belongsTo(\App\Models\Pentadbiran\Program::class, 'proj_pemilik', 'program_id');
    }

    function fasiliti(){
        return $this->belongsTo(\App\Models\Fasiliti::class, 'proj_fasiliti_id', 'fasiliti_id');
    }

    function projekProgram(){
        return $this->belongsTo(\App\Models\Projek\ProjekProgram::class, 'proj_program', 'proj_program_id');
    }

    function jkr(){
        return $this->belongsTo(\App\Models\Pentadbiran\Program::class, 'proj_pelaksana_agensi', 'program_id');
    }
}
