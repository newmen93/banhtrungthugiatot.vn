@extends('frontend.v2.layouts.master')

@section('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                {{-- <h1 class="text-white">
                    Bánh trung thu 2019
                </h1>	 --}}
                {{-- <p class="text-white link-nav"><a href="{{route('home')}}">Mùa bánh trung thu 2019</a></p> --}}
                 
               <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('products/H1.jpg')}}" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="{{asset('products/H4.jpg')}}" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="{{asset('products/H6.jpg')}}" alt="New York" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
  
                    
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
                    <div class="thumb" style="">
                        <img style="min-height:255px;border-radius:0 !important;" class="img-fluid" src="{{asset($item->feature_image)}}" alt="">
                    </div>	
                    <a href="#"><h4>{{$item->code}}</h4></a>
                    <p>
                        {{'Giá: Liên hệ'}}
                    </p>
                   
                </div>
            </div>
            @endforeach
            {{-- <a class="primary-btn mx-auto mt-80" href="#">View Full Menu</a> --}}
        </div>
        @endforeach
    </div>	
</section>
<!-- End item-category Area -->


<!-- End review Area -->			

<!-- Start blog Area -->
<section class="blog-area section-gap menu-list-area" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 pb-30 header-text">
                <h1>Bài viết mới nhất</h1>
                <p>
                    Cập nhật thường xuyên các tin tức về bánh trung thu và sự kiện lễ hội trung thu năm 2019
                </p>
            </div>
        </div>
        <div class="row">	
            @foreach($posts as $item)
            <div class="single-blog col-lg-4 col-md-4">
                <div class="thumb">
                    <img class="f-img img-fluid mx-auto" src="{{asset('v2/img/b3.jpg')}}" alt="">	
                </div>
                <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <img class="img-fluid" src="" alt="">
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
    </div>	
</section>
<!-- end blog Area -->
@stop