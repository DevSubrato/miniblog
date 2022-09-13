@if(Request::is('admin*'))
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Miniblog </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <img class="brand-image img-circle elevation-3" src="{{asset('uploads/user/'.Auth::user()->image)}}"
                    style="height:35px; width: 35px;">
                <span class="brand-text text-white font-weight-normal">{{auth()->user()->name}}</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item  ">
                    <a href="{{route('admin.dashboard')}}"
                        class="nav-link {{Request::is('admin/dashboard*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.category.index')}}"
                        class="nav-link {{Request::is('admin/category*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.post.index')}}"
                        class="nav-link {{Request::is('admin/post*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Posts
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.post.pending')}}"
                        class="nav-link {{Request::is('admin/pending*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Pending Posts
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.tag.index')}}"
                        class="nav-link {{Request::is('admin/tag*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.contact.index')}}"
                        class="nav-link {{Request::is('admin/contact*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Messages
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.team.index')}}"
                        class="nav-link {{Request::is('admin/team*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Teams
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.user.index')}}"
                        class="nav-link {{Request::is('admin/user*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.subscribers.index')}}"
                        class="nav-link {{Request::is('admin/subscribers*') ? 'active' : ''}}">
                        <i class="nav-icon fa-solid fa-circle-play"></i>
                        <p>
                            Subscribers
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.comment.index')}}"
                        class="nav-link {{Request::is('admin/comments*') ? 'active' : ''}}">
                        <i class="nav-icon fa-solid fa-message"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('admin.setting.index')}}"
                        class="nav-link {{Request::is('admin/setting*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
                <li class="nav-header">Accounts</li>
                <li class="nav-item mt-auto ">
                    <a href="{{route('admin.profile')}}" class="nav-link">
                        <i class="far fa-user"></i>
                        <p>
                            Your Profile
                        </p>
                    </a>
                <li class="nav-item mt-auto ">
                    <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                <li class="nav-item mt-auto ">
                    <a href="{{route('website')}}" class="nav-link">
                        <i class="fas fa-home"></i>

                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <form action="{{route('logout')}}" id="logout-form" method="POST">
                    @csrf
                </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@endif

@if(Request::is('author*'))
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Miniblog </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <img class="brand-image img-circle elevation-3" src="{{asset('uploads/user/'.Auth::user()->image)}}"
                    style="height:35px; width: 35px;">
                <span class="brand-text text-white font-weight-normal">{{auth()->user()->name}}</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item  ">
                    <a href="{{route('author.dashboard')}}"
                        class="nav-link {{Request::is('author/dashboard*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{route('author.post.index')}}"
                        class="nav-link {{Request::is('author/post*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Post
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('author.post.pending')}}"
                        class="nav-link {{Request::has('author/pending*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Pending Posts
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{route('author.comment.index')}}"
                        class="nav-link {{Request::is('author/comments*') ? 'active' : ''}}">
                        <i class="nav-icon fa-solid fa-message"></i>
                        <p>
                            Comments
                        </p>
                    </a>
                </li>


                <li class="nav-header">Accounts</li>
                <li class="nav-item mt-auto ">
                    <a href="{{route('author.profile')}}"
                        class="nav-link {{Request::is('author/profile*') ? 'active' : ''}}">
                        <i class="far fa-user"></i>
                        <p>
                            Your Profile
                        </p>
                    </a>
                </li>
                <li class="nav-item mt-auto ">
                    <a href="{{route('website')}}" class="nav-link">
                        <i class="fas fa-home"></i>

                        <p>
                            Home
                        </p>
                    </a>
                </li>

                <li class="nav-item mt-auto ">
                    <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                <li class="text-center mt-5 ">
                    <a href="{{route('website')}}" class="btn btn-primary text-white">

                        <p>
                            Back to frontend
                        </p>
                    </a>
                </li>
                <form action="{{route('logout')}}" id="logout-form" method="POST">
                    @csrf
                </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@endif