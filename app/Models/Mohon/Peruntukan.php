<?php

namespace App\Models\Mohon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pentadbiran\Butiran;

class Peruntukan extends Model
{
    use HasFactory;

    protected $table = 'tblperuntukan';
    protected $primaryKey = 'peruntukan_id';
    public $timestamps = false; // sebab ada created_at manual

    protected $fillable = [
        'butiran_id',
        'kod_agensi',
        'kod_projek',
        'kod_setia',
        'kod_subsetia',
        'kod_full',
        'tahun',
        'keterangan',
        'inisiatif',
        'amaun',
        'created_by',
        'created_at'
    ];

    public function butiran() {
        return $this->belongsTo(Butiran::class, 'butiran_id', 'butiran_id');
    }
}
