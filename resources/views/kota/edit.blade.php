@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kota') }}</div>

                <div class="card-body">
                <form  action="{{route('kota.update', $kota->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                    @csrf
                   <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputEmail1" class="form-label">Kode Kota</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kode_kota"
                        value="{{$kota->kode_kota}}">

                        @if($errors->has('kode_kota'))
                            <span class="text-danger">{{$errors->first('kode_kota')}}</span>
                        @endif

                    </div>
                     </div>
                     <div class="form-group">
                        <label for="">Provinsi</label>
                        <select name="id_provinsi" class="form-control" required>
                            @foreach($provinsi as $data)
                            <option value="{{$data->id}}"
                                {{$data->id == $kota->id_provinsi ? "selected":""}}>{{$data->nama_provinsi}}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Kota</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_kota"
                        value="{{$kota->nama_kota}}">

                        @if($errors->has('nama_kota'))
                            <span class="text-danger">{{$errors->first('nama_kota')}}</span>
                        @endif

                    </div>
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
@endsection
