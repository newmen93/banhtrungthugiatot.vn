@extends('frontend.v1.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')                
                {{-- <span class="current">Index</span> --}}
            </div>
        </div>
    </div><!--./breadcrumb-->

    <!--main-content-->
    <div class="row">
        <!--right-content-->
        <section id="wpo-main-content" class="col-xs-12 col-sm-8 col-sm-push-4 col-md-9 col-md-push-3">
            <!--banner-slider-->
            {{-- <div class="wpb_wrapper box-element">
                <div class="wpb_revslider_element wpb_content_element">
                    <!-- START REVOLUTION SLIDER 4.6.0 fullwidth mode -->
                    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
                        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner">
                            <ul>
                                <!-- SLIDE  -->
                                <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                                    <!-- MAIN IMAGE -->
                                    <img src="images/14/07/slide-01.jpg"  alt="slide-01"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                    <!-- LAYERS -->
                                    <div class="tp-caption a_custom_style2 sfl tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="240"
                                        data-speed="300"
                                        data-start="1000"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">autumn collection 2013
                                    </div>
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption a_custom_style3 sfr tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="298"
                                        data-speed="300"
                                        data-start="1100"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis<br/> bibdum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed <br/>odio sit amet nibh vulputate cursus a sit amet mauris
                                    </div>
                                    <!-- LAYER NR. 5 -->
                                    <div class="tp-caption tp-button sfb tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="399"
                                        data-speed="300"
                                        data-start="1300"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">
                                        <a href="#">Shop Now</a>
                                    </div>
                                </li>
                                <!-- SLIDE  -->
                                <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                                    <!-- MAIN IMAGE -->
                                    <img src="images/14/07/slide-02.jpg"  alt="slide-01"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                    <!-- LAYERS -->
                                    <div class="tp-caption a_custom_style2 sfl tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="240"
                                        data-speed="300"
                                        data-start="1000"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">autumn collection 2013
                                    </div>
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption a_custom_style3 sfr tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="298"
                                        data-speed="300"
                                        data-start="1100"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis<br/> bibdum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed <br/>odio sit amet nibh vulputate cursus a sit amet mauris
                                    </div>
                                    <!-- LAYER NR. 5 -->
                                    <div class="tp-caption tp-button sfb tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="399"
                                        data-speed="300"
                                        data-start="1300"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">
                                        <a href="#">Shop Now</a>
                                    </div>
                                </li>
                                <!-- SLIDE  -->
                                <li data-transition="random" data-slotamount="7" data-masterspeed="300"  data-saveperformance="off" >
                                    <!-- MAIN IMAGE -->
                                    <img src="images/14/07/slide-03.jpg"  alt="slide-01"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                    <!-- LAYERS -->
                                    <div class="tp-caption a_custom_style2 sfl tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="240"
                                        data-speed="300"
                                        data-start="1000"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">autumn collection 2013
                                    </div>
                                    <!-- LAYER NR. 4 -->
                                    <div class="tp-caption a_custom_style3 sfr tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="298"
                                        data-speed="300"
                                        data-start="1100"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis<br/> bibdum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed <br/>odio sit amet nibh vulputate cursus a sit amet mauris
                                    </div>
                                    <!-- LAYER NR. 5 -->
                                    <div class="tp-caption tp-button sfb tp-resizeme"
                                        data-x="center" data-hoffset="0"
                                        data-y="399"
                                        data-speed="300"
                                        data-start="1300"
                                        data-easing="Power3.easeInOut"
                                        data-splitin="none"
                                        data-splitout="none"
                                        data-elementdelay="0.1"
                                        data-endelementdelay="0.1"
                                        data-endspeed="300">
                                        <a href="#">Shop Now</a>
                                    </div>
                                </li>
                            </ul>
                            <div class="tp-bannertimer tp-bottom"></div>
                        </div>
                    </div>
                    <!-- END REVOLUTION SLIDER -->
                </div>
            </div><!--./banner-slider--> --}}

            <!--product-->
            <div class="products">
                <div class="wpb_wrapper">
                    <div class="tabbable tab-top wpo_all_products woocommerce">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#best_selling" data-toggle="tab" data-title="BestSeller Products">Mới</a>
                            </li>
                            <li>
                                <a href="#featured_product" data-toggle="tab" data-title="Featured Products">Hot</a>
                            </li>
                            <li>
                                <a href="#on_sale" data-toggle="tab" data-title="Special Products">Giảm giá</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!--best_selling-->
                            <div class="tab-pane active" id="best_selling">
                                @if (count($newProducts) == 0)
                                    <p><strong>Không tìm thấy sản phẩm .</strong></p>
                                @else
                                    {{-- <p><strong>Tìm thấy {{ $product_count}} sản phẩm</strong></p> --}}
                                    <div class="box-content">
                                        <div class="box-products slide" id="productcarouse-6svj0">
                                            <div class="carousel-controls">
                                                {{ $newProducts->links() }}
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <div class="row">
                                                        @foreach($newProducts as $item)
                                                            <!-- Product Item -->
                                                            @include('frontend.v1.product.product-item-form')
                                                            <!-- End Product Item -->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div><!--./best_selling-->

                            <!--featured_product-->
                            <div class="tab-pane" id="featured_product">
                                @if (count($hotProducts) == 0)
                                    <p><strong>Không tìm thấy sản phẩm .</strong></p>
                                @else
                                    {{-- <p><strong>Tìm thấy {{ $product_count}} sản phẩm</strong></p> --}}
                                    <div class="box-content">
                                        <div class="box-products slide" id="productcarouse-6svj0">
                                            <div class="carousel-controls">
                                            {{ $hotProducts->links() }}
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <div class="row">
                                                        @foreach($hotProducts as $item)
                                                            <!-- Product Item -->
                                                            @include('frontend.v1.product.product-item-form')
                                                            <!-- End Product Item -->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div><!--./featured_product-->
                            <!--on_sale-->
                            <div class="tab-pane" id="on_sale">
                                @if (count($discountProducts) == 0)
                                    <p><strong>Không tìm thấy sản phẩm .</strong></p>
                                @else
                                    {{-- <p><strong>Tìm thấy {{ $product_count}} sản phẩm</strong></p> --}}
                                <div class="box-content">
                                    <div class="box-products slide" id="productcarouse-6svj0">
                                        <div class="carousel-controls">
                                            {{ $discountProducts->links() }}                                        
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <div class="row">
                                                    @foreach($discountProducts as $item)
                                                        <!-- Product Item -->
                                                        @include('frontend.v1.product.product-item-form')
                                                        <!-- End Product Item -->
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div><!--./on_sale-->
                        </div>
                    </div>
                </div>
            </div><!--./product-->
        </section><!--./right-content-->


        <!--left-sidebar-->
        @render(\App\ViewComponents\BestSellingComponent::class)
        <!--./left-sidebar-->

        {{-- <section class=" box-element">
            <div class="container">
                <div class="row">
                    <div class="vc_col-sm-12 latest-blog wpb_column vc_column_container">
                        <div class="wpb_wrapper">
                            <hr>
                            <div class="box">
                                <span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
                                <h3 class="box-heading visual-title separator_align_center ">
                                    <span>LATEST BLOG</span>
                                </h3>
                                <span class="vc_sep_holder vc_sep_holder_r"><span class="vc_sep_line"></span></span>
                            </div>
                            <div class="grid-post">
                                <div class="row">
                                    <div class="col-md-3 col-sm-6 col-xs-12 blog-col">
                                        <div class="blog-lastest pavblock left">
                                            <div class="group-blog">
                                                <div class="date">01 Apr 2014</div>
                                                <a href="#"><h3 class="blog-title">Place Text Generator</h3></a>
                                                <div class="box-content">
                                                    <div class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard ...</div>
                                                    <a class="readmore btn-arrow-right" href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 blog-col">
                                        <div class="blog-lastest pavblock left">
                                            <div class="group-blog">
                                                <div class="date">01 Apr 2014</div>
                                                <a href="#"><h3 class="blog-title">Place Text Generator</h3></a>
                                                <div class="box-content">
                                                    <div class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard ...</div>
                                                    <a class="readmore btn-arrow-right" href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 blog-col">
                                        <div class="blog-lastest pavblock left">
                                            <div class="group-blog">
                                                <div class="date">01 Apr 2014</div>
                                                <a href="#"><h3 class="blog-title">Place Text Generator</h3></a>
                                                <div class="box-content">
                                                    <div class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard ...</div>
                                                    <a class="readmore btn-arrow-right" href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12 blog-col">
                                        <div class="blog-lastest pavblock left">
                                            <div class="group-blog">
                                                <div class="date">01 Apr 2014</div>
                                                <a href="#"><h3 class="blog-title">Place Text Generator</h3></a>
                                                <div class="box-content">
                                                    <div class="summary">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard ...</div>
                                                    <a class="readmore btn-arrow-right" href="#">Read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </div><!--./main-content-->
@endsection
