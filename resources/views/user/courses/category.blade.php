@extends('user.layouts.app')

@section('content')
  <div class="container courses">
      <h3 class="text-center" style="margin:20px 0;color:#e9616d">{{ $category->name }}</h3>


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
            <br><br>
          </div>
        @endforeach
      </div>

  </div>
@endsection
