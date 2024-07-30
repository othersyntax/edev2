<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ asset("/template/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/font-awesome/css/font-awesome.css") }}" rel="stylesheet">

    <!-- Sweet Alert -->
    <link href="{{ asset("/template/css/plugins/sweetalert/sweetalert.css") }}" rel="stylesheet">
    @yield('custom-css')

    <link href="{{ asset("/template/css/animate.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/css/style.css") }}" rel="stylesheet">

</head>

<body class="">

    <div id="wrapper">

        @include('layouts.side-menu')

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="{{ route('logout') }}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            @yield('breadcrumb')

            <div class="wrapper wrapper-content">
                @yield('content')
            </div>
            <div class="footer">
                <div class="float-right">
                </div>
                <div>
                    <strong>Hak cipta</strong> Bahagian Pembangunan &copy; {{ date("Y") }}
                </div>
            </div>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset("/template/js/jquery-3.1.1.min.js") }}"></script>
    <script src="{{ asset("/template/js/popper.min.js") }}"></script>
    <script src="{{ asset("/template/js/bootstrap.js") }}"></script>
    <script src="{{ asset("/template/js/plugins/metisMenu/jquery.metisMenu.js") }}"></script>
    <script src="{{ asset("/template/js/plugins/slimscroll/jquery.slimscroll.min.js") }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset("/template/js/inspinia.js") }}"></script>
    <script src="{{ asset("/template/js/plugins/pace/pace.min.js") }}"></script>

    <!-- Sweet alert -->
    <script src="{{ asset("/template/js/plugins/sweetalert/sweetalert.min.js") }}"></script>
    <script src="{{ asset("/template/js/allFunction.js") }}"></script>
    @yield('custom-js')


</body>

</html>
