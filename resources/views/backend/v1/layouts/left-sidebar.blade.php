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
                    {{-- <li class="{{setActive('create',3)}}"><a href="{{route('admin.category.create')}}"><i class="fa fa-circle-o"></i> Thêm mới danh mục</a></li> --}}
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
                    {{-- <li class="{{setActive("create",3)}}"><a href="{{route('admin.product.create')}}"><i class="fa fa-circle-o"></i> Thêm mới sản phẩm</a></li>
                    <li class="{{setActive("",3)}}"><a href="{{route('admin.attribute.index')}}"><i class="fa fa-circle-o"></i> Danh sách thuộc tính</a></li>
                    <li class="{{setActive("create",3)}}"><a href="{{route('admin.attribute.create')}}"><i class="fa fa-circle-o"></i> Thêm mới thuộc tính</a></li>
                    <li class="{{setActive("",3)}}"><a href="{{route('admin.unit.index')}}"><i class="fa fa-circle-o"></i> Danh sách đơn vị</a></li>
                    <li class="{{setActive("create",3)}}"><a href="{{route('admin.unit.create')}}"><i class="fa fa-circle-o"></i> Thêm mới đơn vị</a></li> --}}
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
                   {{--  <li class="{{setActive('create',3)}}"><a href="{{route('admin.order.create')}}"><i class="fa fa-circle-o"></i> Tạo mới đơn hàng</a></li>
                    <li class="{{setActive('create',3)}}"><a href="{{route('admin.order.create')}}"><i class="fa fa-circle-o"></i>Quản Lý Giá Ship</a></li> --}}
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
                    {{-- <li class="{{setActive('create',3)}}"><a href="{{route('admin.customer.create')}}"><i class="fa fa-circle-o"></i> Thêm mới khách hàng</a></li> --}}
                </ul>
            </li>
            {{-- <li class="treeview {{setActive('shipping', 2)}}">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Phí vận chuyển</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive('', 3)}}"><a href="{{route('admin.shipping.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                </ul>
            </li> --}}
            {{-- <li class="treeview {{setActive('report', 2)}}">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Thống kê</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive('', 3)}}"><a href="{{route('admin.report.index')}}"><i class="fa fa-circle-o"></i> Report</a></li>
                </ul>
            </li>
            <li class="treeview {{setActive('email', 2)}}">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Email templates</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{setActive('', 3)}}"><a href="{{route('admin.email.index')}}"><i class="fa fa-circle-o"></i> Danh sách email mẫu</a></li>
                    <li class="{{setActive('create', 3)}}"><a href="{{route('admin.email.create')}}"><i class="fa fa-circle-o"></i> Tạo mới email mẫu</a></li>
                </ul>
            </li> --}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
