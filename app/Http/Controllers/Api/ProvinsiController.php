<?php

namespace App\Http\Controllers\Api;

use App\Models\Provinsi;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::latest()->get();
        $res = [
            'succes' => true,
            'data' => $provinsi,
            'massage' => 'Data Berhasil ditampilkan'

        ];
        return response()->json($res,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //validate data
         $validator = Validator::make($request->all(), [
            'kode_provinsi'     => 'required',
            'nama_provinsi'   => 'required',
        ],
            [
                'kode_provinsi' => 'Masukkan kode provinsi !',
                'nama_provinsi' => 'Masukkan Nama provinsi !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $provinsi = Provinsi::create([
                'kode_provinsi'     => $request->input('kode_provinsi'),
                'nama_provinsi'   => $request->input('nama_provinsi')
            ]);


            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'provinsi Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'provinsi Gagal Disimpan!',
                ], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = Provinsi::whereId($id)->first();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'Detail provinsi!',
                'data'    => $provinsi
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'provinsi Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //validate data
         $validator = Validator::make($request->all(), [
            'kode_provinsi'     => 'required',
            'nama_provinsi'   => 'required',
        ],
            [
                'kode_provinsi.required' => 'Masukkan kode_provinsi provinsi !',
                'nama_provinsi.required' => 'Masukkan nama_provinsi provinsi !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $provinsi = Provinsi::whereId($request->input('id'))->update([
                'kode_provinsi'     => $request->input('kode_provinsi'),
                'nama_provinsi'   => $request->input('nama_provinsi'),
            ]);


            if ($provinsi) {
                return response()->json([
                    'success' => true,
                    'message' => 'provinsi Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'provinsi Gagal Diupdate!',
                ], 500);
            }

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->delete();

        if ($provinsi) {
            return response()->json([
                'success' => true,
                'message' => 'provinsi Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'provinsi Gagal Dihapus!',
            ], 500);
        }
    }
}
