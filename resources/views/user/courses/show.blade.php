@extends('user.layouts.app')

@section('content')
  <div class="container showSingleCourse">
      <h3 class="text-center" style="margin:20px 0;color:#e9616d">{{ $course->name }}</h3>


    <div class="myImage text-center">
      <div class="row">
        
          <div class="col-md-8 offset-md-2">
            <img class="img-responsive" style="height:300px" src="{{ asset($course->image) }}" alt="">
          </div>

      </div>
    </div>
        <hr>
        <div class="text-center">
          <span> <i class="fa fa-user-o"></i> created_by : Adminstrator</span>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
          <span> <i class="fa fa-calendar"></i> created_at :{{ $course->created_at->format('d-m-Y') }}</span>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
          <span> <i class="fa fa-tags"></i> category :{{ $course->category->name }}</span>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
          <span> <i class="fa fa-graduation-cap"></i> Class :{{ $course->class->name }}</span>
        </div>
        <hr>

        <div class="text-center">
          @if( Auth::check() )
              @if( auth()->guard('web')->user()->register_course == 0 )
                <a href="{{ route('user.registerCourse' , $course->id) }}" class="btn btn-success"> <i class="fa fa-plus"></i> Register Course</a>
              @else
                <a href="#" disable="disabled" class="btn btn-success disabled"> <i class="fa fa-retweet"></i> You Register Course Wait Reply ...</a>
              @endif
          @else
            <div class="alert alert-success">You Must Login To Register Course</div>
          @endif
        </div>

        <hr>
        <div class="row">

            <div class="col-md-6">
              <ul class="list-group">
                <li class="list-group-item" style="color:#e9616d"> <i class="fa fa-book fa-fw fa-lg"></i> Course Name: <span style="color:#4ea1d2;font-weight:bold"> &nbsp; {{ $course->name }}</span> </li>
              </ul>
            </div>
            <div class="col-md-6">
              <ul class="list-group">
                <li class="list-group-item" style="color:#e9616d"> <i class="fa fa-money fa-fw fa-lg"></i> Course Price: <span style="color:#4ea1d2;font-weight:bold"> &nbsp; ${{ $course->price }}</span> </li>
              </ul>
            </div>

            <div class="col-md-6">
              <ul class="list-group">
                <li class="list-group-item" style="color:#e9616d"> <i class="fa fa-reply fa-fw fa-lg"></i> Course Discount: <span style="color:#4ea1d2;font-weight:bold"> &nbsp; ${{ $course->discount }}</span> </li>
              </ul>
            </div>

            <div class="col-md-6">
              <ul class="list-group">
                <li class="list-group-item" style="color:#e9616d"> <i class="fa fa-money fa-fw fa-lg"></i> Total Price: <span style="color:#4ea1d2;font-weight:bold"> &nbsp; ${{ $course->price - $course->discount }} </span> </li>
              </ul>
            </div>

            <div class="col-md-6">
              <ul class="list-group">
                <li class="list-group-item" style="color:#e9616d"> <i class="fa fa-clock-o fa-fw fa-lg"></i> Course Duration: <span style="color:#4ea1d2;font-weight:bold"> &nbsp; {{ $course->hours }} Hours</span> </li>
              </ul>
            </div>

            <div class="col-md-6">
              <ul class="list-group">
                <li class="list-group-item" style="color:#e9616d"> <i class="fa fa-clock-o fa-fw fa-lg"></i> Course Requirements: <span style="color:#4ea1d2;font-weight:bold"> &nbsp; {{ $course->requirements }}</span> </li>
              </ul>
            </div>

            <div class="col-md-12 mt-3">
              <ul class="list-group">
                <li class="list-group-item" style="color:#e9616d"> <i class="fa fa-clock-o fa-fw fa-lg"></i> Course Description:-  <br><br> <span style="color:#4ea1d2">{{ $course->desc }}</span> </li>
              </ul>
            </div>

        </div>


      <hr>

      <div class="forComments">
        <h3>Comments:-</h3>

        @auth
          @if( $setting->stop_comments == 0 )
            <form class="" action="{{ url('sendComment' , $course->id) }}" method="POST">
              {{ csrf_field() }}
              <textarea required name="comment" rows="8" cols="80" class="form-control" placeholder="Write Your Comment Here ..."></textarea>
              <button type="submit" class="btn btn-primary btn-block mt-3"> <i class="fa fa-comments-o fa-fw fa-lg"></i> Add Your Comment </button>
            </form>
          @else
          <div class="alert alert-warning text-center">
            The Comments Are Disabled From Adminstrator Now ...
          </div>
          @endif
        @else
          <div class="alert alert-info">
            You Must Login First To Add Comment
          </div>
        @endauth

        <br>

        <div class="allComments mt-5">
            @foreach( $course->comments as $comment )
              <div class="allComments">
                <div class="row">
                  <div class="col-md-2 text-center">
                    @if(!empty($comment->user->avatar))
                      <img style="width:100px;height:100px;border-radius:50%" class="img-thumbnail" src="{{ asset($comment->user->avatar) }}" alt="">
                    @else
                      <img style="width:100px;height:100px;border-radius:50%" class="img-thumbnail" src="{{ asset('uploads/avatars/default.png') }}" alt="">
                    @endif
                  </div>
                  <div class="col-md-10">
                    <div class="namesAndDate">
                      <span class="name"> <i class="fa fa-user fa-fw"></i> {{ $comment->user->name }}</span> -
                      <span class="date"> <i class="fa fa-calendar fa-fw"></i> {{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="commentTitle">
                      {{ $comment->comment }}
                    </div>
                  </div>
                </div>
              </div>
              <hr>
            @endforeach
        </div>

        <br><br><br>

      </div>


</div>
@endsection
