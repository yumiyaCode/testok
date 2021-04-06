<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasuse;
use App\Models\Provinsi;
use App\Models\Rw;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class frontEndController extends Controller
{
   public function index()
   {
      $data = [];
      $response = Http::get('https://api.kawalcorona.com/')->json();
      if($response == NULL){
          $data[] = [
              'nama_negara' => 0, 
              'kasus' =>0,
              'aktif' =>0,
              'sembuh' =>0,
              'meninggal' =>0
          ];
      }
      else{
      foreach ($response as $key) {
              $data[] = [
                      'nama_negara' => $key['attributes']['Country_Region'], 
                      'kasus' =>$key['attributes']['Confirmed'],
                      'aktif' =>$key['attributes']['Active'],
                      'sembuh' =>$key['attributes']['Recovered'],
                      'meninggal' =>$key['attributes']['Deaths']
                  ];
          }
      }
      $positif = DB::table('rws')
      ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.positif');

      $sembuh = DB::table('rws')
      ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.sembuh');

      $meninggal = DB::table('rws')
      ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.meninggal');

//      //Global
//    $data = [];
//    $response = Http::get('https://api.kawalcorona.com/')->json();
//    foreach ($response as $key) {
//        $data[] = [
//                'nama_negara' => $key['attributes']['Country_Region'], 
//                'kasus' =>$key['attributes']['Confirmed'],
//                'aktif' =>$key['attributes']['Active'],
//                'sembuh' =>$key['attributes']['Recovered'],
//                'meninggal' =>$key['attributes']['Deaths']
//            ];
//    }
   $provAll = Provinsi::all();
   $provAll = DB::table('provinsis')
   ->join('kotas','kotas.id_provinsi','=','provinsis.id')
   ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
   ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
   ->join('rws','rws.id_kelurahan','=','kelurahans.id')
   ->join('kasuses','kasuses.id_rw','=','rws.id')
   ->select('kode_provinsi','nama_provinsi', 
            DB::raw('SUM(kasuses.positif) as positif'),
             DB::raw('SUM(kasuses.sembuh) as sembuh'), 
              DB::raw('SUM(kasuses.meninggal) as meninggal'))
              ->groupBy('kode_provinsi','nama_provinsi')
              ->get();



    return view('welcome',compact('positif','sembuh','meninggal','data','provAll'));

 
   }
   public function index2()
   {
     
      $positifAd = DB::table('rws')
      ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.positif');

      $sembuhAd = DB::table('rws')
      ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.sembuh');

      $meninggalAd = DB::table('rws')
      ->select('kasuses.positif','kasuses.sembuh','kasuses.meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.meninggal');

      $provAllAd = Provinsi::all();
      $provAllAd = DB::table('provinsis')
      ->join('kotas','kotas.id_provinsi','=','provinsis.id')
      ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
      ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
      ->join('rws','rws.id_kelurahan','=','kelurahans.id')
      ->join('kasuses','kasuses.id_rw','=','rws.id')
      ->select('kode_provinsi','nama_provinsi', 
               DB::raw('SUM(kasuses.positif) as positif'),
                DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                 DB::raw('SUM(kasuses.meninggal) as meninggal'))
                 ->groupBy('kode_provinsi','nama_provinsi')
                 ->get();
   



    return view('layouts.adminm',compact('positifAd','sembuhAd','meninggalAd','provAllAd'));
   }
}
