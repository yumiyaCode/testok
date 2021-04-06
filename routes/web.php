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
Route::get('/admin', [App\Http\Controllers\frontEndController::class, 'index2'])->name('admin');

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

use App\Http\Controllers\ReportController;
 // report
 Route::get('report-provinsi', [ReportController::class, 'getReportProvinsi']);
 Route::post('report-provinsi', [ReportController::class, 'ReportProvinsi']);
 Route::post('pdf-provinsi', [ReportController::class, 'PdfProvinsi']);
//  Route::get('/report-provinsi/export_excel', 'ReportController@export_excel');

Route::view('city','livewire.home');