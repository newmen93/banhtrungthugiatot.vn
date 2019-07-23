<!--mobile menu-->
<!-- OFF-CANVAS MENU SIDEBAR -->
<div id="wpo-off-canvas" class="wpo-off-canvas off-canvas-effect-1 off-canvas-left off-canvas-current hidden-md hidden-lg" style="height: 100%; top: 0px; visibility: visible;">
    <div class="wpo-off-canvas-body">
        <div class="wpo-off-canvas-header">
            <button type="button" class="close btn btn-close" id="close-mobile">
            <i class="fa fa-times"></i>
            </button>
        </div>
        <nav class="navbar navbar-offcanvas navbar-static">
            <div class="navbar-collapse">
                <ul id="main-menu-offcanvas" class="wpo-menu-top nav navbar-nav">
                    <li class="active">
                        <a href="{{route('home')}}">Trang Chủ</a>
                    </li>
                    <li class="has-sub">
                        <a href="{{route('category')}}">Danh Mục Sản Phẩm</a>
                        @if(count($categories) > 0)
                            <div class="down-button"><i class="fa fa-caret-down"></i></div>
                            <ul class="sub-menu">
                                @foreach ($categories as $category)
                                    <li class="level-1">
                                        <a href="{{route('child-category',str_slug($category->name.' '.$category->k_id,'-'))}}">
                                            {{$category->name}}
                                        </a>
                                        @if(count($category->children) > 0)
                                            <div class="down-button"><i class="fa fa-caret-down"></i></div>
                                            <ul class="sub-menu">
                                            @foreach ( $category->children as $cateChild)
                                                    <li class="level-1">
                                                    <a href="{{route('child-category',str_slug($category->name.' '.$category->k_id,'-'))}}">
                                                        {{$cateChild->name}}
                                                    </a>
                                                </li>
                                            @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <li>
                        <a href="{{route('category-discount')}}">Giảm Giá</a>
                    </li>
                    <li>
                        <a href="{{route('category-new')}}">Mới Về</a>
                    </li>
                    @if(Auth::guard('web')->user())
                    <li>
                        <a href="{{route('order-list',Auth::guard('web')->user()->customer->k_id)}}" class="dropdown-toggle" >Quản Lý Đơn Hàng</a>
                    </li>
                    @endif
                    <li>
                        @if(Auth::guard('web')->check())
                            <p>Chào {{Auth::guard('web')->user()->name}}, <a href="#">Đăng xuất</a></p>
                        @else
                            <p><a href="#">Đăng nhập</a></p>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- //OFF-CANVAS MENU SIDEBAR -->
