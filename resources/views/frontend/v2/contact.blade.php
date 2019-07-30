@extends('frontend.v2.layouts.master')


@section('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Liên hệ chúng tôi
                </h1>	
                <p class="text-white link-nav"><a href="index.html">Trang chủ </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Liên hệ</a></p>
            </div>	
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- Start contact-page Area -->
<section class="contact-page-area section-gap menu-list-area">
    <div class="container">
        <div class="row">
            <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
            <div class="col-lg-4 d-flex flex-column address-wrap">
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-home"></span>
                    </div>
                    <div class="contact-details">
                        <h5>Ho Chi Minh City</h5>
                        <p>
                            Address:
                        </p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-phone-handset"></span>
                    </div>
                    <div class="contact-details">
                        <h5>+84 909 490 328</h5>
                        <p>Mon to Fri 9am to 6 pm</p>
                    </div>
                </div>
                <div class="single-contact-address d-flex flex-row">
                    <div class="icon">
                        <span class="lnr lnr-envelope"></span>
                    </div>
                    <div class="contact-details">
                        <h5>kkuomissu@gmail.com</h5>
                        <p>Liên hệ với chúng tôi qua email</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form class="form-area" id="myForm" action="{{route('store.contact')}}" method="post" class="contact-form text-right">
                    <div class="row">	
                        <div class="col-lg-6 form-group">
                            @csrf
                            <input name="name" placeholder="Tên" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tên'" class="common-input mb-20 form-control" required="" type="text">
                        
                            <input name="email" placeholder="Địa chỉ email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Địa chỉ email'" class="common-input mb-20 form-control" required="" type="email">

                            <input name="subject" placeholder="Tiêu đề" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tiêu đề'" class="common-input mb-20 form-control" required="" type="text">
                        </div>
                        <div class="col-lg-6 form-group">
                            <textarea class="common-textarea form-control" name="message" placeholder="Nội dung" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nội dung'" required=""></textarea>				
                        </div>
                        <div class="col-lg-12">
                            <div class="alert-msg" style="text-align: left;"></div>
                            <button class="genric-btn primary" style="float: right;"">Gửi</button>											
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>	
</section>
<!-- End contact-page Area -->
@stop