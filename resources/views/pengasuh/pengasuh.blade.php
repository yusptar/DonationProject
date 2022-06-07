@extends('layouts.template')
@section('content')

    <!-- ======= Data Santri Section ======= -->

     <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Data Santri</h2>
          <p>Santri Yayasan At-Taufiq Malang</p>
        </div>

        <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
          @foreach($data_santri as $ds)
          <div class="col-lg-3 col-md-4 col-xs-6 text-center">
            <div class="client-logo">
              <img src="{{ url('storage/images/'.$ds->image) }}" class="rounded-circle" width="120" height="120">
            </div>
            <br>
            <p><strong>{{ $ds->nama }}</strong><br>
               Tahun Masuk, 
               {{ $ds->tahun_masuk }}
            </p>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Data Donatur Section ======= -->
    <section id="donatur-clients" class="donatur-clients">
      <div class="container">

        <div class="section-title">
          <h2>Data Donatur</h2>
          <p>Donatur Yayasan At-Taufiq Malang</p>
        </div>

        <div class="row no-gutters donatur-clients-wrap clearfix wow fadeInUp">
          @foreach($data_donatur as $dd)
          <div class="col-lg-3 col-md-4 col-xs-6 text-center">
            <div class="donatur-client-logo">
              <img src="{{ url('storage/images/'.$dd->image) }}" class="rounded-circle" width="120" height="120">
            </div>
            <br>
            <p><strong>{{ $dd->name }}</strong><br>
                Jumlah Donasi, Rp. 120.000
            </p>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- Donatur Section -->
    

@endsection