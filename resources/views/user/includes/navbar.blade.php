<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">
<a class="navbar-brand" href="{{ url('/') }}">
  <img src="{{ asset($setting->website_logo) }}" alt=""> 
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav ml-auto">
  <li class="nav-item">
    <a class="{{ Route::currentRouteName() == 'user.index' ? 'activeLink' : '' }} nav-link" href="{{ url('/') }}"> <i class="fa fa-dashboard"></i> Home</a>
  </li>
  <li class="nav-item">
    <a class="{{ Route::currentRouteName() == 'user.about' ? 'activeLink' : '' }} nav-link" href="{{ url('/about') }}"> <i class="fa fa-user-o"></i> About</a>
  </li>
  <li class="nav-item">
    <a class="{{ Route::currentRouteName() == 'user.contact' ? 'activeLink' : '' }} nav-link" href="{{ url('/contact') }}"> <i class="fa fa-envelope-o"></i> Contact</a>
  </li>
  <li class="nav-item">
    <a class="{{ Route::currentRouteName() == 'user.services' ? 'activeLink' : '' }} nav-link" href="{{ url('/services') }}"> <i class="fa fa-cog"></i> Services</a>
  </li>

  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fa fa-tags"></i> Categories
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach( $categories as $category )
        <a class="dropdown-item" href="{{ route('course.category' , $category->id) }}">{{ $category->name }}</a>
    @endforeach
  </div>
</li>


  <li class="nav-item">
    <a class="{{ Route::currentRouteName() == 'user.courses' || Route::currentRouteName() == 'course.show' ? 'activeLink' : '' }} nav-link" href="{{ url('/courses') }}"> <i class="fa fa-book"></i> Courses</a>
  </li>
</ul>

<ul class="navbar-nav ml-auto">
  @auth

  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @if(!empty(auth()->user()->avatar))
      <img style="width:42px;height:42px;border-radius:50%;border:2px solid #4ea1d2" src="{{ asset(auth()->user()->avatar) }}" alt="">
    @else
      <img style="width:42px;height:42px;border-radius:50%;border:2px solid #4ea1d2" src="{{ asset('uploads/avatars/default.png') }}" alt="">
    @endif
    &nbsp; {{ auth()->user()->name }}
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
    <a class="dropdown-item" href="{{ route('user.mycourses') }}">MyCourses</a>
    <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
  </div>
</li>
  @else
    <li class="nav-item">
      <a class="{{ Route::currentRouteName() == 'user.login' ? 'activeLink' : '' }} nav-link" href="{{ url('/login') }}"> <i class="fa fa-sign-in fa-fw"></i> LogIn</a>
    </li>
    <li class="nav-item">
      <a class="{{ Route::currentRouteName() == 'user.register' ? 'activeLink' : '' }} nav-link" href="{{ url('/register') }}"> <i class="fa fa-lock fa-fw"></i> Register</a>
    </li>
  @endauth
</ul>

</div>
</div>
</nav>
