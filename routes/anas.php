<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pentadbiran\PenggunaController;


use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// PROGRAM
Route::get('/pentadbiran/pengguna', [PenggunaController::class, 'index']);
Route::any('/pentadbiran/pengguna/ajax-all', [PenggunaController::class, 'ajaxAll']);
Route::post('/pentadbiran/pengguna/simpan', [PenggunaController::class, 'store']);
Route::get('/pentadbiran/pengguna/ubah/{id}', [PenggunaController::class, 'edit']);
Route::post('/pentadbiran/pengguna/kemaskini', [PenggunaController::class, 'update']);
Route::delete('/pentadbiran/pengguna/padam/{id}', [PenggunaController::class, 'destroy']);


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');




// PROGRAM
// Route::get('#', [#::class, 'index']);
// Route::any('#', [#::class, 'ajaxAll']);
// Route::post('#', [#::class, 'store']);
// Route::get('#/{id}', [#::class, 'edit']);
// Route::post('#', [#::class, 'update']);
// Route::delete('#/{id}', [#::class, 'destroy']);
