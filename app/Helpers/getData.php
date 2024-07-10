<?php
use App\Models\Negeri;
use App\Models\Daerah;
use App\Models\Pentadbiran\KategoriFasiliti;
use App\Models\Fasiliti;

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
        ->pluck('faskat_desc', 'faskat_kod')
        ->prepend('--Sila Pilih--', '');
    return $katefas;
}

function dropdownFasiliti(){
    $fasiliti = Fasiliti::where('fas_ptj_level', '1')
        ->orderBy('fas_ptj_code')
        ->pluck('fas_name', 'fas_ptj_code')
        ->prepend('--Sila Pilih--', '');
    return $fasiliti;
}

function getStatus($id){
    if($id==1)
        return "Aktif";
    else
        return "Tidak Aktif";
}

