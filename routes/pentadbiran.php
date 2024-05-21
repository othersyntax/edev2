<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\Pentadbiran\DaerahController;
use App\Http\Controllers\Pentadbiran\BandarController;
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