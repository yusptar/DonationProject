@extends('layouts.template')
@section('content')

    <!-- ======= Data Santri Section ======= -->

     <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Data Santri</h2>
          <p>Jumlah Santri Yayasan At-Taufiq Malang</p>
        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
        @foreach($data_santri as $ds)
          <div class="col-lg-3 col-md-4 col-xs-6 text-center">
            <div class="client-logo">
              <img src="{{ url('storage/images/'.$ds->image) }}" class="rounded-circle" width="120" height="120">
            </div>
            <br>
            <p><strong>{{ $ds->nama }}</strong><br>
               <strong>Tahun Masuk, </strong>
               {{ $ds->tahun_masuk }}
            </p>
          </div>
        @endforeach

          <!-- <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('user/assets/img/clients/client-2.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('user/assets/img/clients/client-3.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('user/assets/img/clients/client-4.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('user/assets/img/clients/client-5.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('user/assets/img/clients/client-6.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('user/assets/img/clients/client-7.png') }}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="client-logo">
              <img src="{{ asset('user/assets/img/clients/client-8.png') }}" class="img-fluid" alt="">
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Data Donatur Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Data Donatur</h2>
          <p>INI HALAMAN DATA DONATUR, MAINTENANCE ON PROGRESS</p>
        </div>

      </div>
    </section><!-- Donatur Section -->
    

@endsection