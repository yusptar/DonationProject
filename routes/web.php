<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FotoKegiatanController;


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
    return view('home');
});


Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('admin', [AdminController::class, 'user_view'])->name('admin');
Route::get('dashboard', [AdminController::class, 'dashboard_view'])->name('dashboard');

// Manage User
Route::resource('manageuser', AdminController::class);

// Manage Foto Kegiatan
// Route::resource('fotokegiatan', FotoKegiatanController::class);
Route::post('upload', [FotoKegiatanController::class, 'store']);
Route::get('fotokegiatan', [FotoKegiatanController::class, 'index'])->name('fotokegiatan');
Route::get('fotokegiatan/{id}/edit', [FotoKegiatanController::class, 'edit']);
Route::post('fotokegiatan/store', [FotoKegiatanController::class, 'store']);
Route::get('fotokegiatan/delete/{id}', [FotoKegiatanController::class, 'destroy']);








/*Route::get('manageuser', [AdminController::class, 'user_view'])->name('manageuser');
Route::post('tambah-user', [AdminController::class, 'store']);
// Route::post('edit-user', [AdminController::class, 'edit']);
Route::get('edit-user/{id}', [AdminController::class, 'edit_user']);
Route::post('update-user/{id}', [AdminController::class, 'update_user']);
Route::post('delete-user', [AdminController::class, 'destroy']);*/
