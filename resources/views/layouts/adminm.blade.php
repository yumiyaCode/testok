<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Tracking Covid dashboard</title>
<!-- plugins:css -->
<link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
<!-- data table -->
<link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}" />
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />

<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<!-- End layout styles -->
<link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('layouts.components.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            @include('layouts.components.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                                <i class="mdi mdi-home"></i>
                            </span> Tracking Covid
                        </h3>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">
                                    <span></span>Overview <i
                                        class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                                </li>
                            </ul>
                        </nav>

                    </div>

                    <div class="row">
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-danger card-img-holder text-white">
                                <div class="card-body">
                                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute"
                                        alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Kasus Positif <i
                                            class="mdi mdi-chart-line mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">{{$positifAd}}</h2>                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-info card-img-holder text-white">
                                <div class="card-body">
                                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute"
                                        alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Meninggal <i
                                            class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">{{$meninggalAd}}</h2>                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 stretch-card grid-margin">
                            <div class="card bg-gradient-success card-img-holder text-white">
                                <div class="card-body">
                                    <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute"
                                        alt="circle-image" />
                                    <h4 class="font-weight-normal mb-3">Sembuh <i
                                            class="mdi mdi-diamond mdi-24px float-right"></i>
                                    </h4>
                                    <h2 class="mb-5">{{$sembuhAd}}</h2>                               </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="container">
              <div class="row justify-content-center">
              <h3 class="" style="margin-bottom:30px; color:blue;"><b> Data Indonesia</b> <br></h3>
              <div class="col-md-12" style="margin-bottom:40px">
                  <div class="card">
                  <div class="card-body">
                  <table  class="table table-striped table-bordered" style="width:100%" id="admin">
                    <thead>
                      <tr>
                         <th>No</th>
                         <th>Provinsi</th> 
                         <th>Positif</th>
                         <th>Sembuh</th>
                         <th>Meninggal</th>
                       
                       </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($provAllAd as $data3)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td>{{$data3->nama_provinsi}}</td>
                                <td>{{$data3->positif}}</td>
                                <td>{{$data3->sembuh}}</td>
                                <td>{{$data3->meninggal}}</td>
                              
                            </tr>
                          @endforeach
                  </tbody>  
                 </table>
                  </div>
                    
              </div>
                   </div>
                  </div>
              </div>   
          
                    
                    <!-- content-wrapper ends -->

                    <!-- partial:partials/_footer.html -->

                    @include('layouts.components.footer')
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>

        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="{{asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="{{asset('assets/js/off-canvas.js')}}"></script>
        <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
        <script src="{{asset('assets/js/misc.js')}}"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <!-- <script src="{{asset('assets/js/dashboard.js')}}"></script> -->
        <script src="{{asset('assets/js/todolist.js')}}"></script>
        <!-- End custom js for this page -->
        <!-- data table -->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
      
        
</body>
<script>
    $(document).ready(function () {
        $('#admin').DataTable();
    });

</script>


</html>
