@extends('frontend.v1.layouts.app')

@section('content')
<!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')                
                <span class="current">Danh Sách Đơn Hàng</span>
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
                            <table class="shop_table cart" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="product-name">Mã Đơn Hàng</th>
                                        <th class="product-price">Ngày Đặt Hàng</th>
                                        <th class="product-quantity">Tổng tiền</th>
                                        <th class="product-subtotal">Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            <a href="{{route('order-detail',$item->k_id)}}">{{$item->code}}</a>					
                                        </td>
                                        <td class="product-price">
                                            <span class="amount">{{$item->created_at}}</span>					
                                        </td>
                                        <td class="product-quantity">
                                           <span class="amount">{{number_format(($item->total + $item->ship_fee))}} VNĐ</span>		
                                        </td>
                                        <td class="product-subtotal">
                                        <span class="amount">{{$item->status_value}}</span>	
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <!-- .entry-content -->
            </article>
            <!-- #post -->
        </div>
    </div><!--./main-content-->
@endsection