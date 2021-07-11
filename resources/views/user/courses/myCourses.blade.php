@extends('user.layouts.app')

@section('content')
  <div class="container courses">
      <h3 class="text-center" style="margin:20px 0;color:#e9616d">MyCourses</h3>


        <div class="table table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Course</th>
                            <th>Student</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $reservations as $index=>$reservation )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img style="width:30px;height:30px" src="{{ asset($reservation->course->image) }}" alt="">
                                </td>
                                <td>{{ $reservation->course->name }}</td>
                                <td>{{ $reservation->user->email }}</td>
                                <td>{{ $reservation->created_at->diffForHumans() }}</td>
                                <td>
                                    <a title="Show" href="{{ route('course.show' , $reservation->course->id) }}" class="btn btn-info btn-sm" id="show" data-id="{{ $reservation->id }}" ><i class="fa fa-eye"></i></a>
                                    <a title="Delete" href="{{ route('reservation.delete' , $reservation->id) }}" class="btn btn-danger btn-sm confirmDelete" id="delete" data-id="{{ $reservation->id }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>





  </div>
@endsection
