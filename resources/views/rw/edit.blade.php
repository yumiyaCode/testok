@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Rw') }}</div>

                <div class="card-body">
                <form  action="{{route('rw.update', $rw->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                    @csrf
                     <div class="form-group">
                        <label for="">Kelurahan</label>
                        <select name="id_kelurahan" class="form-control" required>
                            @foreach($kelurahan as $data)
                            <option value="{{$data->id}}"
                                {{$data->id == $rw->id_kelurahan ? "selected":""}}>{{$data->nama_kelurahan}}</option>
                            @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">rw</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="nama_rw"
                        value="{{$rw->nama_rw}}">
                        @if($errors->has('nama_rw'))
                            <span class="text-danger">{{$errors->first('nama_rw')}}</span>
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
