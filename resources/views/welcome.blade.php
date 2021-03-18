
<!doctype html>
<html lang="en">

<head>
  <title>Web Tracking Covid 19</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('assets/frontend/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/frontend/css/jquery.fancybox.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/frontend/css/bootstrap-datepicker.css')}}">

  <link rel="stylesheet" href="{{asset('assets/frontend/fonts/flaticon/font/flaticon.css')}}">
  <link rel="stylesheet" href="{{asset('assets/frontend/fonts/flaticon-covid/font/flaticon.css')}}">

  <link rel="stylesheet" href="{{asset('assets/frontend/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar light js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2">
            <div class="mb-0 site-logo"><a href="index.html" class="mb-0">Tracking Covid<span
                  class="text-primary">.</span> </a>
            </div>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#"
              class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3 text-black"></span></a>
          </div>

        </div>
      </div>

    </header>



    <div class="hero-v1">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mr-auto text-center text-lg-left">
            <span class="d-block subheading">Waspada Covid-19</span>
            <h1 class="heading mb-3">Stay Safe. Stay Home.</h1>
            <p class="mb-5">Bantu Orang lain dengan cara menjalani Protokol Kesehatan. Jaga Dirimu dan Keluargamu,
              Bersama Kita Saling Menjaga</p>
            <p class="mb-4"><a href="#" class="btn btn-primary">How to prevent</a></p>



          </div>
          <div class="col-lg-6">
            <figure class="illustration">
              <img src="{{asset('assets/frontend/images/illustration.png')}}" alt="Image" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-6"></div>
        </div>
      </div>
    </div>


    <!-- MAIN -->

    <div class="site-section stats">
      <div class="container">
        <div class="row mb-3">
          <div class="col-lg-7 text-center mx-auto">
            <h2 class="section-heading">Statistik Coronavirus</h2>
            <p>Berikut Data Mengenai Kasus Corona virus yang saat ini tengah dihadapi Negara kita</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="data">
              <span class="icon text-primary">
                <span class="flaticon-virus"></span>
              </span>
              <strong class="d-block number text-warning">{{$positif}}</strong>
              <span class="label">Kasus Positif</span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="data">
              <span class="icon text-primary">
                <span class="flaticon-virus"></span>
              </span>
              <strong class="d-block number text-danger">{{$meninggal}}</strong>
              <span class="label">Meninggal</span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="data">
              <span class="icon text-primary">
                <span class="flaticon-virus"></span>
              </span>
              <strong class="d-block number text-success">{{$sembuh}}</strong>
              <span class="label">Kasus Sembuh</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
              <div class="row justify-content-center">
              <h3 class="" style="margin-bottom:30px; color:blue;"><b> Data Indonesia</b> <br></h3>
              <div class="col-md-12" style="margin-bottom:40px">
                  <div class="card">
                  <div class="card-body">
                  <table  class="table table-striped table-bordered" style="width:100%" id="e">
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
                         @foreach($provAll as $data2)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td>{{$data2->nama_provinsi}}</td>
                                <td>{{$data2->positif}}</td>
                                <td>{{$data2->sembuh}}</td>
                                <td>{{$data2->meninggal}}</td>
                              
                            </tr>
                          @endforeach
                  </tbody>  
                 </table>
                  </div>
                    
              </div>
                   </div>
                  </div>
              </div>
<<<<<<< HEAD
           
=======
  
              <div class="container">
              <div class="row justify-content-center">
                 <h3 class="" style="margin-bottom:30px; color:blue;"><b> Data Global</b> <br></h3>
              <div class="col-md-12"  style="margin-bottom:40px">
                  <div class="card">
                  <div class="card-body">
                  <table  class="table table-striped table-bordered" style="width:100%" id="f">
                    <thead>
                      <tr>
                         <th>No</th>
                         <th>Negara</th> 
                         <th>Kasus</th>     
                         <th>Positif</th>
                         <th>Sembuh</th>
                         <th>Meninggal</th>
                       
                       </tr>  
                    </thead>
                    <tbody>
                         @php $no= 1; @endphp
                         @foreach($data as $data1)
                            <tr>
                                <th scoppe="row">{{$no++}}</th>
                                <td>{{$data1['nama_negara']}}<br></td>
                                <td>{{$data1['kasus']}}</td>
                                <td>{{$data1['aktif']}}</td>
                                <td>{{$data1['sembuh']}}</td>
                                <td>{{$data1['meninggal']}}</td>
                            </tr>
                          @endforeach
                  </tbody>  
                 </table>
                  </div>
                    
              </div>
                   </div>
                  </div>
              </div>
>>>>>>> 4754c44f9a1b3c2e1af5816492f52f743b05d8d7
                

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <figure class="img-play-vid">
              <img src="{{asset('assets/frontend/images/corona.png')}}" alt="Image" class="img-fluid">
              <div class="absolute-block d-flex">
                <span class="text">Watch the Video</span>
                <a href="https://www.youtube.com/watch?v=9pVy8sRC440" data-fancybox class="btn-play">
                  <span class="icon-play"></span>
                </a>
              </div>
            </figure>
          </div>
          <div class="col-lg-5 ml-auto">
            <h2 class="mb-4 section-heading">Apa Itu Coronavirus?</h2>
            <p>COVID-19 adalah penyakit yang disebabkan oleh virus severe acute respiratory syndrome coronavirus 2
              (SARS-CoV-2). COVID-19 dapat menyebabkan gangguan sistem pernapasan, mulai dari gejala yang ringan seperti
              flu, hingga infeksi paru-paru, seperti pneumonia.Lalu Hal apa saja yang harus kita ketahui?</p>
            <ul class="list-check list-unstyled mb-5">
              <li>Pencegahan</li>
              <li>Cara Menjaga diri</li>
              <li>Gejala</li>
            </ul>
            <!-- <p><a href="#" class="btn btn-primary">Learn more</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-primary-light">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">

            <div class="row">
              <div class="col-6 col-lg-6 mt-lg-5">
                <div class="media-v1 bg-1">
                  <div class="icon-wrap">
                    <span class="flaticon-stay-at-home"></span>
                  </div>
                  <div class="body">
                    <h3>Diam Dirumah</h3>
                    <p>Usahakan Jangan Pergi Keluar Rumah Kecuali ada Urusan Yang Tidak Bisa ditinggalkan.</p>
                  </div>
                </div>

                <div class="media-v1 bg-1">
                  <div class="icon-wrap">
                    <span class="flaticon-patient"></span>
                  </div>
                  <div class="body">
                    <h3>Gunakan Masker</h3>
                    <p>Jika Kamu Terpaksa Harus Keluar Rumah Ingatlah, Selalu Gunakan Masker.</p>
                  </div>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="media-v1 bg-1">
                  <div class="icon-wrap">
                    <span class="flaticon-social-distancing"></span>
                  </div>
                  <div class="body">
                    <h3>Terapkan social distancing</h3>
                    <p>Saat Berada ditempat Umum Terapkan lah Penjagaan Jarak Minimal 1 Meter.</p>
                  </div>
                </div>

                <div class="media-v1 bg-1">
                  <div class="icon-wrap">
                    <span class="flaticon-hand-washing"></span>
                  </div>
                  <div class="body">
                    <h3>Cuci Tanganmu</h3>
                    <p>Cuci Tangan Mu sebelum Dan Sesudah Beraktifitas. Secara Rutin</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-5 ml-auto">
            <h2 class="section-heading mb-4">Bagaimana Cara Pencegahannya?</h2>
            <p>Ada berbagai cara agar kita dapat terhidar dari si virus <b>corona</b> ini, Salah satunya dengan menjaga
              kebersihan diri
              ,seperti mencuci tangan dll</p>
            <p class="mb-4">Tidak hanya itu pencegahan terhadap covid sangatlah bermacam macam,kalian bisa melihatnya di
              samping kiri text ini</p>

            <!-- <p><a href="#" class="btn btn-primary">Read more about prevention</a></p> -->
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-7 mx-auto text-center">
            <span class="subheading">Apa Yang Harus Kamu Lakukan</span>
            <h2 class="mb-4 section-heading">Unntuk Melindungi Dirimu dari si <b>Corona</b></h2>
            <p>Berikut Hal-Hal Yang Dapat Kamu Terapkan Dalam Kehidupan Sehari-hari dalam Upaya perlindungan Diri
              Terhadap Corona</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 ">
            <div class="row mt-5 pt-5">
              <div class="col-lg-6 do ">
                <h3>Yang Harus Kamu Lakukan</h3>
                <ul class="list-unstyled check">
                  <li>Diam Dirumah</li>
                  <li>Menggunakan Masker</li>
                  <li>Menggunakan Sanitizer</li>
                  <li>Berikan Rumah Mu Disinfektan</li>
                  <li>Cuci Tanganmu</li>
                  <li>Lakukan Isolasi Mandiri</li>
                </ul>
              </div>
              <div class="col-lg-6 dont ">
                <h3>Yang Harus Dihindari</h3>
                <ul class="list-unstyled cross">
                  <li>Jauhi Orang yang Terinfeksi</li>
                  <li>Jauhi Binatang</li>
                  <li>Jangan Bersalaman</li>
                  <li>Jauhi Memegang Benda Yang pernah Tersentuh oleh Yang Terinfeksi</li>
                  <li>Jangan Menyentuh Wajah</li>
                  <li>Jauhi Kendaraan Umum/li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <img src="{{asset('assets/frontend/images/protect.png')}}" alt="Image" class="img-fluid">
          </div>
        </div>
      </div>
    </div>


    <div class="site-section bg-primary-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-7 mx-auto text-center">
            <h2 class="mb-4 section-heading">Gejala Dari Si Corona</h2>
            <p>Kamu Harus Mengenali Gejala-Gejala Dari Si <b>Corona</b> ini.Karena tidak Jarang Gejala-Gejala Yang Kamu
              anggap Sepele menjadi Tanda dari Penyakit Ini</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-4">
            <div class="symptom d-flex">
              <div class="img">
                <img src="{{asset('assets/frontend/images/symptom_high-fever.png')}}" alt="Image" class="img-fluid">
              </div>
              <div class="text">
                <h3>Demam Tinggi</h3>
                <p> Gejala Corona yang Paling Umum, Biasa nya Orang Yang diperkirakan Positif ia akan Merasakan deman dengan suhu 38C</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mb-4">
            <div class="symptom d-flex">
              <div class="img">
                <img src="{{asset('assets/frontend/images/symptom_cough.png')}}" alt="Image" class="img-fluid">
              </div>
              <div class="text">
                <h3>Batuk</h3>
                <p>Jika Kamu Mengalami Batuk-batuk dengan diikuti gejala lain, kamu juga harus waspada bisa jadi itu gejala corona.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mb-4">
            <div class="symptom d-flex">
              <div class="img">
                <img src="{{asset('assets/frontend/images/symptom_sore-troath.png')}}" alt="Image" class="img-fluid">
              </div>
              <div class="text">
                <h3>Sakit Tenggorokan</h3>
                <p>Sakit tenggorokan menjadi salah satu Gejala corona yg cukup susah dikenali, karena ada banyak hal yang
                  dapat menyebabkan sakit tenggorokan ini, Sebut saja panas dalam.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="symptom d-flex">
              <div class="img">
                <img src="{{asset('assets/frontend/images/symptom_headache.png')}}" alt="Image" class="img-fluid">
              </div>
              <div class="text">
                <h3>Sakit Kepala</h3>
                <p>Gejala Yang satu Ini biasanya datang Dengan Gejala Lain seperti batuk atau Demam. Jadi
                  Berhati hatilah bila kamu mengalami gejala-gejala ini.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-md-center">
          <div class="col-lg-10">
            <div class="note row">

              <div class="col-lg-8 mb-4 mb-lg-0"><strong>Tetap Dirumah Dan Panggil Dotermu:</strong> Bila Gejala Yang
                Kamu Rasakan Mirip Dengan Gejala Diatas</div>
              <div class="col-lg-4 text-lg-right">
                <a href="#" class="btn btn-primary"><span class="icon-phone mr-2 mt-3"></span>Help line</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2 class="footer-heading mb-4">About</h2>
            <p>Web Ini Dibuat Sebagai sarana Uji Kompetensi. Yang Dibuat oleh
              <p>Diki Maulana Siswa 12 RPL 01 Kelompok16</p>
              SMK Assalam Bandung, Jl.SituTarate
            </p>
            <div class="my-5">
              <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
              <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-4">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">Symptoms</a></li>
                  <li><a href="#">Prevention</a></li>
                  <li><a href="#">FAQs</a></li>
                  <li><a href="#">About Coronavirus</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-4">
                <h2 class="footer-heading mb-4">Helpful Link</h2>
                <ul class="list-unstyled">
                  <li><a href="#">Helathcare Professional</a></li>
                  <li><a href="#">LGU Facilities</a></li>
                  <li><a href="#">Protect Your Family</a></li>
                  <li><a href="#">World Health</a></li>
                </ul>
              </div>
              <div class="col-lg-4">
                <h2 class="footer-heading mb-4">Resources</h2>
                <ul class="list-unstyled">
                  <li><a href="#">WHO Website</a></li>
                  <li><a href="#">CDC Website</a></li>
                  <li><a href="#">Gov Website</a></li>
                  <li><a href="#">DOH Website</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright"><small>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                  </script> All rights reserved | This template is made with <i class="icon-heart text-danger"
                    aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small></p>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  </div> <!-- .site-wrap -->

  <script src="{{asset('assets/frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/frontend/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/frontend/js/jquery.countdown.min.js')}}"></script>
  <script src="{{asset('assets/frontend/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('assets/frontend/js/aos.js')}}"></script>
  <script src="{{asset('assets/frontend/js/jquery.fancybox.min.js')}}"></script>
  <script src="{{asset('assets/frontend/js/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/frontend/js/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/frontend/js/main.js')}}"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  


</body>
<script>
    $(document).ready(function () {
        $('#e').DataTable();
    });

</script>
<script>
    $(document).ready(function () {
        $('#f').DataTable();
    });

</script>
</html>