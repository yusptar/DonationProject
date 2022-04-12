<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yayasan At-Taufiq Malang Donation Website</title>

    <link href="//attaufiqmlg.com/wp-content/uploads/2016/06/ico.ico" rel="icon">
    <link href="//attaufiqmlg.com/wp-content/uploads/2016/06/logo-150.png" rel="apple-touch-icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('auth/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
</head>
<body>
    <header id="header">
        <nav flex-col class="flex flex-row items-center justify-center">
            <a href="/" class="logo me-auto me-lg-1"><img src="https://attaufiqmlg.com/wp-content/uploads/2016/06/logotext.png" alt="" class="img-fluid"></a> 
        </nav>            
    </header><!-- End Header -->
    <div class="main">
        @yield('content')
    </div>
    <!-- JS -->
    <script src="{{ asset('auth/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
</body>
</html>