<!DOCTYPE html>
<html lang="vi-VN" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('frontend/v2/img/fav.png')}}">
        <!-- Author Meta -->
        <meta name="author" content="Banhtrungthu2019">
        <!-- Meta Description -->
        <meta name="description" content="Bánh trung thu 2019">
        <!-- Meta Keyword -->
        <meta name="keywords" content="bánh trung thu 2019, 2019, banhtrungthu, bánh trung thu">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--open graph ogp.me-->
        <meta property="og:site_name" content="Banhtrungthugiatot.vn" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="vi_VN" />
        <meta property="fb:pages" content="" />

        <title>Bánh trung thu 2019</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <!-- CSS ============================================= -->
        <link rel="stylesheet" href="{{asset('frontend/v2/css/linearicons.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/v2/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/v2/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/v2/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/v2/css/nice-select.css')}}">							
        <link rel="stylesheet" href="{{asset('frontend/v2/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/v2/css/jquery-ui.css')}}">			
        <link rel="stylesheet" href="{{asset('frontend/v2/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/v2/css/main.css')}}">
        @stack('header')
    </head>
    <body>
        <header id="header" id="home">
                <div class="header-top">
                    <div class="container">
                        <div class="row align-items-center">
                              <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                              <div class="menu-social-icons">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                              </div>
                              <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                                <a class="btns" href="tel:+84 909 490 328">+84 909 490 328</a>
                                  <a class="btns" href="mailto:kkuomissu@gmail.com">kkuomissu@gmail.com</a>		
                                  <a class="icons" href="tel:+84 909 490 328">
                                      <span class="lnr lnr-phone-handset"></span>
                                  </a>
                                  <a class="icons" href="mailto:support@colorlib.com">
                                      <span class="lnr lnr-envelope"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container main-menu">
                    <div class="row align-items-center justify-content-between d-flex">
                        <a href="{{route('home')}}"><img src="{{asset('frontend/v2/img/logo.png')}}" alt="" title="" /></a>		
                        <nav id="nav-menu-container">
                            <ul class="nav-menu">
                              <li class="menu-active"><a href="{{route('home')}}">Trang chủ</a></li>
                              <li><a href="{{route('about')}}">Giới thiệu</a></li>
                              <li><a href="{{route('price')}}">Báo giá</a></li>
                              <li><a href="{{route('product')}}">Sản phẩm</a></li>
                              <li><a href="{{route('post')}}">Tin tức</a></li>
                              <li><a href="{{route('contact')}}">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
              </header>

            @yield('content')

            <!-- start footer Area -->
            <footer class="footer-area section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>Giới thiệu</h6>
                                <p>
                                    Bánh trung thu 2019, banhtrungthu2019.vn
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-5  col-md-6 col-sm-6">
                            <div class="single-footer-widget">
                                <h6>Nhận tin mới</h6>
                                <p>Các bài viết mới nhất</p>
                                <div class="" id="mc_embed_signup">
                                    <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                                        <input class="form-control" name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ email'" required="" type="email">
                                            <button class="click-btn"><i class="lnr lnr-arrow-right" aria-hidden="true"></i></button>
                                            <div style="position: absolute; left: -5000px;">
                                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                                            </div>
                                        <div class="info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>						
                        <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                            <div class="single-footer-widget">
                                <h6>Theo dõi trên</h6>
                                <p>Mạng xã hội</p>
                                <div class="footer-social d-flex align-items-center">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>	
                        <div class="col-lg-12">
                            <p class="footer-text">
Copyright &copy;{{date("Y")}} banhtrungthugiatot.vn <br> Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://dkteam.tk" target="_blank">DKTEAM</a></p>
                        </div>
                    </div>
                </div>
            </footer>	
            <!-- End footer Area -->
            <script src="{{asset('frontend/v2/js/vendor/jquery-2.2.4.min.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="{{asset('frontend/v2/js/vendor/bootstrap.min.js')}}"></script>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
            <script src="{{asset('frontend/v2/js/easing.min.js')}}"></script>
            <script src="{{asset('frontend/v2/js/hoverIntent.js')}}"></script>
            <script src="{{asset('frontend/v2/js/superfish.min.js')}}"></script>
            <script src="{{asset('frontend/v2/js/jquery.ajaxchimp.min.js')}}"></script>
            <script src="{{asset('frontend/v2/js/jquery.magnific-popup.min.js')}}"></script>
            <script src="{{asset('frontend/v2/js/jquery-ui.js')}}"></script>
            <script src="{{asset('frontend/v2/js/owl.carousel.min.js')}}"></script>
            <script src="{{asset('frontend/v2/js/jquery.nice-select.min.js')}}"></script>
            <script src="{{asset('frontend/v2/js/mail-script.js')}}"></script>
            <script src="{{asset('frontend/v2/js/main.js')}}"></script>
            @stack('footer')
    </body>
</html>