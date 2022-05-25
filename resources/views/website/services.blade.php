@extends('layouts.webiste-layout')
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area page-title-style-two">
        <div class="container">
            <div class="page-title-content">
                <h2>{{$constants['title']}}</h2>
                <ul>
                    <li>
                        <a href="{{route('home')}}">
                            <i class="bx bx-home"></i>
                            الصفحة الرئيسة
                        </a>
                    </li>
                    <li class="active">الخدمات</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Services Area -->
    <section class="services-area pb-70">
        <div class="container">
            <div class="section-title">
                <span></span>
                <h2>يمكنك التعرف على خدماتنا لمعرفة الإجابة عن اسألتك</h2>
            </div>

            <div class="row">
                @foreach($services as $row)
                    @if($row->is_active)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-services">
                            <div class="services-img">
                                <a href="{{route('blogs',$row->id)}}">
                                    <img src="{{asset('storage/'.$row->image)}}" alt="{{$row->name}}">
                                </a>
                            </div>

                            <div class="services-content">
                                <h3><a href="{{route('blogs',$row->id)}}">{{$row->name}}</a></h3>
                                <p>
                                    {{$row->description}}
                                </p>

                                <a href="{{route('blogs',['id'=>$row->id])}}" class="read-more">
                                    المزيد
                                    <i class="flaticon-right-arrow"></i>
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

@endsection
