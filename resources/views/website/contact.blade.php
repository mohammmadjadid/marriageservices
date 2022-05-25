@extends('layouts.webiste-layout')
@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area page-title-style-two">
    <div class="container">
        <div class="page-title-content">
            <h2>تواصل معنا</h2>
            <ul>
                <li>
                    <a href="{{route('home')}}">
                        <i class="bx bx-home"></i>
                        الصفحة الرئيسية
                    </a>
                </li>
                <li class="active">تواصل معنا</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Contact Area -->
<section class="main-contact-area ptb-100">
    <div class="container">
        @if (Session::has('message'))
        <div class="row">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                {!! session('message') !!}.
            </div>
        </div>
        @endif

        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="contact-wrap">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h2>راسلنا</h2>
                        </div>

                        <form method="POST" action="{{route('sendMessage')}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>الاسم</label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                               data-error="أدخل اسمك" value="{{old('name')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="text" name="phone" id="phone" class="form-control" required
                                               data-error="أدخل رقم هاتفك" value="{{old('phone')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>البريد الإلكتروني</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               data-error="أدخل البريد الإلكتروني" value="{{old('email')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>الموضوع</label>
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                               required data-error="أدخل الموضوع" value="{{old('msg_subject')}}">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>الرسالة</label>
                                        <textarea name="message" class="form-control" id="message" cols="30"
                                                  rows="10" required data-error="أكتب رسالتك">{{old('message')}}</textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                        <label class="col-md-4 control-label">Captcha</label>
                                        <div class="col-md-6 pull-center">
                                            {!! app('captcha')->display() !!}
                                            @if ($errors->has('g-recaptcha-response'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">

                                    <input type="submit" value="إرسال" class="default-btn btn-two">
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="contact-info">
                    <h3>معلومات التواصل</h3>
                    <p>لا تترد بالاتصال بنا إذا كان لديك أي استفسار</p>

                    <ul class="address">
                        <li class="location">
                            <i class="bx bxs-location-plus"></i>
                            <span>العنوان</span>
                            {{$constants['address']}}
                        </li>
                        <li>
                            <i class="bx bxs-phone-call"></i>
                            <span>الهاتف</span>
                            <a style="direction: ltr" href="tel:{{$constants['phone-1']}}">{{$constants['phone-1']}}</a>
                            @if($constants['phone-2'])
                            <a href="tel:{{$constants['phone-2']}}">{{$constants['phone-2']}}</a>
                            @endif
                        </li>
                        <li>
                            <i class='bx bxl-whatsapp'></i>
                            <span>واتساب</span>
                            <a style="direction: ltr" href="tel:{{$constants['phone-1']}}">{{$constants['phone-1']}}</a>
                            @if($constants['phone-2'])
                            <a href="tel:{{$constants['phone-2']}}">{{$constants['phone-2']}}</a>
                            @endif
                        </li>
                        <li>
                            <i class="bx bxs-envelope"></i>
                            <span>البريد الإلكتروني</span>
                            <a
                                href="mailto:{{$constants['email']}}"><span
                                    class="__cf_email__"
                                    >{{$constants['email']}}</span></a>
                        </li>
                    </ul>

                    <div class="sidebar-follow-us">
                        <h3>تابعنا على وسائل التواصل الاجتماعي:</h3>

                        <ul class="social-wrap">
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

    </div>
</section>
<!-- End Contact Area -->

<!-- Start Map Area -->
<div class="map-area">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28881.620287353006!2d55.292025749879244!3d25.196391406684334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43348a67e24b%3A0xff45e502e1ceb7e2!2z2KjYsdisINiu2YTZitmB2Kk!5e0!3m2!1sar!2sae!4v1651694191218!5m2!1sar!2sae"></iframe>
</div>
<!-- End Map Area -->
@endsection

@section('scripts')
{!! NoCaptcha::renderJs() !!}
{{-- <script src="https://www.google.com/recaptcha/enterprise.js?render=6Lfy_QkgAAAAAOrwcZgXl3oKt2z8-LeNpdfzn0ka"></script>
<script>
    grecaptcha.enterprise.ready(function() {
        grecaptcha.enterprise.execute('6Lfy_QkgAAAAAOrwcZgXl3oKt2z8-LeNpdfzn0ka', {action: '{{route('sendMessage')}}'}).then(function(token) {
        ...
        });
    });
</script> --}}
@endsection
