<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Kelurahan;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class RwController extends Controller
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
        $rw = Rw::with('kelurahan')->get();
        return view('rw.index',compact('rw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahan = Kelurahan::all();
        return view('rw.create',compact('kelurahan'));
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
            'nama_rw' => 'required|max:2'
=======
            'nama_rw' => 'required|max:3'
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7

        ],
        [
            'nama_rw.required' => 'Nama rw Harap Diisi!',
<<<<<<< HEAD
            'nama_rw.max' => 'Maksimal 2 Digit!'
=======
            'nama_rw.max' => 'Maksimal 3 Digit!'
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7

        ]);

        $rw= new Rw();
        $rw->nama_rw = $request->nama_rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
            ->with(['message'=>'Data Berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        return view('rw.show',compact('rw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $kelurahan = Kelurahan::all();
        $rw = Rw::findOrFail($id);
        return view('rw.edit',compact('rw','kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
<<<<<<< HEAD
            'nama_rw' => 'required|max:2'
=======
            'nama_rw' => 'required'
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7

        ],
        [
            'nama_rw.required' => 'Nama rw Harap Diisi!',
<<<<<<< HEAD
            'nama_rw.max' => 'Maksimal 2 Digit!'
=======
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7

        ]);
        $rw = Rw::findOrFail($id);
        $rw->nama_rw = $request->nama_rw;
        $rw->id_kelurahan = $request->id_kelurahan;
        $rw->save();
        return redirect()->route('rw.index')
            ->with(['message'=>'Data Berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rw  $rw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rw = Rw::findOrFail($id)->delete();
        return redirect()->route('rw.index')
                        ->with(['message1'=>'Berhasil dihapus']);
    }
}
