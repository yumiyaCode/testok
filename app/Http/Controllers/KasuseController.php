<?php

namespace App\Http\Controllers;

use App\Models\Kasuse;
use App\Models\Rw;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KasuseController extends Controller
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
        $kasuse = Kasuse::with('rw.kelurahan.kecamatan.kota.provinsi')->get();
        return view('kasuse.index',compact('kasuse'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        return view('kasuse.create',compact('rw'));
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
            'positif' => 'required|min:0|integer',
            'meninggal' => 'required|min:0|integer',
            'sembuh' => 'required|min:0|integer',
            'tanggal' => 'required'
            

        ],
        [
            'positif.required' => 'Harap Diisi!',
            'meninggal.required' => 'Harap Diisi!',
            'sembuh.required' => 'Harap Diisi!',
            'tanggal.required' => 'Tanggal Harap Diisi!',
            'positif.min' => 'min 0!',
            'meninggal.min' => 'min 0!',
            'sembuh.min' => 'min 0!',
            'positif.integer' => 'data integer!',
            'meninggal.integer' => 'data integer!',
            'sembuh.integer' => 'data integer!'
           

        ]);

        
        $kasuse= new Kasuse();
        $kasuse->positif = $request->positif;
        $kasuse->meninggal = $request->meninggal;
        $kasuse->sembuh = $request->sembuh;
        $kasuse->tanggal = $request->tanggal;
        $kasuse->id_rw = $request->id_rw;
        $kasuse->save();
        return redirect()->route('kasuse.index')
            ->with(['message'=>'Data Berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasuse  $kasuse
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasuse = Kasuse::findOrFail($id);
        return view('kasuse.show',compact('kasuse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasuse  $kasuse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rw = Rw::all();
        $kasuse = Kasuse::findOrFail($id);
        return view('kasuse.edit',compact('kasuse','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasuse  $kasuse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'positif' => 'required|min:0|integer',
            'meninggal' => 'required|min:0|integer',
            'sembuh' => 'required|min:0|integer',
            'tanggal' => 'required'
            

        ],
        [
            'positif.required' => 'Harap Diisi!',
            'meninggal.required' => 'Harap Diisi!',
            'sembuh.required' => 'Harap Diisi!',
            'tanggal.required' => 'Tanggal Harap Diisi!',
            'positif.min' => 'min 0!',
            'meninggal.min' => 'min 0!',
            'sembuh.min' => 'min 0!',
            'positif.integer' => 'data integer!',
            'meninggal.integer' => 'data integer!',
            'sembuh.integer' => 'data integer!'
           

        ]);
        $kasuse = Kasuse::findOrFail($id);
        $kasuse->positif = $request->positif;
        $kasuse->meninggal = $request->meninggal;
        $kasuse->sembuh = $request->sembuh;
        $kasuse->tanggal = $request->tanggal;
        $kasuse->id_rw = $request->id_rw;
        $kasuse->save();
        return redirect()->route('kasuse.index')
            ->with(['message'=>'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasuse  $kasuse
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kasuse = Kasuse::findOrFail($id)->delete();
        return redirect()->route('kasuse.index')
                        ->with(['message1'=>'Berhasil dihapus']);
    }
}
