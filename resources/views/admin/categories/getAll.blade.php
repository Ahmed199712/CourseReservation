<table id="myTable" class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $categories as $index=>$category )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at->diffForHumans() }}</td>
                <td>
                    <a title="Edit" href="{{ route('categories.edit') }}" class="btn btn-warning btn-sm" id="edit" data-id="{{ $category->id }}" ><i class="fa fa-edit"></i></a>
                    <a title="Delete" href="{{ route('categories.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $category->id }}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>