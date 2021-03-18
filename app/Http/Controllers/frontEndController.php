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
    
   //Global
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

//  //Global positif
//  $dataP = [];
//  $responseP = Http::get('https://api.kawalcorona.com/positif/')->json();
//  foreach ($responseP as $key) {
//      $dataP[] = [
//              'judul' => $key['name'],
//              'TotalP' => $key['value']
//          ];
//  }
//   //Global sembuh
//   $dataS = [];
//   $responseS = Http::get('https://api.kawalcorona.com/sembuh/')->json();
//   foreach ($responseS as $key) {
//       $dataS[] = [
//               'judul' => $key['name'],
//               'TotalS' => $key['value']
//           ];
//   }
//    //Global meninggal
//  $dataM = [];
//  $responseM = Http::get('https://api.kawalcorona.com/meninggal/')->json();
//  foreach ($responseM as $key) {
//      $dataM[] = [
//              'judul' => $key['name'],
//              'TotalM' => $key['value']
//          ];
//  }

    return view('welcome',compact('positif','sembuh','meninggal','provAll'));
   }
}
