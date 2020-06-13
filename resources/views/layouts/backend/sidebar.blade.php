  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
      <img src="{{ asset('/backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">RetroApps Panel</span>
    </a>
    <?php $currentUser = Auth::user();?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ $currentUser->gravatar() }}" class="img-circle elevation-2" alt="{{ $currentUser->name }}">
        </div>
        <div class="info">
          <a href="{{ url('/profile') }}" class="d-block">{{ $currentUser->name }}</a>
          <span class="badge badge-warning">{{ $currentUser->roles->first()->display_name }}</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ url('/home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Dashboard
                {{-- <i class="right fa fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ Request::segment(2) === 'blog' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Blog
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('backend.blog.index') }}" class="nav-link {{ Request::is('backend/blog') ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>All Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('backend.blog.create') }}" class="nav-link {{ Request::is('backend/blog/create') ? 'active' : '' }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          @if(check_user_permissions(request(), "Category@index"))
          <li class="nav-item has-treeview {{ Request::segment(2) === 'category' ? 'menu-open' : '' }}">
            <a href="{{ route('backend.category.index') }}" class="nav-link {{ Request::is('backend/category') ? 'active' : '' }}">
              <i class="nav-icon fa fa-pencil"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          @endif
          @if(check_user_permissions(request(), "Users@index"))
          <li class="nav-item has-treeview {{ Request::segment(2) === 'users' ? 'menu-open' : '' }}">
            <a href="{{ route('backend.users.index') }}" class="nav-link {{ Request::is('backend/users') ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ Request::segment(2) === 'roles' ? 'menu-open' : '' }}">
            <a href="{{ route('backend.roles.index') }}" class="nav-link {{ Request::is('backend/roles') ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Roles
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ Request::segment(2) === 'permission' ? 'menu-open' : '' }}">
            <a href="{{ route('backend.permission.index') }}" class="nav-link {{ Request::is('backend/permission') ? 'active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Permission
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>