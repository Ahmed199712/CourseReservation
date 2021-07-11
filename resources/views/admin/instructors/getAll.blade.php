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
        @foreach( $instructors as $index=>$instructor )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img style="width:40px;height:40px;margin:0;padding:0" src="{{ asset($instructor->avatar) }}" alt="">
                </td>
                <td>{{ $instructor->name }}</td>
                <td>{{ $instructor->email }}</td>
                <td>{{ $instructor->phone }}</td>
                <td>{{ $instructor->created_at->diffForHumans() }}</td>
                <td>
                    <a title="Show" href="{{ route('instructors.show') }}" class="btn btn-info btn-sm" id="show" data-id="{{ $instructor->id }}" data-image="{{ asset($instructor->avatar) }}" ><i class="fa fa-eye"></i></a>
                    <a title="Edit" href="{{ route('instructors.edit') }}" class="btn btn-warning btn-sm" id="edit" data-id="{{ $instructor->id }}" data-image="{{ asset($instructor->avatar) }}" ><i class="fa fa-edit"></i></a>
                    <a title="Delete" href="{{ route('instructors.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $instructor->id }}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>