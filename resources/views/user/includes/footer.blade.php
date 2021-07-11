<div class="footer">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="links">
            <h4>Important Links</h4>
            <p> <a href="{{ url('/') }}"> <i class="fa fa-home fa-fw fa-lg"></i> Home</a> </p>
            <p> <a href="{{ url('/about') }}"> <i class="fa fa-user-o fa-fw fa-lg"></i> About-US</a> </p>
            <p> <a href="{{ url('/contact') }}"> <i class="fa fa-envelope-o fa-fw fa-lg"></i> Contact-US</a> </p>
            <p> <a href="{{ url('/services') }}"> <i class="fa fa-cog fa-fw fa-lg"></i> Services</a> </p>
            <p> <a href="{{ url('/courses') }}"> <i class="fa fa-book fa-fw fa-lg"></i> Courses</a> </p>
            <p> <a href="{{ url('/login') }}"> <i class="fa fa-sign-in fa-fw fa-lg"></i> Login</a> </p>
            <p> <a href="{{ url('/register') }}"> <i class="fa fa-lock fa-fw fa-lg"></i> Register</a> </p>
          </div>
        </div>

        <div class="col-md-3">
          <div class="links">
            <h4>Categories</h4>
            @foreach( $categories as $category )
              <p> <a href="{{ route('course.category' , $category->id) }}"> {{ $category->name }}</a> </p>
            @endforeach
          </div>
        </div>


        <div class="col-md-3">
          <div class="communicate">
            <h4>Contact With Us</h4>
            <br>
            <div class="row">
              <div class="col-md-2">
                <i class="fa fa-map-marker fa-fw fa-2x"></i>
              </div>
              <div class="col-md-10">
                <p>Address Address Address</p>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-2">
                <i class="fa fa-phone fa-fw fa-2x"></i>
              </div>
              <div class="col-md-10">
                <p>0124578745</p>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-2">
                <i class="fa fa-mobile fa-fw fa-2x"></i>
              </div>
              <div class="col-md-10">
                <p>Address Address Address</p>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-2">
                <i class="fa fa-envelope-o fa-fw fa-2x"></i>
              </div>
              <div class="col-md-10">
                <p>Address Address Address</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3 text-center">
          <div class="communicate">
            <h4>Follow Us</h4>
            <br>

            <span class="socialmedia"> <i class="fa fa-facebook fa-fw fa-2x"></i> </span>
            <span class="socialmedia"> <i class="fa fa-twitter fa-fw fa-2x"></i> </span>
            <span class="socialmedia"> <i class="fa fa-youtube fa-fw fa-2x"></i> </span>
            <span class="socialmedia"> <i class="fa fa-facebook fa-fw fa-2x"></i> </span>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
