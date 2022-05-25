<!-- Start Contact Area -->
<section class="main-contact-area mb-30">
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
                                               data-error="أدخل اسمك">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <label>رقم الهاتف</label>
                                        <input type="text" name="phone" id="phone" class="form-control" required
                                               data-error="أدخل رقم هاتفك">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <div class="form-group">
                                        <label>البريد الإلكتروني</label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               data-error="أدخل البريد الإلكتروني">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>الموضوع</label>
                                        <input type="text" name="msg_subject" id="msg_subject" class="form-control"
                                               required data-error="أدخل الموضوع">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label>الرسالة</label>
                                        <textarea name="message" class="form-control" id="message" cols="30"
                                                  rows="10" required data-error="أكتب رسالتك"></textarea>
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
                            برج خليفة, دبي, الإمارات العربية المتحدة
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
                            <span>الإيميل</span>
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
