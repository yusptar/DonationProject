<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FotoKegiatanController;
use App\Http\Controllers\KegiatanController;


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
Route::get('fotokegiatan', [FotoKegiatanController::class, 'index']);
Route::get('fotokegiatan/{id}/edit', [FotoKegiatanController::class, 'edit']);
Route::post('fotokegiatan/store', [FotoKegiatanController::class, 'store']);
Route::get('fotokegiatan/delete/{id}', [FotoKegiatanController::class, 'destroy']);

//Manage Kegiatan
// Route::get('kegiatan-list', [KegiatanController::class, 'index']);
// Route::get('kegiatan-list/{id}/edit', [KegiatanController::class, 'edit']);
// Route::post('kegiatan-list/store', [KegiatanController::class, 'store']);
// Route::get('kegiatan-list/delete/{id}', [KegiatanController::class, 'destroy']);

Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::post('/kegiatan-store', [KegiatanController::class, 'store'])->name('kegiatan-store');
Route::get('/kegiatan-fetchall', [KegiatanController::class, 'fetchAll'])->name('kegiatan-fetchAll');
Route::delete('/kegiatan-delete', [KegiatanController::class, 'delete'])->name('kegiatan-delete');
Route::get('/kegiatan-edit', [KegiatanController::class, 'edit'])->name('kegiatan-edit');
Route::post('/kegiatan-update', [KegiatanController::class, 'update'])->name('kegiatan-update');








/*Route::get('manageuser', [AdminController::class, 'user_view'])->name('manageuser');
Route::post('tambah-user', [AdminController::class, 'store']);
// Route::post('edit-user', [AdminController::class, 'edit']);
Route::get('edit-user/{id}', [AdminController::class, 'edit_user']);
Route::post('update-user/{id}', [AdminController::class, 'update_user']);
Route::post('delete-user', [AdminController::class, 'destroy']);*/
