@extends('admin.layouts.app')

@section('content')

<div style="padding:10px 0">
    @if( getContact('count') > 0 )
      <div class="alert alert-danger">
        Remember. You Have  <b style="background-color:white;color:red;padding:5px 15px;font-size:20px">{{ getContact('count') }}</b> Messages !
      </div>
    @endif
    <h4 style="margin:0">Dashboard</h4>
</div>

<div class="row">

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{ $admins->count() }}</h3>

                <p>Admins</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
              <a href="{{ route('admins.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $students->count() }}</h3>

                <p>Students</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-graduate"></i>
              </div>
              <a href="{{ route('students.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-gray">
              <div class="inner">
                <h3>{{ $instructors->count() }}</h3>

                <p>Instructors</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
              <a href="{{ route('instructors.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $courses->count() }}</h3>

                <p>Courses</p>
              </div>
              <div class="icon">
                <i class="fa fa-book-reader"></i>
              </div>
              <a href="{{ route('courses.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $classes->count() }}</h3>

                <p>Classes</p>
              </div>
              <div class="icon">
                <i class="fa fa-school"></i>
              </div>
              <a href="{{ route('classes.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $comments->count() }}</h3>

                <p>Comments</p>
              </div>
              <div class="icon">
                <i class="fa fa-comments"></i>
              </div>
              <a href="{{ route('comments.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3>{{ $reservations->count() }}</h3>

                <p>Reservations</p>
              </div>
              <div class="icon">
                <i class="far fa-handshake"></i>
              </div>
              <a href="{{ route('reservations.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>


          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-purple">
              <div class="inner">
                <h3>{{ $categories->count() }}</h3>

                <p>Categories</p>
              </div>
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
              <a href="{{ route('categories.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>




          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>{{ $floors->count() }}</h3>

                <p>Floors</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
              <a href="{{ route('floors.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>



          
          <!-- ./col -->
        </div>


@endsection