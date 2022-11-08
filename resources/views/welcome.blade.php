<!DOCTYPE html>
<!--[if IE 8]>    <html class="ie8" > <![endif]-->
<!--[if IE 9]>    <html class="ie9" > <![endif]-->
<!--[if IE 10]>    <html class="ie10" > <![endif]-->
<!--[if IE 11]>    <html class="ie11" > <![endif]-->
<!--[if (gt IE 11)|!(IE)]><!-->
<html lang="en-US">
<!--<![endif]-->

<head>
    <title>Welcome to the Report Case</title>
    <meta name="keywords" content>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="{{asset('front/images/favicon.png')}}">
    <!--Bootstrap-->
    <link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <!--font Awesome-->
    <link href="{{asset('front/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <!--slider-->
    <link href="{{asset('front/css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front/css/animate.css')}}" rel="stylesheet" type="text/css">
    <!--Animation-->
    <link href="{{asset('front/css/animations.css')}}" rel="stylesheet" type="text/css">
    <!--main file-->
    <link href="{{asset('front/css/hover.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet" type="text/css">
    <!--Responsive file-->
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="preloader"></div>
    <!--Start Header-->
    <div class="wellcome_banner">
        <header id="header2">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 col-md-2">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{asset('front/images/black_logo.png')}}" alt></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <nav>
                            <ul>
                                <li class="dropdown">
                                    <a href="{{url('/')}}" class=" active">Home</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Crimes</a>
                                    <ul class="dropdown-menu">
                                        @foreach ($categories as $data)
                                           <li class="hvr-sweep-to-right"><a href="{{route('case')}}">{{$data->name}}</a></li>
                                        @endforeach


                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="{{route('case')}}" data-toggle="dropdown">Cases</a>
                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>
        </header>
    </div>
    <!--End Header-->
    <!--Responsive Nav-->
    <nav class="navbar navbar-expand-lg pd-0">
        <div class="responsive_button">
            <p>Home</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collpase-navbar">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <span><i class="fas fa-bars"></i></span>
            </button>
        </div>
        <div class="collapse navbar-collapse responsive_nav" id="collpase-navbar">
            <ul class="navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Crimes</a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $data)
                        <li class="hvr-sweep-to-right"><a href="{{route('case')}}">{{$data->name}}</a></li>
                     @endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{route('case')}}" data-toggle="dropdown">Cases</a>

                </li>
            </ul>
        </div>
    </nav>
    <!--Responsive Nav-->
    <!--Start slider-->
        <div class="slider">
            <div class="mainslider owl-carousel owl-theme">
                <div class="item">
                    <div class="slides">
                        <div class="layer"></div>
                        <img src="{{asset('front/images/image.webp')}}" alt>
                        <div class="caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <img src="images/slider_img.png" alt>

                                        <h3>We protect the American people and uphold the U.S. Constitution.
                                        </h3>
                                        <a href="#" class="button hvr-shutter-in-horizontal">View Cases</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Start Practice Area -->
        <div class="services_wrap services_two">
            <div class="heading_section">
                <h3 class="heading_b">Top Cases</h3>
                <p>See What we are investigating</p>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($crime as $case)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="services border">
                            <figure><img src="{{asset('uploads/image/'.$case->image)}}" alt></figure>
                            <a href="{{url('/viewcase/'.encrypt($case->id))}}">
                                <h4>{{$case->name}}</h4>
                                <small>{{$case->casecategory}}</small>
                            </a>
                            <p>{{$case->title}}
                            </p>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!--End Practice Area -->
        <!--Start Practice Area -->
        <div class="services_wrap services_two">
            <div class="heading_section">
                <h3 class="heading_b">News</h3>
                <p>Stories and Podcasts</p>
            </div>
            <div class="container">
                <div class="row">
                    @forelse ($news as $newnews)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="services border">

                            <a href="practice.html">
                                <h4 class="mt-3">{{$newnews->title}}</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet consectetur
                                adipisicing elit sed don eiusmod tempor
                                enim minim veniam quis.
                            </p>
                        </div>
                    </div>
                    @empty

                    @endforelse


                </div>
            </div>
        </div>
        <!--End Practice Area -->

        <!--Start Footer -->
        <div class="footer_bottom">
            <div class="footer_inner">
                <div class="container">
                        <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 animated slide">
                            <div class="footer_widget">
                                <h5>What we Investigate</h5>
                                <ul class="creative-list">
                                    @foreach ($categories as $data)
                                        <li><a href="practice.html">{{$data->name}}</a></li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 animated slide">
                            <div class="footer_widget">
                                <h5>Most wanted</h5>
                                <address>
                                    <p>Murder</p>
                                    <p>Homicide</p>
                                    <p>Terorism</p>
                                </address>
                                <address>
                                    <p>News</p>
                                    <p>Report</p>
                                    <p>Help</p>
                                </address>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 animated slide">
                            <div class="footer_widget">
                                <h5>How can we help you</h5>
                                <address>
                                    <p> Law enforcement</p>
                                    <p>Victims</p>
                                    <p>Parents and caregivers</p>
                                    <p>Students </p>
                                </address>
                                <address>
                                    <p > Businesses</p>
                                    <p>Safety Proceedures</p>
                                </address>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 animated slide">
                            <div class="footer_widget">
                                <h5>About</h5>
                                <address>
                                    <p> Mission & Priorities</p>
                                    <p>Leadership and Structure</p>
                                    <p>Partnership</p>
                                    <p>Cummunity Outreach </p>
                                </address>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--End Footer -->
        <a href="#0" class="cd-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
        <script src="{{asset('front/js/jquery-1.11.3.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
        <!-- Accordion -->
        <script src="{{asset('front/js/jquery-ui.js')}}"></script>
        <script src="{{asset('front/js/jquery.fancybox.js')}}"></script>
        <!-- Parallax -->
        <script src="{{asset('front/js/jquery.parallax-1.1.3.js')}}"></script>
        <!-- Slider -->
        <script src="{{asset('front/js/jquery.cycle.all.js')}}"></script>
        <!-- Timeline -->
        <script src="{{asset('front/js/modernizr.js')}}"></script>
        <script src="{{asset('front/js/jquery.mobile.custom.min.js')}}"></script>
        <script src="{{asset('front/js/main.js')}}"></script>
        <!-- Appear -->
        <script src="{{asset('front/js/jquery.appear.js')}}"></script>
        <!-- Slider -->
        <script src="{{asset('front/js/owl.carousel.js')}}"></script>
        <!-- Custom -->
        <script src="{{asset('front/js/custom.js')}}"></script>
        <!-- Custom -->
        <script src="{{asset('front/js/custom.js')}}"></script>
        <script src="{{asset('front/js/script.js')}}"></script>
</body>

</html>
