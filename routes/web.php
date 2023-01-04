<?php

use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('home');
})->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();
//login scan
Route::group(['prefix' => 'scan', 'middleware' => ['auth','scan']], function () {
    
        Route::resource('scanQrcode', ScanController::class);
        Route::get('/insert', [App\Http\Controllers\ScanController::class, 'insert'])->name('insert');
    
});

//login staff
Route::group(['prefix' => 'staf', 'middleware' => ['auth','staf']], function () {
    Route::group(['prefix' => 'absensi'], function () {
        Route::resource('kehadiran', KehadiranController::class);
        Route::get('keterangan/{id}/keterangan', [App\Http\Controllers\KehadiranController::class, 'keterangan'])->name('keterangan');
        Route::get('/rekap', [App\Http\Controllers\KehadiranController::class, 'rekap'])->name('rekap');
    });
});

//login admin 
Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {

    // Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard-admin');
    Route::resource('dashboard', SiswaController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('siswa', SiswaController::class);
    Route::post('/import-siswa', [App\Http\Controllers\SiswaController::class, 'importSiswa'])->name('import-siswa');
    Route::resource('kelas', KelasController::class);
    Route::get('detail/{id}', [App\Http\Controllers\KelasController::class, 'detail'])->name('detail');
    Route::post('/import', [App\Http\Controllers\KelasController::class, 'import'])->name('import');
    Route::resource('rekap-data', RekapController::class);
    Route::resource('users', UserController::class);
    Route::get('detail-absen/{id}', [App\Http\Controllers\RekapController::class, 'detail'])->name('detail-absen');

    
});
