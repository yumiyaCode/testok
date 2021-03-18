<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{asset('assets/images/faces/face2.jpg')}}" alt="profile">
                    <span class="login-status online"></span>

                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"> {{ Auth::user()->name }}</span>
                    <span class="text-secondary text-small"> {{ Auth::user()->email }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
              <a class="nav-link" href="{{route('provinsi.index')}}">
                <span class="menu-title">->Provinsi</span>
                <!-- <i class="mdi mdi-home menu-icon">See</i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('kota.index')}}">
                <span class="menu-title">->Kota</span>
                <!-- <i class="mdi mdi-home menu-icon"></i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('kecamatan.index')}}">
                <span class="menu-title">->Kecamatan</span>
                <!-- <i class="mdi mdi-home menu-icon"></i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('kelurahan.index')}}">
                <span class="menu-title">->Kelurahan</span>
                <!-- <i class="mdi mdi-home menu-icon"></i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('rw.index')}}">
                <span class="menu-title">->Rw</span>
                <!-- <i class="mdi mdi-home menu-icon"></i> -->
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('kasuse.index')}}">
                <span class="menu-title">->Kasus</span>
                <!-- <i class="mdi mdi-home menu-icon"></i> -->
              </a>
            </li>
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Kasus Dunia</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Negara</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Kasus</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false"
                aria-controls="general-pages">
                <span class="menu-title">Kasus Indonesia </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
            </a>
            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{route('provinsi.index')}}"> Provinsi </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('kota.index')}}"> Kota </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('kecamatan.index')}}"> Kecamatan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('kelurahan.index')}}"> Kelurahan </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('rw.index')}}"> RW </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{route('kasuse.index')}}"> Kasus </a></li>
                </ul>
            </div>

        </li> -->
    </ul>

</nav>
