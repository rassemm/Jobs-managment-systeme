<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          @if (auth()->user()->hasRole('admin'))
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('permission.index')}}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Managment Permission')}}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('role.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Managment Role</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Managment User</p>
              </a>
            </li>
            @endif
            @if (auth()->user()->hasRole('recruteur'))
            <li class="nav-item">
              <a href="{{route('job.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Managment Jobs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('post.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Managment Post</p>
              </a>
            </li>
            @endif
            @if (auth()->user()->hasRole('user'))
            <li class="nav-item">
              <a href="{{route('myjobs')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Mes demandes Demplois') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('myposts')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Mes demandes de stages</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @if (auth()->user()->hasRole('user'))
        <li class="nav-item">
          <a href="{{route('cv.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Managment Cvs</p>
          </a>
        </li>
        @endif
      </ul>
    </li>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>