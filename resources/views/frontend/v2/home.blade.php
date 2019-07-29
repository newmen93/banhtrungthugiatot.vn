@extends('frontend.v2.layouts.master')

@section('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Bài viết mới nhất
                </h1>	
                <p class="text-white link-nav"><a href="{{route('home')}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('home')}}"> Bài viết</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- Start review Area -->
<section class="review-area section-gap relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-9 pb-40 header-text text-center">
                <h1 class="pb-10 text-white">Enjoy our Client’s Review</h1>
                <p>
                    Who are in extremely love with eco friendly system.
                </p>
            </div>
        </div>					
        <div class="row">
            <div class="active-review-carusel">
                <div class="single-review item">
                    <img src=""{{asset('v2/img/r1.png')}}"" alt="">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Fannie Rowe</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <img src=""{{asset('v2/img/r1.png')}}"" alt="">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Hulda Sutton</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <img src=""{{asset('v2/img/r1.png')}}"" alt="">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Fannie Rowe</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <img src=""{{asset('v2/img/r1.png')}}"" alt="">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Hulda Sutton</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>	
                <div class="single-review item">
                    <img src=""{{asset('v2/img/r1.png')}}"" alt="">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Fannie Rowe</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <img src=""{{asset('v2/img/r1.png')}}"" alt="">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Hulda Sutton</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <img src="" alt=""{{asset('v2/img/r1.png')}}"">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Fannie Rowe</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>
                <div class="single-review item">
                    <img src="{{asset('v2/img/r1.png')}}" alt="">
                    <div class="title justify-content-start d-flex">
                        <a href="#"><h4>Hulda Sutton</h4></a>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <p>
                        Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                    </p>
                </div>																												
            </div>
        </div>
    </div>	
</section>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen d-flex justify-content-center align-items-center">
            <div class="banner-content col-lg-10 col-md-12 justify-content-center">
                <h6 class="text-uppercase">Whenever we bake, bake with our heart</h6>
                <h1>
                    Love with baking items			
                </h1>
                <p class="text-white mx-auto">
                    Since Americans in the South began roasting pigs publicly, Barbecues have been a staple of North American living. For many, grilling becomes a routine mealtime activity.
                </p>
                <a href="#" class="primary-btn squire text-uppercase mt-10">Check Our Menu</a>
            </div>											
        </div>
    </div>
</section>
<!-- End banner Area -->



<!-- Start item-category Area -->
<section class="item-category-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 pb-80 header-text text-center">
                <h1 class="pb-10">Category of available items</h1>
                <p>
                    They are grilling celebrities in their own right.
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