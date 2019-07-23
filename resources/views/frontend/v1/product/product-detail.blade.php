@extends('frontend.v1.layouts.app')

@section('content')
<!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')                
                <a href="{{route('category')}}">Danh Sách Sản Phẩm</a> <span class="delimiter">/</span>
                <span class="current">{{$product->name}}</span>
            </div>
        </div>
    </div><!--./breadcrumb-->

    <!--main-content-->
    <div class="row">
        <!--right-content-->
        <section id="single-product" class="col-xs-12 col-sm-8 col-sm-push-4 col-md-9 col-md-push-3 product-info">
            <!--product-->
            <div class="products">
                <!-- import form detail -->
               @include('frontend.v1.product.product-detail-form')
                <!--review-tab-->
                <div class="woocommerce-tabs box-element">
                    <ul class="nav nav-tabs">
                        <li class="description_tab active">
                            <a data-toggle="tab" href="#tab-description">Mô Tả</a>
                        </li>
                        {{-- <li class="specification_tab">
                            <a data-toggle="tab" href="#tab-specification">Thông Số</a>
                        </li> --}}
                        {{-- <li class="reviews_tab">
                            <a data-toggle="tab" href="#tab-reviews">Reviews (2)</a>
                        </li> --}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-description">
                            <h2>Mô Tả Sản Phẩm</h2>
                            @if (null != $product->description)
                                {!! $product->description !!}
                            @else
                                <P>Chưa có mô tả về sản phẩm</P>
                            @endif
                        </div>
                        {{-- <div class="tab-pane" id="tab-specification">
                            <h2>Thông Số Sản Phẩm</h2>
                            <p class=""><strong>CODE</strong>: <span>95Z*60001</span></p>
                            <p class=""><strong>DIMENSIONS</strong>: <span>37 x 60 x 28 cm</span></p>
                            <p class=""><strong>VOLUME</strong>: <span>47L</span></p>
                            @if($product->weight != null)
                                <p class=""><strong>WEIGHT</strong>: <span>{{$product->weight}} KG</span></p>
                            @endif
                            <p class=""><strong>WARRANTY</strong>: <span>3 years</span></p>
                        </div> --}}
                    </div>
                </div><!--./review-tab-->


                <!--suggest-->
                <div class="woocommrece products box-element">
                    <div class="box-heading"><span>Bạn Cũng Có Thể Thích…</span></div>
                    <div class="box-content">
                        @if (count($hotProducts) == 0)
                            <p><strong>Không tìm thấy sản phẩm .</strong></p>
                        @else
                        <div class="box-products slide" id="productcarouse-0Rkjl">
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
                        @endif

                        @if (count($relatedProducts) == 0)  
                            <p><strong>Không có sản phẩm liên quan.</strong></p>
                        @else
                            <div class="woocommrece related products">
                                <div class="box-heading"><span>Sản Phẩm Liên Quan</span></div>
                                <div class="box-content">
                                    <div class="box-products slide" id="productcarouse-j6QTZ">
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <div class="row">
                                                   @foreach($relatedProducts as $item)
                                                        <!-- Product Item -->
                                                        @include('frontend.v1.product.product-item-form')
                                                        <!-- End Product Item -->
                                                    @endforeach 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- <meta itemprop="url" content="http://venusdemo.com/wpopal/fashion/product/woo-ninja-3/"> --}}
                    </div>
                    <!-- #product-76 -->
                </div><!--./suggest-->
            </div><!--./product-->
        </section><!--./right-content-->

        <!--left-sidebar-->
        @render(\App\ViewComponents\BestSellingComponent::class)
        <!--./left-sidebar-->
    </div><!--./main-content-->
@endsection
