<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Shayna Template" />
    <meta name="keywords" content="Shayna, unica, creative, html" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Shayna | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('user-asset/css/bootstrap.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user-asset/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user-asset/css/themify-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user-asset/css/elegant-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user-asset/css/owl.carousel.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user-asset/css/nice-select.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user-asset/css/jquery-ui.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user-asset/css/slicknav.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('user-asset/css/style.css')}}" type="text/css" />
</head>

@include('user.layouts.navbar', ["cart_navbar"])
<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg={{ asset("user-asset/img/hero-1.jpg") }}>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg={{ asset("user-asset/img/hero-2.jpg") }}>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            </p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="product-slider owl-carousel">
                        @foreach ($product as $key)
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src={{ asset("admin-asset/img/mickey1.jpg") }} alt="" />
                                        <ul>
                                            <li class="w-icon active">
                                                <a href="#"><i class="icon_bag_alt"></i></a>
                                            </li>
                                            <li class="quick-view"><a href="product">+ Quick View</a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">{{ $key->category->nama }}</div>
                                        <a href="#">
                                            <h5>{{ $key->nama }}</h5>
                                        </a>
                                        <div class="product-price">
                                            {{ $key->harga }}
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg={{ asset("user-asset/img/insta-1.jpg") }}>
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">shayna_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg={{ asset("user-asset/img/insta-2.jpg") }}>
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">shayna_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg={{ asset("user-asset/img/insta-3.jpg") }}>
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">shayna_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg={{ asset("user-asset/img/insta-4.jpg") }}>
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">shayna_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg={{ asset("user-asset/img/insta-5.jpg") }}>
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">shayna_gallery</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg={{ asset("user-asset/img/insta-6.jpg") }}>
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">shayna_gallery</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src={{ asset("user-asset/img/logo-carousel/logo-1.png") }} alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src={{ asset("user-asset/img/logo-carousel/logo-2.png") }}  alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src={{ asset('user-asset/img/logo-carousel/logo-3.png') }}  alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src={{ asset('user-asset/img/logo-carousel/logo-4.png') }}  alt="" />
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src={{ asset("user-asset/img/logo-carousel/logo-5.png") }}  alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->
@extends("user.layouts.footer")

    <!-- Js Plugins -->
@push("script")
    <script src={{ asset("user-asset/js/jquery-3.3.1.min.js") }}></script>
    <script src={{ asset("user-asset/js/bootstrap.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery-ui.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.countdown.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.nice-select.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.zoom.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.dd.min.js") }}></script>
    <script src={{ asset("user-asset/js/jquery.slicknav.js") }}></script>
    <script src={{ asset("user-asset/js/owl.carousel.min.js") }}></script>
    <script src={{ asset("user-asset/js/main.js") }}></script>
@endpush
</html>