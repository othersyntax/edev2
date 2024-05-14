<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistem eDE</title>

    <link href="{{ asset("/template/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/font-awesome/css/font-awesome.css") }}" rel="stylesheet">

    <link href="{{ asset("/template/css/animate.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/style.css") }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown mt-5">
        <div>
            <div>

                <img src="{{ asset("/template/img/edelogo.png")}}" alt="" class="logo-name">

            </div>
            <form class="m-t" role="form" action="index.html">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-mel" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Katalaluan" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Log-masuk</button>

                <a href="#"><small>Lupa katalaluan?</small></a>
            </form>
            <p class="m-t"> <small>Bahagian Pembangunan &copy; {{ date("y") }}</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset("/template/js/jquery-3.1.1.min.js") }}"></script>
    <script src="{{ asset("/template/js/popper.min.js") }}"></script>
    <script src="{{ asset("/template/js/bootstrap.js") }}"></script>

</body>

</html>
