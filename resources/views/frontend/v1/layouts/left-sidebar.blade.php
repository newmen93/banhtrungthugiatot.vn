<!--left sidebar -->
<div class="wpo-sidebar wpo-sidebar-1 col-xs-12 col-sm-4 col-sm-pull-8 col-md-3 col-md-pull-9">
    <div class="sidebar-inner">
        <aside id="woocommerce_product_categories-3" class="woocommerce widget_product_categories sidebar-element">
            <div class="wpb_wrapper">
                <aside class="wpo-verticalmenu hidden-sm hidden-xs">
                    <div class="box-heading"><span>Danh Mục Sản Phẩm</span></div>
                    <div class="navbar-collapse vertical-menu">
                        <ul class="nav navbar-nav">
                            @if(count($categories) > 0)
                            @foreach ($categories as $category)
                                <!--Level 1-->
                                <li class="">
                                    <a href="{{route('child-category',str_slug($category->name.' '.$category->k_id,'-'))}}">
                                        <span class="menu-title">{{$category->name}}</span>
                                    </a>
                                    @if(count($category->children) > 0)
                                        <div class="caret-button">
                                            <i class="fa fa-chevron-down"></i>
                                        </div>
                                        <!--level 2-->
                                        <div class="dropdown-menu-cate">
                                            <ul class="">
                                            @foreach ( $category->children as $cateChild)
                                                <li class="submenu-active">
                                                    <a href="{{route('child-category',str_slug($cateChild->name. ' '.$cateChild->k_id,'-'))}}">
                                                        <i class="fa fa-angle-double-right"></i>
                                                        <span class="menu-title">{{$cateChild->name}}</span>
                                                    </a>
                                                    <!--level 3-->
                                                    @if(count($cateChild->children)>0)
                                                    <div class="sub-menu-3">
                                                        <ul class="">
                                                            @foreach($cateChild->children as $child)
                                                            <li>
                                                                <a href="product-cate.html">
                                                                    <span class="menu-title">{{$child->name}}</span>
                                                                </a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </li>
                                            @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </aside>
            </div>
        </aside>

        <aside id="woocommerce_top_rated_products-2" class="widget clearfix woocommerce widget_top_rated_products sidebar-element">
            <div class="woocommerce">
                <div class="box-heading">
                    <span>Bán Chạy Nhất</span>
                </div>
                <div class="product_list_widget">
                    @if (count($bestSelling) == 0)
                        {{-- <p><strong>Không tìm thấy sản phẩm .</strong></p> --}}
                    @else
                        @foreach ($bestSelling as $item)
                            <div class="item-product-widget clearfix">
                                <div class="images pull-left">
                                    <a href="{{route('detail',str_slug($item->name.' '.$item->id,'-'))}}">
                                        @if(0 < count($item->color) and null != $item->color[0])
                                            <img src="{{$item->color[0]->image_path}}" class="attachment-shop_thumbnail wp-post-image" alt="{{$item->name}}">
                                        @else
                                            <img src="{{asset('frontend/images/no-image.png')}}" class="attachment-shop_thumbnail wp-post-image" alt="{{ $item->name }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="product-meta">
                                    <div class="title">
                                        <a href="{{route('detail',str_slug($item->name.' '.$item->id,'-'))}}" title="Simple product">{{$item->name}}</a>
                                    </div>
                                    <span class="price"><span class="amount">{{number_format($item->price_books)}} VNĐ</span></span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </aside>
    </div>
</div>
