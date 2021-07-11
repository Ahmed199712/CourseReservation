@extends('admin.layouts.app')

@section('content')

    <span id="getAllComments" data-url="{{ route('comments.all') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="fa fa-comments text-primary"></i> &nbsp;
                Comments
            </h5>
            
        </div>
        <div class="card-body" style="padding:10px">
            
            <div class="table table-responsive" id="allDataHere">
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
                                <td>{{ $comment->comment }}</td>
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

    

        // Store Comment By AJAX ...
        $('#createCategoryForm').submit(function(e){
            e.preventDefault();

            var url = $(this).attr('action');
            var form = $(this);

            $.ajax({
                url : url ,
                type : 'POST',
                dataType : 'JSON',
                processData : false,
                contentType : false,
                data : new FormData(this),
                beforeSend : function(){
                    $('.fa-spinner').css('display','inline-block');
                    $('.fa-spinner').parent().attr('disabled' , 'true');
                },
                success : function(data){
                    if( $.isEmptyObject(data.errors) ){
                        getAllData();
                        $('#createCategoryModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Category Created Successfully ♫'
                        }).on('onShow', function() {
                            var audio = new Audio('{{ asset("sounds/success.mp3") }}');
                            audio.play();
                        }).show();

                        $('#allErrorsHere').fadeOut();
                        $('.fa-spinner').css('display','none');
                        $('.fa-spinner').parent().attr('disabled' , false);

                    }else{

                        $('.fa-spinner').css('display','none');
                        $('.fa-spinner').parent().attr('disabled' , false);

                        var errors = data.errors;
                        
                        $('#allErrorsHere').empty();
                        errors.forEach(function(value){
                            $('#allErrorsHere').fadeIn();
                            $('#allErrorsHere').append('<span>'+value+'</span><br />');
                        });
                    }
                }
            });

            
        });

        // Edit Category By AJAX ...
        $(document).on('click' , '#active' , function(e){
            e.preventDefault();

            var url = $(this).attr('href');
            var id = $(this).data('id');
            

            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){

                    getAllData();
                    new Noty({
                        type: 'success',
                        layout: 'topRight',
                        theme : 'mint',
                        timeout : 3000,
                        progressBar : true,
                        text: 'Comment Actived Successfully ♫'
                    }).on('onShow', function() {
                        var audio = new Audio('{{ asset("sounds/success.mp3") }}');
                        audio.play();
                    }).show();

                }
            });


        });

        // Delete Category By Ajax ...
        $(document).on('click' , '#delete' , function(e){
            e.preventDefault();

            var id = $(this).data('id');
            var url = $(this).attr('href');

            swal({
             title: "Are you sure?",
             text: "Delete Record",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
            .then((willDelete) => {
               if (willDelete) {
                     $.ajax({
                        url : url ,
                        type : 'GET',
                        dataType : 'JSON',
                        data : { id : id },
                        success : function(data){


                            getAllData();
                            new Noty({
                                type: 'success',
                                layout: 'topRight',
                                theme : 'mint',
                                timeout : 3000,
                                progressBar : true,
                                text: 'Comment Deleted Successfully ♫'
                            }).on('onShow', function() {
                                var audio = new Audio('{{ asset("sounds/success.mp3") }}');
                                audio.play();
                            }).show();


                        }
                    }); // End of Ajax Function ..
               }
            });

            

        });



    });
</script>
@endpush



@endsection





