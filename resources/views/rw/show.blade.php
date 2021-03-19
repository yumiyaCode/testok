@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Rw') }}</div>

                <div class="card-body">
                     <div class="form-group">
                        <label for="">Kelurahan</label>
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
