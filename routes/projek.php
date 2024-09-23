<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth','role:super-admin|admin']], function() {
    // PERMOHONAN
    Route::any('/projek/senarai', [App\Http\Controllers\Projek\ProjekController::class, 'index'])->name('projek.senarai');
    Route::get('/projek/tambah', [App\Http\Controllers\Projek\ProjekController::class, 'create'])->name('projek.tambah');
    Route::post('/projek/simpan', [App\Http\Controllers\Projek\ProjekController::class, 'store'])->name('projek.simpan');
    Route::get('/projek/ubah/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'edit'])->name('projek.ubah');
    Route::get('/projek/papar/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'view'])->name('projek.papar');

    // PERMOHONAN BARU
    Route::get('/permohonan/baru/main', [App\Http\Controllers\Projek\ProjekBaruController::class, 'showList'])->name('projek.kecemasan.main');
    Route::any('/permohonan/baru/senarai', [App\Http\Controllers\Projek\ProjekBaruController::class, 'index']);
    Route::get('/permohonan/baru/tambah', [App\Http\Controllers\Projek\ProjekBaruController::class, 'create'])->name('permohonan.baru.tambah');
    Route::post('/permohonan/baru/simpan', [App\Http\Controllers\Projek\ProjekBaruController::class, 'store'])->name('permohonan.baru.simpan');
    Route::post('/permohonan/baru/upload', [App\Http\Controllers\Projek\ProjekBaruController::class, 'upload'])->name('permohonan.baru.upload');
    Route::get('/permohonan/baru/papar/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'add2'])->name('permohonan.baru.papar');
    Route::post('/permohonan/baru/emel', [App\Http\Controllers\Projek\ProjekBaruController::class, 'emel'])->name('permohonan.baru.emel');
    Route::get('/permohonan/baru/ubah/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'edit'])->name('permohonan.baru.ubah');
    Route::post('/permohonan/baru/update', [App\Http\Controllers\Projek\ProjekBaruController::class, 'update'])->name('permohonan.baru.update');
    Route::post('/permohonan/baru/unjuran/simpan', [App\Http\Controllers\Projek\ProjekBaruController::class, 'simpanUnjuran']);
    Route::get('/permohonan/baru/unjuran/senarai/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'senaraiUnjuran']);
    Route::get('/permohonan/baru/dokumen/senarai/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'senaraiDokumen']);
    Route::get('/permohonan/baru/unjuran/padam/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'padamUnjuran']);
    Route::get('/permohonan/baru/dokumen/padam/{id}', [App\Http\Controllers\Projek\ProjekBaruController::class, 'padamDokumen']);

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
    Route::post('/permohonan/kecemasan/unjuran/simpan', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'simpanUnjuran']);
    Route::get('/permohonan/kecemasan/unjuran/senarai/{id}', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'senaraiUnjuran']);
    Route::get('/permohonan/kecemasan/dokumen/senarai/{id}', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'senaraiDokumen']);
    Route::get('/permohonan/kecemasan/unjuran/padam/{id}', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'padamUnjuran']);
    Route::get('/permohonan/kecemasan/dokumen/padam/{id}', [App\Http\Controllers\Projek\ProjekKecemasanController::class, 'padamDokumen']);
    // Route::get('/projek/papar/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'view'])->name('projek.papar');

    // RUNCIT
    Route::any('/permohonan/runcit/senarai', [App\Http\Controllers\Projek\ProjekRuncitController::class, 'index'])->name('projek.runcit.senarai');
    Route::get('/permohonan/runcit/tambah', [App\Http\Controllers\Projek\ProjekRuncitController::class, 'create'])->name('permohonan.runcit.tambah');
    Route::post('/permohonan/runcit/simpan', [App\Http\Controllers\Projek\ProjekRuncitController::class, 'store'])->name('permohonan.runcit.simpan');

    // PENJIMATAN
    Route::any('/projek/penjimatan/senarai', [App\Http\Controllers\Projek\ProjekJimatController::class, 'index'])->name('projek.penjimatan.senarai');
    Route::get('/projek/penjimatan/tambah', [App\Http\Controllers\Projek\ProjekJimatController::class, 'create'])->name('permohonan.penjimatan.tambah');
    Route::post('/projek/penjimatan/simpan', [App\Http\Controllers\Projek\ProjekJimatController::class, 'store'])->name('permohonan.penjimatan.simpan');

    // TUKAR GUNA
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
    Route::post('/projek/papar/utiliti/kemaskini', [App\Http\Controllers\Projek\UtilitiController::class, 'update']);

    // SEMAK PERMOHONAN
    Route::get('/permohonan/semak/main', [App\Http\Controllers\Projek\SemakProjekController::class, 'showList'])->name('projek.semak.main');
    Route::any('/permohonan/semak/senarai', [App\Http\Controllers\Projek\SemakProjekController::class, 'index']);
    // Route::get('/permohonan/semak/tambah', [App\Http\Controllers\Projek\SemakProjekController::class, 'create'])->name('permohonan.kecemasan.tambah');
    // Route::post('/permohonan/semak/simpan', [App\Http\Controllers\Projek\SemakProjekController::class, 'store'])->name('permohonan.kecemasan.simpan');
    // Route::post('/permohonan/semak/upload', [App\Http\Controllers\Projek\SemakProjekController::class, 'upload'])->name('permohonan.kecemasan.upload');
    // Route::get('/permohonan/semak/papar/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'add2'])->name('permohonan.kecemasan.papar');
    // Route::get('/permohonan/semak/emel/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'emel'])->name('permohonan.kecemasan.emel');
    // Route::get('/permohonan/semak/ubah/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'edit'])->name('permohonan.kecemasan.ubah');
    // Route::post('/permohonan/semak/update', [App\Http\Controllers\Projek\SemakProjekController::class, 'update'])->name('permohonan.kecemasan.update');
    // Route::post('/permohonan/semak/unjuran/simpan', [App\Http\Controllers\Projek\SemakProjekController::class, 'simpanUnjuran']);
    // Route::get('/permohonan/semak/unjuran/senarai/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'senaraiUnjuran']);
    // Route::get('/permohonan/semak/dokumen/senarai/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'senaraiDokumen']);
    // Route::get('/permohonan/semak/unjuran/padam/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'padamUnjuran']);
    // Route::get('/permohonan/semak/dokumen/padam/{id}', [App\Http\Controllers\Projek\SemakProjekController::class, 'padamDokumen']);
});
