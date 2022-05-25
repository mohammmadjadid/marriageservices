@extends('layouts.webiste-layout')
@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area page-title-style-two">
        <div class="container">
            <div class="page-title-content">
                <h2>من نحن</h2>
                <ul>
                    <li>
                        <a href="{{route('home')}}">
                            <i class="bx bx-home"></i>
                            الصفحة الرئيسية
                        </a>
                    </li>
                    <li class="active">من نحن</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start About Us Area -->
    <section class="about-us-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{asset('template/website/assets/img/about.jpg')}}" alt="Image">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="about-title">
                            <span>من هي شركة الزواج السعيد</span>
                            <p>
                                شركة متخصصة ومرخصة لتخليص وتوثيق وتصديق معاملات الزواج والأحوال الشخصية وكاتب العدل بالحضور الشخصي أو عن بعد (Online) داخل الدولة وخارجها من بدايتها إلى نهايتها بكل يسر وسهولة، من خلال مأذونين شرعيين معتمدين من المحكمة. ونأخذ على عاتقنا تقديم خدمة مميزة للراغبين في إتمام إجراءات الزواج وكل ما يتعلق بالأمور اللوجستية والقانونية كالاستشارات والوكالات والتصديقات للمستندات من الوزارات والسفارات والترجمة القانونية وغيرها، لدينا خبرة متميزة في إنجاز إجراءات الزواج بالطرق الميسرة وفقا لقانون وإجراءات الأحوال الشخصية الإماراتي، حيث نُصنف كأول وأفضل مكتب متخصص في الإمارات لتوثيق عقود وإجراءات الزواج والأحوال الشخصية.
                            </p>
                        </div>

                        <div class="privacy-content">
                            <h3>رؤيتنا</h3>
                            <p>أفضل مؤسسة عربية لتيسير وتوثيق إجراءات الزواج محلياً وعالمياً من خلال الاهتمام بالتفاصيل لضمان زواج ناجح وسعيد  وموثق</p>
                        </div>
                        <div class="privacy-content">
                            <h3>رسالتنا</h3>
                            <p>إسعادكم وراحتكم من خلال تقديم خدمة متميزة وميسرة لتخليص وتوثيق وتصديق كافة المعاملات المتعلقة بالزواج والأحوال الشخصية داخل حدود الإمارات وخارجها، من خلال فريق من المستشارين والمأذونين والمحامين لبناء بيوت على أعمدة السعادة والاستقرار</p>
                        </div>
                        <div class="privacy-content">
                            <h3>قيمنا</h3>
                            <p>
                                <ul>
                                    <li>السرعة والاتقان
                                    </li>
                                    <li>المصداقية والشفافية
                                    </li>
                                    <li>السرية والكتمان</li>
                                    <li>التميز والاحترافية</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us Area -->

    <style>
        .about-content p{
            font-size: 14px;
        }
        .about-content h3{
            font-size: 16px;
        }

    </style>

@endsection
