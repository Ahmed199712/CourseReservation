@extends('admin.layouts.app')

@section('content')

    <span id="getAllClasses" data-url="{{ route('classes.all') }}"></span>
    <span id="getAllFloors" data-url="{{ route('classes.all.floors') }}"></span>
    <span id="getSelectedFloors" data-url="{{ route('classes.selected.floors') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="fa fa-building text-primary"></i> &nbsp;
                Classes
            </h5>
            <a style="float:right" href="" class="btn btn-primary btn-sm" id="showClassModal"><i class="fa fa-plus"></i> Add New</a>
        </div>
        <div class="card-body" style="padding:10px">
            
            <div class="table table-responsive" id="allDataHere">
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
            </div>

            
            @include('admin.classes.create')

        </div>


        
        @include('admin.classes.edit')
        

    </div>



@push('scripts')
<script>
    $(document).ready(function(){

        // Function To Get All Data ..
        function getAllData(){
            var url = $('#getAllClasses').data('url');
            
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

        // Function To Get All Floors ..
        function getAllFloors()
        {
            var url = $('#getAllFloors').data('url');

            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'HTML',
                success : function(data){
                    $('#select_floor_create').html(data);
                }
            });

        }

        
        // Show Create Modal When Click On Add New ..
        $('#showClassModal').click(function(e){
            e.preventDefault();

            $('#createClassModal').modal('show');

            // Load Floors
            getAllFloors();

            

        });

        // Store Floor By AJAX ...
        $('#createClassForm').submit(function(e){
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
                        $('#createClassModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Class Created Successfully ♫'
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
        $(document).on('click' , '#edit' , function(e){
            e.preventDefault();

            var url = $(this).attr('href');
            var id = $(this).data('id');
            var classID = $(this).data('id');

            $('#editClassModal').modal('show');
            // Fill Select Box with Selected Floor ..
            getSelectedFloor(classID);

           
            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){

                    

                    $('#classID').val(data.id);
                    $('#classNumber').val(data.number);
                    $('#className').val(data.name);

                    

                }
            });


        });

        // Update Category By AJAX ...
        $('#updateClassForm').submit(function(e){
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
                        $('#editClassModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Class Updated Successfully ♫'
                        }).on('onShow', function() {
                            var audio = new Audio('{{ asset("sounds/success.mp3") }}');
                            audio.play();
                        }).show();

                        $('#allErrorsHereEdit').fadeOut();
                        $('.fa-spinner').css('display','none');
                        $('.fa-spinner').parent().attr('disabled' , false);

                    }else{

                        $('.fa-spinner').css('display','none');
                        $('.fa-spinner').parent().attr('disabled' , false);

                        var errors = data.errors;
                        
                        $('#allErrorsHereEdit').empty();
                        errors.forEach(function(value){
                            $('#allErrorsHereEdit').fadeIn();
                            $('#allErrorsHereEdit').append('<span>'+value+'</span><br />');
                        });
                    }
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
                                text: 'Class Deleted Successfully ♫'
                            }).on('onShow', function() {
                                var audio = new Audio('{{ asset("sounds/success.mp3") }}');
                                audio.play();
                            }).show();


                        }
                    }); // End of Ajax Function ..
               }
            });

            

        });


        // Function To Get Selected Floor...
        function getSelectedFloor(classID)
        {
            var url = $('#getSelectedFloors').data('url');
            var classID = classID;

            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'HTML',
                data : { classID : classID },
                success : function(data){
                    $('#select_floor_edit').html(data);
                    console.log(data);
                }
            });
            
        }



    });
</script>
@endpush



@endsection





