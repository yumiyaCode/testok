@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Laporan Provinsi
                        <!-- <a href="/report-provinsi/export_excel" class="btn btn-success my-3 float-right" target="_blank">EXPORT EXCEL</a> -->
                    </div>
                    <div class="card-body">
                        <form action="{{ url('report-provinsi') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Tanggal Awal</label>
                                        <input type="date" name="awal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Tanggal Akhir</label>
                                        <input type="date" name="akhir" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" style="padding: 10px;">
                                        <br>
                                        <button class="btn btn-success btn-outline">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @isset($tanggal)
                        <form action="{{ url('pdf-provinsi') }}" method="post">
                        @csrf
                        <input type="hidden" name="awal" value="{{$tanggal[0]}}">
                        <input type="hidden" name="akhir" value="{{$tanggal[1]}}">
                        <button class="btn btn-success btn-outline">eksport</button>
                        </form>
                        @endisset
                        <div class="table table-striped table-bordered">
                            <table class="table" id="report">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Provinsi</th>
                                        <th>Positif</th>
                                        <th>Sembuh</th>
                                        <th>Meninggal</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($provinsi)
                                        @php $no =1; @endphp
                                        @foreach ($provinsi as $data)
                                            <tr>
                                                <td class="align-content-center">{{ $no++ }}</td>
                                                <td class="align-content-center">{{ $data->nama_provinsi }}</td>
                                                <td class="align-content-center">{{ $data->positif }}</td>
                                                <td class="align-content-center">{{ $data->sembuh }}</td>
                                                <td class="align-content-center">{{ $data->meninggal }}</td>
                                                <td class="align-content-center">{{ date('d M Y', strtotime($data->tanggal)) }}</td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection