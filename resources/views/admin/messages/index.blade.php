@extends('admin.layouts.app')

@section('content')

    <span id="getAllMessages" data-url="{{ route('messages.all') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="fa fa-envelope text-primary"></i> &nbsp;
                Messages
            </h5>
            
        </div>
        <div class="card-body" style="padding:10px">
            
            <div class="table table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Message</th>
                            <th>User</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $messages as $index=>$message )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $message->message }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->phone }}</td>
                                <td>{{ $message->created_at->diffForHumans() }}</td>
                                <td>
                                    
                                    <a title="Show" href="{{ route('messages.show' , $message->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a title="Delete" href="{{ route('messages.delete' , $message->id) }}" class="btn btn-danger btn-sm confirmDelete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
        

    </div>



@push('scripts')
<script>
    $(document).ready(function(){

        

        // Function To Get All Data ..
        function getAllData(){
            var url = $('#getAllComments').data('url');
            
            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'HTML',
                success : function(data){
                    $('#allDataHere').html(data);
                    $('#myTable').DataTable().ajax.reload;
                }
            });

        }

    


       


    });
</script>
@endpush



@endsection





