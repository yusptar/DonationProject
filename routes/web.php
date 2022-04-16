<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('dashboard', [AdminController::class, 'dashboard_view'])->name('dashboard');

// USER
Route::get('manageuser', [AdminController::class, 'user_view'])->name('manageuser');
Route::post('tambah-user', [AdminController::class, 'store']);
Route::post('edit-user', [AdminController::class, 'edit']);
Route::post('delete-user', [AdminController::class, 'destroy']);