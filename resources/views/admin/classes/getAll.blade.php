<table id="myTable" class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Number</th>
            <th>Floor</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $classes as $index=>$class )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $class->number }}</td>
                <td>{{ $class->name }}</td>
                <td>{{ $class->floor->name }}</td>
                <td>{{ $class->created_at->diffForHumans() }}</td>
                <td>
                    <a title="Edit" href="{{ route('classes.edit') }}" class="btn btn-warning btn-sm" id="edit" data-id="{{ $class->id }}" ><i class="fa fa-edit"></i></a>
                    <a title="Delete" href="{{ route('classes.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $class->id }}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>