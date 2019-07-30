@extends('frontend.v2.layouts.master')

@push('header')
@endpush

@section('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Tin tức
                </h1>	
                <p class="text-white link-nav"><a href="{{route('home')}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('home')}}"> Tin tức</a></p>
            </div>	
        </div>
    </div>
</section>

<section class="blog-area section-gap menu-list-area" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 pb-30 header-text">
                <h1>Các tin tức mới nhất về lễ trung thu 2019</h1>
                <p>
                   Đừng quên thường xuyên ghé thăm trang web để cập nhật các tin tức mới nhất từ chúng tôi
                </p>
            </div>
        </div>
        @foreach($posts->chunk(3) as $p)
        <div class="row">
            @foreach($p as $item)
            <div class="single-blog col-lg-4 col-md-4">
                {{-- <div class="thumb">
                    <img class="f-img img-fluid mx-auto" src="{{asset('v2/img/b1.jpg')}}" alt="">	
                </div> --}}
                <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <img style="border-radius:none !important;" class="img-fluid" src="" alt="">
                        <a href="#"><span>Admin</span></a>
                    </div>
                    <div class="meta">
                        {{date_format(date_create($item->created_at),"d/m/Y")}}
                        <span class="lnr lnr-heart"></span> 0
                        <span class="lnr lnr-bubble"></span> 0
                    </div>
                </div>							
            <a href="{{route('show.post',$item->id)}}">
                <h4>{{$item->title}}</h4>
                </a>
                <p>
                    {!!substr($item->content, 0, 250)!!}
                </p>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</section>
<!-- end blog Area -->
@stop

@push('footer')
@endpush