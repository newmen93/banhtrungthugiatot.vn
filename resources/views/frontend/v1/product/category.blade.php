@extends('frontend.v1.layouts.app')

@section('content')
    <!--breadcrumb-->
    <div id="breadcrumbs">
        <div class="container">
            <div class="breadcrumb" id="breadcrumb">
                @include('frontend.v1.layouts.home-link')                
                <span class="current">Danh Mục</span>
            </div>
        </div>
    </div><!--./breadcrumb-->

    <!--main-content-->
    <div class="row">
        <!--right-content-->
        <section id="wpo-main-content" class="col-xs-12 col-sm-8 col-sm-push-4 col-md-9 col-md-push-3">
            <!--filter-->
            {{-- <div id="wpo-filter" class="product-filter clearfix wrapper">
                <div class="display">
                    <span class="pull-left">View</span>
                    <a class="list" href="cate-list.html">
                        <span class="text-hide">List</span>
                    </a>
                    <a class="grid active" href="cate.html">
                        <span class="text-hide">Grid</span>
                    </a>
                </div>
                <form class="woocommerce-ordering" method="get">
                    <select name="orderby" class="orderby">
                        <option value="menu_order" selected="selected">Default sorting</option>
                        <option value="popularity">Sort by popularity</option>
                        <option value="rating">Sort by average rating</option>
                        <option value="date">Sort by newness</option>
                        <option value="price">Sort by price: low to high</option>
                        <option value="price-desc">Sort by price: high to low</option>
                    </select>
                </form>
            </div><!--./filter--> --}}

            <!--product-->
            <div class="products">
                <div class="wpb_wrapper">
                    @if (count($products) == 0)
                        <p><strong>Không tìm thấy sản phẩm .</strong></p>
                    @else
                        <div class="row">
                            @foreach($products as $item)
                                <!-- Product Item -->
                                @include('frontend.v1.product.product-item-form')
                                <!-- End Product Item -->
                            @endforeach
                        </div>
                    @endif
                </div>
            </div><!--./product-->

            <!--pagination-->
            {{ $products->links() }}
        </section><!--./right-content-->
        
        <!--left-sidebar-->
        @render(\App\ViewComponents\BestSellingComponent::class)        
       <!--./left-sidebar-->
    </div><!--./main-content-->
@endsection
