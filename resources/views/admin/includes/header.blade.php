<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item">
        <a href="{{ route('admin.logout') }}" class="nav-link btn btn-danger" style="color:white"> <i class="fa fa-power-off fa-fw"></i> Logout</a>
      </li>

      &nbsp;&nbsp;
      

      <li class="nav-item">
        <a href="{{ route('user.index') }}" target="_blank" class="nav-link btn btn-primary" style="color:white"> <i class="fa fa-video fa-fw"></i> Visit Website</a>
      </li>
      &nbsp;&nbsp;
      
      

      

      <li class="nav-item">
        <a href="{{ route('admins.profile') }}"  class="nav-link btn btn-success" style="color:white"> <i class="far fa-user-circle"></i> Profile</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <!--<form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      
      <!-- Start Messages Notification -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          @if( getContact('count') > 0 )
            <span class="badge badge-danger navbar-badge">{{ getContact('count') }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          @if( getContact('count') > 0 )
            @foreach( getContact('data') as $message )
            <a href="{{ route('messages.show' , $message->id) }}" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <b>{{ $message->email }}</b>
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">{{ $message->message }}</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>  {{ $message->created_at->diffForHumans() }} </p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            @endforeach
          @else
            <div class="text-center text-danger" style="padding:10px 0">
              No Messages
            </div>
          @endif
          
          <a href="{{ route('messages.index') }}" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- End Messages Notification -->
      
      <!-- Start Reservation Notification -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          @if( getReservation('count') > 0 )
            <span class="badge badge-primary navbar-badge">{{ getReservation('count') }}</span>
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><b style="font-size:18px;color:red">{{ getReservation('count') }}</b> Reservations</span>
          <div class="dropdown-divider"></div>
         
          @foreach( getReservation('data') as $reservation )
            <a href="{{ route('reservations.show' , $reservation->id) }}" class="dropdown-item">
              <i class="far fa-handshake mr-2"></i> {{ str_limit($reservation->course->name , 26) }}
              <span class="float-right text-muted text-sm">{{ $reservation->created_at->diffForHumans() }}</span>
            </a>
          @endforeach

          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="{{ route('reservations.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- End Reservation Notification -->

      
     
    </ul>
  </nav>