
<!DOCTYPE html>
<html lang="en">

<head>

  <style>
  .responsive {
    width: 100%;
    max-width: 500px;
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

<header id="header" class="fixed-top header-inner-pages">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-9 d-flex align-items-center justify-content-lg-between">
          <h1 class="logo me-auto me-lg-0"><a href="/"></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="/" class="logo me-auto me-lg-6"><img src="//attaufiqmlg.com/wp-content/uploads/2016/06/logo-150.png" alt="" class="responsive"></a>

          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto " href="/">Home</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="/">Home</a></li>
          <li>Foto Kegiatan Detail</li>
        </ol>
        <h2>{{ $kegiatan->title }}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

   <!-- ======= Kegiatan Details Section ======= -->
   <section id="kegiatan-details" class="kegiatan-details">
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="kegiatan-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="">
                  <img src="{{ url('storage/images/'.$kegiatan->image) }}" class="responsive" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="kegiatan-info">
              <h3>{{ $kegiatan->title }} information</h3>
              <ul>
                <li><strong>Publish Date </strong>{{ $kegiatan->created_at->format('d M Y') }}</li>
              </ul>
            </div>
            <div class="kegiatan-description">
              <h2>{{ $kegiatan->title }}</h2>
              <p>
                {{ $kegiatan->description }}
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Kegiatan Details Section -->

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

