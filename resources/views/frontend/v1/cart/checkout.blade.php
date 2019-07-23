@extends('frontend.v1.layouts.app')

@section('content')
<div class="row">
    <div id="wpo-content" class="wpo-content col-xs-12 no-sidebar">
        <article id="post-9" class="post-9 page type-page status-publish hentry">
            <h1 class="wpo-title">Thanh Toán</h1>
            <div class="content">
                <div class="woocommerce">
                    <!-- include user-info page-->
                    @if(Auth::guard('web')->check())  
                    @else
                        @include('frontend.v1.user.user-login-form')
                    @endif
                    <!-- end include-->
                    
                    <form name="checkout" method="post" class="checkout" action="{{route('order')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="woocommerce-billing-fields">
                                    <h3>Chi Tiết Hóa Đơn</h3>
                                    <!-- include user-info page-->
                                    @include('frontend.v1.user.user-info-form')
                                    <!-- end include-->
                                    {{-- <p class="form-row create-account">
                                        <input class="input-checkbox" id="createaccount" type="checkbox" name="createaccount" value="1"> <label for="createaccount" class="checkbox">Tạo Tài Khoản?</label>
                                    </p> --}}
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="woocommerce-shipping-fields">
                                    <h3 id="ship-to-different-address">
                                    
                                    </h3>
                                    <p class="form-row" id="order_comments_field">
                                        <label for="order_comments" class="">Ghi Chú</label>
                                        <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Nhập ghi chú tại đây" rows="2" cols="5"></textarea>
                                    </p>
                                    <p class="form-row" id="order_comments_field">
                                        <label for="order_comments" class="">Phương Thức Thanh Toán<abbr class="required" title="required">*</abbr></label>
                                        <input type="radio" name="payment_type" value="0" checked><span>&nbsp;Thanh toán trực tiếp khi nhận hàng</span><br/>
                                        <input type="radio" name="payment_type" value="1"><span>&nbsp;Chuyển khoản</span>
                                         <div style="display: block;">
                                         <span>Quý khách vui lòng chuyển khoản đến tài khoản ngân hàng bên dưới:</span><br>
                                         {!!$about['bank']!!}
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <h3 id="order_review_heading">Giỏ Hàng Của Bạn</h3>
                        <div class="" style="overflow-x:auto;">
                            <table class="shop_table cart table-responsive" cellspacing="0">
                                <!-- include cart-header-->
                                @include('frontend.v1.cart.cart-header-read')                                
                                <tbody>
                                    <!-- include cart-form-->
                                    @include('frontend.v1.cart.cart-form-read')
                                    <!-- end include form-->
                                </tbody>
                            </table>

                            <div class="totals col-md-8">
                                <div class="totals-content">
                                    <h3>Tổng Đơn Hàng</h3>
                                    <table id="shopping-cart-totals-table">									
                                        <tbody>
                                            <tr>
                                                <td colspan="1">
                                                    <strong>Tạm Tính</strong>
                                                </td>
                                                <td>
                                                    <strong><span class="amount">{{explode('.', Cart::subtotal())[0]}} VNĐ</span></strong>
                                                    <input type="hidden" name="subTotal" value="{{ Cart::subtotal()}}"/>
                                                </td>
                                            </tr>
                                        </tbody>													
                                        <tbody>
                                            <tr>
                                                <td colspan="1">
                                                    <strong>Phí Vận Chuyển</strong>
                                                </td>
                                                <td>
                                                    <strong><span class="amount ship_fee">0</span></strong>
                                                    <input type="hidden" name="ship_fee"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="1">
                                                    <strong>Tổng Cộng</strong>
                                                </td>
                                                <td>
                                                    <strong><span class="amount subTotal">{{ explode('.', Cart::subtotal())[0] }} VNĐ</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @if(Cart::count())
                            <div id="payment" class="col-xs-12">
                                <div class="form-row place-order pull-right">
                                    {{-- <a href="" class="cancel-button">Hủy</a> --}}
                                    <input type="submit" class="button alt" value="Đặt Hàng">
                                </div>
                                <div class="clear"></div>
                            </div>
                            @endif
                        </div>
                    </form>                              
                </div>
            </div>
            <!-- .entry-content -->
        </article>
        <!-- #post -->
    </div>
</div>
@endsection