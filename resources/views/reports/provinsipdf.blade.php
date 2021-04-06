<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <title></title>
</head>
<body>

            <div class="container">
              <div class="row justify-content-center">
              <h3 class="" style="margin-bottom:30px; color:blue;"><b> Report Data</b> <br></h3>
              <div class="col-md-12" style="margin-bottom:40px">
                  <div class="card">
                  <div class="card-body">
                            <table class="table table-striped table-bordered">
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
                       
</body>
</html>