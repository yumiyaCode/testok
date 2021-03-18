@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Provinsi') }}</div>

                <div class="card-body">
                   <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Kode Provinsi</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kode_provinsi"
                        value="{{$provinsi->kode_provinsi}}" readonly>
                    </div>
                     </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_provinsi"
                        value="{{$provinsi->nama_provinsi}}" readonly>
                    </div>
                     </div>
        
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
