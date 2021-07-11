<aside class="main-sidebar sidebar-dark-primary elevation-4">
   
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset( auth()->guard('admin')->user()->avatar ) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admins.profile') }}" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
              <i class="fa fa-tachometer-alt fa-lg fa-fw"></i> &nbsp;
              <p>Dashboard</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('admins.index') }}" class="nav-link {{ Route::currentRouteName() == 'admins.index' ? 'active' : '' }}">
              <i class="fa fa-user-plus fa-lg  fa-fw"></i> &nbsp;
              <p>Adminstrators</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('categories.index') }}" class="nav-link {{ Route::currentRouteName() == 'categories.index' ? 'active' : '' }}">
              <i class="fa fa-tag  fa-lg fa-fw"></i> &nbsp;
              <p>Categories</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('courses.index') }}" class="nav-link {{ Route::currentRouteName() == 'courses.index' ? 'active' : '' }}">
              <i class="fa fa-book-reader fa-lg fa-fw"></i> &nbsp;
              <p>Courses</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('classes.index') }}" class="nav-link {{ Route::currentRouteName() == 'classes.index' ? 'active' : '' }}">
              <i class="fa fa-school fa-lg fa-fw"></i> &nbsp;
              <p>Classes</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('floors.index') }}" class="nav-link {{ Route::currentRouteName() == 'floors.index' ? 'active' : '' }}">
              <i class="fa fa-building fa-lg fa-fw"></i> &nbsp;
              <p>Floors</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('students.index') }}" class="nav-link {{ Route::currentRouteName() == 'students.index' ? 'active' : '' }}">
              <i class="fa fa-user-graduate fa-lg fa-fw"></i> &nbsp;
              <p>Students</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('instructors.index') }}" class="nav-link {{ Route::currentRouteName() == 'instructors.index' ? 'active' : '' }}">
              <i class="fa fa-chalkboard-teacher fa-lg fa-fw"></i> &nbsp;
              <p>Instructors/Coach</p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{ route('reservations.index') }}" class="nav-link {{ Route::currentRouteName() == 'reservations.index' || Route::currentRouteName() == 'reservations.show' ? 'active' : '' }}">
              <i class="far fa-handshake fa-lg fa-fw"></i> &nbsp;
              <p>Reservations</p>
            </a>
          </li>
          

          <li class="nav-item">
            <a href="{{ route('comments.index') }}" class="nav-link {{ Route::currentRouteName() == 'comments.index' ? 'active' : '' }}">
              <i class="fa fa-comments fa-lg fa-fw"></i> &nbsp;
              <p>Comments</p>
            </a>
          </li>


        

          <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}">
              <i class="fa fa-cogs fa-lg fa-fw"></i> &nbsp;
              <p>Settings</p>
            </a>
          </li>





    
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>