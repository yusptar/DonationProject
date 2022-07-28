@extends('layouts.app')
@section('content')
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <a href="{{ route('login') }}"><img src="https://attaufiqmlg.com/wp-content/uploads/2016/06/logotext.png" alt="responsive"></a>
                </div>
                <div class="signin-form">
                    <h2 class="form-title">Verify Your<br>E-Mail Address</h2>
                    {{ __('Sebelum melakukan login, mohon cek email anda untuk melakukan verifikasi pada link.') }}<br>
                    {{ __('Jika anda tidak menerima notifikasi verifikasi email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <br>
                    <button type="submit"  class="signup-image-link">{{ __('Klik disini untuk mengirim ulang verifikasi email anda') }}</button>.
                    </form>

                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                    {{ __('Link verfikasi terbaru sudah dikirim ke email anda, mohon cek kembali.') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
