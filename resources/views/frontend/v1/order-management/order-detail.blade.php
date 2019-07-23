@extends('frontend.v1.layouts.app')

@section('content')
<!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')                
                <span class="current">Đơn Hàng {{$order->code}}</span>
            </div>
        </div>
    </div><!--./breadcrumb-->

    <!--main-content-->
    <div class="row">
        <div id="wpo-content" class="wpo-content col-xs-12 no-sidebar">
            <article id="post-8" class="post-8 page type-page status-publish hentry">
                <div class="content">
                    <div class="woocommerce">
                        <form>
                            <div class="" style="overflow-x:auto;">
                                <table class="shop_table cart" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Sản Phẩm</th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-quantity">Size/Màu</th>
                                            <th class="product-subtotal">Tạm tính</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- include cart-form-->
                                        @foreach ($details as $item)
                                        <tr class="cart_item">
                                            <td class="product-thumbnail">
                                                <a href="{{route('detail',str_slug($item->product_name.' '.$item->product_id,'-'))}}">
                                                    <img src="{{asset($item->product->colorBy($item->color)->image_path)}}" class="attachment-shop_thumbnail wp-post-image" alt="{{$item->product_name}}">
                                                </a>					
                                            </td>
                                            <td class="product-name">
                                                <a href="{{route('detail',str_slug($item->product_name.' '.$item->product_id,'-'))}}">{{$item->product_name}}</a>	
                                            </td>
                                            <td class="product-quantity">
                                                <span class="amount">{{$item->quantity}}</span>	
                                            </td>
                                            <td class="product-quantity">
                                                <span class="amount">{{$item->size.'/'.$item->color}}</span>	
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">{{number_format($item->price)}} VNĐ</span>					
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                        <!-- end include form-->
                                    </tbody>
                                </table>
                            </div>
                            <div class="totals col-md-8">
                                <div class="totals-content">
                                    <table id="shopping-cart-totals-table">									
                                        <tbody>
                                            <tr>
                                                <td colspan="1">
                                                    <strong>Tạm Tính</strong>
                                                </td>
                                                <td>
                                                    <strong><span class="amount">{{number_format($order->total)}} VNĐ</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>													
                                        <tbody>
                                            <tr>
                                                <td colspan="1">
                                                    <strong>Phí vận chuyển</strong>
                                                </td>
                                                <td>
                                                    <strong><span class="amount">{{number_format($order->ship_fee)}} VNĐ</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td colspan="1">
                                                    <strong>Tổng cộng</strong>
                                                </td>
                                                <td>
                                                    <strong><span class="amount">{{number_format(($order->total + $order->ship_fee))}} VNĐ</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- .entry-content -->
            </article>
            <!-- #post -->
        </div>
    </div><!--./main-content-->
@endsection