<?php

namespace App\Models\Mohon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pentadbiran\Program;
use App\Models\Pentadbiran\KategoriProjek;
use App\Models\Pentadbiran\StatusMohon;
use App\Models\Fasiliti;
use App\Models\Siling;
use App\Models\User;

class ProjekMohon extends Model
{
    use HasFactory;

    protected $table = 'tblprojek_mohon';
    protected $primaryKey = 'projek_id';
    public $timestamps = false; // sebab ada created_at manual
    protected $fillable = [
        'proj_parent_id','proj_siling_id','proj_parlimen','proj_dun','proj_negeri',
        'proj_daerah','proj_fasiliti_id','proj_sort','proj_program','proj_pemilik',
        'proj_pelaksana','proj_pelaksana_agensi','proj_kategori_id','proj_struktur',
        'proj_nama','proj_nama_admin','proj_skop','proj_skop_admin','proj_justifikasi',
        'proj_justifikasi_admin','proj_ulasan_teknikal','proj_catatan','proj_catatan_admin',
        'proj_amaun','proj_amaun_dilulus','proj_laksana_mula','proj_laksana_tamat',
        'proj_penyedia_id','proj_pengesah_id','proj_peraku_id','proj_status',
        'proj_updated_by','proj_updated_at'
    ];

    /**
     * Type casting for automatic data conversion.
     */
    protected $casts = [
        'proj_amaun' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relationship: ProjekMohon belongs to a Siling (program).
     * Foreign key: proj_pemilik_id → tblsiling.program_id
     */
    public function pemilik()
    {
        return $this->belongsTo(Program::class, 'proj_pemilik', 'program_id');
    }

    public function siling() {
        return $this->belongsTo(Siling::class, 'proj_siling_id', 'siling_id');
    }

    public function fasiliti() {
        return $this->belongsTo(Fasiliti::class, 'proj_fasiliti_id', 'fasiliti_id');
    }

    public function daerah() {
        return $this->belongsTo(DdsaKodDaerah::class, 'proj_daerah', 'dae_daerah_id');
    }

    public function negeri() {
        return $this->belongsTo(DdsaKodNegeri::class, 'proj_negeri', 'neg_negeri_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriProjek::class, 'proj_kategori_id', 'proj_kategori_id');
    }

    public function statusMohon()
    {
        return $this->belongsTo(StatusMohon::class, 'proj_status', 'status_id');
    }

    public function penyedia()
    {
        return $this->belongsTo(User::class, 'penyedia_id');
    }

    public function pengesah()
    {
        return $this->belongsTo(User::class, 'pengesah_id');
    }

    public function peraku()
    {
        return $this->belongsTo(User::class, 'peraku_id');
    }

    public function scopeStatus($query, $status)
    {
        if (!empty($status) && $status !== 'semua') {
            return $query->where('proj_status', $status);
        }
        return $query;
    }

    /**
     * Get formatted status badge for quick display in Blade.
     */
    public function getStatusBadgeAttribute()
    {
        switch ($this->status) {
            case '1':
                return '<span class="badge bg-warning text-dark">Baru</span>';
            case '2':
                return '<span class="badge bg-info text-dark">Disahkan</span>';
            case '3':
                return '<span class="badge bg-success">Diperaku</span>';
            case '4':
                return '<span class="badge bg-success">Diluluskan</span>';
            default:
                return '<span class="badge bg-secondary">Tidak Diluluskan</span>';
        }
    }
}
