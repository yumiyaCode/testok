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
      $tracking = DB::table('kasuses')
                    
                    ->join('rws' ,'kasuses.id_rw', '=', 'rws.id')
                    ->join('kelurahans' ,'rws.id_kelurahan', '=', 'kelurahans.id')
                    ->join('kecamatans' ,'kelurahans.id_kecamatan', '=', 'kecamatans.id')
                    ->join('kotas' ,'kecamatans.id_kota', '=', 'kotas.id')
                    ->rightjoin('provinsis' ,'kotas.id_provinsi', '=', 'provinsis.id')
                    ->select(
                        DB::raw('provinsis.id'),
                        DB::raw('provinsis.nama_provinsi as nama_provinsi'),
                        DB::raw('SUM(kasuses.positif) as positif'),
                        DB::raw('SUM(kasuses.sembuh) as sembuh'),
                        DB::raw('SUM(kasuses.meninggal) as meninggal'))
                    ->groupby('provinsis.id', 'provinsis.nama_provinsi')
                    ->get();
  


    return view('welcome',compact('tracking','provAll','data'));
   }
}
