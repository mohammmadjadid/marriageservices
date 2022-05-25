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
{{-- <section class="solution-area pb-70 mt-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="solution-title">
                        <h2>إليك مجموعة من الأسئلة المتكررة والإجابة عنها.</h2>
                    </div>

                    <div class="row">

                        @foreach ($questions as $question )
                        <div class="col-lg-12 col-md-12">
                            <div class="single-solution overly-one">
                                <div class="overly-two">
                                    <h3>
                                        <a href="solution-details.html">
                                            {{$question->question}}
                                        </a>
                                    </h3>
                                    <p>{!! $question->answer !!}</p>
                                    <span>01</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- End Solution Area -->


<!-- Start FAQ Area -->
<section class="faq-area white-bg ptb-100">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-12">
                <div class="faq-accordion">
                    <div class="faq-title">
                        <h2>إليك مجموعة من الأسئلة المتكررة والإجابة عنها</h2>
                    </div>

                    <ul class="accordion">
                        @foreach ($questions as $question )
                        <li class="accordion-item">
                            <a class="accordion-title active" href="javascript:void(0)">
                                <i class="bx bx-plus"></i>
                                {{ $question->question }}
                            </a>

                            <div class="accordion-content show">
                                <p>{!! $question->answer !!}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End FAQ Area -->

<style>
    .accordion-content li {
        list-style-type: auto;
    }
</style>
@endsection
