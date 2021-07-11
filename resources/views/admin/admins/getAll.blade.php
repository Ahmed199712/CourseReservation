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
        @foreach( $admins as $index=>$admin )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <img style="width:40px;height:40px;margin:0;padding:0" src="{{ asset($admin->avatar) }}" alt="">
                </td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->phone }}</td>
                <td>{{ $admin->created_at->diffForHumans() }}</td>
                <td>
                    <a title="Edit" href="{{ route('admins.edit') }}" class="btn btn-warning btn-sm" id="edit" data-id="{{ $admin->id }}" data-image="{{ asset($admin->avatar) }}" ><i class="fa fa-edit"></i></a>
                    <a title="Delete" href="{{ route('admins.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $admin->id }}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>