<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NegeriController;
use App\Http\Controllers\Pentadbiran\DaerahController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/utama', function () {
    return view('landing.index');
});
Route::get('/dashboard', function () {
    return view('app.index');
});
Route::get('/login', function () {
    return view('app.login');
});
Route::get('/permohonan', function () {
    return view('app.permohonan.index');
});


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

