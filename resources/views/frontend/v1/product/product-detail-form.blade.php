<div class="wpb_wrapper">
    <div id="single-product" class="row">
        <!--product-img-->
        <div class="col-md-5 col-sm-5">
           <div id="quickview-carousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
                        @if(0 < count($product->color))
                        @for($i = 0; $i < count($product->color); $i++)
							<li data-target="#quickview-carousel" data-slide-to="{{$i}}" class="@if($i==0)active @endif"></li>
                        @endfor
                        @endif
						</ol>
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
                        {{-- @if($product->color) --}}
                            @if($product->hashtag != "")
                                <span class="product-label-special label"><span class="special">{{$product->hashtag}}</span></span>
                            @endif
                            @if(0 < count($product->color))
                            @for($i = 0; $i < count($product->color); $i++)
							<div class="item @if($i==0)active @endif">
								<img src="{{asset($product->color[$i]->image_path)}}" class="attachment-shop_single wp-post-image" alt="{{$product->name}}">		
							</div>
                            @endfor
                            @endif
						</div>
						<!-- Controls -->	
						<a class="left carousel-control" href="#quickview-carousel" data-slide="prev"></a>
						<a class="right carousel-control" href="#quickview-carousel" data-slide="next"></a>
					</div>
        </div><!--./product-img-->

        <!--product-detail-->
        <div class="col-md-7 col-sm-7">
            <div class="summary entry-summary">
                <h1 itemprop="name" class="heading_title product_title entry-title">{{$product->name}}</h1>
                <div class="woocommerce-product-rating">
                    <!--<div class="star-rating" title="Rated 3.50 out of 5">
                        <span style="width:70%"><strong itemprop="ratingValue" class="rating">3.50</strong> out of 5</span>
                    </div>-->
                </div>
                <div class="sku_wrapper">Mã Sản Phẩm: <span class="sku" itemprop="sku">{{$product->code}}</span>.</div>
                <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                    <table style="background-color:#f7f7f7;" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Số Lượng</th>
                                <th>Giá Bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="" style="border-top: 1px dotted #ccc;">
                                    <label for="size">1-{{$product->quantity_si - 1}}</label>
                                </td>
                                <td style="border-top: 1px dotted #ccc;">
                                    @if($product->is_discount == 1)
                                    <del><span class="amount">{{number_format($product->price_books)}} VNĐ</span></del>
                                    <ins><span class="amount">{{number_format($product->discount_price)}} VNĐ</span></ins>	
                                    @else
                                    <span class="value">{{number_format($product->price_books)}} VNĐ</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class=""  style="border-top: 1px dotted #ccc;">
                                    <label for="size">>{{$product->quantity_si}}</label>
                                </td>
                                <td  style="border-top: 1px dotted #ccc;">
                                    <span class="value">{{number_format($product->si_price)}} VNĐ</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- .summary -->
        </div>
        <div class="col-md-12 col-sm-12" style="border: 1px dotted #ccc; margin-top:10px; margin-bottom:10px;">
            <form class="variations_form" id="form-add-to-cart" method="post" enctype="multipart/form-data">
                <div class="col-md-8 col-sm-8">
                    <!-- TODO LINK TABLE -->
                    <div class="col-md-12 col-sm-12">
                        <ul class="product-color-list nav nav-tabs" style="display: flex;">
                            <li>
                                <div class="item"><strong class="prop prop-single tsf">Màu sắc</strong>
                                </div>
                            </li>
                            @foreach($product->color as $item)
                            @if($item->color != "")
                            <li class="unit-detail-spec-operator" style="padding-left: 10px;">
                                <div class="vertical-img item">
                                    <div class="box-img">
                                        <a rel="nofollow" hidefocus="true" class="image a-hover-preview" href="{{'#item-'.str_replace(' ', '_', $item->color)}}" 
                                            data-image-hover="{{asset($item->image_path)}}" data-toggle="tab" data-placement="top" >
                                            <img class="thumbnail" style="width: 40px;height: 40px;" src="{{asset($item->image_path)}}" 
                                            alt="{{$item->color}}">
                                        </a>
                                    </div>
                                </div>
                                <div class="cor"></div>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2 product-thumbnail">
                        <a href="" class="image-holder">
                            @if(0 < count($product->color))
                            <img src="{{asset($product->color[0]->image_path)}}" style="height:61px"/>
                            @endif
                        </a>
                    </div>
                    <div class="col-md-10 col-sm-10 tab-content clearfix">
                        @if(0 < count($product->color))
                        @php
                        $first = 0
                        @endphp
                        @for($i = 0; $i < count($product->color); $i++)
                        @if($product->color[$i]->color != "")
                        <div class="tab-pane @if($first==0)active @endif" style="margin-top: -20px;" id="{{'item-'.str_replace(' ', '_', $product->color[$i]->color)}}">
                            <table cellspacing="0" style="overflow-x:scroll; width:100%">
                                <thead>
                                    <tr>
                                        <th class="product-name">Sản Phẩm</th>
                                        <th class="product-name">Kích Cỡ</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity" style="text-align: center;">Số Lượng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($product->color[$i]->size) > 0)
                                        @foreach ($product->color[$i]->size as $size )
                                        <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                                        <input type="hidden" name="product_color" value="{{ $product->color[$i]->color }}"/>
                                        <input type="hidden" name="product_image" value="{{$product->color[$i]->image_path}}"/>			
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                <span>{{$product->name}}</span>
                                            </td>
                                            <td class="product-price">
                                                <span class="size">{{$size->size}}</span>
                                                <input type="hidden" name="product_size" value="{{$size->size}}"/>			
                                            </td>
                                            <td class="product-price">
                                                @if($product->is_discount == 1)
                                                    <span class="amount">{{number_format($size->discount_price)}}</span>		
                                                @else 
                                                    <span class="amount">{{number_format($size->base_price)}}</span>		
                                                @endif
                                                <input class="product-amount" type="hidden" value="{{$size->base_price}}"/>
                                                <input class="product-amount-si" type="hidden" value="{{$size->si_price}}"/>	
                                                <input class="product-si-qtty" type="hidden" value="{{$product->quantity_si}}"/>			
                                            </td>
                                            <!-- TODO: maximum-->
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added" style="width: 100px;">
                                                    <input type="text" name="quantity" class="quantity-product" min="0" value="0" max="{{$size->quantity}}">
                                                </div>
                                                <input type="hidden" class="hidden-qty" value="0">
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @php
                        $first = 1
                        @endphp
                        @endif
                        @endfor
                        @endif
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <label for="size">Tổng Số Lượng:</label>
                                </td>
                                <td>
                                    <label for="size" class="total-product-qty">0</label>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td>
                                    <label for="size">Tổng Tiền:</label>
                                </td>
                                <td>
                                    <label for="size" class="total-product-amount">0 VNĐ</label>
                                    <input type="hidden" name="total-product-amount" value ="0"/>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                    <div class="single_variation_wrap">
                        <div class="single_variation"></div>
                        <div class="variations_button product-extra">
                            <div class="cart">
                                <i class=" fa fa-shopping-cart"></i>
                                <input class="single_add_to_cart_button" type="submit" value="Thêm vào giỏ hàng" id="button-cart">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!--./product-detail-->
    </div>
</div>