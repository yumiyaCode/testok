<?php

namespace App\Http\Controllers;

use App\Models\Kasus1;
use Illuminate\Http\Request;



class Kasus1Controller extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kasus1  $kasus1
     * @return \Illuminate\Http\Response
     */
    public function show(Kasus1 $kasus1)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kasus1  $kasus1
     * @return \Illuminate\Http\Response
     */
    public function edit(Kasus1 $kasus1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kasus1  $kasus1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kasus1 $kasus1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kasus1  $kasus1
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kasus1 $kasus1)
    {
        //
    }
}
