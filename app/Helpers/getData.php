<?php
use App\Models\Negeri;
use App\Models\Daerah;
use App\Models\Pentadbiran\KategoriFasiliti;
use App\Models\Pentadbiran\Program;
use App\Models\Pentadbiran\KategoriProjek;
use App\Models\Fasiliti;
use App\Models\Siling;
use App\Models\BakulJimat;
use App\Models\Modul;

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

function dropdownProgram(){
    $program = Program::where('prog_status', '1')
        ->orderBy('prog_name')
        ->pluck('prog_name', 'program_id')
        ->prepend('--Sila Pilih--', '');
    return $program;
}

function dropdownProjekKategori(){
    $projKat = KategoriProjek::where('pro_kat_status', '1')
        ->orderBy('pro_kat_nama')
        ->pluck('pro_kat_nama', 'proj_kategori_id')
        ->prepend('--Sila Pilih--', '');
    return $projKat;
}

function dropdownModul(){
    $modul = Modul::where('status', '1')
        ->orderBy('modul')
        ->pluck('modul', 'id')
        ->prepend('--Sila Pilih--', '0');
    return $modul;
}

function getListJKR(){
    $modul = Program::where('prog_kategori', 'JKR')
        ->orderBy('prog_name')
        ->pluck('prog_name', 'program_id')
        ->prepend('--Sila Pilih--', '');
    return $modul;
}

function getStatus($id){
    if($id==1)
        return "Aktif";
    else
        return "Batal";
}
function getStatusProjek($id){
    if($id==1)
        return "Baru";
    else if($id==2)
        return "Berjaya";
    else
        return "Tolak";
}
function getStatusJimat($id){
    if($id==1)
        return "Baru";
    else
        return "Telah Guna";
}

function cekSiling($id){
    $sil = Siling::where('sil_fasiliti_id', $id)
            ->where('sil_edate', '>', now())
            ->where('sil_status', 1)
            ->first();

    if($sil)
        return true;
    else

    return false;
}
function cekJimat($id){
    $sil = BakulJimat::where('bj_program_id', $id)
            ->where('bj_status', 1)
            ->get();

    if($sil)
        return true;
    else
        return false;
}

