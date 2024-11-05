<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\Pentadbiran\DaerahController;
use App\Http\Controllers\Pentadbiran\BandarController;
use App\Http\Controllers\Pentadbiran\FasilitiController;
use App\Http\Controllers\Pentadbiran\KategoriFasilitiController;
use App\Http\Controllers\Pentadbiran\KategoriProjekController;
use App\Http\Controllers\Pentadbiran\ProgramController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Pentadbiran\StatusProjekController;

// GENERAL AJAX
Route::get('/ajax/ajax-daerah/{id}/{input}/{select}', [AjaxController::class, 'ajaxDaerah']);
Route::get('/ajax/ajax-mukim/{id}/{input}/{select}', [AjaxController::class, 'ajaxMukim']);
Route::get('/ajax/ajax-fasiliti/{id}/{input}/{select}', [AjaxController::class, 'ajaxFasiliti']);
Route::get('/ajax/ajax-agensi-pelaksana/{data}/{input}/{select}', [AjaxController::class, 'ajaxAgensiPelaksana']);

Route::group(['middleware' => ['auth','role:super-admin|admin']], function() {

    // NEGERI
    Route::get('/pentadbiran/negeri', [NegeriController::class, 'index']);
    Route::post('/pentadbiran/negeri/ajax-all', [NegeriController::class, 'ajaxAll']);
    Route::post('/pentadbiran/negeri/simpan', [NegeriController::class, 'store']);
    Route::get('/pentadbiran/negeri/ubah/{id}', [NegeriController::class, 'edit']);
    Route::post('/pentadbiran/negeri/kemaskini', [NegeriController::class, 'update']);
    Route::delete('/pentadbiran/negeri/padam/{id}', [NegeriController::class, 'destroy']);

    // DAERAH
    Route::get('/pentadbiran/daerah', [DaerahController::class, 'index']);
    Route::post('/pentadbiran/daerah/ajax-all', [DaerahController::class, 'ajaxAll']);
    Route::post('/pentadbiran/daerah/simpan', [DaerahController::class, 'store']);
    Route::get('/pentadbiran/daerah/ubah/{id}', [DaerahController::class, 'edit']);
    Route::post('/pentadbiran/daerah/kemaskini', [DaerahController::class, 'update']);
    Route::delete('/pentadbiran/daerah/padam/{id}', [DaerahController::class, 'destroy']);

    // BANDAR
    Route::get('/pentadbiran/bandar', [BandarController::class, 'index']);
    Route::post('/pentadbiran/bandar/ajax-all', [BandarController::class, 'ajaxAll']);
    Route::post('/pentadbiran/bandar/simpan', [BandarController::class, 'store']);
    Route::get('/pentadbiran/bandar/ubah/{id}', [BandarController::class, 'edit']);
    Route::post('/pentadbiran/bandar/kemaskini', [BandarController::class, 'update']);
    Route::delete('/pentadbiran/bandar/padam/{id}', [BandarController::class, 'destroy']);

    //FASILITI
    Route::get('/pentadbiran/fasiliti',[FasilitiController::class,'index']);
    Route::post('/pentadbiran/fasiliti/ajax-all',[FasilitiController::class,'ajaxAll']);
    Route::post('/pentadbiran/fasiliti/simpan', [FasilitiController::class,'store']);
    Route::get('/pentadbiran/fasiliti/ubah/{id}', [FasilitiController::class,'edit']);
    Route::post('/pentadbiran/fasiliti/kemaskini', [FasilitiController::class,'update']);
    Route::delete('/pentadbiran/fasiliti/padam/{id}', [FasilitiController::class,'destroy']);

    //KATEGORI FASILITI
    Route::get('/pentadbiran/kategori-fasiliti', [KategoriFasilitiController::class, 'index']);
    Route::post('/pentadbiran/kategori-fasiliti/ajax-all1', [KategoriFasilitiController::class, 'ajaxAll1']);
    Route::post('/pentadbiran/kategori-fasiliti/simpan', [KategoriFasilitiController::class, 'store']);
    Route::get('/pentadbiran/kategori-fasiliti/ubah/{id}', [KategoriFasilitiController::class, 'edit']);
    Route::post('/pentadbiran/kategori-fasiliti/kemaskini', [KategoriFasilitiController::class, 'update']);
    Route::delete('/pentadbiran/kategori-fasiliti/padam/{id}', [KategoriFasilitiController::class, 'destroy']);

    //KATEGORI PROJEK
    Route::get('/pentadbiran/kategori-projek', [KategoriProjekController::class, 'index']);
    Route::post('/pentadbiran/kategori-projek/ajax-all', [KategoriProjekController::class, 'ajaxAll']);
    Route::post('/pentadbiran/kategori-projek/simpan', [KategoriProjekController::class, 'store']);
    Route::get('/pentadbiran/kategori-projek/ubah/{id}', [KategoriProjekController::class, 'edit']);
    Route::post('/pentadbiran/kategori-projek/kemaskini', [KategoriProjekController::class, 'update']);
    Route::delete('/pentadbiran/kategori-projek/padam/{id}', [KategoriProjekController::class, 'destroy']);

    //PROGRAM
    Route::get('/pentadbiran/program', [ProgramController::class, 'index']);
    Route::post('/pentadbiran/program/ajax-all', [ProgramController::class, 'ajaxAll']);
    Route::post('/pentadbiran/program/simpan', [ProgramController::class, 'store']);
    Route::get('/pentadbiran/program/ubah/{id}', [ProgramController::class, 'edit']);
    Route::post('/pentadbiran/program/kemaskini', [ProgramController::class, 'update']);
    Route::delete('/pentadbiran/program/padam/{id}', [ProgramController::class, 'destroy']);

    //STATUS PROJEK
    Route::get('/pentadbiran/statusProjek', [StatusProjekController::class, 'index']);

    //PROJEK (PENGURUSAN)
    Route::any('/projek/projek-pengurusan', [App\Http\Controllers\Projek\PemantauanPengurusanController::class, 'index'])->name('projek.senarai');
});
