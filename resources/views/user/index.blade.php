@extends('user.layouts.app')

@section('content')
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Welcome To Learning Courses Online <br> Your <span>Way To</span> <span class="two">Be</span>come <br>Professional</br> </h3>

        <div class="button">
          <a href="{{ route('user.register') }}">Subscribe Now !</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="myImage">
          <img src="{{ asset('images/new/student.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Our  Classes -->
<div class="our-classes">
  <div class="container">
    <h3 class="text-center">Our Classes</h3>

    <div class="allBox">
      <div class="row">
        <div class="col-md-6">
          <div class="myImage">
            <img class="img-responsive" src="{{ asset('images/new/class.jpg') }}" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <h2>Our Classes Features</h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Start Our Courses -->
<div class="our-courses">
  <div class="container">
    <h3>Latest Courses</h3>

    <br><br><br>

    <div class="row allcourses">
      @foreach($courses as $course)
        <div class="col-md-4">
          <div class="box">
            <div class="myImage" style="height;300px">
              <img style="width:100%;height:100%" src="{{ asset($course->image) }}" alt="">
            </div>
            <h4 class="text-center">{{ $course->name }}</h4>
            <div class="allInfo">
              <span class="price"> ${{ $course->price }}</span> &nbsp; &nbsp; &nbsp;
              <span class="discount"> ${{ $course->price - $course->discount}}</span>
            </div>
            <br>
            <div class="showButton">
              <a href="{{ route('course.show' , $course->id) }}" class="btn btn-warning btn-block text-white"> <i class="fa fa-eye fa-fw fa-lg"></i> Show Course Details</a>
            </div>
          </div>
          <br />
          <br />
        </div>
      @endforeach
      
    </div>
    


  </div>
</div>
<!-- End Our Courses -->


<!-- Start Statistics -->
<div class="statistics">
  <div class="container">

    <h3 class="text-center">Statistics</h3>

    <br><br><br>

    <div class="row">
      <div class="col-md-4">
        <div class="statBox">
          <h5 class="text-center">Students</h5>
          <i class="fa fa-graduation-cap fa-fw fa-2x"></i>
          &nbsp;
          <span>{{ $total_students->count() }}</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="statBox">
          <h5 class="text-center">Courses</h5>
          <i class="fa fa-book fa-fw fa-2x"></i>
          &nbsp;
          <span>{{ $total_courses->count() }}</span>
        </div>
      </div>
      <div class="col-md-4">
        <div class="statBox">
          <h5 class="text-center">Comments</h5>
          <i class="fa fa-comments-o fa-fw fa-2x"></i>
          &nbsp;
          <span>{{ $total_comments->count() }}</span>
        </div>
      </div>


      <div class="col-md-4">
        <div class="statBox">
          <h5 class="text-center">Reservations</h5>
          <i class="fa fa-handshake-o fa-fw fa-2x"></i>
          &nbsp;
          <span>{{ $total_reservation->count() }}</span>
        </div>
      </div>


      <div class="col-md-4">
        <div class="statBox">
          <h5 class="text-center">Instructors</h5>
          <i class="fa fa-male fa-fw fa-2x"></i>
          &nbsp;
          <span>{{ $total_instructors->count() }}</span>
        </div>
      </div>


      <div class="col-md-4">
        <div class="statBox">
          <h5 class="text-center">Classes</h5>
          <i class="fa fa-rss-square fa-fw fa-2x"></i>
          &nbsp;
          <span>{{ $total_classes->count() }}</span>
        </div>
      </div>


    </div>

  </div>
</div>
<!-- End Statistics -->

@endsection
