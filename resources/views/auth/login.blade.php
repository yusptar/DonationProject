@extends('layouts.app')

@section('content')
<!-- Sign in Form -->
    <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <a href="/"><img src="https://attaufiqmlg.com/wp-content/uploads/2016/06/logotext.png" alt="responsive"></a>
                        <a href="{{ route('register') }}" class="signup-image-link">Belum mempunyai akun? Daftar segera</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Kata Sandi" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                    <label for="remember-me" class="label-agree-term"><span><span></span></span>Ingat Saya</label>
                                    <br><br>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Lupa Password?') }}
                                        </a>
                                    @endif
                            </div>
                            <div class="form-group form-button">
                                    <input type="submit" name="signin" id="signin" class="form-submit" value="Masuk"></input>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>  
@endsection
