<?php

namespace App\Models\Projek;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayaran extends Model
{
    use HasFactory;
    public $table = "tblprojek_bayaran";
    public $primaryKey = "bayaran_id";
    public $timestamps = false;

    protected $fillable = [
        'byr_projk_id',
        'byr_refno',
        'byr_date',
        'byr_perihal',
        'byr_amount',
        'byr_created_by',
        'byr_updated_by',
    ];
}
