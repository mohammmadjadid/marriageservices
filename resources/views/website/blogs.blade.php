@extends('layouts.webiste-layout')

@section('content')
    <!-- Start Page Title Area -->
    <div class="page-title-area page-title-style-two">
        <div class="container">
            <div class="page-title-content">
                @if ($category)
                    <h2>{{$category->arabic_cat}}</h2>
                @else
                    <h2>المقالات</h2>
                @endif
                <ul>
                    <li>
                        <a href="{{route('home')}}">
                            <i class="bx bx-home"></i>
                            الصفحة الرئيسة
                        </a>
                    </li>
                    @if ($category)
                        <li class="active">{{$category->arabic_cat}}</li>
                    @else
                        <li class="active">المقالات</li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Blog Column Two Area -->
    <section class="blog-column-two-area ptb-100">
        <div class="container">
            <div class="row">
                @foreach($blogs as $row)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-posts">
                        <a href="{{route('blogshow',$row->id)}}">
                            <img src="{{asset('storage/'.$row->image)}}" alt="{{$row->title}}">
                        </a>

                        <div class="single-blog-content">
                            <span>خدمات</span>

                            <h3>
                                <a href="{{route('blogshow',$row->id)}}"> {{$row->title}}
                                </a>
                            </h3>

                            <p>{!! $row->text !!}</p>

                            <ul class="admin">
                                <li>
                                    <a href="#">
                                        <i class="bx bx-user-circle"></i>
                                        {{$row->created_by}}
                                    </a>
                                </li>
                                <li class="float">
                                    <i class="bx bx-calendar-alt"></i>
                                    {{date('M ,d ,Y' , strtotime($row->created_at))}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="pagination-area">
                        <!--
								<a href="#" class="prev page-numbers">
								<i class="bx bx-chevron-left"></i>
							</a>
							-->
                        {{$blogs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Column Two Area -->

@endsection
