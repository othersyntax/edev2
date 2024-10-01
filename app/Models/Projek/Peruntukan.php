<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peruntukan extends Model
{
    use HasFactory;
    public $table = "tblprojek_peruntukan";
    public $primaryKey = "peruntukan_id";
    public $timestamps = false;

    protected $fillable = [
        'peru_projek_id',
        'peru_date',
        'peru_jenis_peruntukan',
        'peru_amaun',
        'peru_created_by',
        'peru_updated_by',
    ];
}
