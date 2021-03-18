@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kasus Local') }}</div>

                <div class="card-body">
                <form  action="{{route('kasuse.update',$kasuse->id)}}" method="post">
               
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col">
                    @livewireStyles
                        @livewire('tracking',['selectedRw' => $kasuse->id_rw,
                        'selectedKel' => $kasuse->rw->id_kelurahan,
                        'selectedKec' => $kasuse->rw->kelurahan->id_kecamatan,
                        'selectedKot' => $kasuse->rw->kelurahan->kecamatan->id_kota,
                        'selectedPro' => $kasuse->rw->kelurahan->kecamatan->kota->id_provinsi])
                    @livewireScripts
                    </div>
                        

                    <hr color="blue">
                     <div class="col">
                      <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Positif</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="positif"
                        value="{{$kasuse->positif}}">

                        @if($errors->has('positif'))
                            <span class="text-danger">{{$errors->first('positif')}}</span>
                        @endif

                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Sembuh</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="sembuh"
                        value="{{$kasuse->sembuh}}">
                        @if($errors->has('sembuh'))
                            <span class="text-danger">{{$errors->first('sembuh')}}</span>
                        @endif
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Meninggal</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="meninggal"
                        value="{{$kasuse->meninggal}}">

                        @if($errors->has('meninggal'))
                            <span class="text-danger">{{$errors->first('meninggal')}}</span>
                        @endif
                     </div>
                     <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal"
                        value="{{$kasuse->tanggal}}">

                        @if($errors->has('tanggal'))
                            <span class="text-danger">{{$errors->first('tanggal')}}</span>
                        @endif
                     </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                 </div>
                  </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
