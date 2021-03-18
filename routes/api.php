<?php

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kasuse;
use App\Models\Rw;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\KotaController;
use App\Http\Controllers\Api\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('provinsi',[ProvinsiController::class,'index']);
Route::post('provinsi/store',[ProvinsiController::class,'store']);
Route::get('provinsi/{id?}',[ProvinsiController::class,'show']);
Route::post('provinsi/update/{id?}',[ProvinsiController::class,'update']);
Route::delete('provinsi/{id?}',[ProvinsiController::class,'destroy']);

Route::get('kota',[KotaController::class,'index']);

Route::get('indonesia',[ApiController::class,'index']);

Route::get('singleprov/{id?}',[ApiController::class,'create']);
Route::get('provinsiAll',[ApiController::class,'store']);

Route::get('singlekota/{id?}',[ApiController::class,'show']);
Route::get('kotaAll',[ApiController::class,'edit']);

Route::get('singlekec/{id?}',[ApiController::class,'update']);
Route::get('kecAll',[ApiController::class,'destroy']);

Route::get('singlekel/{id?}',[ApiController::class,'kelurahan']);
Route::get('kelAll',[ApiController::class,'kelurahanA']);

Route::get('global',[ApiController::class,'global']);
