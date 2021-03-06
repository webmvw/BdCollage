  
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
                Setups Management
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
                <a href="{{ route('session.view') }}" class="nav-link {{ ($route == 'session.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Session</p>
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

              <li class="nav-item">
                <a href="{{ route('designation.view') }}" class="nav-link {{ ($route == 'designation.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('employee.assign.leave.view') }}" class="nav-link {{ ($route == 'employee.assign.leave.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Assign Leave</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item {{ ($prefix == '/students') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Students Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('student.registration.view') }}" class="nav-link {{ ($route == 'student.registration.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Registration</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('roll.generate.view') }}" class="nav-link {{ ($route == 'roll.generate.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roll Generate</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('fee.details.view') }}" class="nav-link {{ ($route == 'fee.details.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fee Details</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item {{ ($prefix == '/marks') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Marks Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('student.marks.entry.view') }}" class="nav-link {{ ($route == 'student.marks.entry.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Entry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('student.marks.entry.edit') }}" class="nav-link {{ ($route == 'student.marks.entry.edit') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marks Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('gradePoint.view') }}" class="nav-link {{ ($route == 'gradePoint.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grade Point</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item {{ ($prefix == '/employee') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Employee Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('employee.registration.view') }}" class="nav-link {{ ($route == 'employee.registration.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Registration</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('employee.salary.view') }}" class="nav-link {{ ($route == 'employee.salary.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('employeeLeave.view') }}" class="nav-link {{ ($route == 'employeeLeave.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Leave</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('employeeAttendance.view') }}" class="nav-link {{ ($route == 'employeeAttendance.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Attendance</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('employee.monthly.salary.view') }}" class="nav-link {{ ($route == 'employee.monthly.salary.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Salary</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item {{ ($prefix == '/account') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Accounts Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('account.student.fee.view') }}" class="nav-link {{ ($route == 'account.student.fee.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students Fee</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account.employee.salary.view') }}" class="nav-link {{ ($route == 'account.employee.salary.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Salary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('account.other.cost.view') }}" class="nav-link {{ ($route == 'account.other.cost.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Others Cost</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ ($prefix == '/reports') ? 'menu-is-opening menu-open': '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Reports Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('monthly.profit.view') }}" class="nav-link {{ ($route == 'monthly.profit.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Profit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.marksheet.view') }}" class="nav-link {{ ($route == 'report.marksheet.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Marksheet</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('report.employee.attendance.view') }}" class="nav-link {{ ($route == 'report.employee.attendance.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Employee Attendance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('student.resultsheet.view') }}" class="nav-link {{ ($route == 'student.resultsheet.view') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Resultsheet</p>
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