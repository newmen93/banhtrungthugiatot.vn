 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 shopcol">
    <div class="product-block product product-grid">
        <div class="product-inner">
            <div class="image thumbnail">
                <a href="{{route('detail',str_slug($item->name.' '.$item->id,'-'))}}">
                    @if($item->hashtag != "")
                        <span class="product-label-special label"><span class="special">{{$item->hashtag}}</span></span>
                    @endif
                    @if(2 <= count($item->color) and null != $item->color[0] and null != $item->color[1])
                        <img src="{{asset($item->color[0]->image_path)}}" class="image-effect wp-post-image" alt="{{ $item->name }}">
                        <img src="{{asset($item->color[1]->image_path)}}" class="attachment-shop_catalog image-hover" alt="{{ $item->name }}">
                    @else
                        <img src="{{asset('frontend/images/no-image.png')}}" class="attachment-shop_catalog image-hover" alt="{{ $item->name }}">
                        <img src="{{asset('frontend/images/no-image.png')}}" class="image-effect wp-post-image" alt="{{ $item->name }}">
                    @endif
                </a>
                {{-- <div class="product-action">
                    <div class="add-to-cart">
                        <a href="" rel="nofollow" class="btn-cart button add_to_cart_button product_type_simple">
                            <input type="hidden" name="product_id" value="{{ $item->id }}"/>
                            <input type="hidden" name="qty" value="1">
                            <!-- TODO:-->
                            <input type="hidden" name="color" value="">
                            <input type="hidden" name="size" value="">
                            <i class="fa-fw fa fa-shopping-cart"></i>Add to cart
                        </a>
                    </div>
                    <div class="wishlist-compare">
                        <a href="wishlist.html" class="wishlist" title="Add to Wish List">
                            <i class="fa-fw fa fa-heart"></i> Add to Wish List
                        </a>
                    </div>
                </div> --}}
            </div>
            <div class="product-meta">
                <div class="warp-info">
                    <span class="price">
                        @if($item->is_discount == 1)
                        <del><span class="amount">{{number_format($item->price_books)}} VNĐ</span></del>
                        <ins><span class="amount">{{number_format($item->discount_price)}} VNĐ</span></ins>
                        @else
                        <span class="price"><span class="amount">{{number_format($item->price_books)}} VNĐ</span></span>
                        @endif
                    </span>
                    <h3 class="name">
                        <a href="{{route('detail',str_slug($item->name.' '.$item->id,'-'))}}">{{$item->name}}</a>
                    </h3>
                    <!--quickview-->
                    <a href="" class="wpo-colorbox cboxElement quickview hidden-xs" data-toggle="modal" data-book-id="{{$item->id}}">
                        <span class="fa fa-plus"></span>
                        <span>Xem Nhanh</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>