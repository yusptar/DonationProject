@extends('layouts.template')
@section('content')
    <br>
    <!-- ======= Profile Section ======= -->
    <section id="profile" class="profile">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <a class="logo me-auto me-lg-0"><img src="{{ asset('user/assets/img/logotext.png') }}" alt="" class="img-fluid"></a>
              <p></p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1">Profile Yayasan At-Taufiq Malang<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                    Yayasan Attaufiq adalah Yayasan yang fokus mengabdi untuk mengasuh anak Yatim Piatu dan fakir miskin yang berada di Malang. Dengan segala kemampuan, kami bertanggungjawab mewujudkan cita cita Anak Yatim agar bisa terwujud kelak hingga mereka dewasa.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">Sejarah Berdirinya Yayasan At-Taufiq Malang<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                    Bermula dari acara pengajian yang diadakan secara sederhana dalam rangka syukuran peringatan HUT Kemerdekaan RI pada bulan Agustus 1995 para peserta pengajian sepakat dan bertekad untuk memulai merawat anak yatim dengan modal uang hasil spontanitas sebesar Rp. 55.000,-. Dua bulan berikutnya uang tersebut bertambah menjadi Rp. 70.000,- dan dua bulan berikutnya lagi, tepatnya pada bulan November 1995 menjadi 125.000,- setelah diadakan pertemuan pertama untuk memastikan perlu tidaknya realisasi kesepakatan dan tekad di atas.<br>
                    <br>Menyadari betapa sudah sangat jelas pesan agama Islam bahwa persoalan anak yatim dan orang miskin adalah menjadi tanggung jawab umat Islam yang dengan berkat Rahmat Allah swt. mereka mempunyai kelonggaran atau kelebihan untuk ikut serta secara aktif menyelesaikan problem tersebut agar masa depan mereka bisa survive, maka perlu segera diadakan musyawarah untuk membicarakan kesepakatan dan tekad yang sangat mulia dan terpuji tersebut.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">Lanjutan Sejarah Berdirinya Yayasan At-Taufiq Malang <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                    Yayasan Anak Yatim AT-TAUFIQ secara resmi berdiri pada tanggal 4 April 1996 berdasarkan dokumen akte notaris nomor 30 tahun 1996 dan Surat Tanda Pendaftaran (STP) yang dikeluarkan oleh Departemen Sosial Kantor Wilayah Jawa Timur nomor 450/STP/ORSOS/XI/1996 bergerak di bidang sosial keagamaan.<br>
                    <br>Sejalan dengan perkembangannya, Yayasan kali ini sudah memiliki dua unit bangunan, yaitu satu unit asrama dan satu unit masjid yang dibangun di atas tanah wakaf dengan luas 540 m2 yang diperoleh pada tahun 1997 dari keluarga almarhum Bapak H. Abdurrahman Sanan Malang. Asrama tersebut baru bisa menampung anak asuh putra, dan untuk pengembangannya insyaallah akan dibangun satu unit lagi asrama yang dapat menampung anak asuh putri, yang sementara masih bertempat tinggal di rumah keluarga masing-masing.
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("user/assets/img/yayasan-building.jpeg");'>&nbsp;</div>
        </div>

      </div>
    </section><!-- End Profile Section -->

    <!-- ======= Berita Section ======= -->
    <section id="services" class="services">
      <div class="container">
        <div class="section-title">
          <h2>Berita</h2>
          <h5>Berita Yayasan At-Taufiq Malang</h5>
        </div>
        <div class="row">
          @foreach($berita as $b)
          <div class="col-lg-6 col-md-6 d-flex align-items-stretch">
            <div class="icon-box">
              <img src="{{ url('storage/images/'.$b->image) }}" class="responsive" alt="">
              <br><br>
              <h4><a href="{{ '/detail-berita/'.$b->slug }}">{{ $b->title }}</a></h4>
              <p>{{ Str::limit($b->description, 220) }}<a href="{{ '/detail-berita/'.$b->slug }}" style="font-weight: bold;">Read More &rarr;</a></p>
              <br>
              <p>Tanggal Publikasi, {!! date('d M Y', strtotime($b->created_at)) !!}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- Berita Section -->

    <!-- ======= Donation Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">
        <div class="section-title">
          <h2>Donasi</h2>
          <h5>Donasi Yayasan At-Taufiq Malang</h5>
        </div>

        <div class="row">

          <div class="col-lg-6 col-md-8">
            <div class="box">
              <h3>Galang Donasi Untuk Anak Yatim Yayasan At-Taufiq Malang</h3>
              <img src="{{ asset('user/assets/img/attaufiq.jpg') }}" class="responsive" alt="">
              <ul>
                <li class ="total-donasi">
                  Donasi Terkumpul Rp.
                  {{ number_format($donasi_terkumpul, 0) }}</li>
                <li class ="jumlah-donatur">Jumlah Donatur : {{ $jumlah_donatur }}</li>
              </ul>
              <div class="btn-wrap">
                <a href="{{ route('login') }}" class="btn-buy">Donasi Sekarang</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Donation Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Sembahlah Allah dan janganlah kamu mempersekutukan-Nya dengan sesuatupun. Dan berbuat baiklah kepada dua orang ibu-bapak, karib-kerabat, anak-anak yatim, orang-orang miskin…</h3>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle">(QS. an-Nisa: 36)</a>
          </div>
        </div>
      </div>
    </section><!-- End Cta Section -->

    <!-- ======= Foto Kegiatan Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="section-title">
          <h2>Galeri</h2>
          <h5>Galeri Yayasan At-Taufiq Malang</h5>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <!-- <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li> -->
            </ul>
          </div>
        </div>

        <div class="row portfolio-container">
         @foreach($kegiatan as $k)
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <img src="{{ url('storage/images/'.$k->image) }}" class="responsive" alt="">
            <div class="portfolio-info">
              <h4>{{ $k->title}}</h4>
              <p>Tanggal Publikasi, {!! date('d M Y', strtotime($k->created_at)) !!}</p>
              <a href="{{ url('storage/images/'.$k->image) }}" data-gallery="portfolioGallery" class="responsive portfolio-lightbox preview-link" title="{{ $k->title }}"><i class="bx bx-plus"></i></a>
              <a href="{{ '/detail-kegiatan/'.$k->slug }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Foto Kegiatan Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>Civitas Yayasan At-Taufiq Malang</h3>
        </div>

        <div class="row counters position-relative">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_santri }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Santri</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_donatur }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Donatur</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlah_pengasuh }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Pengasuh</p>
          </div>

          <!-- <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>MAHASISWA</p>
          </div> -->

        </div>

      </div>
    </section> <!-- ==== End Counts Section ===== -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Hubungi Kami</h2>
        </div>
      </div>

      <div>
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.3675542063033!2d112.64325231435855!3d-7.960914681538687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6283559d241ff%3A0x5daecb91ec6fb974!2sFoundation%20Orphans%20At-Taufiq%20Malang!5e0!3m2!1sen!2sid!4v1649730274508!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="ri-map-pin-line"></i>
                <h4>Lokasi:</h4>
                <p>Jl. Sanan 70 RT 08 RW.15 Purwantoro Blimbing Malang 65122</p>
              </div>

              <div class="phone">
                <i class="ri-phone-line"></i>
                <h4>No Telepon:</h4>
                <p>(0341) 411105</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="#" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan E-mail" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Tuliskan Subyek" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Tuliskan Pesan" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Pesan</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <script type="text/javascript">

      
    </script>
@endsection