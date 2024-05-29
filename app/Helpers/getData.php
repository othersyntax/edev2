<?php
use App\Models\Negeri;
use App\Models\Daerah;
use App\Models\Pentadbiran\KategoriFasiliti;

function dropdownNegeri(){
    $negeri = Negeri::where('neg_status', '1')
        ->orderBy('neg_nama_negeri')
        ->pluck('neg_nama_negeri', 'neg_negeri_id')
        ->prepend('--Sila Pilih--', '');
    return $negeri;
}

function dropdownDaerah(){
    $daerah = Daerah::where('dae_status', '1')
        ->orderBy('dae_nama_daerah')
        ->pluck('dae_nama_daerah', 'dae_daerah_id')
        ->prepend('--Sila Pilih--', '');
    return $daerah;
}

function dropdownKatefas(){
    $katefas = KategoriFasiliti::where('faskat_status', '1')
        ->orderBy('faskat_kod')
        ->pluck('faskat_kod', 'faskat_id')
        ->prepend('--Sila Pilih--', '');
    return $katefas;
}

