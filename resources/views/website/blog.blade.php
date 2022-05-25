@extends('layouts.webiste-layout')

@section('meta-section')
    <meta name="description" content="{{$blog->short_description}}">
    <meta name="keywords" content="{{$blog->keywords}}">
@endsection

@section('content')
<!-- Start Page Title Area -->
<div class="page-title-area page-title-style-two">
    <div class="container">
        <div class="page-title-content">
            <h2>{{$blog->title}}</h2>
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

<!-- Start Blog Details Area -->
<div class="blog-details-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-content">
                    <div class="blog-details-img">
                        <img src="{{asset('storage/'.$blog->blog->image)}}" alt="Image">
                    </div>

                    <div class="blog-top-content">
                        <div class="news-content">
                            {!! $blog->description !!}
                        </div>


                        <div class="">
                        </div>
                    </div>

                    <div class="">
                    </div>

                    <div class="">
                    </div>
                </div>

                @if ($blog->category_id)
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="default-btn btn-two" id="toggle-section">تواصل معنا</a>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="widget-sidebar">
                    <div class="sidebar-widget search">
                        <form class="search-form">
                            <input class="form-control" name="search" id="searchInput" placeholder="إبحث هنا" type="text">
                            {{-- <button class="search-button" type="button" id="searchBtn">
                                <i class="bx bx-search"></i>
                            </button> --}}
                        </form>
                        <div class="list-group" id="searchResult">
                        </div>
                    </div>

                    <div class="sidebar-widget recent-post">

                        <h3 class="widget-title">{{$blog->category_id ? 'خدمات أخرى' : "مقالات أخرى"}} </h3>

                        <ul>
                            @if($services)
                                @foreach($services as $row)
                                    @if($row->id != $blog->id )
                                    <li>
                                        <a href="{{route('blogshow',$row['id'])}}">
                                            {{$row->title}}
                                            <img class="blog-img" src="{{asset('storage/'.$row->image)}}" alt="{{$row->title}}">
                                        </a>
                                        <span>{{date('M d,Y' ,strtotime($row->created_at))}}</span>
                                    </li>
                                    @endif
                                @endforeach
                            @else
                                @foreach($related_blogs as $row)
                                    @if($row['id'] != $blog->id )
                                    <li>
                                        <a href="{{route('blogshow',$row['id'])}}">
                                            {{$row['title']}}
                                            <img class="blog-img" src="{{asset('storage/'.$row['image'])}}" alt="{{$row['title']}}">
                                        </a>
                                        <span>{{date('M d,Y' ,strtotime($row['created_at']))}}</span>
                                    </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>

                    {{-- @if($services)
                    <div class="sidebar-widget categories">
                        <h3>الخدمات الأخرى </h3>

                        <ul>
                            @foreach($services as $row)
                                @if ($row->is_active)
                                <li>
                                    <a href="{{route('blogs',$row->id)}}">{{$row->name}}</a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}


                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Blog Details Area -->
<div class="" id="ContactSection" style="display: none;">
    @include('website.contact-section')
</div>
<style>
    .blog-details-area ul {
        list-style: inside !important;
    }
</style>
@endsection

@section('scripts')
    <script>
        $(function(){
            $('#toggle-section').on('click' , function(){
                $('#ContactSection').toggle();
                $('html, body').animate({
                    scrollTop: $("#ContactSection").offset().top
                }, 500);
            })

            $('#searchInput').on('keyup focusin',function(){
                if(this.value == "")
                    $('#searchResult').html("");
                else
                $.get('{{url('/blog/search')}}?search='+this.value ,function(res){
                    $('#searchResult').html("");
                    res.forEach(element => {
                        $('#searchResult').append('<a href="./'+element.id+'" class="list-group-item list-group-item-action">'+element.title+'</a>')
                    });
                })
            })

            $('#searchInput').on('focusout',function(){
                setTimeout(() => {
                    $('#searchResult').html("");
                }, 1000);
            })
        })
    </script>
    {!! NoCaptcha::renderJs() !!}
@endsection
