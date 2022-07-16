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
        padding: 20px 20px 20px 20px;
        border: 1px solid lightgrey;
        border-radius: 10px;
        margin: auto auto;
      }

      .logo-form {
        margin-bottom: 30px;
        margin-top: 10px;
        font-weight: bold;
        font-size: 14px;
        text-align: center;
      }

      .text-anonymous {
        font-style: italic;
        font-size: 15px;
        
      }

      .text-footer {
        font-size: 14px;
        text-align: center;
      }

      .pricing .riwayat h7 {
          font-size: 14px;
          font-style: italic;
          font-family: "Open Sans", sans-serif;
          margin-left: auto auto;
        }

      
    </style>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ======= Donasi Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">
        <div class="section-title">
          <h2>Donasi</h2>
          <p>Formulir donasi online untuk Yayasan At-Taufiq Malang</p>
        </div>
      </div>

      <div class="container">
        <h7>Yuk bantu merajut masa depan anak yatim agar bisa hidup dengan layak, dengan cara?</h7>
        <br><br>
        <li>Isi form donasi berikut atau login, lalu konfirmasi pembayaran</li>
        <li>Pilih metode pembayaran<br>
          <img src="https://tumpi.id/wp-content/uploads/2017/06/Logo-Bank-BNI.png.webp" width="100px" height="35px"></img>&nbsp;&nbsp;
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/68/BANK_BRI_logo.svg" width="100px" height="35px"></img>&nbsp;&nbsp;
          <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg" width="100px" height="35px"></img>&nbsp;&nbsp;&nbsp;&nbsp;
          <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo_2016.svg" width="100px" height="35px"></img>&nbsp;&nbsp;
          <img src="https://1.bp.blogspot.com/-EmJLucvvYZw/X0Gm1J37spI/AAAAAAAAC0s/Dyq4-ko9Eecvg0ostmowa2RToXZITkbcQCLcBGAsYHQ/s400/Logo%2BShopeePay.png" width="100px" height="65px"></img>&nbsp;
          <img src="https://upload.wikimedia.org/wikipedia/commons/9/9d/Logo_Indomaret.png" width="100px" height="35px"></img>&nbsp;&nbsp;
        </li>
        <li>Transfer sesuai <strong>virtual account bank</strong> atau <strong>kode pembayaran</strong> untuk memudahkan sistem 
           dalam pembacaan transaksi sehingga tepat akad dan tepat sasaran dalam penyalurannya</li>
        <br>
        <p>Disclaimer:</p>
        <p>Fundrising ini merupakan bagian dari program bantuan biaya hidup yang mana penghimpunannya akan di salurkan untuk pemenuhan kebutuhan hidup masyarakat dhuafa. 
           Dana yang terhimpun akan di salurkan untuk Yayasan At-Taufiq Malang.</P>
        <a href="https://api.whatsapp.com/send?phone=6285895634801" target="_blank"><i class="bx bxl-whatsapp"></i>WhatsApp&nbsp;:&nbsp;(Admin) 0858-9563-4801</a>
        <br><br>
        <div class="row">
          <div class="col-lg-5 mt-lg-0 form-donasi">
            <form method="GET" action="{{ route('payment') }}" >
              <div class="row">
                <img src="{{ asset('user/assets/img/logotext.png') }}">
                <a href="https://api.whatsapp.com/send?phone=6285895634801"class="logo-form" target="_blank">Jika ingin melakukan donasi hubungi nomer<br>
                <i class="bx bxl-whatsapp"></i>&nbsp;+6285895634801</a>
                <hr>
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
                  <span class="text-anonymous">Contoh Pengisian : contoh@mail.com</span>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="donatur_phone" class="form-label"><i class="fa fa-phone"></i> Nomer HP</label>
                <input type="tel" pattern="(?:\+62)?0?8\d{2}(\d{8})" class="form-control" name="donatur_phone" placeholder="Masukkan Nomer HP">
                <span class="text-anonymous">Format Pengisian : 08xxxxxxxxxx / +62xxxxxxxxxxx (12 digit)</span>
              </div>
              <div class="form-group mt-3">
                <label for="nominal" class="form-label"><i class="fa fa-money"></i> Nominal Donasi <strong>*</strong></label>
                <input type="number" min="1000" class="form-control" name="nominal" placeholder="Rp. " required>
                <span class="text-anonymous">Min Nominal : Rp.1000,00</span>
              </div>
              <div class="form-group mt-3">
                <label for="message" class="form-label"><i class="fa fa-commenting"></i> Pesan ( Opsional )</label>
                <textarea class="form-control" name="message" rows="5" placeholder="Tulis pesan atau do'a ... "></textarea>
              </div>
              <br>
              <label class="form-label">
                  <input  checked="checked" type="checkbox">
                  <span class="text-anonymous">Saya menyatakan donasi yang dititipkan melalui Yayasan At-Taufiq Malang bukan bersumber dari dan bertujuan untuk pencucian uang, dana kegiatan terorisme, organisasi teroris atau teroris, maupun tindak kejahatan lainnya baik secara langsung maupun tidak langsung ( Pembayaran donasi ditujukan ke rekening atas nama Yayasan At-Taufiq Malang )</span>
              </label>
              <br><br>
              <div class="text-center"><button class="button" style="vertical-align:middle" type="submit" class="btn btn-primary"><span>Konfirmasi Donasi</span></button></div>
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
                        @if(!empty($d->image))
                          <img src="{{ url('storage/images/'.$d->image) }}" alt="" class="rounded-circle" width="60" height="60">
                        @else
                          <img src="{{ asset('user/assets/img/default.jpg')}}" alt="" class="rounded-circle" width="60" height="60">
                        @endif 
                        @if($d->isNameHidden) 
                          &nbsp;   Hamba Allah
                        @else
                          
                          &nbsp;   {{ $d->donatur_name }}
                        @endif
                    </h4>
                    <h5>Berdonasi sebesar <strong>Rp. {{ number_format($d->nominal, 0) }}</strong></h5>
                    <p>{{ $d->message }}</p>
                    <h7>{{ $d->created_at->format('d M Y') }}<h7>
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