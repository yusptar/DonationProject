@extends('layouts.template')
@section('content')
    <style>
      .button {
        display: inline-block;
        border-radius: 10px;
        background-color: #4CAF50;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 15px;
        padding: 20px;
        width: 200px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5;
      }

      .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
      }

      .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
      }

      .button:hover span {
        padding-right: 25px;
      }

      .button:hover span:after {
        opacity: 1;
        right: 0;
      }

      .form-donasi {
        background-color: #f2f2f2;
        padding: 30px 30px 30px 30px;
        border: 1px solid lightgrey;
        border-radius: 10px;
        margin-left: 300px;
      }

      .logo-form {
        margin-bottom: 50px;
      }

      .text-anonymous {
        font-style: italic;
        font-size: 15px;
        
      }

      .text-footer {
        font-size: 14px;
        text-align: center;
      }

      
    </style>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ======= Donasi Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title">
          <h2>Donasi</h2>
          <p>Formulir donasi online untuk Yayasan At-Taufiq Malang</p>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-5 mt-lg-0 form-donasi">
            <form method="GET" action="/home/payment" >
              <div class="row">
                <img class="logo-form" src="{{ asset('user/assets/img/logotext.png') }}">
                <div class="col-md-6 form-group">
                  <label for="donatur_name" class="form-label"><i class="fa fa-user"></i> Nama <strong>*</strong></label>
                  <input type="text" name="donatur_name" class="form-control" id="donatur_name" placeholder="Masukkan Nama" required>
                  <label class="form-label">
                    <input name="isNameHidden" type="checkbox">
                    <span class="text-anonymous">Sembunyikan nama (Hamba Allah)</span>
                  </label>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <label for="donatur_email" class="form-label"><i class="fa fa-envelope"></i> E-mail <strong>*</strong></label>
                  <input type="email" class="form-control" name="donatur_email" id="donatur_email" placeholder="Masukkan Email"  required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="donatur_phone" class="form-label"><i class="fa fa-phone"></i> Nomer HP</label>
                <input type="text" class="form-control" name="donatur_phone" placeholder="Masukkan Nomer HP">
              </div>
              <div class="form-group mt-3">
                <label for="nominal" class="form-label"><i class="fa fa-money"></i> Nominal Donasi <strong>*</strong></label>
                <input type="text" class="form-control" name="nominal" placeholder="Rp. " required>
              </div>
              <div class="form-group mt-3">
                <label for="message" class="form-label"><i class="fa fa-commenting"></i> Pesan ( Opsional )</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Tulis pesan atau do'a ... "></textarea>
              </div>
              <br>
              <label class="form-label">
                  <input  checked="checked" type="checkbox">
                  <span class="text-anonymous">Saya menyatakan donasi yang dititipkan melalui Yayasan At-Taufiq Malang bukan bersumber dari dan bertujuan untuk pencucian uang, dana kegiatan terorisme, organisasi teroris atau teroris, maupun tindak kejahatan lainnya baik secara langsung maupun tidak langsung.</span>
              </label>
              <br><br>
              <div class="text-center"><button class="button" style="vertical-align:middle" type="submit" class="btn btn-primary"><span>Konfirmasi Donasi</span></button></div>
            </form>
          </div>
          <div class="col-lg-5 mt-lg-5 form-donasi">
            <span class="text-footer">Pembayaran donasi ditujukan ke rekening atas nama Yayasan At-Taufiq Malang.</span>
          </div>
        </div>
      </div>
      
    </section><!-- End Contact Section -->

    <!-- ======= Riwayat Donasi Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Riwayat Donasi</h2>
          <p>History Donasi</p>
        </div>

    
      <!-- Main Body -->
      <div class="container">
          @foreach($donasi as $d)  
          @if($d->status == 'settlement')
          <div class="row">
            <div class="riwayat">  
                <div class="comment mt-4 text-justify float-left">
                    <h4>
                        <img src="{{ asset('user/assets/img/default.jpg')}}" alt="" class="rounded-circle" width="60" height="60"> 
                        @if($d->isNameHidden) 
                          &nbsp;   Hamba Allah
                        @else
                          
                          &nbsp;   {{ $d->donatur_name }}
                        @endif
                    </h4>
                    <h5>Berdonasi sebesar <strong>Rp. {{ number_format($d->nominal, 0) }}</strong></h5>
                    <p>{{ $d->message }}</p>
                    <h6>{{ $d->created_at->format('d M Y') }}<h6>
                </div>    
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </section><!-- Riwayat Donasi Section -->

    <script type="text/javascript">

      var rupiah = document.getElementById('rupiah');
      rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
      });
  
      /* Fungsi formatRupiah */
      function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
  
        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
  
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		  }
    </script>

@endsection