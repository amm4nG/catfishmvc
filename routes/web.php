<?php

use App\Http\Controllers\indexController;
use App\Http\Controllers\kontrolController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pemantauanController;
use App\Http\Controllers\pencatatanController;
use App\Http\Controllers\riwayatController;
use App\Http\Controllers\user_profileController;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\logicalOr;

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

Route::get('/', [indexController::class, 'index'])->name('/');
Route::get('index', [indexController::class, 'index'])->name('index');


Route::get('Login', [loginController::class, 'index'])->name('Login');
Route::get('berhasil_login',[loginController::class, 'berhasil_login'])->name('berhasil_login');
Route::post('klikLogin', [loginController::class, 'klikLogin'])->name('klikLogin');
Route::post('beri-pakan', [indexController::class, 'updateStatus'])->name('beri-pakan');

Route::get('kontrol', [kontrolController::class, 'index'])->name('kontrol');
Route::get('/kontrol/getScheduleData', [KontrolController::class, 'getScheduleData']);
Route::put('edit_kontrol', [KontrolController::class, 'update'])->name('edit_kontrol');
Route::post('hapus_data', [kontrolController::class, 'destroy'])->name('hapus_data');
Route::post('tambah_data', [kontrolController::class, 'tambah_data'])->name('tambah_data');

Route::get('riwayat', [riwayatController::class, 'index'])->name('riwayat');
Route::post('hapus_riwayat', [riwayatController::class, 'destroy'])->name('hapus_riwayat');

Route::get('pencatatan', [pencatatanController::class, 'index'])->name('pencatatan');
Route::post('edit_pencatatan', [pencatatanController::class, 'update'])->name('edit_pencatatan');
Route::post('hapus_pencatatan', [pencatatanController::class, 'destroy'])->name('hapus_pencatatan');
Route::post('tambah_catatan', [pencatatanController::class, 'tambah_catatan'])->name('tambah_catatan');

Route::get('pemantauan',[pemantauanController::class, 'index'])->name('pemantauan');
Route::post('/pemantauan/store',[pemantauanController::class, 'store']);
Route::post('update_pakan',[pemantauanController::class, 'update_pakan'])->name('update_pakan');
Route::post('update_stok', [pemantauanController::class, 'update_stok'])->name('update_stok');
Route::post('tambah_stok', [pemantauanController::class, 'tambah_stok'])->name('tambah_stok');
Route::post('hapus_pakan', [pemantauanController::class, 'hapus_pakan'])->name('hapus_pakan');
Route::post('update_minimum', [pemantauanController::class, 'update_minimum'])->name('update_minimum');

Route::get('user_profile', [user_profileController::class, 'index'])->name('user_profile');
Route::post('update_profile', [user_profileController::class, 'update_profile'])->name('update_profile');
Route::get('berhasil_update',[user_profileController::class, 'berhasil_update'])->name("berhasil_update");

Route::get('Logout', [loginController::class, 'actionlogout'])->name('actionlogout');
