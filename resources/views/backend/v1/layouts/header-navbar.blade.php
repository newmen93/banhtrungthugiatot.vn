<nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset("backend/dist/img/user2-160x160.jpg")}}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{Auth::guard('admin')->user()->name}}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="{{asset("backend/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
                        <p>
                            {{Auth::guard('admin')->user()->name}}
                            <small>{{Auth::guard('admin')->user()->email}}</small>
                        </p>
                    </li>
                  
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="{{route("admin.profile.index")}}" class="btn btn-default btn-flat">Tài khoản</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{route("admin.logout")}}" class="btn btn-default btn-flat">Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
</nav>
