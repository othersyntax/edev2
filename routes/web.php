<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('app.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth','role:super-admin|admin']], function() {

    Route::resource('/akses/permissions', App\Http\Controllers\PermissionController::class);
    Route::get('/akses/permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('/akses/roles', App\Http\Controllers\RoleController::class);
    Route::get('/akses/roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('/akses/roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('/akses/roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('/akses/users', App\Http\Controllers\UserController::class);
    Route::get('/akses/users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

});

// SILING
Route::resource('/siling/senarai', App\Http\Controllers\SilingController::class);
Route::post('/siling/senarai/update/{id}', [App\Http\Controllers\SilingController::class, 'update']);
Route::post('/siling/senarai/emel', [App\Http\Controllers\SilingController::class, 'emel']);
Route::post('/siling/showList', [App\Http\Controllers\SilingController::class, 'showList']);
Route::get('/siling/senarai/create', [App\Http\Controllers\SilingController::class, 'create']);
Route::get('/siling/senarai/{silingID}/delete', [App\Http\Controllers\SilingController::class, 'destroy']);

// PERMOHONAN
Route::any('/projek/senarai', [App\Http\Controllers\Projek\ProjekController::class, 'index'])->name('projek.senarai');
Route::get('/projek/tambah', [App\Http\Controllers\Projek\ProjekController::class, 'create'])->name('projek.tambah');
Route::post('/projek/simpan', [App\Http\Controllers\Projek\ProjekController::class, 'store'])->name('projek.simpan');
Route::get('/projek/ubah/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'edit'])->name('projek.ubah');
Route::get('/projek/papar/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'view'])->name('projek.papar');

// PERMOHONAN
Route::any('/permohonan/baru/senarai', [App\Http\Controllers\Projek\ProjekBaruController::class, 'index'])->name('projek.baru.senarai');
Route::get('/permohonan/baru/tambah', [App\Http\Controllers\Projek\ProjekBaruController::class, 'create'])->name('permohonan.baru.tambah');
Route::post('/permohonan/baru/simpan', [App\Http\Controllers\Projek\ProjekBaruController::class, 'store'])->name('permohonan.baru.simpan');
// Route::get('/projek/ubah/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'edit'])->name('projek.ubah');
// Route::get('/projek/papar/{id}', [App\Http\Controllers\Projek\ProjekController::class, 'view'])->name('projek.papar');

// RUNCIT
Route::any('/permohonan/runcit/senarai', [App\Http\Controllers\Projek\ProjekJimatController::class, 'index'])->name('projek.runcit.senarai');
Route::get('/permohonan/runcit/tambah', [App\Http\Controllers\Projek\ProjekRuncitController::class, 'create'])->name('permohonan.runcit.tambah');
Route::post('/permohonan/runcit/simpan', [App\Http\Controllers\Projek\ProjekRuncitController::class, 'store'])->name('permohonan.runcit.simpan');

// PENJIMATAN
Route::any('/permohonan/penjimatan/senarai', [App\Http\Controllers\Projek\ProjekJimatController::class, 'index'])->name('projek.penjimatan.senarai');
Route::get('/permohonan/penjimatan/tambah', [App\Http\Controllers\Projek\ProjekJimatController::class, 'create'])->name('permohonan.penjimatan.tambah');
Route::post('/permohonan/penjimatan/simpan', [App\Http\Controllers\Projek\ProjekJimatController::class, 'store'])->name('permohonan.penjimatan.simpan');

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


Route::get('/hantar/emel', [App\Http\Controllers\Mail\MailTestController::class, 'hantarEmel']);

Route::get('/sending/testemel', [App\Http\Controllers\SendMailController::class, 'hantarEmel']);

require __DIR__.'/auth.php';
require __DIR__.'/pentadbiran.php';
require __DIR__.'/wan.php';
require __DIR__.'/anas.php';
