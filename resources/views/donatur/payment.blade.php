@extends('layouts.app')
@section('content')

    <script type="text/javascript" 
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-fSW1kufnC6UkZ0G6">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <section class="sign-in">
            <div class="container">
                <br>
                <a href="{{ route('donatur') }}" class="back-to-home-link"><i class="zmdi zmdi-arrow-left"></i>&nbsp;&nbsp;Kembali ke Halaman Utama</a>
                <div class="signin-content">
                    <div class="profile-image">
                        <!-- <div class="mt-2" id="image">
                            <img src="{{ url('storage/images/'.$user->image) }}" style="width: 250px; height: 250px; border-radius:50%; margin-left:50px;">
                        </div> -->
                    </div>
  
                    <div class="signin-form">
                        <form method="POST" action="" id="submit_form">  
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="json" id="json_callback">
                                <button id="confirm-button">Konfirmasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    
    <script type="text/javascript">
      
        var payButton = document.getElementById('confirm-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snap_token }}', {
                onSuccess: function(result){

                    console.log(result);
                    send_response_to_form(result); 
                },
                onPending: function(result){
                    
                    console.log(result);
                    send_response_to_form(result); 
                },
                onError: function(result){
                    
                    console.log(result);
                    send_response_to_form(result); 
                },
                onClose: function(){
                    
                    alert('you closed the popup without finishing the payment');
                }
            })
        });

        function send_response_to_form(result){
            document.getElementById('json_callback').value = JSON.stringify(result);
            $('#submit_form').submit();
        }
    </script>

@endsection