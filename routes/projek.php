<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth','role:super-admin|admin|pemilik|penyedia|pengesah|peraku|pembaca']], function() {
    // PERMOHONAN
    Route::any('/projek/senarai', [App\Http\Controllers\Projek\ProjekController::class, 'index'])->name('projek.senarai');
    Route::get('/projek/tambah', [App\Http\Controllers\Projek\ProjekController::class, 'create'])->name('projek.tambah');
    Route::post('/projek/simpan', [App\Http\Controllers\Projek\ProjekController::class, 'store'])->name('projek.simpan');
    Route::get('/projek/papar/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'view'])->name('projek.papar');
    Route::post('/projek/excel', [App\Http\Controllers\Projek\ProjekController::class, 'exportExcel'])->name('projek.export');
    Route::post('/projek/pdf', [App\Http\Controllers\Projek\ProjekController::class, 'cetakPermohonan'])->name('projek.cetak');
});

Route::group(['middleware' => ['auth','role:super-admin|admin|pemilik|penyedia|pengesah|peraku']], function() {
    // PERMOHONAN - EXCLUDE PEMBACA
    Route::get('/projek/ubah/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'edit'])->name('projek.ubah');

    // PERMOHONAN BARU
    Route::get('/permohonan/baru/main', [App\Http\Controllers\Projek\ProjekBaruController::class, 'showList'])->name('projekBaruMain');
    Route::any('/permohonan/baru/senarai', [App\Http\Controllers\Projek\ProjekBaruController::class, 'index']);
    Route::get('/permohonan/baru/tambah', [App\Http\Controllers\Projek\ProjekBaruController::class, 'create'])->name('permohonan.baru.tambah');
    Route::post('/permohonan/baru/simpan', [App\Http\Controllers\Projek\ProjekBaruController::class, 'store'])->name('permohonan.baru.simpan');
    Route::post('/permohonan/baru/upload', [App\Http\Controllers\Projek\ProjekBaruController::class, 'upload'])->name('permohonan.baru.upload');
    Route::get('/permohonan/baru/papar/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'add2'])->name('permohonan.baru.papar');
    Route::post('/permohonan/baru/emel', [App\Http\Controllers\Projek\ProjekBaruController::class, 'emel'])->name('permohonan.baru.emel');
    Route::get('/permohonan/baru/ubah/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'edit'])->name('permohonan.baru.ubah');
    Route::get('/permohonan/baru/salin/{id}/{sumber}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'salin']);
    Route::post('/permohonan/baru/update', [App\Http\Controllers\Projek\ProjekBaruController::class, 'update'])->name('permohonan.baru.update');
    Route::get('/permohonan/baru/selesai/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'selesai'])->name('permohonan.baru.selesai');
    Route::post('/permohonan/baru/semakan', [App\Http\Controllers\Projek\ProjekBaruController::class, 'semakan']);



    Route::post('/permohonan/baru/perakuan', [App\Http\Controllers\Projek\ProjekBaruController::class, 'perakuan']);
    Route::get('/permohonan/baru/revote-sambung', [App\Http\Controllers\Projek\ProjekBaruController::class, 'sambungan']);
    Route::get('/permohonan/baru/main/excel', [App\Http\Controllers\Projek\ProjekBaruController::class, 'exportExcel']);

    // PENGESAHAN PROJEK BAHARU
    Route::get('/permohonan/baru/pengesahan', [App\Http\Controllers\Projek\PengesahanProjekController::class, 'index']);
    Route::get('/permohonan/baru/pengesahan/papar/{id}', [App\Http\Controllers\Projek\PengesahanProjekController::class, 'view']);
    Route::post('/permohonan/baru/pengesahan-satu', [App\Http\Controllers\Projek\PengesahanProjekController::class, 'sahkanSatu']);
    Route::post('/permohonan/baru/pengesahan-pukal', [App\Http\Controllers\Projek\PengesahanProjekController::class, 'sahkanPukal'])->name('baruSahPukal');
    Route::post('/permohonan/baru/maklum-pengesahan', [App\Http\Controllers\Projek\ProjekBaruController::class, 'maklumPengesahan']);

    // PERAKUAN PROJEK BAHARU
    Route::get('/permohonan/baru/perakuan', [App\Http\Controllers\Projek\PerakuanProjekController::class, 'index']);
    Route::get('/permohonan/baru/perakuan/papar/{id}', [App\Http\Controllers\Projek\PerakuanProjekController::class, 'view']);
    Route::post('/permohonan/baru/perakuan-satu', [App\Http\Controllers\Projek\PerakuanProjekController::class, 'perakuSatu']);
    Route::post('/permohonan/baru/perakuan-pukal', [App\Http\Controllers\Projek\PerakuanProjekController::class, 'perakuPukal']);
    Route::post('/permohonan/baru/maklum-perakuan', [App\Http\Controllers\Projek\ProjekBaruController::class, 'maklumPerakuan']);
    Route::get('/permohonan/baru/padam/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'delete']);

    // HANTAR PROJEK BAHARU
    Route::get('/permohonan/baru/hantar-permohonan', [App\Http\Controllers\Projek\HantarPermohonanController::class, 'index']);
    Route::post('/permohonan/baru/maklum-hantar', [App\Http\Controllers\Projek\ProjekBaruController::class, 'hantarPermohonan']);


    // PERMOHONAN KECEMASAN
    Route::get('/permohonan/kecemasan/main', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'showList'])->name('projek.kecemasan.main');
    Route::any('/permohonan/kecemasan/senarai', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'index']);
    Route::get('/permohonan/kecemasan/tambah', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'create'])->name('permohonan.kecemasan.tambah');
    Route::post('/permohonan/kecemasan/simpan', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'store'])->name('permohonan.kecemasan.simpan');
    Route::post('/permohonan/kecemasan/upload', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'upload'])->name('permohonan.kecemasan.upload');
    Route::get('/permohonan/kecemasan/papar/{id}', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'add2'])->name('permohonan.kecemasan.papar');
    Route::get('/permohonan/kecemasan/emel/{id}', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'emel'])->name('permohonan.kecemasan.emel');
    Route::get('/permohonan/kecemasan/ubah/{id}', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'edit'])->name('permohonan.kecemasan.ubah');
    Route::post('/permohonan/kecemasan/update', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'update'])->name('permohonan.kecemasan.update');
    Route::get('/permohonan/kecemasan/selesai/{id}', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'selesai'])->name('permohonan.kecemasan.selesai');

    // RUNCIT
    Route::any('/permohonan/runcit/senarai', [App\Http\Controllers\Projek\ProjekRuncitController::class, 'index'])->name('projek.runcit.senarai');
    Route::get('/permohonan/runcit/tambah', [App\Http\Controllers\Projek\ProjekRuncitController::class, 'create'])->name('permohonan.runcit.tambah');
    Route::post('/permohonan/runcit/simpan', [App\Http\Controllers\Projek\ProjekRuncitController::class, 'store'])->name('permohonan.runcit.simpan');

    // GUNA BAKI PERUNTUKAN
    Route::any('/projek/baki/senarai', [App\Http\Controllers\Projek\GunaBakiController::class, 'index'])->name('projek.baki.senarai');
    Route::get('/projek/baki/tambah-sedia-ada', [App\Http\Controllers\Projek\GunaBakiController::class, 'createCurrent']);
    Route::get('/projek/baki/tambah-baharu', [App\Http\Controllers\Projek\GunaBakiController::class, 'createNew']);
    Route::post('/projek/baki/simpan', [App\Http\Controllers\Projek\GunaBakiController::class, 'store']);
    Route::post('/projek/baki/simpan-sedia-ada', [App\Http\Controllers\Projek\GunaBakiController::class, 'storeSediaAda']);
    Route::post('/projek/baki/pengesahan', [App\Http\Controllers\Projek\GunaBakiController::class, 'pengesahan']);
    Route::get('/projek/baki/papar/{id}', [App\Http\Controllers\Projek\GunaBakiController::class, 'add2'])->name('permohonan.baki.papar');
    Route::post('/projek/baki/update', [App\Http\Controllers\Projek\GunaBakiController::class, 'update'])->name('permohonan.baki.update');
    Route::get('/projek/baki/ubah/{id}', [App\Http\Controllers\Projek\GunaBakiController::class, 'edit'])->name('permohonan.baki.ubah');
    Route::post('/projek/baki/mohon/{id}', [App\Http\Controllers\Projek\GunaBakiController::class, 'mohon'])->name('permohonan.baki.hantar');

    // Route::any('/projek/baki/senarai', [App\Http\Controllers\Projek\GunaBakiController::class, 'index'])->name('projek.baki.senarai');

    // PENJIMATAN
    Route::any('/projek/penjimatan/senarai', [App\Http\Controllers\Projek\ProjekJimatController::class, 'index'])->name('projek.penjimatan.senarai');
    Route::get('/projek/penjimatan/tambah', [App\Http\Controllers\Projek\ProjekJimatController::class, 'create'])->name('permohonan.penjimatan.tambah');
    Route::post('/projek/penjimatan/simpan', [App\Http\Controllers\Projek\ProjekJimatController::class, 'store'])->name('permohonan.penjimatan.simpan');
    Route::post('/projek/penjimatan/kemaskini', [App\Http\Controllers\Projek\ProjekJimatController::class, 'update']);
    Route::get('/projek/penjimatan/padam/{id}', [App\Http\Controllers\Projek\ProjekJimatController::class, 'delete']);
    Route::get('/projek/penjimatan/ubah/{id}', [App\Http\Controllers\Projek\ProjekJimatController::class, 'edit']);

    // PENJIMATAN
    Route::any('/pengesahan/penjimatan/senarai', [App\Http\Controllers\Projek\TukarGunaController::class, 'index'])->name('pengesahan.penjimatan.senarai');

    //SENARAI PERMOHONAN
    Route::any('/permohonan/senarai', [App\Http\Controllers\PermohonanController::class, 'index'])->name('permohonan.senarai');
    Route::get('/permohonan/tambah', [App\Http\Controllers\PermohonanController::class, 'create'])->name('permohonan.tambah');
    Route::post('/permohonan/simpan', [App\Http\Controllers\PermohonanController::class, 'store'])->name('permohonan.simpan');
    Route::get('/permohonan/ubah/{id}', [App\Http\Controllers\PermohonanController::class, 'edit'])->name('permohonan.ubah');
    Route::get('/permohonan/papar/{id}', [App\Http\Controllers\PermohonanController::class, 'view'])->name('permohonan.papar');
    // Route::get('/siling/senarai/{silingID}/delete', [App\Http\Controllers\SilingController::class, 'destroy']);
    // Projek Utiliti
    Route::get('/projek/papar/utiliti/senarai/{id}', [App\Http\Controllers\Projek\UtilitiController::class, 'index']);
    Route::get('/projek/papar/utiliti/{id}', [App\Http\Controllers\Projek\UtilitiController::class, 'edit']);
    Route::post('/projek/papar/utiliti/padam/{id}', [App\Http\Controllers\Projek\UtilitiController::class, 'delete']);
    Route::post('/projek/papar/utiliti/kemaskini', [App\Http\Controllers\Projek\UtilitiController::class, 'update']);
    Route::post('/projek/papar/utiliti/tambah', [App\Http\Controllers\Projek\UtilitiController::class, 'store']);

    // PROJEK BAYARAN
    Route::get('/projek/papar/bayaran/senarai/{id}', [App\Http\Controllers\Projek\BayaranController::class, 'index']);
    Route::get('/projek/papar/bayaran/{id}', [App\Http\Controllers\Projek\BayaranController::class, 'edit']);
    Route::post('/projek/papar/bayaran/padam/{id}', [App\Http\Controllers\Projek\BayaranController::class, 'delete']);
    Route::post('/projek/papar/bayaran/kemaskini', [App\Http\Controllers\Projek\BayaranController::class, 'update']);
    Route::post('/projek/papar/bayaran/tambah', [App\Http\Controllers\Projek\BayaranController::class, 'store']);

    // PROJEK UNJURAN
    Route::post('/projek/papar/unjuran/simpan', [App\Http\Controllers\Projek\UnjuranController::class, 'simpanUnjuran']);
    Route::get('/projek/papar/unjuran/senarai/{id}', [App\Http\Controllers\Projek\UnjuranController::class, 'index']);
    Route::get('/projek/papar/unjuran/padam/{id}', [App\Http\Controllers\Projek\UnjuranController::class, 'padamUnjuran']);
    Route::get('/projek/papar/unjuran/edit/{id}', [App\Http\Controllers\Projek\UnjuranController::class, 'edit']);

    // PROJEK UNJURAN
    Route::post('/projek/papar/peruntukan/simpan', [App\Http\Controllers\Projek\PeruntukanController::class, 'store']);
    Route::get('/projek/papar/peruntukan/senarai/{id}', [App\Http\Controllers\Projek\PeruntukanController::class, 'index']);
    Route::get('/projek/papar/peruntukan/padam/{id}', [App\Http\Controllers\Projek\PeruntukanController::class, 'delete']);
    Route::get('/projek/papar/peruntukan/edit/{id}', [App\Http\Controllers\Projek\PeruntukanController::class, 'edit']);

    // PROJEK DOKUMEN
    Route::get('/permohonan/papar/dokumen/senarai/{id}', [App\Http\Controllers\Projek\DokumenController::class, 'index']);
    Route::post('/permohonan/papar/upload', [App\Http\Controllers\Projek\DokumenController::class, 'upload']);
    Route::get('/permohonan/papar/dokumen/padam/{id}', [App\Http\Controllers\Projek\DokumenController::class, 'padamDokumen']);
    // SEMAK PERMOHONAN
    Route::any('/permohonan/semak/main/{pemilik}', [App\Http\Controllers\Projek\SemakProjekController::class, 'showList'])->name('projek.semak.main');
    Route::any('/permohonan/semak/senarai', [App\Http\Controllers\Projek\SemakProjekController::class, 'indexMain']);
    Route::any('/permohonan/semak/papar/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'papar']);
    Route::post('/permohonan/semak/pilihan', [App\Http\Controllers\Projek\SemakProjekController::class, 'kemaskini']);
    Route::any('/permohonan/semak/notifikasi/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'emel']);
    Route::get('/permohonan/semak/ubah/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'edit']);
    Route::post('/permohonan/semak/update', [App\Http\Controllers\Projek\SemakProjekController::class, 'update']);
    Route::post('/permohonan/semak/salur-waran', [App\Http\Controllers\Projek\SemakProjekController::class, 'salur']);

    // KELULUSAN
    Route::get('/permohonan/kelulusan/senarai', [App\Http\Controllers\Projek\KelulusanController::class, 'index']);
    // Route::get('/permohonan/kelulusan/pdf', [App\Http\Controllers\Projek\KelulusanController::class, 'pdf']);
    Route::get('/permohonan/kelulusan/pdf/{id}',  [App\Http\Controllers\Projek\KelulusanController::class, 'cetakPermohonan']);
});
