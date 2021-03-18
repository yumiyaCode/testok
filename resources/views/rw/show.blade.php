@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Rw') }}</div>

                <div class="card-body">
                     <div class="form-group">
<<<<<<< HEAD
                        <label for="">Kelurahan</label>
=======
                        <label for="">Asal rw</label>
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7
                        <input type="text" name="id_kelurahan" class="form-control" value="{{$rw->kelurahan->nama_kelurahan}}" readonly>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">rw</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_rw"
                        value="{{$rw->nama_rw}}"readonly>
                    </div>
                     </div>
                   
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
