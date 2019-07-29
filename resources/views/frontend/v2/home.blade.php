@extends('frontend.v2.layouts.master')

@section('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Bánh trung thu 2019
                </h1>	
                <p class="text-white link-nav"><a href="{{route('home')}}">Mùa bánh trung thu 2019</a></p>
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
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-cat-item">
                    <div class="thumb">
                        <img style="border-radius:0 !important;" class="img-fluid" src="{{asset('frontend/v2/img/c1.jpg')}}" alt="">
                    </div>	
                    <a href="#"><h4>Pizza</h4></a>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-cat-item">
                    <div class="thumb">
                        <img style="border-radius:0 !important;" class="img-fluid" src="{{asset('frontend/v2/img/c2.jpg')}}" alt="">
                    </div>	
                    <a href="#"><h4>Bread</h4></a>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-cat-item">
                    <div class="thumb">
                        <img style="border-radius:0 !important;" class="img-fluid" src="{{asset('frontend/v2/img/c3.jpg')}}" alt="">
                    </div>	
                    <a href="#"><h4>Burgers</h4></a>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-cat-item">
                    <div class="thumb">
                        <img style="border-radius:0 !important;" class="img-fluid" src="{{asset('frontend/v2/img/c4.jpg')}}" alt="">
                    </div>	
                    <a href="#"><h4>Chicken</h4></a>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be.
                    </p>
                </div>
            </div>																		
            <a class="primary-btn mx-auto mt-80" href="#">View Full Menu</a>
        </div>
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
            <div class="single-blog col-lg-4 col-md-4">
                <div class="thumb">
                    <img class="f-img img-fluid mx-auto" src="{{asset('v2/img/b1.jpg')}}" alt="">	
                </div>
                <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <img style="border-radius:none !important;" class="img-fluid" src="img/user.png" alt="">
                        <a href="#"><span>Mark Wiens</span></a>
                    </div>
                    <div class="meta">
                        13th Dec
                        <span class="lnr lnr-heart"></span> 15
                        <span class="lnr lnr-bubble"></span> 04
                    </div>
                </div>							
                <a href="#">
                    <h4>Stocking Your Restaurant
                    Kitchen Finding Reliable Sellers</h4>
                </a>
                <p>
                    Saving money – is something we would all like to do. Whether you are struggling to manage day to day or earning a six figure salary, saving is something we all think about.
                </p>
            </div>
            <div class="single-blog col-lg-4 col-md-4">
                <div class="thumb">
                    <img class="f-img img-fluid mx-auto" src="{{asset('v2/img/b2.jpg')}}" alt="">	
                </div>
                <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <img class="img-fluid" src="img/user.png" alt="">
                        <a href="#"><span>Mark Wiens</span></a>
                    </div>
                    <div class="meta">
                        13th Dec
                        <span class="lnr lnr-heart"></span> 15
                        <span class="lnr lnr-bubble"></span> 04
                    </div>
                </div>							
                <a href="#">
                    <h4>Cooking For Special Occasions
                    Cookware In The Brick And Mortr</h4>
                </a>
                <p>
                    Let’s talk about meat fondue recipes and what you need to know first. Meat fondue also known as oil fondue is a method of cooking all kinds of meats, poultry, and seafood in a pot of heated oil.
                </p>
            </div>
            <div class="single-blog col-lg-4 col-md-4">
                <div class="thumb">
                    <img class="f-img img-fluid mx-auto" src="{{asset('v2/img/b3.jpg')}}" alt="">	
                </div>
                <div class="bottom d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <img class="img-fluid" src="img/user.png" alt="">
                        <a href="#"><span>Mark Wiens</span></a>
                    </div>
                    <div class="meta">
                        13th Dec
                        <span class="lnr lnr-heart"></span> 15
                        <span class="lnr lnr-bubble"></span> 04
                    </div>
                </div>							
                <a href="#">
                    <h4>When Your Meal Bites Back Tips For
                    Avoiding Food Poisoning</h4>
                </a>
                <p>
                    While some people really seem to have a knack for barbequing – always grilling up a perfect meal – for the rest of us, it is something that must be learned, not something that just comes naturally. Believe it or not, there is technique involved.
                </p>
            </div>												
                                
                                    
        </div>
    </div>	
</section>
<!-- end blog Area -->
@stop