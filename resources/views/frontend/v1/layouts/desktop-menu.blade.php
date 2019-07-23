<div class="mainnav-wrap">
    <div class="navbar navbar-inverse">
        <nav class="wpo-megamenu">
            <div class="navbar-header pull-left visible-xs visible-sm">
                <div class="mobile-menu-toggle" id="mobile-menu-toggle">
                    <i></i>
                    <i></i>
                    <i></i>
                </div>
            </div>
            <!-- //END #navbar-header -->
            <div class="visible-xs visible-sm search-mobile">
                <div class="wpo_search pull-right">
                    <form role="search" method="get" action="{{route('search')}}" autocomplete="off">
                        <input type="text" name="kiot-search" id="kiot-search-mb" placeholder="Tìm Kiếm..." />
                        <span class="button-search">
                            <input type="submit" value="&nbsp;">
                        </span>
                    </form>
                </div>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="main-menu" class="nav navbar-nav megamenu">
                    <li class="active menu-item-370 dropdown parent mega depth-0 aligned-left" data-id="370"    data-alignsub="left" data-level="1">
                        <a href="{{route('home')}}" >Trang Chủ </a>
                    </li>
                    <li class="menu-item-1619 dropdown parent mega depth-0 aligned-fullwidth" data-id="1619" data-alignsub="fullwidth" data-level="1">
                        <a href="{{route('category')}}" class="dropdown-toggle" >Danh Mục Sản Phẩm <b class="caret"></b></a>
                        @if(count($categories) > 0)
                            <div class="dropdown-menu mega-dropdown-menu"  style="width:1170px" >
                                <div class="dropdown-menu-inner">
                                    <div class="row">
                                    @foreach ($categories as $category)
                                        <div class="mega-col col-md-2 " >
                                            <div class="mega-col-inner">
                                                <div id="wid-26" class="wpo-widget">
                                                <a href="{{route('child-category',str_slug($category->name.' '.$category->k_id,'-'))}}">
                                                    <h3 class="widget-title">
                                                        {{$category->name}}
                                                    </h3>
                                                </a>
                                                <div class="menu-category-container">
                                                    @if(count($category->children) > 0)
                                                        <ul id="menu-category" class="megamenu-items">
                                                            @foreach ( $category->children as $cateChild)
                                                                <li id="menu-item-1668" class="menu-item-1668" data-id="1668" data-alignsub="left" data-level="2">
                                                                <a href="{{route('child-category',str_slug($category->name.' '.$category->k_id,'-'))}}">
                                                                    {{$cateChild->name}}
                                                                </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </li>
                    <li class="menu-item-377 dropdown parent mega depth-0 aligned-left" data-id="377" data-alignsub="left" data-level="1">
                        <a href="{{route('category-discount')}}" class="dropdown-toggle" >Giảm Giá</a>
                    </li>
                    <li class="menu-item-378 dropdown parent mega depth-0 aligned-left" data-id="378" data-alignsub="left" data-level="1">
                        <a href="{{route('category-new')}}" class="dropdown-toggle" >Mới Về</a>
                    </li>
                    @if(Auth::guard('web')->user())
                    <li class="menu-item-378 dropdown parent mega depth-0 aligned-left" data-id="378" data-alignsub="left" data-level="1">
                        <a href="{{route('order-list',Auth::guard('web')->user()->customer->k_id)}}" class="dropdown-toggle" >Quản Lý Đơn Hàng</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
