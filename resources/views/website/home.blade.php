@extends('layouts.webiste-layout')
@section('content')
<!-- Slider -->
<section class="jarallax" data-jarallax='{"speed": 0.3}'>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators mb-30" style="z-index : 1">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('template/website/assets/img/slider/slider-6.jpg')}}" class="d-block w-100"
                    alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>وثق زواجك قانونياً أو شرعياً </h3>
                    <p>وكلنا ودعنا نساعدك بتوثيق وتصديق عقد زواجك بطريقة رسمية قانونية أو شرعية وبسرعة فائقة</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('template/website/assets/img/slider/slider-5.jpg')}}" class="d-block w-100"
                    alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>استشارة واحدة معنا </h3>
                    <p>تغنيك عن البحث عن غيرنا </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('template/website/assets/img/slider/slider-3.jpg')}}" class="d-block w-100"
                    alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h3>ابدا رحلة الزواج معنا </h3>
                    <p>ودعنا نكمل عنك إجراءات زواجك السعيد بكل يسر وسهولة</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="banner-video wow zoomIn" data-wow-delay="1s"
        style="visibility: visible; animation-delay: 1s; animation-name: zoomIn;">
        <a href="https://www.youtube.com/watch?v=hsVDqNBID9E" class="video-btn popup-youtube">
            <i class="bx bx-play"></i>
        </a>
    </div>
</section>

<!-- End Slider -->
<!-- Start Banner Area -->
{{-- <section class="banner-area banner-area-four bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        <div class="banner-content">
                            <span class="top-title wow fadeInDown" data-wow-delay="1s">خدمات الزواج السعيد</span>
                            <h1 class="wow fadeInDown" data-wow-delay="1s">خدمة عصرية وسريعة </h1>
                            <p class="wow fadeInLeft" data-wow-delay="1s">شركة اجتماعية هادفة تجيب عن كافة
                                استفساراتكم وتقدم خدمة شاملة وسريعة</p>

                            <div class="banner-btn wow fadeInUp" data-wow-delay="1s">
                                <a href="contactus.html" class="default-btn">
                                    <span>تواصل معنا</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="banner-video wow zoomIn" data-wow-delay="1s"
                            style="visibility: visible; animation-delay: 1s; animation-name: zoomIn;">
                            <a href="https://www.youtube.com/watch?v=sdpxddDzXfE" class="video-btn popup-youtube">
                                <i class="bx bx-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- End Banner Area -->
<!-- Start Feature Area -->
<section class="feature-area feature-area-four pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single-feature overly-one">
                    <div class="overly-two">
                        <div class="title">
                            <i class="fa fa-eye"></i>
                            <h3>رؤيتنا</h3>
                        </div>
                        <p>الريادة في خدمة المجتمع محليًا وعالميًا بتيسير وتوثيق إجراءات الزواج والأحوال الشخصية لضمان أسرة مستقرة وسعيدة</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-feature overly-one">
                    <div class="overly-two">
                        <div class="title">
                            <i class="fa fa-rocket"></i>
                            <h3>رسالتنا</h3>
                        </div>
                        <p>إسعادكم بتقديم خدمة متميزة لتوثيق معاملات الزواج والأحوال الشخصية داخل الإمارات وخارجها، من خلال فريق كفء من المستشارين والمأذونين والمحاميين لبناء بيوت مستقرة وسعيدة</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-0">
                <div class="single-feature overly-one">
                    <div class="overly-two">
                        <div class="title">
                            <i class="fa fa-gem"></i>
                            <h3>قيمنا</h3>
                        </div>
                        <p>السرعة والاتقان، المصداقية والشفافية
                            <br>
                            السرية والكتمان، التميز والاحترافية</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Feature Area -->

<!-- Start Counter Area -->
<section class="counter-area pt-100 pb-70 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="">
            <div class="section-title white-title">
                <span>لماذا نحنا</span>
                <h2>إليك بعض الإحصائيات عن موقع الزواج السعيد</h2>
            </div>

            <div class="row" style="direction: ltr;">
                @foreach($statistics as $row)
                <div class="col-lg-4 col-sm-6">
                    <div class="single-counter overly-one">
                        <div class="overly-two">
                            <i class="{{$row->icon}}"></i>
                            <h2>
                                <span class="odometer" data-count="{{$row->value}}">00</span>
                            </h2>
                            <h3>{{$row->key}}</h3>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- End Counter Area -->

<!-- Start Services Area -->
<section class="services-area pb-70 mt-30">
    <div class="container">
        <div class="section-title">
            <span>خدمتنا</span>
        </div>

        <div class="row">
            @foreach($services as $row)
            @if ($row->is_active)
            <div class="col-lg-3 col-sm-6">
                <div class="single-services">
                    <div class="services-img">
                        <a href="{{route('blogshow',$row->id)}}">
                            <img src="{{asset('storage/'.$row->image)}}" alt="{{$row->title}}">
                        </a>
                    </div>

                    <div class="services-content">
                        <h3><a href="{{route('blogshow',$row->id)}}">{{$row->title}}</a></h3>
                        <p>
                            {!!$row->short_description!!}
                        </p>

                        <a href="{{route('blogshow',$row->id)}}" class="read-more">
                            <i class="flaticon-left-arrow"></i>المزيد
                        </a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- End Services Area -->


{{--
<!-- Start Blog Area -->
<section class="blog-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span>مقالاتنا</span>
            <h2>تعرف على أخر أخبارنا وخدماتنا</h2>
        </div>

        <div class="row">
            @foreach($blogs as $row)
            <div class="col-lg-4 col-md-6">
                <div class="single-blog">
                    <div class="blog-img">
                        <a href="blog-details.html">
                            <img src="{{asset('storage/'.$row->image)}}" alt="Image">
                        </a>
                    </div>

                    <div class="blog-content">
                        <span>{{date('M ,d,Y',strtotime($row->created_at))}}</span>
                        <h3><a href="blog-details.html">{{$row->title}}</a></h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Blog Area --> --}}

<!-- Start Our Approach Area -->
<section class="our-approach-area our-approach-area-four pb-70">
    <div class="container">
        <div class="section-title">
            <span>الزواج في دبي</span>
            <h2>استمتع بزواجك ودع تنسيق حفل زفافك ورحلة شهر العسل علينا</h2>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="approach-img">
                    <img src="{{asset('template/website/assets/img/wedding.jpg')}}" alt="Image">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="approach-content">
                    <h3></h3>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="single-approach">
                                <h3>حفلات زواج</h3>
                                <p>نقوم بتنظيم حفلات الزواج داخل دبي والاهتمام بكل تفاصيله.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="single-approach">
                                <h3>نظم شهر عسلك</h3>
                                <p>نقوم بمساعدتك لتنظيم رحلة شهر العسل.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="single-approach">
                                <h3>تنظيم الحجوزات</h3>
                                <p>نقوم بعمل حجوزات فندقية وصالات أعراس وكل ما يهمك لزواجك.</p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="single-approach">
                                <h3>احصل على فيزتك</h3>
                                <p>نقوم باستخراج فيزا سياحية لك لتستمتع بشهر عسل خارج البلاد.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Approach Area -->


<!-- Start Solution Area -->
{{-- <section class="solution-area pb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="solution-content">
                    <div class="solution-title">
                        <span>الأسئلة الشائعة</span>
                        <h2>إليك مجموعة من الأسئلة المتكررة والإجابة عنها.</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="single-solution overly-one">
                                <div class="overly-two">
                                    <h3>
                                        <a href="solution-details.html">
                                            ما هو الزواج المدني؟
                                        </a>
                                    </h3>
                                    <p>الزواج المدني هو ميثاق قانوني يربط بين رجل وامرأة غير مسلمين، يتم اقراره كعقد
                                        مدني دون الحاجة إلى حفل ديني. ويستند هذا الميثاق على قواعد لا علاقة لها
                                        بالدين بل تنظمها المادتان 4 و 5 من القانون رقم 14 لسنة 2021.</p>
                                    <span>01</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-6">
                            <div class="single-solution overly-one">
                                <div class="overly-two">
                                    <h3>
                                        <a href="solution-details.html">
                                            من يمكنه الزواج بموجب قانون الزواج المدني؟
                                        </a>
                                    </h3>
                                    <p>يمكن للوافدين المقيمين في دولة الإمارات، والسياح والزوار التقدم بطلب لاتمام
                                        مراسم الزواج المدني، بشرط أن يكون مقدمي الطلب غير مسلمين أو من دولة غير
                                        مسلمة..</p>
                                    <span>02</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-6 pr-0">
                <div class="solution-img">
                    <img src="assets/img/solution-img.png" alt="Image">
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- End Solution Area -->
<!-- Start Testimonials Area -->
<section class="testimonials-area ptb-100 jarallax" data-jarallax='{"speed": 0.3}'>
    <div class="container">
        <div class="testimonials">
            <h2 style="color: white">
                قالوا عنا
            </h2>

            <div class="testimonials-slider owl-carousel owl-theme">
                @foreach($testimonials as $row)
                <div class="testimonials-item">
                    <i class="flaticon-quote"></i>
                    <p>“{{$row->text}}.”</p>

                    <ul>
                        @for($i = 0 ;$i < $row->rate;$i++)
                            <li>
                                <i class="bx bxs-star"></i>
                            </li>
                            @endfor
                    </ul>

                    <h3>{{$row->username}}</h3>
                    <span>{{$row->position}}</span>
                    <img src="{{asset('storage/'.$row->image)}}" alt="" style="width: 65px; margin: 15px auto;">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Eed Testimonials Area -->

@endsection
