<?php

use Illuminate\Support\Facades\Route;

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
