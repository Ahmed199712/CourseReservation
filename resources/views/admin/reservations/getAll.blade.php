<table id="myTable" class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Number</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $floors as $index=>$floor )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $floor->number }}</td>
                <td>{{ $floor->name }}</td>
                <td>{{ $floor->created_at->diffForHumans() }}</td>
                <td>
                    <a title="Edit" href="{{ route('floors.edit') }}" class="btn btn-warning btn-sm" id="edit" data-id="{{ $floor->id }}" ><i class="fa fa-edit"></i></a>
                    <a title="Delete" href="{{ route('floors.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $floor->id }}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>