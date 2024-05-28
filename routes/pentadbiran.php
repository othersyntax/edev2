<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\Pentadbiran\DaerahController;
use App\Http\Controllers\Pentadbiran\BandarController;
use App\Http\Controllers\pentadbiran\FasilitiController;
use App\Http\Controllers\Pentadbiran\KategoriFasilitiController;
use App\Http\Controllers\AjaxController;

// GENERAL AJAX
Route::get('/ajax/ajax-daerah/{id}/{input}/{select}', [AjaxController::class, 'ajaxDaerah']);

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