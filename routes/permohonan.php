<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mohon\PeruntukanController;
use App\Http\Controllers\Mohon\SilingController;
use App\Http\Controllers\Mohon\ProjekMohonController;

Route::group(['middleware' => ['auth','role:super-admin|admin']], function() {
    Route::resource('/permohonan/peruntukan', PeruntukanController::class);
    Route::resource('siling', SilingController::class);
});

Route::resource('projekmohon', ProjekMohonController::class);
Route::post('projekmohon/{id}/submit', [ProjekMohonController::class, 'submit'])->name('projekmohon.submit');
Route::post('projekmohon/{id}/approve', [ProjekMohonController::class, 'approve'])->name('projekmohon.approve');
Route::get('/projekmohon/daerah/{negeri_id}', [ProjekMohonController::class, 'getDaerah']);
Route::get('/projekmohon/fasiliti/{daerah_id}', [ProjekMohonController::class, 'getFasiliti']);
Route::get('/projekmohon/ajax-peruntukan/{id}', [ProjekMohonController::class, 'getPeruntukan']);
