@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if (session('message'))
                <div class="alert alert-success" role="alert">
                {{ session('message') }}
                </div>
            @elseif(session('message1'))
                <div class="alert alert-danger" role="alert">
                {{ session('message1') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Data Provinsi') }}
                <a href="{{route('provinsi.create')}}" class="float-right btn btn-success">
                    Add data</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive" >
                    <table class="table" id="e" >
                    <thead>
                      <tr>
                         <th>No</th>      
                         <th>Kode Provinsi</th>
                         <th>Nama Provinsi</th>
                         <th class="text-center">Action</th>
                       </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($provinsi as $data)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td>{{$data->kode_provinsi}}</td>
                                <td>{{$data->nama_provinsi}}</td>
                                <td><form action="{{route('provinsi.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('provinsi.show',$data->id)}}" class="float-right btn btn-outline-primary"> Lihat</a>
                                    <a href="{{route('provinsi.edit',$data->id)}}" class="float-right btn btn-outline-success">   Edit </a>
                                    <button type="submit" class="float-right btn btn-outline-danger" onclick="return confirm('Yakin Hapus?')">Hapus</button>
                                </form>
                                </td>
                            </tr>
                          @endforeach
                  </tbody>  
                 </table>
              </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
