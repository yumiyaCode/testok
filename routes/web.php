<?php

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
use App\Http\Controllers\frontEndController;
Route::resource('/',frontEndController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

use App\Http\Controllers\ProvinsiController;
Route::resource('provinsi',ProvinsiController::class);

use App\Http\Controllers\KotaController;
Route::resource('kota',KotaController::class);

use App\Http\Controllers\KecamatanController;
Route::resource('kecamatan',KecamatanController::class);

use App\Http\Controllers\KelurahanController;
Route::resource('kelurahan',KelurahanController::class);

use App\Http\Controllers\RwController;
Route::resource('rw',RwController::class);

use App\Http\Controllers\KasuseController;
Route::resource('kasuse',KasuseController::class);

Route::view('city','livewire.home');