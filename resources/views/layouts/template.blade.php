<!DOCTYPE html>
<html lang="en">

<head>

  <style>
  .responsive {
    width: 100%;
    max-width: 400px;
    height: auto;
  }
  </style>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Yayasan At-Taufiq Malang Donation Website</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="//attaufiqmlg.com/wp-content/uploads/2016/06/ico.ico" rel="icon">
  <link href="//attaufiqmlg.com/wp-content/uploads/2016/06/logo-150.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }} " rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('user/assets/css/style.css') }}" rel="stylesheet">
  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="/"></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="/" class="logo me-auto me-lg-0"><img src="//attaufiqmlg.com/wp-content/uploads/2016/06/logo-150.png" alt="" class="img-fluid"></a>

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <!-- @can('admin')
              <li><a class="nav-link scrollto" href="#">Data User</a></li>
              <li><a class="nav-link scrollto" href="#">Riwayat Donasi</a></li>
              <li><a class="nav-link scrollto" href="#">Cetak Laporan</a></li>
              @endcan -->
              @cannot('donatur')
              <li><a class="nav-link scrollto active" href="#user">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">Profil</a></li>
              @endcannot

              @can('donatur')   
              <li><a class="nav-link scrollto" href="#services">Donasi</a></li>
              <li><a class="nav-link scrollto" href="#pricing">Riwayat Donasi</a></li>
              @endcan

              @cannot('donatur')
              <li class="dropdown"><a href="#"><span>Informasi</span><i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a class="nav-link scrollto" href="#portfolio">Foto Kegiatan</a></li>
                  <li><a class="nav-link scrollto" href="#services">Berita</a></li>
                  <li><a class="nav-link scrollto" href="#pricing">Donasi</a></li>
                </ul>
              </li>
              <li><a class="nav-link scrollto" href="#contact">Hubungi Kami</a></li>
              @endcannot
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          @guest
            @if (Route::has('login'))
              <li class="nav-item">
                  <a class="get-started-btn scrollto" href="{{ route('login') }}">{{ __('Masuk/Daftar') }}</a>
              </li>
            @endif
            @else
              <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                  <li class="dropdown">
                      <a href="#" role="button" data-bs-toggle="dropdown">
                      @if(Auth::user()->image)
                          <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="profile_image" style="width: 60px;height: 60px; padding: 10px; margin: 0px; ">
                      @endif
                          <span>{{ Auth::user()->name }}</span><i class="bi bi-chevron-down"></i>
                      </a>
                      <ul>       
                          <li><a class="nav-link scrollto" href="{{ url('profile') }}">Profile Saya</a></li>
                          <li><a class="nav-link scrollto" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                              </form>
                          </li>
                      </ul>
                  </li>
          @endguest  
                </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
              </nav><!-- .navbar -->                       
        </div>
      </div>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section For Another User ======= -->
  @cannot('donatur')
  <section id="user" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1>Yayasan At-Taufiq Malang Donation Website</h1>
          <h2>Bersama kita merajut masa depan Anak Yatim</h2>
          <a href="https://www.youtube.com/watch?v=byWzFXQdnEw" class="glightbox play-btn mb-4"></a>
        </div>
      </div>
    </div>
  </section>
  @endcannot
  <!-- End Hero For Another User -->
  

  @can('donatur')
  <!-- ======= Hero Section For Donatur ======= -->
  <section id="donatur" class="d-flex flex-column justify-content-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-8">
          <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
          <h2>Bersama kita merajut masa depan Anak Yatim</h2>
        </div>
      </div>
    </div>
  </section>
  @endcan
  <!-- End Hero For Donatur -->

  <main id="main">
   @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
    <a class="logo me-auto me-lg-0"><img src="https://attaufiqmlg.com/wp-content/uploads/2016/06/logotext.png" alt="" class="img-fluid"></a>
      <p>Jl. Sanan 70 RT 08 RW.15 Purwantoro Blimbing Malang 65122, (0341) 411105</p>
      <div class="social-links">
        <a href="https://www.facebook.com/yayasan.attaufiqmalang" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
        <a href="https://www.instagram.com/yayasan_attaufiqmlg/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
        <a href="https://www.youtube.com/channel/UCNOPBq0R1KsBbSVMIKw6HHg" class="youtube" target="_blank"><i class="bx bxl-youtube"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Yayasan At-Taufiq Kota Malang</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('user/assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('user/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('user/assets/js/main.js') }}"></script>

</body>

</html>