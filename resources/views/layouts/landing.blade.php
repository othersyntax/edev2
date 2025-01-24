<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem eDE</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset("/template/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Animation CSS -->
    <link href="{{ asset("/template/css/animate.css") }}" rel="stylesheet">
    <link href="{{ asset("/template/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset("/template/css/style.css") }}" rel="stylesheet">
</head>
<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
            <div class="container">
                <a class="navbar-brand" href="#page-top">
                   <img src="{{ asset("/template/img/landing/logo-brand.png")}}" alt="" class="logo-brand">
                </a>

                <div class="collapse navbar-collapse justify-content-end" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="nav-link page-scroll" href="#page-top">Utama</a></li>
                        <li><a class="nav-link page-scroll" href="#pengenalan">Pengenalan</a></li>
                        <li><a class="nav-link page-scroll" href="#muatturun">Dokumen</a></li>
                        <li><a class="nav-link page-scroll" href="#hubungi-kami">Hubungi Kami</a></li>
                        <li><a class="nav-link page-scroll" href="/login">Log-Masuk</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel slide" data-ride="carousel" >
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class="active"></li>
        <li data-target="#inSlider" data-slide-to="1"></li>
    </ol>
    {{-- <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="">
                        Pengurusan Peruntukan<br/>
                        Pembangunan<br/>
                        Kementerian Kesihatan<br/>
                        Malaysia
                    </h1>
                    <p>Sistem Maklumat Pengurusan Perutukan Pembangunan</p>
                </div>
                <div class="carousel-image wow zoomIn animated" style="visibility: visible">
                    <img src="{{ asset("/template/img/landing/laptop.png") }}" alt="Dashboard"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>
        </div>
    </div> --}}

    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <div class="container">
                <div class="carousel-caption">
                    <h1 class="">
                        Pengurusan Peruntukan<br/>
                        Pembangunan<br/>
                        Kementerian Kesihatan<br/>
                        Malaysia
                    </h1>
                    <p>Sistem Maklumat Pengurusan Perutukan Pembangunan</p>
                </div>
                <div class="carousel-image wow zoomIn">
                    <img src="{{ asset("/template/img/landing/laptop.png") }}" alt="Dashboard"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>

        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1 class="">
                        Pengurusan Peruntukan<br/>
                        Pembangunan<br/>
                        Kementerian Kesihatan<br/>
                        Malaysia
                    </h1>
                    <p>Sistem Maklumat Pengurusan Perutukan Pembangunan</p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#inSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#inSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<section id="pengenalan" class="container services">
    <div class="row">
        <div class="col-lg-12 text-justify">
            <div class="blue-line"></div>
            <h1>OBJEKTIF</span> </h1>
            <p>Memastikan Peruntukan Pembangunan (DE) KKM melibatkan Butiran Projek (BP) one-line diuruskan mengikut tadbir urus yang teratur bagi memastikan prestasi perbelanjaan mencapai tahap yang optimum setiap tahun.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h2>Pengurusan</h2>
            <p>Dibangunkan untuk membolehkan pengurusan projek pembangunan bersifat one-line dilaksanakan dengan teratur</p>
        </div>
        <div class="col-sm-3">
            <h2>Pemantauan</h2>
            <p>Pengurusan dan pemantauan projek DE KKM akan dapat dilaksanakan dengan holistik, merangkumi permohonan projek, pelaksanaan projek dan penilaian serta pemantauan projek</p>
        </div>
        <div class="col-sm-3">
            <h2>Pengguna</h2>
            <p>Pengguna sistem ini terdiri daripada Bahagian Pembangunan sebagai pentadbir projek, manakala pihak Program, Bahagian, Institusi dan Jabatan Kesihatan Negeri (JKN) pula merupakan pemilik projek</p>
        </div>
        <div class="col-sm-3">
            <h2>Efisyen & Efektif</h2>
            <p>Memastikan pemilik projek menguruskan projek masing-masing dengan lebih efisyen dan efektif.</p>
        </div>
    </div>
</section>
<section id="muatturun" class="pricing">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="blue-line"></div>
                <h1>Muat Turun Dokumen</h1>
                <p>Muat turun dokumen dan pekeliling berkaitan.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Pekeliling
                    </li>
                    <li class="pricing-desc">
                        Pekeliling / garis panduan berkaitan permohonan dan perolehan projek.
                    </li>
                    <li style="text-align: left;">
                        <a href="{{ asset("/storage/dokumen/PK-Perolehan-MOF.pdf")}}" target="_blank">Pekeliling Perolehan MOF</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada:  {{ date('d-m-Y') }}</span>
                    </li>
                </ul>
            </div>

            <div class="col-lg-8 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Dokumen
                    </li>
                    <li class="pricing-desc">
                        Dokumen, manual dan templat berkaitan permohonan projek.
                    </li>
                    <li style="text-align: left;">
                        <a href="{{ asset("/storage/dokumen/GP-KSP-RMK12-2425.pdf")}}" target="_blank">Garis Panduan KSP RMKe-12 dan Permohonan Projek Pembangunan Tahun 2024-2025</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada: 02-09-2024</span>
                    </li>
                    <li style="text-align: left;">
                        <a href="{{ asset("/storage/dokumen/GP-BP00600-2024.pdf")}}" target="_blank">Aliran Proses PROFIT</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada: 02-09-2024</span>
                    </li>
                    <li style="text-align: left;">
                        <a href="{{ asset("/storage/dokumen/BlanketApproval.pdf")}}" target="_blank">Blanket Approval</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada: 02-09-2024</span>
                    </li>
                    <li style="text-align: left;">
                        <a href="{{ asset("/storage/dokumen/borang_penggunav1.pdf")}}" target="_blank">Borang Pendaftaran Pengguna</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada: 16-10-2024</span>
                    </li>
                    <li style="text-align: left;">
                        <a href="{{ asset("/storage/dokumen/template_fasiliti.xlsx")}}">Template Daftar Fasiliti</a><br/><span class="label label-warning">XLSX</span><span class="small"> Kemaskini pada: 27-10-2024</span>
                    </li>
                    <li style="text-align: left;">
                        <a href="{{ asset("/storage/dokumen/template_projek.xlsx")}}">Template Daftar Projek</a><br/><span class="label label-warning">XLSX</span><span class="small"> Kemaskini pada: 27-10-2024</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row m-t-lg">
            <div class="col-lg-12 text-center">
                <p>* Senarai pekeliling, garis panduan, dokumen, manual dan templat ini akan ditambah dah
                    dikemaskini dari masa ke semasa sekiranya ada. Jika ada sebarang pertanyaan, sila hubungi urus
                    setia seperti <a class="page-scroll" href="#hubungi-kami">di bawah</a>.</p>
            </div>
        </div>
    </div>

</section>
<section id="hubungi-kami" class="gray-section contact">
    <div class="container">
        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <div class="navy-line"></div>
                <h1>Hubungi Kami</h1>
                <p>Salurkan sebarang pertanyaan dan cadangan kepada kami di:</p>
            </div>
        </div>
        <div class="row m-b-lg justify-content-center">
            <div class="col-lg-12 ">
                <address class="text-center">
                    <h3><span class="navy">UNIT BAJET RMK</span></h3>
                    <strong>BAHAGIAN PEMBANGUNAN</strong><br>
                    Kementerian Kesihatan Malaysia<br/>
                    <abbr title="Phone">T:</abbr> +603 8883 2026 / +603 8883 2021 / +603 8883 2147 / +603 8883 2058 / +603 8883 2342 / +603 8883 2024
                </address>
                <p class="text-center">E-mel : ede@moh.gov.my</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:ede@moh.gov.my" class="btn btn-primary">Hantarkan e-mel kepada kami</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center m-t-lg m-b-lg">
                <p><strong>&copy; {{ date('Y') }} Bahagian Pembangunan</strong><br/> Paparan terbaik menggunakan pelayar internet Mozilla Firefox, Chrome dan Microsoft Edges.</p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="{{ asset("/template/js/jquery-3.1.1.min.js") }}"></script>
<script src="{{ asset("/template/js/popper.min.js") }}"></script>
<script src="{{ asset("/template/js/bootstrap.js") }}"></script>
<script src="{{ asset("/template/js/plugins/metisMenu/jquery.metisMenu.js") }}"></script>
<script src="{{ asset("/template/js/plugins/slimscroll/jquery.slimscroll.min.js") }}"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset("/template/js/inspinia.js") }}"></script>
<script src="{{ asset("/template/js/plugins/pace/pace.min.js") }}"></script>
<script src="{{ asset("/template/js/plugins/wow/wow.min.js") }}"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '#navbar',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

</body>
</html>
