@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{ asset('/') }}/public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{(!empty(Auth::user()->image))?url('public/upload/user_image/'.Auth::user()->image):url('public/upload/no-image.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @if(Auth::user()->userType == 'admin')
                <li class="nav-item has-treeview {{($prefix == '/users') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-address-book"></i>
                        <p>
                            Manage Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.view')}}" class="nav-link {{($route == 'users.view') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!--mange profile-->
                <li class="nav-item has-treeview {{($prefix == '/profiles') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Manage Profiles
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profiles.view')}}" class="nav-link {{($route == 'profiles.view') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>
                    </ul>
                     <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profiles.password.view')}}" class="nav-link {{($route == 'profiles.password.view') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                  <!--mange Purchase-->
<!--                <li class="nav-item has-treeview {{($prefix == '/purchase') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Manage Purchases
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('purchase.add')}}" class="nav-link {{($route == 'purchase.add') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>add Purchase</p>
                            </a>
                        </li>
                    </ul>
                </li>-->
            </ul>
          

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>