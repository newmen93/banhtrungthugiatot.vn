@extends('frontend.v1.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')
                <span class="current">Giỏ Hàng</span>
            </div>
        </div>
    </div><!--./breadcrumb-->

    <!--main-content-->
    <div class="row">
        <div id="wpo-content" class="wpo-content col-xs-12 no-sidebar">
            <article id="post-8" class="post-8 page type-page status-publish hentry">
                <div class="content">
                    <div class="woocommerce">
                        <form method="post">
                            <div class="" style="overflow-x:auto;">
                                <table class="shop_table cart" cellspacing="0" style="overflow-x:scroll; width:100%">
                                    <!-- include cart-header-->
                                    @include('frontend.v1.cart.cart-header')                                
                                    <tbody class="cart-body-render">
                                        <!-- include cart-form-->
                                        @include('frontend.v1.cart.cart-form')
                                        <!-- end include form-->
                                    </tbody>
                                </table>
                                @if(Cart::count())
                                    <div colspan="8" class="actions btn-order" style="float:right; margin-bottom: 20px;">
                                        <a href="{{route('checkout')}}" rel="nofollow" class="btn-cart button product_type_simple">Thanh Toán</a>
                                    </div>
                                @endif
                            </div>
                        </form>
                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <div class="box-heading"><span>Tổng Cộng: </span> <span class="subTotal">{{ explode('.', Cart::subtotal())[0]}} VND</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .entry-content -->
            </article>
            <!-- #post -->
        </div>
    </div><!--./main-content-->
@endsection