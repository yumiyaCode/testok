@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kota') }}</div>

                <div class="card-body">
                   <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Kode Kota</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kode_kota"
                        value="{{$kota->kode_kota}}" readonly>
                    </div>
                     </div>
                     <div class="form-group">
<<<<<<< HEAD
                        <label for="">Provinsi</label>
=======
                        <label for="">Asal Kota</label>
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7
                        <input type="text" name="id_provinsi" class="form-control" value="{{$kota->provinsi->nama_provinsi}}" readonly>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kota"
                        value="{{$kota->nama_kota}}" readonly>
                    </div>
                     </div>
              
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
