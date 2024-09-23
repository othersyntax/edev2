<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daerah;
use App\Models\Pentadbiran\Bandar;
use App\Models\Fasiliti;
use Form;

class AjaxController extends Controller
{
    function ajaxDaerah(string $id, string $input, string $select) {
        $kodNegeri = $id;
        $rs = Daerah::where('dae_kod_negeri', $kodNegeri)
            ->orderBy('dae_nama_daerah')
            ->pluck('dae_nama_daerah', 'dae_daerah_id')
            ->prepend('--Sila pilih--', '');
        if($select=='99'){
            $select='';
        }
        echo Form::select($input, $rs, $select, ['class' => 'form-control', 'id' => $input,'name' => $input]);
    }

    function ajaxMukim(string $id, string $input, string $select) {
        $rs = Bandar::where('ban_kod_daerah', $id)
            ->orderBy('ban_nama_bandar')
            ->pluck('ban_nama_bandar', 'ban_bandar_id')
            ->prepend('--Sila pilih--', '');
        if($select=='99'){
            $select='';
        }
        echo Form::select($input, $rs, $select, ['class' => 'form-control', 'id' => $input,'name' => $input]);
    }

    function ajaxFasiliti(string $id, string $input, string $select) {
        $rs = Fasiliti::where('fas_daerah_id', $id)
            ->orderBy('fas_name')
            ->pluck('fas_name', 'fasiliti_id')
            ->prepend('--Sila pilih--', '');
        if($select=='99'){
            $select='';
        }
        echo Form::select($input, $rs, $select, ['class' => 'form-control', 'id' => $input,'name' => $input]);
    }
}
