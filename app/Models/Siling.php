<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mohon\Peruntukan;
use App\Models\Pentadbiran\Program;
use App\Models\User;

class Siling extends Model
{
    use HasFactory;
    public $table = 'tblsiling';
    public $primaryKey = 'siling_id';
    public $timestamps = false;

    protected $fillable = [
        'sil_peruntukan_id',
        'sil_fasiliti_id',
        'sil_bil',
        'sil_tahun',
        'sil_amount',
        'sil_balance',
        'sil_sdate',
        'sil_edate',
        'sil_emel',
        'sil_status',
        'sil_created_by',
        'sil_updated_by',
    ];

    public function peruntukan()
    {
        return $this->belongsTo(Peruntukan::class, 'sil_peruntukan_id', 'peruntukan_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'sil_fasiliti_id', 'program_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'sil_created_by');
    }
}
