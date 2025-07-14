<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem eDE | Login</title>

    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/template/css/animate.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">

    </div>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <img src="{{ asset('/template/img/3.png') }}" width="280px" alt="MainLogo">
        <div>
            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" class="form-control required" placeholder="E-mel">
                    @error('email')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="password"  name="password" class="form-control required" placeholder="Kata laluan" >
                    @error('password')
                        <span class="text-danger">{{ $message}}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Log-masuk</button>

                <a href="/forgot-password"><small>Lupa kata laluan?</small></a>
                {{-- <p class="text-muted text-center"><small>Tiada akaun pengguna?</small></p> --}}
                {{-- <a class="btn btn-sm btn-white btn-block" href="#">Borang pendaftaran</a> --}}
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/template/js/jquery-3.1.1.min.js"></script>
    <script src="/template/js/popper.min.js"></script>
    <script src="/template/js/bootstrap.js"></script>

</body>

</html>
