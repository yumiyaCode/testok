<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kasuse;
use App\Models\Provinsi;
use App\Models\Kotas;
use App\Models\Rw;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Total Kasus se Indonesia
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

        $res = [
            'succes' => true,
            'data' => 'Data Kasus Indonesia',
            'Jumlah Positif' => $positif,
            'Jumlah Meninggal' => $meninggal,
            'Jumlah Sembuh' => $sembuh1,
            'massage' => 'Data Berhasil ditampilkan'

        ];
        return response()->json($res,200);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // provinsis berdasar id
        $nowDay = Carbon::now()->format('Y-m-d');
        $prov = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_provinsi', 
                 DB::raw('SUM(kasuses.positif) as positif'),
                  DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                   DB::raw('SUM(kasuses.meninggal) as meninggal'))
                   ->where('provinsis.id', $id)
                   ->groupBy('nama_provinsi')
                   ->get();

                   $provNow = DB::table('provinsis')
                   ->join('kotas','kotas.id_provinsi','=','provinsis.id')
                   ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                   ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
                   ->join('rws','rws.id_kelurahan','=','kelurahans.id')
                   ->join('kasuses','kasuses.id_rw','=','rws.id')
                   ->select('nama_provinsi', 
                            DB::raw('SUM(kasuses.positif) as positif'),
                             DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                              DB::raw('SUM(kasuses.meninggal) as meninggal'))
                              ->where('provinsis.id', $id)
                              ->whereDate('provinsis.created_at', '=' , $nowDay)
                              ->groupBy('nama_provinsi')
                              ->get();


        $res = [
            'succes' => true,
            'data' => 'Data Kasus Provinsi di Indonesia',
            'Data Hari_ini' => $provNow,
            'Total' => $prov,
            'massage' => 'Data Berhasil ditampilkan'

        ];
        return response()->json($res,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // jumlah kasus indonesia per provinsi
        $nowDay = Carbon::now()->format('Y-m-d');
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

                   $provAllNow = DB::table('provinsis')
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
                              ->whereDate('provinsis.created_at', '=' , $nowDay)
                              ->get();

                   $res = [
                    'succes' => true,
                    'data' => 'Data Kasus Provinsi di Indonesia',
                    'Data Hari_ini' => $provAllNow,
                    'Data Provinsi' => $provAll,
                    'massage' => 'Data Berhasil ditampilkan'
        
                ];
                return response()->json($res,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          // kota berdasar id
          $nowDay = Carbon::now()->format('Y-m-d');
          $city = DB::table('kasuses')
          ->join('rws','rws.id','=','kasuses.id_rw')
          ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
          ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
          ->join('kotas','kotas.id','=','kecamatans.id_kota')
          ->select(DB::raw('kotas.kode_kota as kode'),
                 DB::raw('kotas.nama_kota as kota'), 
                   DB::raw('SUM(kasuses.positif) as positif'),
                    DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                     DB::raw('SUM(kasuses.meninggal) as meninggal'))
                     ->where('kotas.id', $id)
                     ->groupBy('kotas.nama_kota')
                     ->get();
  
                     $cityNow = DB::table('kasuses')
                     ->join('rws','rws.id','=','kasuses.id_rw')
                     ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
                     ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
                     ->join('kotas','kotas.id','=','kecamatans.id_kota')
                     ->select(DB::raw('kotas.kode_kota as kode'),
                         DB::raw('kotas.nama_kota as kota'), 
                              DB::raw('SUM(kasuses.positif) as positif'),
                               DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                                DB::raw('SUM(kasuses.meninggal) as meninggal'))
                                ->where('kotas.id', $id)
                                ->whereDate('kasuses.created_at', '=' , $nowDay)
                                ->groupBy('kotas.nama_kota')
                                ->get();
          $res = [
              'succes' => true,
              'data' => 'Data Kasus Kota di Indonesia',
              'Hari_ini' => $cityNow,
              'Total' => $city,
              'massage' => 'Data Berhasil ditampilkan'
  
          ];
          return response()->json($res,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // Data Kasus berdasar kota
        $nowDay = Carbon::now()->format('Y-m-d');
        $cityAll = DB::table('kasuses')
        ->join('rws','rws.id','=','kasuses.id_rw')
        ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
        ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
        ->join('kotas','kotas.id','=','kecamatans.id_kota')
        ->select(DB::raw('kotas.kode_kota as kode'),
            DB::raw('kotas.nama_kota as kota'), 
                 DB::raw('SUM(kasuses.positif) as positif'),
                  DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                   DB::raw('SUM(kasuses.meninggal) as meninggal'))
                   ->groupBy('kotas.nama_kota','kotas.kode_kota')
                   ->get();

                   $cityAllNow = DB::table('kasuses')
                   ->join('rws','rws.id','=','kasuses.id_rw')
                   ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
                   ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
                   ->join('kotas','kotas.id','=','kecamatans.id_kota')
                   ->select(DB::raw('kotas.kode_kota as kode'),
                       DB::raw('kotas.nama_kota as kota'), 
                            DB::raw('SUM(kasuses.positif) as positif'),
                             DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                              DB::raw('SUM(kasuses.meninggal) as meninggal'))
                              ->whereDate('kasuses.created_at', '=' , $nowDay)
                              ->groupBy('kotas.nama_kota','kotas.kode_kota')
                              ->get();
        $res = [
            'succes' => true,
            'data' => 'Data Kasus Kota di Indonesia',
            'Hari_ini' => $cityAllNow,
            'Total' => $cityAll,
            'massage' => 'Data Berhasil ditampilkan'

        ]; 
        return response()->json($res,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
          // kecamatan berdasar id
          $nowDay = Carbon::now()->format('Y-m-d');
          $kec = DB::table('kasuses')
          ->join('rws','rws.id','=','kasuses.id_rw')
          ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
          ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
          ->select(DB::raw('kecamatans.nama_kecamatan as kecamatan'), 
                   DB::raw('SUM(kasuses.positif) as positif'),
                    DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                     DB::raw('SUM(kasuses.meninggal) as meninggal'))
                     ->where('kecamatans.id', $id)
                     ->groupBy('kecamatans.nama_kecamatan')
                     ->get();
  
                     $kecNow = DB::table('kasuses')
                     ->join('rws','rws.id','=','kasuses.id_rw')
                     ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
                     ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
                     ->select(DB::raw('kecamatans.nama_kecamatan as kecamatan'), 
                              DB::raw('SUM(kasuses.positif) as positif'),
                               DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                                DB::raw('SUM(kasuses.meninggal) as meninggal'))
                                ->where('kecamatans.id', $id)
                                ->whereDate('kasuses.created_at', '=' , $nowDay)
                                ->groupBy('kecamatans.nama_kecamatan')
                                ->get();
          $res = [
              'succes' => true,
              'data' => 'Data Kasus Kota di Indonesia',
              'Hari_ini' => $kecNow,
              'Total' => $kec,
              'massage' => 'Data Berhasil ditampilkan'
  
          ];
          return response()->json($res,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
          // Data semua Kecamatan
          $nowDay = Carbon::now()->format('Y-m-d');
          $kecAll = DB::table('kasuses')
          ->join('rws','rws.id','=','kasuses.id_rw')
          ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
          ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
          ->select(DB::raw('kecamatans.nama_kecamatan as kecamatan'), 
                   DB::raw('SUM(kasuses.positif) as positif'),
                    DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                     DB::raw('SUM(kasuses.meninggal) as meninggal'))
                     ->groupBy('kecamatans.nama_kecamatan')
                     ->get();
  
                     $kecAllNow = DB::table('kasuses')
                     ->join('rws','rws.id','=','kasuses.id_rw')
                     ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
                     ->join('kecamatans','kecamatans.id','=','kelurahans.id_kecamatan')
                     ->select(DB::raw('kecamatans.nama_kecamatan as kecamatan'), 
                              DB::raw('SUM(kasuses.positif) as positif'),
                               DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                                DB::raw('SUM(kasuses.meninggal) as meninggal'))
                                ->whereDate('kasuses.created_at', '=' , $nowDay)
                                ->groupBy('kecamatans.nama_kecamatan')
                                ->get();
          $res = [
              'succes' => true,
              'data' => 'Data Kasus Kota di Indonesia',
              'Hari_ini' => $kecAllNow,
              'Total' => $kecAll,
              'massage' => 'Data Berhasil ditampilkan'
  
          ];
          return response()->json($res,200);
    }

    public function kelurahan($id){
          // kelurahan berdasar id
          $nowDay = Carbon::now()->format('Y-m-d');
          $kel = DB::table('kasuses')
          ->join('rws','rws.id','=','kasuses.id_rw')
          ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
          ->select(DB::raw('kelurahans.nama_kelurahan as kelurahan'), 
                   DB::raw('SUM(kasuses.positif) as positif'),
                    DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                     DB::raw('SUM(kasuses.meninggal) as meninggal'))
                     ->where('kelurahans.id', $id)
                     ->groupBy('kelurahans.nama_kelurahan')
                     ->get();
  
                     $kelNow = DB::table('kasuses')
                     ->join('rws','rws.id','=','kasuses.id_rw')
                     ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
                     ->select(DB::raw('kelurahans.nama_kelurahan as kelurahan'), 
                              DB::raw('SUM(kasuses.positif) as positif'),
                               DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                                DB::raw('SUM(kasuses.meninggal) as meninggal'))
                                ->where('kelurahans.id', $id)
                                ->whereDate('kasuses.created_at', '=' , $nowDay)
                                ->groupBy('kelurahans.nama_kelurahan')
                                ->get();
          $res = [
              'succes' => true,
              'data' => 'Data Kasus Kota di Indonesia',
              'Hari_ini' => $kelNow,
              'Total' => $kel,
              'massage' => 'Data Berhasil ditampilkan'
  
          ];
          return response()->json($res,200);
    }

    public function kelurahanA(){
        // kelurahan berdasar id
        $nowDay = Carbon::now()->format('Y-m-d');
        $kelAll = DB::table('kasuses')
        ->join('rws','rws.id','=','kasuses.id_rw')
        ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
        ->select(DB::raw('kelurahans.nama_kelurahan as kelurahan'), 
                 DB::raw('SUM(kasuses.positif) as positif'),
                  DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                   DB::raw('SUM(kasuses.meninggal) as meninggal'))
                   ->groupBy('kelurahans.nama_kelurahan')
                   ->get();

                   $kelAllNow = DB::table('kasuses')
                   ->join('rws','rws.id','=','kasuses.id_rw')
                   ->join('kelurahans','kelurahans.id','=','rws.id_kelurahan')
                   ->select(DB::raw('kelurahans.nama_kelurahan as kelurahan'), 
                            DB::raw('SUM(kasuses.positif) as positif'),
                             DB::raw('SUM(kasuses.sembuh) as sembuh'), 
                              DB::raw('SUM(kasuses.meninggal) as meninggal'))
                              ->whereDate('kasuses.created_at', '=' , $nowDay)
                              ->groupBy('kelurahans.nama_kelurahan')
                              ->get();
        $res = [
            'succes' => true,
            'data' => 'Data Kasus Kota di Indonesia',
            'Hari_ini' => $kelAllNow,
            'Total' => $kelAll,
            'massage' => 'Data Berhasil ditampilkan'

        ];
        return response()->json($res,200);
  }
  public function global(){
    $response = Http::get('https://api.kawalcorona.com/')->json();
    $res = [
        'succes' => true,
        'data' => 'Data Kasus Global',
        'output' => $response,
        'massage' => 'Data Berhasil ditampilkan'

    ];
    return response()->json($res,200);
  }

}
