@extends('admin.layouts.app')

@section('content')

    <span id="getAllMessages" data-url="{{ route('messages.all') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="fa fa-envelope text-primary"></i> &nbsp;
                Show Message
            </h5>
            
        </div>
        <div class="card-body" style="padding:10px">
            
           <ul class="list-group">
                <li class="list-group-item"> <i class="fa fa-user fa-fw"></i> &nbsp; Name : {{ $message->name }}</li>
                <li class="list-group-item"> <i class="fa fa-envelope fa-fw"></i> &nbsp; Email : {{ $message->email }}</li>
                <li class="list-group-item"> <i class="fa fa-phone fa-fw"></i> &nbsp; Phone : {{ $message->phone }}</li>
                <li class="list-group-item"> <i class="fa fa-info fa-fw"></i> &nbsp; Subject : {{ $message->subject }}</li>
                <li class="list-group-item"> <i class="fa fa-comment-dots fa-fw"></i> &nbsp; Message : {{ $message->message }}</li>
                <li class="list-group-item"> <i class="far fa-calendar fa-fw"></i> &nbsp; Date : {{ $message->created_at->diffForHumans() }}</li>
                <li class="list-group-item">  <a href="{{ route('messages.delete',$message->id) }}" class="btn btn-danger confirmDelete"> <i class="fa fa-trash fa-fw"></i> Delete Message</a> </li>
           </ul>

        </div>
        

    </div>



@push('scripts')
<script>
    $(document).ready(function(){

       
     

    });
</script>
@endpush



@endsection





