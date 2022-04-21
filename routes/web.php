<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::resource('mahasiswa', MahasiswaController::class);
Route::get('mahasiswas/nilai/{nim}',[MahasiswaController::class, 'nilai'])
    ->name('mahasiswa.nilai');
Route::get('mahasiswas/nilai/{nim}/cetak_pdf',[MahasiswaController::class, 'cetak_pdf'])
    ->name('mahasiswa.cetak_pdf');
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


// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
