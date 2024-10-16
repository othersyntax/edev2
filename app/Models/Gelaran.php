<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gelaran extends Model
{
    use HasFactory;
    public $table = "tblgelaran";
    public $primaryKey = "id";
    public $timestamps = false;
}
