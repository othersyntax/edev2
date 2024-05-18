<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daerah;
use Form;

class AjaxController extends Controller
{
    function ajaxDaerah(string $id, string $input, string $select) {
        $neg_kod_negeri = $id;
        $inputname = $input;
        $rs = Daerah::where('dae_kod_negeri', $neg_kod_negeri)
            ->orderBy('dae_nama_daerah')
            ->pluck('dae_nama_daerah', 'dae_daerah_id')
            ->prepend('--Sila pilih--', '');
        if($select=='99'){
            $select='';
        }
        echo Form::select($inputname, $rs, $select,
        ['class' => 'form-control', 'id' => $inputname,'name' => $inputname]);
    }
}
