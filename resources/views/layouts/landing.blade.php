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
                        {{--li><a class="nav-link page-scroll" href="#page-top">Utama</a></li>
                        <li><a class="nav-link page-scroll" href="#pengenalan">Pengenalan</a></li>
                        <li><a class="nav-link page-scroll" href="#muatturun">Dokumen</a></li>
                        <li><a class="nav-link page-scroll" href="#hubungi-kami">Hubungi Kami</a></li>--}}
                        <li><a class="nav-link page-scroll" href="/login">Log-Masuk</a></li>
                    </ul>
                </div>
            </div>
        </nav>
</div>
<div id="inSlider" class="carousel slide" data-ride="carousel" >
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
                <div class="carousel-image wow zoomIn animated" style="visibility: visible">
                    <img src="{{ asset("/template/img/landing/laptop.png") }}" alt="Dashboard"/>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back three"></div>
        </div>
    </div>
</div>


<section id="pengenalan" class="container services">
    <div class="row">
        <div class="col-lg-12 text-center">
            <div class="blue-line"></div>
            <h1>Sistem Profil Projek ICT Sektor Awam (PROFIT)</span> </h1>
            <p>Sistem PROFIT dibangunkan sebagai pangkalan data yang menyimpan maklumat semua projek-projek
                teknologi maklumat dan komunikasi (ICT) di agensi Kerajaan. Sistem ini membolehkan maklumat projek
                ICT di agensi Kerajaan disimpan, dikemaskini serta dianalisa dari masa ke semasa melalui laporan
                bergrafik yang dijana. Sistem ini juga menyediakan kemudahan penilaian dan kelulusan dari segi
                teknikal bagi perolehan ICT daripada Jawatankuasa Pemandu ICT (JPICT) kementerian dan agensi lain
                serta Jawatankuasa Teknikal ICT Sektor Awam (JTISA) yang berurus setia di MAMPU.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 text-center wow fadeInLeft">
            <div>
                <i class="fa fa-desktop features-icon"></i>
                <h2>Pengurusan Profil Projek ICT</h2>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-area-chart features-icon"></i>
                <h2>Pengurusan Permohonan dan Kelulusan JPICT</h2>
            </div>
        </div>
        <div class="col-md-6 text-center  wow zoomIn">
            <img src="{{ asset("/template/img/landing/#.png") }}" alt="Dashboard" class="img-responsive">
        </div>
        <div class="col-md-3 text-center wow fadeInRight">
            <div>
                <i class="fa fa-bar-chart features-icon"></i>
                <h2>Pengurusan Pemantauan Projek ICT</h2>
            </div>
            <div class="m-t-lg">
                <i class="fa fa-area-chart features-icon"></i>
                <h2>Pengurusan Permohonan dan Kelulusan JTISA</h2>
            </div>
        </div>
    </div>
    <div class="row m-t-lg">
        <div class="col-lg-12 text-center">
            <p>Melalui PROFIT, maklumat projek ICT di agensi Kerajaan serta permohonan JPICT dan JTISA boleh dicapai
                dengan mudah dan pemantauan kemajuan pelaksanaan projek juga dapat dilaksanakan dengan cepat dan
                tepat.</p>
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
            <div class="col-lg-6 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Pekeliling
                    </li>
                    <li class="pricing-desc">
                        Pekeliling / garis panduan berkaitan permohonan dan perolehan projek.
                    </li>
                        <li style="text-align: left;">

                        
                        <a href="{{ asset("/template/img/12.01.2024_Pekeliling Perolehan MOF.pdf")}}" target="_blank">Pekeliling Perolehan MOF</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada: null</span>
                    </li>
                    <li style="text-align: left;">
                        <a href="{{ asset("/template/img/Blanket approval.pdf")}}" target="_blank">Blanket Approval</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada: null</span>
                    </li>
                </ul>
            </div>

            <div class="col-lg-6 wow zoomIn">
                <ul class="pricing-plan list-unstyled">
                    <li class="pricing-title">
                        Dokumen
                    </li>
                    <li class="pricing-desc">
                        Dokumen, manual dan templat berkaitan permohonan projek.
                    </li>
                        
                        <li style="text-align: left;">
                        <a href="{{ asset("/template/img/EPU_Garis Panduan KSP RMKe-12 dan Permohonan Projek Pembangunan Tahun 2024-2025.pdf")}}" target="_blank">EPU_Garis Panduan KSP RMKe-12 dan Permohonan Projek Pembangunan Tahun 2024-2025</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada: null</span>
                        </li>
                        <li style="text-align: left;">
                        <a href="{{ asset("/template/img/GP BP00600 tahun 2024 lengkap.pdf")}}" target="_blank">ALIRAN PROSES PROFIT</a><br/><span class="label label-success">PDF</span><span class="small"> Kemaskini pada: null</span>
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
                <p>Salurkan sebarang pertanyaan dan cadangan kepada kami di.</p>
            </div>
        </div>
        <div class="row m-b-lg justify-content-center">
            <div class="col-lg-12 ">
                <address class="text-center">
                    <h3><span class="navy">UNIT BAJET RMK</span></h3>
                    <strong>BAHAGIAN PEMBANGUNAN</strong><br>
                    Kementerian Kesihatan Malaysia<br/>
                    <abbr title="Phone">T:</abbr> +603 8883 2021
                </address>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="mailto:usup.keram@moh.gov.my" class="btn btn-primary">Hantarkan e-mel kepada kami</a>                
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
