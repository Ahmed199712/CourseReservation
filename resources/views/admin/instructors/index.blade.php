@extends('admin.layouts.app')

@section('content')

    <span id="getAllInstructor" data-url="{{ route('instructors.all') }}"></span>
    <span id="getSelectedGender" data-url="{{ route('instructors.selected.gender') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="fa fa-chalkboard-teacher text-primary"></i> &nbsp;
                Instructors / Coach
            </h5>
            <a style="float:right" href="" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#createInstructorModal"><i class="fa fa-plus"></i> Add New</a>
        </div>
        <div class="card-body" style="padding:10px">
            
            <div class="table table-responsive" id="allDataHere">
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
                </table>
            </div>

        </div>


        @include('admin.instructors.create')
        @include('admin.instructors.edit')
        @include('admin.instructors.show')
        

    </div>



@push('scripts')
<script>
    $(document).ready(function(){

        // Function To Get All Data ..
        function getAllData(){
            var url = $('#getAllInstructor').data('url');
            
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

    

        // Store Admin By AJAX ...
        $('#createInstructorForm').submit(function(e){
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
                        $('#createInstructorModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Instructor Created Successfully ♫'
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



        // Edit Admin By AJAX ...
        $(document).on('click' , '#edit' , function(e){
            e.preventDefault();

            var url = $(this).attr('href');
            var id = $(this).data('id');
            var image = $(this).data('image');

            $('#editInstructorModal').modal('show');
            $('#studentAvatar').attr('src' , image);
            getSelectedGender(id);

            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){

                    $('#instructorID').val(data.id);
                    $('#studentName').val(data.name);
                    $('#studentEmail').val(data.email);
                    $('#studentPhone').val(data.phone);
                    $('#studentAge').val(data.age);
                    $('#studentAddress').val(data.address);
                    

                }
            });


        });

        // Update Admin By AJAX ...
        $('#editInstructorForm').submit(function(e){
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
                        $('#editInstructorModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Instructor Updated Successfully ♫'
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

        // Show Student By AJAX ...
        $(document).on('click' , '#show' , function(e){
            e.preventDefault();

            var url = $(this).attr('href');
            var id = $(this).data('id');
            var image = $(this).data('image');
            
            
            $('#showStudentModal').modal('show');
            $('#showStudentImage').attr('src' , image);


            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){


                   $('#showStudentName').html(data.name);
                   $('#showStudentEmail').html(data.email);
                   $('#showStudentPhone').html(data.phone);
                   $('#showStudentAddress').html( data.address);
                   $('#showStudentAge').html(data.age);
                   $('#showStudentGender').html( data.gender == 0 ? 'Male' : 'Female' );
                   

                }
            });


        });


        // Delete Admins By Ajax ...
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
                                text: 'Instructor Deleted Successfully ♫'
                            }).on('onShow', function() {
                                var audio = new Audio('{{ asset("sounds/success.mp3") }}');
                                audio.play();
                            }).show();


                        }
                    }); // End of Ajax Function ..
               }
            });

            

        });

        // Function To Get Selected Gender ..
        function getSelectedGender(id){
            url = $('#getSelectedGender').data('url');
            
            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'HTML',
                data : { id : id },
                success : function(data){
                    $('#get_selected_gender').html(data);
                }
            });

        }

        



    });
</script>
@endpush



@endsection





