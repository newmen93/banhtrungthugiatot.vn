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

<section class="blog-area section-gap" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 pb-30 header-text">
                <h1>Latest posts from our Blog</h1>
                <p>
                    Do you want to share your love of cheese fondue with your children? Or did you just find out that one of your fondue party guests doesn’t drink alcohol.
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

@push('footer')
@endpush