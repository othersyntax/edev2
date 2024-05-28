<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siling extends Model
{
    use HasFactory;
    public $table = 'tblsiling';
    public $primaryKey = 'siling_id';
    public $timestamps = false;
}
