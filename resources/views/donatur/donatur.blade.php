@extends('layouts.template')
@section('content')
    <!-- ======= Donasi Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Donasi</h2>
          <p></p>
        </div>
      </div>

      <div class="container">
        <div class="row mt-5">
          <div class="col-lg-8 mt-5 mt-lg-0">
            <form action="#" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="name" class="form-label">Nama *</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="{{ $user->name }}" required>
                  <!-- <label class="form-label">
                    <input x-model="hide_identity" name="anonymous" type="checkbox">
                    <span class="text-xs italic">Sembunyikan nama (Hamba Allah)</span>
                  </label> -->
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="email" class="form-label">E-mail *</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="{{ $user->email }}" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="nominal" class="form-label">Nominal Donasi *</label>
                <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Rp. " required>
              </div>
              <div class="form-group mt-3">
                <label for="" class="form-label">Pilih Metode Pembayaran *</label>
                <input type="text" class="form-control" name="" id="" placeholder="" required>
              </div>
              <div class="form-group mt-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Tulis pesan atau do'a ... " required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Konfirmasi Donasi</button></div>
            </form>

          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Riwayat Donasi Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Riwayat Donasi</h2>
        </div>

    
      <!-- Main Body -->
      <div class="container">
          <div class="row">
            <div class="riwayat">
                <div class="comment mt-4 text-justify float-left">
                    <img src="{{asset('/storage/images/'.Auth::user()->image)}}" alt="" class="rounded-circle" width="60" height="60">
                    <br><br>
                    <h4>Donatur Name</h4>
                    <span>Rp. 1.500.000, 10 April 2022</span>
                    <br>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus numquam assumenda hic aliquam vero sequi velit molestias doloremque molestiae dicta?</p>
                </div>
            </div>
          </div>
      </div>
  </div>
</section><!-- Riwayat Donasi Section -->

@endsection