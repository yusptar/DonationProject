@extends('layouts.app')
@section('content')
    <style>
        .fa-times-circle{
            margin-left: 200px;
        }

        .previous {
            background-color: #04AA6D;
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
            margin-left: 20px;
            border-radius: 10px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .previous:hover {
            background-color: #ddd;
            color: black;
        }

        .dot{
            height: 20px;
            width: 20px;
            font-weight: bold;
            background-color: #bbb;
            border-radius: 50%;
            text-align: center;
            display: inline-block;
        }

        .tutorial:link, .tutorial:visited{
            background-color: #04AA6D;
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 8px 10px;
            font-size: 12px;
            border-radius: 10px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .tutorial:hover {
            background-color: #ddd;
            color: black;
        }

        .cancel:link, .cancel:visited{
            background-color: #04AA6D;
            color: white;
            text-decoration: none;
            display: inline-block;
            padding: 8px 10px;
            border-radius: 10px;
            font-size: 12px;
            transition-duration: 0.4s;
            cursor: pointer;
            margin-left: 5px;
        }

        .cancel:hover {
            background-color: #ddd;
            color: black;
        }

        


    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <section class="sign-in">
            <div class="container">
                <br>
                <a href="{{ route('donatur') }}" class="previous"><strong>&laquo; Kembali</strong></a>
                <div class="signin-content">
                    <div class="profile-image">
                        <div class="mt-2" id="image">
                            <img src="{{ asset('user/assets/img/logo-yayasan.png') }}" >
                        </div>
                    </div>
  
                    <div class="signin-form">
                        <h2 class="form-title">List Donasi Saya</h2> 
                        <h5><span class="dot">{{ $jumlah_donasi_berhasil }}</span>&nbsp; Note: Jumlah donasi yang telah terbayar<h5>
                        <h5><span class="dot">{{ $jumlah_donasi_pending }}</span>&nbsp; Note: Jumlah donasi yang pending<h5>
                        @if(!empty($data_donasi))
                            @foreach($data_donasi as $d)
                                @if($d->status == 'pending') 
                                <h4><span class="dot"><i class="fa fa-user"></i></span>&nbsp; 
                                Nama             : {{ $d->donatur_name }}</h4>
                                <h4>&nbsp; &nbsp;E-Mail           : {{ $d->donatur_email }}</h4>
                                <h4>&nbsp; &nbsp;Jumlah Donasi    : Rp. {{ number_format($d->gross_amount, 0) }}</h4> 
                                <h4>&nbsp; &nbsp;Tanggal Donasi   : {{ $d->created_at->format('d M Y') }}</h4>
                                <h4>&nbsp; &nbsp;Status Transaksi : <strong>{{ $d->status }}</strong> </h4>
                                    @if($d->payment_type == 'bank_transfer' || $d->payment_type == 'cstore' || $d->payment_type == 'echannel' )
                                        <a class="tutorial" href="{{ $d->pdf_url }}"><strong>Petunjuk Pembayaran</strong></a>
                                    @endif
                                <a class="cancel" href="{{ 'cancel-donasi/'.$d->id }}"><strong>Cancel</strong></a>
                                <hr>
                                @endif    
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
    </section>
@endsection