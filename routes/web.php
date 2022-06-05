<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePengasuhController;
use App\Http\Controllers\PengasuhController;
use App\Http\Controllers\OfflineController;


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




Auth::routes();

// ------------------- VIEW ALL USER ------------------ //

// User View
Route::get('/', [HomeController::class, 'index']);
Route::get('/detail-kegiatan/{id}', [HomeController::class, 'index_detail_kegiatan']);
Route::get('/detail-berita/{id}', [HomeController::class, 'index_detail_berita']);
Route::get('admin', [AdminController::class, 'user_view'])->name('admin');
Route::get('dashboard', [AdminController::class, 'dashboard_view'])->name('dashboard');
Route::get('home', [DonaturController::class, 'index'])->name('donatur');
Route::get('dashboard-pengasuh', [PengasuhController::class, 'index'])->name('pengasuh');


// ------------------- DONATUR ------------------ //

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('index');
    Route::post('profile', [ProfileController::class, 'update'])->name('update');
});

Route::get('home', [DonaturController::class, 'payment'])->name('donatur');
Route::post('home', [DonaturController::class, 'payment_post'])->name('payment_post');

// ------------------- PENGASUH ------------------ //

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile-pengasuh', [ProfilePengasuhController::class, 'index'])->name('index');
    Route::post('profile-pengasuh', [ProfilePengasuhController::class, 'update'])->name('update');
});



// ------------------- ADMIN ------------------- //

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

// Manage Santri
Route::get('/santri', [SantriController::class, 'index']);
Route::post('/santri-store', [SantriController::class, 'store'])->name('santri-store');
Route::get('/santri-fetchall', [SantriController::class, 'fetchAll'])->name('santri-fetchAll');
Route::delete('/santri-delete', [SantriController::class, 'delete'])->name('santri-delete');
Route::get('/santri-edit', [SantriController::class, 'edit'])->name('santri-edit');
Route::post('/santri-update', [SantriController::class, 'update'])->name('santri-update');

// Manage Donatur
Route::get('/donatur', [DonaturController::class, 'index_table']);
Route::post('/donatur-store', [DonaturController::class, 'store'])->name('donatur-store');
Route::get('/donatur-fetchall', [DonaturController::class, 'fetchAll'])->name('donatur-fetchAll');
Route::delete('/donatur-delete', [DonaturController::class, 'delete'])->name('donatur-delete');
Route::get('/donatur-edit', [DonaturController::class, 'edit'])->name('donatur-edit');
Route::post('/donatur-update', [DonaturController::class, 'update'])->name('donatur-update');

// Manage Pengasuh
Route::get('/pengasuh', [PengasuhController::class, 'index_table']);
Route::post('/pengasuh-store', [PengasuhController::class, 'store'])->name('pengasuh-store');
Route::get('/pengasuh-fetchall', [PengasuhController::class, 'fetchAll'])->name('pengasuh-fetchAll');
Route::delete('/pengasuh-delete', [PengasuhController::class, 'delete'])->name('pengasuh-delete');
Route::get('/pengasuh-edit', [PengasuhController::class, 'edit'])->name('pengasuh-edit');
Route::post('/pengasuh-update', [PengasuhController::class, 'update'])->name('pengasuh-update');

// Manage Donasi Offline
Route::get('/offline', [OfflineController::class, 'index']);
Route::post('/offline-store', [OfflineController::class, 'store'])->name('offline-store');
Route::get('/offline-fetchall', [OfflineController::class, 'fetchAll'])->name('offline-fetchAll');
Route::delete('/offline-delete', [OfflineController::class, 'delete'])->name('offline-delete');
Route::get('/offline-edit', [OfflineController::class, 'edit'])->name('offline-edit');
Route::post('/offline-update', [OfflineController::class, 'update'])->name('offline-update');








