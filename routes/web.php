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
    return view('landing.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

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

    Route::any('/akses/pengguna', [App\Http\Controllers\UserController::class, 'index']);
    Route::resource('/akses/users', App\Http\Controllers\UserController::class);
    Route::get('/akses/users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

});

Route::group(['middleware' => ['auth','role:super-admin|admin']], function() {
    // SILING
    Route::resource('/siling/senarai', App\Http\Controllers\SilingController::class);
    Route::post('/siling/senarai/update/{id}', [App\Http\Controllers\SilingController::class, 'update']);
    Route::post('/siling/senarai/emel', [App\Http\Controllers\SilingController::class, 'emel']);
    Route::post('/siling/showList', [App\Http\Controllers\SilingController::class, 'showList']);
    Route::get('/siling/senarai/create', [App\Http\Controllers\SilingController::class, 'create']);
    Route::get('/siling/senarai/{silingID}/delete', [App\Http\Controllers\SilingController::class, 'destroy']);

    Route::get('/permohonan/baru/pdf',  [App\Http\Controllers\Projek\PdfController::class, 'index']);
    Route::get('/permohonan/semak/pdf/{id}',  [App\Http\Controllers\Projek\PdfController::class, 'cetakPermohonan']);
});

Route::get('/hantar/emel', [App\Http\Controllers\Mail\MailTestController::class, 'hantarEmel']);

Route::get('/sending/testemel', [App\Http\Controllers\SendMailController::class, 'hantarEmel']);

Route::get('/export-pdf', function () {
    $data = [
        'title' => 'PDF Export Example',
        'content' => 'This is a sample PDF generated from a Blade view.',
    ];

    // Render Blade view to PDF
    $pdf = Pdf::loadView('pdf.example', $data)->setPaper('a4', 'landscape');

    // Return PDF download response
    return $pdf->download('example.pdf');
});



require __DIR__.'/auth.php';
require __DIR__.'/pentadbiran.php';
require __DIR__.'/pengurusan.php';
require __DIR__.'/projek.php';
require __DIR__.'/wan.php';
require __DIR__.'/anas.php';

require __DIR__.'/auth.php';
