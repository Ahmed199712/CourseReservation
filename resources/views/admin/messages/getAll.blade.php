<table id="myTable" class="table table-hover table-striped table-bordered text-center">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>User</th>
            <th>Course</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $comments as $index=>$comment )
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $comment->title }}</td>
                <td>{{ $comment->user->email }}</td>
                <td>{{ $comment->course->name }}</td>
                <td>{{ $comment->created_at->diffForHumans() }}</td>
                <td>
                    @if( $comment->approve == 0 )
                        <a title="Active" href="{{ route('comments.active') }}" class="btn btn-success btn-sm" id="active" data-id="{{ $comment->id }}" ><i class="fa fa-check"></i></a>
                    @endif
                    <a title="Delete" href="{{ route('comments.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $comment->id }}"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>