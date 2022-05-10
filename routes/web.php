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
Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::post('/kegiatan-store', [KegiatanController::class, 'store'])->name('kegiatan-store');
Route::get('/kegiatan-fetchall', [KegiatanController::class, 'fetchAll'])->name('kegiatan-fetchAll');
Route::delete('/kegiatan-delete', [KegiatanController::class, 'delete'])->name('kegiatan-delete');
Route::get('/kegiatan-edit', [KegiatanController::class, 'edit'])->name('kegiatan-edit');
Route::post('/kegiatan-update', [KegiatanController::class, 'update'])->name('kegiatan-update');

// Manage Berita
Route::get('/berita', [BeritaController::class, 'index']);
Route::post('/berita-store', [BeritaController::class, 'store'])->name('berita-store');
Route::get('/berita-fetchall', [BeritaController::class, 'fetchAll'])->name('berita-fetchAll');
Route::delete('/berita-delete', [BeritaController::class, 'delete'])->name('berita-delete');
Route::get('/berita-edit', [BeritaController::class, 'edit'])->name('berita-edit');
Route::post('/berita-update', [BeritaController::class, 'update'])->name('berita-update');








/*Route::get('manageuser', [AdminController::class, 'user_view'])->name('manageuser');
Route::post('tambah-user', [AdminController::class, 'store']);
// Route::post('edit-user', [AdminController::class, 'edit']);
Route::get('edit-user/{id}', [AdminController::class, 'edit_user']);
Route::post('update-user/{id}', [AdminController::class, 'update_user']);
Route::post('delete-user', [AdminController::class, 'destroy']);*/
