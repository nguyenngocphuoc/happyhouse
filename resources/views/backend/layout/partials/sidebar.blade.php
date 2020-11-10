<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/'.auth()->user()->photo) }}" width="100" class="img-circle" alt="User Image"
                    style="object-fit: cover;height: 35px !important; width: 35px !important;">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="header">ĐĂNG BÀI</li>
            <li class="@if (Request::is('dashboard')) active @endif">
                <a href="{{ url('/dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <!--<li class="@if (Request::is('admin/group-category*')) active @endif">
                <a href="{{ route('admin.group-category.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Nhóm thể loại</span>
                </a>
            </li>-->
            <li class="@if (Request::is('admin/category*')) active @endif">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Thể loại</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/news*')) active @endif">
                <a href="{{ route('admin.news.index') }}">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Tin Tức</span>
                </a>
            </li>
            <li class="header">QUẢN LÝ</li>
            <li class="@if (Request::is('admin/district*')) active @endif">
                <a href="{{ route('admin.district.index') }}">
                    <i class="fa fa-map-marker"></i>
                    <span>Tỉnh(Thành phố)</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/status*')) active @endif">
                <a href="{{ route('admin.status.index') }}">
                    <i class="fa fa-tasks"></i>
                    <span>Quản lý trạng thái bđs</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/map*')) active @endif">
                <a href="{{ route('admin.map.index') }}">
                    <i class="fa fa-map"></i>
                    <span>Bản đồ</span>
                </a>
            </li>
            <li class="header">KHÁC</li>
            <li class="@if (Request::is('admin/info-submit*')) active @endif">
                <a href="{{ route('admin.info-submit.index') }}">
                    <i class="fa fa-envelope"></i>
                    <span>Liên hệ</span>
                </a>
            </li>
            <li class="@if (Request::is('admin/users*')) active @endif">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Tài khoản</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.settings.index') }}">
                    <i class="fa fa-gear text-red"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.settings.index') }}"><i class="fa fa-circle-o"></i> Genarel Setting</a>
                    </li>
                    <li><a href="{{ route('admin.advertisements.index') }}"><i class="fa fa-circle-o"></i> Advertisement
                            Setting</a></li>
                    <li><a href="{{ route('admin.hero-images.index') }}"><i class="fa fa-circle-o"></i> AD Image
                            Setting</a>
                    </li>
                </ul>
            </li>

        </ul>

    </section>

</aside>