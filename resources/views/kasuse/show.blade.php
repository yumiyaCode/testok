@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kasus Local') }}</div>

                <div class="card-body">
                     <div class="form-group">
                        <label for="">RW</label>
                        <input type="text" name="id_rw" class="form-control" value="{{$kasuse->rw->nama_rw}}" value="{{'kasuse->'}}"readonly>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Positif</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="positif"
                         value="{{$kasuse->positif}}"readonly>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Sembuh</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="sembuh"
                        value="{{$kasuse->sembuh}}" readonly>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Meninggal</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="meninggal"
                        value="{{$kasuse->meninggal}}" readonly>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal"
                        value="{{$kasuse->tanggal}}" readonly>
                    </div>
                     </div>
                   
              
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
