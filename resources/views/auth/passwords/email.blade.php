@extends('layouts.app')
@section('content')
    <style>
        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
            margin-top: 20px;
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

        .image{
            margin-left: 80px;
            margin-right: 80px;
            margin-top: 80px;
            margin-bottom: 80px;
        }
    </style>

    <section class="sign-in">
        <div class="container">
            <a href="{{ route('login') }}" class="previous">Kembali</a>
            <div class="signin-content">
                <div class="image">
                    <a href="/"><img src="https://attaufiqmlg.com/wp-content/uploads/2016/06/logotext.png" alt="responsive"></a>
                </div>

                <div class="card-body">    
                    <div class="signin-form">
                        <h2 class="form-title">Reset Password</h2>
                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Reset Password"></input>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
