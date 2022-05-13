@extends('layouts.app')
@section('content')
<!-- Update Profile Form -->
    <section class="sign-in">
            <div class="container">
                <br>
                <a href="{{ route('donatur') }}" class="back-to-home-link"><i class="zmdi zmdi-arrow-left"></i>&nbsp;&nbsp;Kembali ke Halaman Utama</a>
                <div class="signin-content">
                    <div class="profile-image">
                        <img src="https://attaufiqmlg.com/wp-content/uploads/2016/06/logotext.png" alt="Responsive image">
                    </div>
  
                    <div class="signin-form">
                    <h2 class="form-title">{{ Auth::user()->name }} Profile</h2>
                        <form>
                   
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input id="name" type="name" class="form-control" name="name" value="{{ $user->name }}" readonly>
                                  
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly> 
                            </div>                    
                        </form>
                        <br><br>
                        <h2 class="form-title">Edit Profile</h2>
                        <form method="POST" action="{{ route('update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group row">
                                <label for="password"><i class="zmdi zmdi-lock-outline material-icons-name"></i></label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Ubah Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm"><i class="zmdi zmdi-lock material-icons-name"></i></label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password">
                                </div>
                            </div>
                            <div class="form-group form-button">
                                    <input type="submit" name="signin" id="signin" class="form-submit" value="Update Profile"></input>
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection