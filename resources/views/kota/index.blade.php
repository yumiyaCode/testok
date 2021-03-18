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
                <div class="card-header">{{ __('Data Kota') }}
                <a href="{{route('kota.create')}}" class="float-right btn btn-success">
                    Add data</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table" id="e">
                    <thead>
                      <tr>
                         <th>No</th>      
                         <th>Kode Kota</th>
                         <th>Provinsi</th>
                         <th>Nama Kota</th>
                         <th class="text-center">Action</th>
                       </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($kota as $data)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td>{{$data->kode_kota}}</td>
                                <td>{{$data->provinsi->nama_provinsi}}</td>
                                <td>{{$data->nama_kota}}</td>
                                <td><form action="{{route('kota.destroy',$data->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('kota.show',$data->id)}}" class=" btn btn-outline-primary"> Lihat</a>
                                    <a href="{{route('kota.edit',$data->id)}}" class=" btn btn-outline-success">   Edit </a>
                                    <button type="submit" class=" btn btn-outline-danger" onclick="return confirm('Yakin Hapus?')">Hapus</button>
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
