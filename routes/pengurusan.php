<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','role:super-admin|admin']], function() {

    // KECEMASAN
    // Route::get('/pengurusan/kecemasan/main', [App\Http\Controllers\Projek\Pengurusan\KecemasanController::class, 'main']);
    Route::any('/pengurusan/kecemasan/main', [App\Http\Controllers\Projek\Pengurusan\KecemasanController::class, 'index']);
    Route::get('/pengurusan/kecemasan/ubah/{id}', [App\Http\Controllers\Projek\Pengurusan\KecemasanController::class, 'edit']);
    Route::get('/permohonan/kecemasan/pdf/{id}', [App\Http\Controllers\Projek\Pengurusan\KecemasanController::class, 'cetakPermohonan']);
    Route::post('/pengurusan/kecemasan/update', [App\Http\Controllers\Projek\Pengurusan\KecemasanController::class, 'update']);
    
});