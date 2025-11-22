<?php

namespace App\Models\Pentadbiran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Butiran extends Model
{
    use HasFactory;
    protected $table = 'tblbutiran';
    protected $primaryKey = 'butiran_id';

    protected $fillable = [
        'kod_full', // ubah ikut nama sebenar kolum anda
    ];

    public $timestamps = false;
}
