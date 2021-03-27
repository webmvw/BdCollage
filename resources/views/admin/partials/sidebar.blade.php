  
  @php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
  @endphp

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('public/admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BdCollage</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
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
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ ($route == 'admin.dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          

          <li class="nav-item {{ ($prefix == '/setups') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage Setups
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('department.view') }}" class="nav-link {{ ($route == 'department.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('feeCategory.view') }}" class="nav-link {{ ($route == 'feeCategory.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('feeAmount.view') }}" class="nav-link {{ ($route == 'feeAmount.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Amount</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('semester.view') }}" class="nav-link {{ ($route == 'semester.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Semester</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('exam.view') }}" class="nav-link {{ ($route == 'exam.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Exam</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('subject.view') }}" class="nav-link {{ ($route == 'subject.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subject</p>
                </a>
              </li>

            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>