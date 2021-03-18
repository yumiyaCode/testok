<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $provinsi = Provinsi::all();
        return view('provinsi.index',compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinsi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
<<<<<<< HEAD
            'kode_provinsi' => 'integer|required|max:4|unique:provinsis|min:0',
=======
            'kode_provinsi' => 'required|max:4|unique:provinsis',
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7
            'nama_provinsi' => 'required|unique:provinsis'

        ],
        [
            'kode_provinsi.required' => 'Kode Harap Diisi!',
            'kode_provinsi.max' => 'Kode Max 4 Digit',
            'kode_provinsi.unique' => 'Kode Sudah Terpakai',
            'nama_provinsi.required' => 'Nama Provinsi Harap Diisi!',
<<<<<<< HEAD
            'nama_provinsi.unique' => 'Nama Sudah Terpakai',
            'kode_provinsi.min' => 'Kode Min 0 Digit!',
            'kode_provinsi.integer' => 'Kode integer!'
=======
            'nama_provinsi.unique' => 'Nama Sudah Terpakai'
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7

        ]);
        $provinsi = new Provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
                        ->with(['message'=>'provinsi Berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.show',compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('provinsi.edit',compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
<<<<<<< HEAD
            'kode_provinsi' => 'required|max:4|min:0|integer',
=======
            'kode_provinsi' => 'required|max:4',
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7
            'nama_provinsi' => 'required'

        ],
        [
            'kode_provinsi.required' => 'Kode Harap Diisi!',
            'kode_provinsi.max' => 'Kode Max 4 Digit',
<<<<<<< HEAD
            'nama_provinsi.required' => 'Nama Provinsi Harap Diisi!',
            'kode_provinsi.min' => 'Kode Min 0 Digit!',
            'kode_provinsi.integer' => 'Kode integer!'
=======
            'nama_provinsi.required' => 'Nama Provinsi Harap Diisi!'
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7

        ]);
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
                        ->with(['message'=>'provinsi Berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrFail($id)->delete();
        return redirect()->route('provinsi.index')
                        ->with(['message1'=>'Berhasil dihapus']);
    }
}
