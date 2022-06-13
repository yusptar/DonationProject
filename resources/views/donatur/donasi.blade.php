@extends('layouts.app')
@section('content')
    <style>
        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius: 10px;
        }

        .button1 {
        background-color: white; 
        color: black; 
        border: 2px solid #4CAF50;
        }

        .button1:hover {
            background-color: #4CAF50;
            color: white;
        }

        .fa-times-circle{
            margin-left: 200px;
        }

        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
            margin-left: 20px;
            border-radius: 10px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        a:hover {
            background-color: #ddd;
            color: black;
        }

        .previous {
            background-color: #04AA6D;
            color: white;
        }

    </style>
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
                        <script type="text/javascript"
                            src="https://app.sandbox.midtrans.com/snap/snap.js"
                            data-client-key="SB-Mid-client-fSW1kufnC6UkZ0G6">
                        </script>
                        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                        
                        <h2 class="form-title">Donasi Saya</h2> 
                        
                        @if(!empty($data_donasi))
                            @foreach($data_donasi as $d)
                                @if($d->status == 'pending') 
                                <h3>Nama             : {{ $d->donatur_name }}</h3>
                                <h3>E-Mail           : {{ $d->donatur_email }}</h3>
                                <h3>Jumlah Donasi    : Rp. {{ number_format($d->gross_amount, 0) }}</h3> 
                                <h3>Tanggal Donasi   : {{ $d->created_at->format('d M Y') }}</h3>
                                <h3>Status Transaksi : {{ $d->status }}</h4>
                                <button class="button button1" id="confirm-button">Bayar Sekarang</button>
                                <button class="button button1"><a href="/home/cancel-donasi/{{ $d->id }}">Cancel</a></button>
                                @elseif($d->status == 'settlement')
                                @endif       
                            @endforeach
                        @endif
                        <form action="" id="submit_form" method="POST">
                            @csrf
                            <input type="hidden" name="json" id="json_callback">
                        </form>
                    
                        <script type="text/javascript">
                        // For example trigger on button clicked, or any time you need
                        var payButton = document.getElementById('confirm-button');
                        payButton.addEventListener('click', function () {
                            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                            window.snap.pay('{{$snap_token}}', {
                            onSuccess: function(result){
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onPending: function(result){
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onError: function(result){
                                /* You may add your own implementation here */
                                console.log(result);
                                send_response_to_form(result);
                            },
                            onClose: function(){
                                /* You may add your own implementation here */
                                alert('you closed the popup without finishing the payment');
                            }
                            })
                        });
                        function send_response_to_form(result){
                            document.getElementById('json_callback').value = JSON.stringify(result);
                            $('#submit_form').submit();
                        }
                        </script>
                    </div>
                </div>
            </div>
    </section>
@endsection