@extends('layouts.app')
@section('content')
    <style>
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

<!-- Update Profile Form -->
    <section class="sign-in">
            <div class="container">
                <br>
                <a href="{{ route('donatur') }}" class="previous"><strong>&laquo; Kembali</strong></a>
                <div class="signin-content">
                    <div class="profile-image">
                        @if(!empty($user->image))
                        <div class="mt-2" id="image">
                            <img src="{{ url('storage/images/'.$user->image) }}" class="img-fluid" alt="Responsive image" style="width:250px; height:250px; border-radius:50%;">
                        </div>
                        @else
                        <div class="mt-2" id="image">
                            <img src="{{ asset('user/assets/img/default.jpg')}}" class="img-fluid" alt="Responsive image" style="width:250px; height:250px; border-radius:50%;">
                        </div>
                        @endif
                    </div>
  
                    <div class="signin-form">
                        <h2 class="form-title">{{ $user->name }}'s Profile</h2>
                        <form method="POST" action="{{ route('update-donatur') }}" enctype="multipart/form-data">
                            
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
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
                            <div class="form-group">
                                <label for="alamat"><i class="zmdi zmdi-home material-icons-name"></i></label>
                                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ $user->alamat }}" placeholder="Masukkan Alamat">
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="nohp"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                    <input id="nohp" type="tel" pattern="(?:\+62)?0?8\d{2}(\d{8})" class="form-control @error('nohp') is-invalid @enderror" name="nohp" value="{{ $user->nohp }}" placeholder="Masukkan No Handphone">
                                    @error('nohp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="instansi"><i class="zmdi zmdi-pin-drop material-icons-name"></i></label>
                                    <input id="instansi" type="text" class="form-control @error('instansi') is-invalid @enderror" name="instansi" value="{{ $user->instansi }}" placeholder="Masukkan Instansi">
                                    @error('instansi')
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
                            <div class="form-group">
                                <label for="image"><i class="zmdi zmdi-image material-icons-name"></i></label>
                                <div class="col-md-6">
                                    <input type="file" name="image">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
      
        $(document).ready(function (e) {
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => { 
                    $('#preview-image-before-upload').attr('src', e.target.result); 
                }
                reader.readAsDataURL(this.files[0]); 
            });
        });
    </script>
@endsection