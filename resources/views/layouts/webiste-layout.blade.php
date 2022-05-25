<!doctype html>
<html lang="ar" dir="rtl">

<!-- Mirrored from templates.envytheme.com/seqty/rtl/adel.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2022 13:06:35 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="author" content="Mohammad Jadid">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('meta-section')
    <!-- Links of CSS files -->
    <link rel="stylesheet" href="{{asset('template/website/assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/droidarabickufi.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/rtl.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('template/website/assets/library/font_awesome/css/font-awesome.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('template/website/assets/css/flag-icons.min.css')}}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('template/website/assets/img/favicon.png')}}">
    <!-- Title -->
    <title>{{$constants['title']}}</title>
</head>

<body>

    <!-- Start Preloader Area -->
    <div class="preloader">
        <div class="loader">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>

            <div class="indicator">
                <svg width="16px" height="12px">
                    <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                </svg>
            </div>
        </div>
    </div>

    <!-- Start Header Area -->
    <header class="header-area">

        <!-- Start Top Header -->
        <div class="top-header top-header-four">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6">
                        <ul class="header-left-content">
                            {{-- <li>
                                <i class="bx bx-phone-call"></i>
                                <a href="tel:{{str_replace(' ','-',$constants['phone-1'])}}" style="direction: ltr;">{{$constants['phone-1']}}</a>
                            </li> --}}
                            {{-- <li>
                                <i class="bx bxs-envelope" style="margin: 0 5px"></i>
                                <a href="mailto:{{str_replace(' ','-',$constants['email'])}}" style="direction: ltr;">{{$constants['email']}}</a>
                            </li> --}}
                        </ul>
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <ul class="header-right-content">
                            <li>
                                <i class="bx bx-phone-call"></i>
                                <a href="tel:{{str_replace(' ','-',$constants['phone-1'])}}" style="direction: ltr;">{{$constants['phone-1']}}</a>
                            </li>
                            @if($constants['whatsapp'])
                            <li class="whatsapp-li">
                                <a href="https://api.whatsapp.com/send?phone={{str_replace(' ','',$constants['whatsapp'])}}" target="_blank">
                                    <img src="{{asset('template/website/assets/img/whatsapp-logo.png')}}" alt="" style="width :50%">
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Top Header -->
        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <div class="mobile-nav">
                <div class="container">
                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset('storage/'.$constants['logo'])}}" alt="Logo" class="w-33">
                    </a>
                </div>
            </div>

            <div class="main-nav">
                <div class="container">
                    <nav class="navbar navbar-expand-md">
                        <a class="navbar-brand text-end" href="{{route('home')}}">
                            <img src="{{asset('storage/'.$constants['logo'])}}" alt="Logo" class="w-60">
                        </a>

                        <div class="collapse navbar-collapse mean-menu">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="{{route('home')}}" class="nav-link">الرئيسة</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('about')}}" class="nav-link">من نحن</a>
                                </li>

                                @foreach ($headerServices as $row )
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        {{$row['title']}}
                                        <i class="bx bx-chevron-down"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        @foreach ( $row['blogs'] as $secRow)
                                            <li class="nav-item">
                                                <a href="{{route('blogshow',$secRow->id)}}" class="nav-link">{{$secRow->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                                <li class="nav-item">
                                    <a href="{{route('contact')}}" class="nav-link">تواصل معنا</a>
                                </li>
                            </ul>

                            {{-- <div class="others-option">
                                <div class="cart-icon">
                                    <a href="#">
                                        <i class="bx bxs-keyboard"></i>
                                    </a>
                                </div>

                                <div class="get-quote">

                                </div>
                            </div> --}}
                        </div>
                    </nav>
                </div>
            </div>

            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Navbar Area -->

    </header>
    <!-- End Header Area -->

    @yield('content')

    <!-- Start Footer Area -->
    <footer class="footer-area pt-100 pb-70 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">

            <div class="row">
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 footer-logo-section">
                            <div class="single-footer-widget">
                                <a href="index.html" class="logo">
                                    <img src="{{asset('template/website/assets/img/logo-2.png')}}" alt="Image">
                                </a>
                                <ul class="social-icon">
                                    @if($constants['facebook'])
                                        <li>
                                            <a href="{{$constants['facebook']}}" target="_blank">
                                                <img src="{{asset('template/website/assets/img/facebook.png')}}" alt="">
                                            </a>
                                        </li>
                                    @endif
                                    @if($constants['instagram'])
                                        <li>
                                            <a href="{{$constants['instagram']}}" target="_blank">
                                                <img src="{{asset('template/website/assets/img/Instagram.png')}}" alt="">
                                            </a>
                                        </li>
                                    @endif
                                    @if($constants['whatsapp'])
                                        <li>
                                            <a href="https://api.whatsapp.com/send?phone={{str_replace(' ','',$constants['whatsapp'])}}" target="_blank">
                                                <img src="{{asset('template/website/assets/img/whatsapp-logo.png')}}" alt="">
                                            </a>
                                        </li>
                                    @endif
                                    @if($constants['twitter'])
                                        <li>
                                            <a href="{{$constants['twitter']}}" target="_blank">
                                                <img src="{{asset('template/website/assets/img/twitter.png')}}" alt="">
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-footer-widget">
                                <h3>العنوان</h3>

                                <ul class="address">
                                    <li class="location">
                                        <i class="bx bxs-location-plus"></i>
                                        {{$constants['address']}}
                                    </li>
                                    <li>
                                        <i class="bx bxs-envelope"></i>
                                        <a href="mailto:{{$constants['email']}}"><span>{{$constants['email']}}</span></a>
                                    </li>
                                    <li>
                                        <i class="bx bxs-phone-call"></i>
                                        <a href="tel:{{str_replace(' ','',$constants['phone-1'])}}" style="direction: ltr;">{{$constants['phone-1']}}</a>
                                        @if($constants['phone-2'])
                                        <a href="tel:{{str_replace(' ','',$constants['phone-1'])}}" style="direction: ltr;">{{$constants['phone-1']}}</a>
                                        @endif
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="single-footer-widget">
                                <h3>خدمات الزواج</h3>

                                <ul class="import-link">
                                    @for($i = 0; $i < count($footerServices)/2;$i++)
                                    <li>
                                        <a href="{{route('blogshow',$footerServices[$i]->id)}}">{{$footerServices[$i]->title }}</a>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="single-footer-widget">
                                <h3>خدماتنا أيضا</h3>

                                <ul class="import-link">
                                    @for($i =  count($footerServices)/2 ; $i < count($footerServices);$i++)
                                    <li>
                                        <a href="{{route('blogshow',$footerServices[$i]->id)}}">{{$footerServices[$i]->title }}</a>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="single-footer-widget">
                                <h3>الشركة</h3>

                                <ul class="import-link">
                                {{-- <li>
                                    <a href="{{route('blogs')}}">المقالات </a>
                                </li> --}}
                                <li>
                                    <a href="{{route('about')}}">عن الزواج السعيد </a>
                                </li>
                                <li>
                                    <a href="{{route('contact')}}">تواصل معنا</a>
                                </li>
                                <li>
                                    <a href="{{route('faq')}}">الأسئلة الشائعة </a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- Start Copy Right Area -->
    <div class="copy-right-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p>
                         مؤسسة خدمات الزواج السعيد - مرخصة من الدائرة الاقتصادية بدي رقم (939081)
                         <br>
                         <i class="bx bx-copyright"></i>حقوق الملكية محفوظة
                        <a href="https://envytheme.com/" target="_blank"></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copy Right Area -->



    <!-- Links of JS files -->
    <script src="{{asset('template/website/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/meanmenu.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/nice-select.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/jarallax.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/appear.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/odometer.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/smoothscroll.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/form-validator.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/contact-form-script.js')}}"></script>
    <script src="{{asset('template/website/assets/js/ajaxchimp.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('template/website/assets/js/custom.js')}}"></script>
    @yield('scripts')
</body>

<!-- Mirrored from templates.envytheme.com/seqty/rtl/adel.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Apr 2022 13:06:38 GMT -->

</html>
