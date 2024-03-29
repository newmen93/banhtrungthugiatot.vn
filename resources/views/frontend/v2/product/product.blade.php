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
                    Bảng báo giá
                </h1>	
                <p class="text-white link-nav"><a href="{{route('home')}}">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="{{route('home')}}"> Báo giá</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->
<!-- Start menu-list Area -->
<section class="menu-list-area section-gap">
    <div class="container">
        <div class="row">
            <div class="menu-cat mx-auto">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pizza-tab" data-toggle="pill" href="#pizza" role="tab" aria-controls="pizza" aria-selected="true">Pizza</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-bread-tab" data-toggle="pill" href="#pills-bread" role="tab" aria-controls="pills-bread" aria-selected="false">Breads</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-burger-tab" data-toggle="pill" href="#pills-burger" role="tab" aria-controls="pills-burger" aria-selected="false">Burgers</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-chicken-tab" data-toggle="pill" href="#pills-chicken" role="tab" aria-controls="pills-chicken" aria-selected="false">Chicken</a>
                  </li>						  
                </ul>							
            </div>

        </div>
        <div id="pills-tabContent" class="tab-content absolute">
            <div class="tab-pane fade show active" id="pizza" role="tabpanel" aria-labelledby="pizza-tab">
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Americano</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Tunisia</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Beef lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Chicken lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Meatball Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Bakery special Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Alfredo</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Cheese lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>																					
            </div>
             <div class="tab-pane fade" id="pills-bread" role="tabpanel" aria-labelledby="pills-bread-tab">
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Americano</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Tunisia</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Beef lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Chicken lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Meatball Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Bakery special Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Alfredo</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Cheese lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
             </div>
              <div class="tab-pane fade" id="pills-burger" role="tabpanel" aria-labelledby="pills-burger-tab">
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Americano</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Tunisia</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Beef lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Chicken lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Meatball Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Bakery special Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Alfredo</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Cheese lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>			
              </div>
              <div class="tab-pane fade" id="pills-chicken" role="tabpanel" aria-labelledby="pills-chicken-tab">
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Americano</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Tunisia</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Beef lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Chicken lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Meatball Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Bakery special Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Pizza Alfredo</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>	
                <div class="single-menu-list row justify-content-between align-items-center">
                    <div class="col-lg-9">
                        <a href="#"><h4>Cheese lovers Pizza</h4></a>
                        <p>
                            Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.
                        </p>
                    </div>
                    <div class="col-lg-3 flex-row d-flex price-size">
                        <div class="s-price col">
                            <h4>6”</h4>
                            <span>$15</span>
                        </div>
                        <div class="s-price col">
                            <h4>10”</h4>
                            <span>$20</span>
                        </div>
                        <div class="s-price col">
                            <h4>14”</h4>
                            <span>$25</span>
                        </div>																		
                    </div>
                </div>			
              </div>	
        </div>
    </div>	
</section>
<!-- End menu-list Area -->						

<!-- Start about-video Area -->
<section class="about-video-area section-gap">
    <div class="container">			
        <div class="row align-items-center">
            <div class="col-lg-6 about-video-left">
                <h6 class="text-uppercase">Brand new app to blow your mind</h6>
                <h1>
                    We’ve made a life <br>
                    that will change you 
                </h1>
                <p>
                    <span>We are here to listen from you deliver exellence</span>
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed doeiusmo d tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <a class="primary-btn" href="#">Get Started Now</a>
            </div>
            <div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex">
                <a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img class="img-fluid mx-auto" src="img/play.png" alt=""></a>
            </div>
        </div>
    </div>	
</section>
<!-- End about-video Area -->
@stop

@push('footer')
@endpush