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
                    Sản phẩm
                </h1>	
                <p class="text-white link-nav"><a href="{{route('home')}}">Danh sách mùa bánh trung thu 2019</a></p>
            </div>	
        </div>
    </div>
</section>



<!-- Start item-category Area -->
<section class="item-category-area section-gap menu-list-area">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 pb-80 header-text text-center">
                <h1 class="pb-10">Các mẫu bánh bán chạy nhất</h1>
                <p>
                    Xem chi tiết báo giá bên trên menu
                </p>
            </div>
        </div>
        @foreach($products->chunk(4) as $p)	
        <div class="row">
            @foreach($p as $item)
            <div class="col-lg-3 col-md-6">
                <div class="single-cat-item">
                    <div class="thumb">
                        <img style="min-height:255px;border-radius:0 !important;" class="img-fluid" src="{{asset($item->feature_image)}}" alt="">
                    </div>	
                    <a href="#"><h4>{{$item->code}}</h4></a>
                    <p>
                        Giá: Liên hệ
                    </p>
                </div>
            </div>
            {{-- <a class="primary-btn mx-auto mt-80" href="#">View Full Menu</a> --}}
            @endforeach
        </div>
        @endforeach
    </div>	
</section>
@stop

@push('footer')
@endpush