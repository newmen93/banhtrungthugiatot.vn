<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	 <title>{{ config('kiot.name', 'Moonshop.local') }}</title>
    <meta name="keywords" content="Đặt hàng nhanh rẻ,dat hang nhanh re,nhanh rẻ,tiện lợi,nhanh re,đồ gia dụng,đồ handmade,phụ kiện nhà bếp,đồ linh tinh,phụ kiện trang trí" />
    <meta name="description" content="Shop online bán các mặt hàng nhỏ xinh, phụ kiện nhà bếp..." />
    <meta property="og:title" content="Dathangnhanhre.com - Đặt Hàng Nhanh Rẻ" />
    <meta property="og:description" content="Đặt hàng nhanh rẻ, shop online chuyên buôn bán phụ kiện nhà bếp, các mặt hàng nhỏ xinh, tiện lợi" />


    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/bootstrap.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/js_composer.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/revslider.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/settings.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/woocommerce3cae.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/woocommerce-layout.css') }}"/>
	<link rel='stylesheet' type="text/css" href="{{ asset('frontend/css/yith_magnifier.css') }}"/>
	<link rel='stylesheet' type="text/css" href="{{ asset('frontend/css/frontend.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/fancybox/jquery.fancybox.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/template.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/travel-style.css') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/kiot.css') }}"/>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.2.5/jquery.bootstrap-touchspin.css" />

	<!--Script-->
	<script type='text/javascript' src="{{ asset('frontend/js/jquery.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/jquery-migrate.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/jquery.themepunch.tools.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/jquery.themepunch.revolution.min.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/js_composer_front.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/fancybox/jquery.fancybox.js') }}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/fancybox/jquery.mousewheel-3.0.6.pack.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/popup.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/main.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/custom.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/cart.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/checkout.js') }}"></script>
	<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/4.2.5/jquery.bootstrap-touchspin.js"></script>
	<!-- lib for autosearch-->
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/bloodhound.js'></script>
	<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.2.1/typeahead.bundle.js"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/autoSearch/autoSearch.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/product-custom.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/autofill.js') }}"></script>
	<script type='text/javascript' src="{{ asset('frontend/js/address.js') }}"></script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="#" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body class="off-canvas-effect-1 single single-product postid-76 woocommerce woocommerce-page wpo-animate-scroll wpb-js-composer js-comp-ver-4.3.4 vc_responsive">
   	@render(\App\ViewComponents\MobileCategoryComponent::class)
	<div class="wpo-wrapper">
		<!--header-->
		<header id="header" class="header-style2">
		   	<section id="topbar">
		      	<div class="inner">
		         	<div class="container">
		            <div class="row">
		               	<div class="col-sm-4 col-xs-6 hidden-xs">
	                  		<div class="welcome pull-left">

                              @if(Auth::guard('web')->check())
                                  Chào {{Auth::guard('web')->user()->name }}, <a href="{{route('user.logout')}}">Đăng xuất</a>
                              @else
                                  <a href="{{route('user.login')}}">Đăng nhập</a> /
                                  <a href="{{route('user.register')}}">Đăng kí</a>
                              @endif
		                  	</div>
		               	</div>
		               	<div class="col-sm-8 col-xs-12">
		                  <div class="pull-right header-right">
		                     <div id="cart">
		                        <span class=" fa fa-shopping-cart pull-left"></span>
		                        <div class="media-body heading">
		                           <!--<a class="cart-link dropdown-toggle" data-toggle="dropdown" href="cart.html">-->
		                           <a class="cart-link dropdown-toggle" href="{{route('cart')}}">
		                           		<span class="cart-title hidden-xs">Giỏ Hàng</span>
										<span class="badge-kiot">
										@if (Cart::count() > 0)
											{{ Cart::count()}}
										@else
											0
										@endif
										</span>
		                           </a>
		                           {{-- <div class="content dropdown-menu">
		                              	<ul class="cart_list product_list_widget ">
		                                 	<li class="empty">No products in the cart.</li>
		                              	</ul>
		                              <!-- end product list -->
		                           </div> --}}
		                        </div>
		                     </div>
                          </div>
                      	<!-- search menu desktop-->
	                  	<div class="hidden-sm hidden-xs search-form col-sm-6 pull-right">
	                     	<div class="wpo_search">
										<form role="search" method="get" action="{{route('search')}}" autocomplete="off">
											<input type="text" style="width:100%" name="kiot-search" id="kiot-search" placeholder="Tìm Kiếm..." />
											<span class="button-search">
												<input type="submit" value="&nbsp;">
											</span>
		                        </form>
	                     	</div>
	                  	</div>
		               </div>
		            </div>
		         </div>
		      </div>
		   	</section>

		   	<!--menu-desktop-->
		   	<section id="wpo-mainnav">
		      <div class="inner">
		         <div class="container">
		            <div class="logo pull-left">
		               <a href="{{route('home')}}">
		               	<img src="{{ asset('frontend/images/logo/logo.png') }}" width="144" height="110" alt="{{config('kiot.name')}}">
		               </a>
		            </div>
		            @render(\App\ViewComponents\DesktopCategoryComponent::class)
		         </div>
		      </div>
		   	</section>
		   	<div class="container">
		   		<div class="notification col-md-12">
		   			@include('frontend.v1.layouts.flash-message')
				</div>
		   	</div>

		</header>

		<section id="wpo-mainbody" class="container wpo-mainbody">
			@yield('content')
			@include('frontend.v1.product.product-popup')
		</section>
		<!--footer-->
		@render(\App\ViewComponents\AboutComponent::class)
	</div>
    <!--Facebook chat customer -->
    <div id="fb-root"></div>
    <script defer>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div class="fb-customerchat"
        minimized="true"
        attribution=setup_tool
        page_id="1262612697231420"
        theme_color="#67b868">
    </div>
    <!--End facebook chat customer -->
</body>
</html>
