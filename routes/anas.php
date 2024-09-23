<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pentadbiran\PenggunaController;

// PROGRAM
Route::get('/pentadbiran/pengguna', [PenggunaController::class, 'index']);
Route::any('/pentadbiran/pengguna/ajax-all', [PenggunaController::class, 'ajaxAll']);
Route::post('/pentadbiran/pengguna/simpan', [PenggunaController::class, 'store']);
Route::get('/pentadbiran/pengguna/ubah/{id}', [PenggunaController::class, 'edit']);
Route::post('/pentadbiran/pengguna/kemaskini', [PenggunaController::class, 'update']);
Route::delete('/pentadbiran/pengguna/padam/{id}', [PenggunaController::class, 'destroy']);
