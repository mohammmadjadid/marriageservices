@extends('layouts.webiste-layout')
@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area page-title-style-two ">
    <div class="container">
        <div class="page-title-content">
            <h2>الأسئلة الشائعة </h2>
            <ul>
                <li>
                    <a href="{{route('home')}}">
                        <i class="bx bx-home"></i>
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="active">الأسئلة الشائعة</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Solution Area -->
<section class="solution-area pb-70 mt-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="solution-content">
                    <div class="solution-title">
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
</section>
<!-- End Solution Area -->

@endsection
