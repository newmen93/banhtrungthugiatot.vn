<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="treeview {{setActive('system',2)}}">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Hệ thống</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive('general',3)}}"><a href="{{route('admin.system.general')}}"><i class="fa fa-circle-o"></i> Cài đặt chung</a></li>
                    <li class="{{setActive('advanced',3)}}"><a href="{{route('admin.system.advanced')}}"><i class="fa fa-circle-o"></i> Thiết lập nâng cao</a></li>
                </ul>
            </li>
            <li class="treeview {{setActive("category",2)}}">
                <a href="#">
                    <i class="fa fa-reorder"></i> <span>Danh mục</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive('',3)}}"><a href="{{route('admin.category.index')}}"><i class="fa fa-circle-o"></i> Danh sách danh mục</a></li>
                </ul>
            </li>
            <li class="treeview {{setActive("product",2)}}">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Sản phẩm</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive("",3)}}"><a href="{{route('admin.product.index')}}"><i class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                </ul>
            </li>
            <li class="treeview {{setActive('order',2)}}">
                <a href="#">
                    <i class="fa fa-opencart"></i>
                    <span>Đơn hàng</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive('',3)}}"><a href="{{route('admin.order.index')}}"><i class="fa fa-circle-o"></i> Danh sách đơn hàng</a></li>
                </ul>
            </li>
            <li class="treeview {{setActive('customer',2)}}">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Khách hàng</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive('',3)}}"><a href="{{route('admin.customer.index')}}"><i class="fa fa-circle-o"></i> Danh sách khách hàng</a></li>
                </ul>
            </li>
            <li class="treeview {{setActive('shipping', 2)}}">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Bài viết</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive('', 3)}}"><a href="{{route('admin.shipping.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                </ul>
            </li>
           
        </ul>
    </section>
</aside>
