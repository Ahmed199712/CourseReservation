<table id="myTable" class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $students as $index=>$student )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img style="width:40px;height:40px;margin:0;padding:0" src="{{ asset($student->avatar) }}" alt="">
                </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->created_at->diffForHumans() }}</td>
                <td>
                    <a title="Show" href="{{ route('students.show') }}" class="btn btn-info btn-sm" id="show" data-id="{{ $student->id }}" data-image="{{ asset($student->avatar) }}" ><i class="fa fa-eye"></i></a>
                    <a title="Edit" href="{{ route('students.edit') }}" class="btn btn-warning btn-sm" id="edit" data-id="{{ $student->id }}" data-image="{{ asset($student->avatar) }}" ><i class="fa fa-edit"></i></a>
                    <a title="Delete" href="{{ route('students.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $student->id }}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>