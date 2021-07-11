<table id="myTable" class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $courses as $index=>$course )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img style="width:40px;height:40px;margin:0;padding:0" src="{{ asset($course->image) }}" alt="">
                </td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->discount }}</td>
                <td>{{ $course->created_at->diffForHumans() }}</td>
                <td>
                    <a title="Show" href="{{ route('courses.show') }}" class="btn btn-info btn-sm" id="show" data-id="{{ $course->id }}"  data-image="{{ asset($course->image) }}" ><i class="fa fa-eye"></i></a>
                    <a title="Edit" href="{{ route('courses.edit') }}" class="btn btn-warning btn-sm" id="edit" data-id="{{ $course->id }}" data-active="{{ $course->active }}" data-image="{{ asset($course->image) }}" ><i class="fa fa-edit"></i></a>
                    <a title="Delete" href="{{ route('courses.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $course->id }}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>