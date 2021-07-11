@extends('admin.layouts.app')

@section('content')

    <span id="getAllCourses" data-url="{{ route('courses.all') }}"></span>
    <span id="getAllCategories" data-url="{{ route('courses.all.categories') }}"></span>
    <span id="getAllClasses" data-url="{{ route('courses.all.classes') }}"></span>
    <span id="getSelectedCategory" data-url="{{ route('courses.selected.category') }}"></span>
    <span id="getSelectedClass" data-url="{{ route('courses.selected.class') }}"></span>
    <span id="getCourseCategoryName" data-url="{{ route('courses.category.name') }}"></span>
    <span id="getCourseClassName" data-url="{{ route('courses.class.name') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="fa fa-user-plus text-primary"></i> &nbsp;
                Courses
            </h5>
            <a style="float:right" href="" id="createCourseModalShow" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>
        </div>
        <div class="card-body" style="padding:10px">
            
            <div class="table table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $courses as $index=>$course )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img style="width:40px;height:40px;margin:0;padding:0" src="{{ asset($course->image) }}" alt="">
                                </td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->price }}</td>
                                <td>{{ $course->discount }}</td>
                                <td>{{ $course->created_at->diffForHumans() }}</td>
                                <td>
                                    <a title="Show" href="{{ route('courses.show') }}" class="btn btn-info btn-sm" id="show" data-id="{{ $course->id }}"  data-image="{{ asset($course->image) }}" ><i class="fa fa-eye"></i></a>
                                    <a title="Edit" href="{{ route('courses.edit') }}" class="btn btn-warning btn-sm" id="edit" data-id="{{ $course->id }}" data-active="{{ $course->active }}" data-image="{{ asset($course->image) }}" ><i class="fa fa-edit"></i></a>
                                    <a title="Delete" href="{{ route('courses.delete') }}" class="btn btn-danger btn-sm" id="delete" data-id="{{ $course->id }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('admin.courses.show')
        </div>


        
        @include('admin.courses.create')
        @include('admin.courses.edit')

        

    </div>



@push('scripts')
<script>
    $(document).ready(function(){

        // Function To Get All Data ..
        function getAllData(){
            var url = $('#getAllCourses').data('url');
            
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

        // Function To Get All Categories ...
        function getAllCategories()
        {
            var url = $('#getAllCategories').data('url');
            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'HTML',
                success : function(data){
                    $('#get_all_categories').html(data);
                }
            });
        }

        // Function To Get All Classes ..
        function getAllClasses()
        {
            var url = $('#getAllClasses').data('url');
            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'HTML',
                success : function(data){
                    $('#get_all_classes').html(data);
                }
            });
        }



        

        
        // Show Modal Create When Click On #createCourseModalShow
        $('#createCourseModalShow').click(function(e){
            e.preventDefault();

            $('#createCourseModal').modal('show');
            getAllCategories();
            getAllClasses();


        });

        // Store Course By AJAX ...
        $('#createCourseForm').submit(function(e){
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
                        $('#createCourseModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Course Created Successfully ♫'
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

        // Edit Course By AJAX ...
        $(document).on('click' , '#edit' , function(e){
            e.preventDefault();

            var url = $(this).attr('href');
            var id = $(this).data('id');
            var image = $(this).data('image');
            


            $('#editCourseModal').modal('show');
            $('#courseImage').attr('src' , image);
            getSelectedCategory(id);
            getSelectedClass(id);

            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){

                    $('#courseID').val(data.id);

                    $('#courseName').val(data.name);
                    $('#courseHours').val(data.hours);
                    $('#coursePrice').val(data.price);
                    $('#courseDiscount').val(data.discount);
                    $('#courseDesc').val(data.desc);
                    $('#courseRequirements').val(data.requirements);
                    
                    

                }
            });


        });

         // Show Course By AJAX ...
         $(document).on('click' , '#show' , function(e){
            e.preventDefault();

            var url = $(this).attr('href');
            var id = $(this).data('id');
            var image = $(this).data('image');
            
            
            $('#showCourseModal').modal('show');
            $('#showCourseImage').attr('src' , image);
            getCategoryName(id);
            getClassName(id);


            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){


                   $('#showCourseName').html(data.name);
                   $('#showCoursePrice').html(data.price);
                   $('#showCourseDiscount').html(data.discount);
                   $('#showCourseTotalPrice').html( data.price - data.discount );
                   $('#showCourseHours').html(data.hours);
                   $('#showCourseRequirements').html(data.requirements);
                   $('#showCourseDesc').html(data.desc);
                   

                }
            });


        });

        // Update Course By AJAX ...
        $('#editCourseForm').submit(function(e){
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
                        $('#editCourseModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Course Updated Successfully ♫'
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


        // Delete Course By Ajax ...
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
                                text: 'Admin Deleted Successfully ♫'
                            }).on('onShow', function() {
                                var audio = new Audio('{{ asset("sounds/success.mp3") }}');
                                audio.play();
                            }).show();


                        }
                    }); // End of Ajax Function ..
               }
            });

            

        });

        // Get Selected Category ...
        function getSelectedCategory(id)
        {
            var url = $('#getSelectedCategory').data('url');
            

            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'HTML',
                data : { id : id },
                success : function(data){
                    $('#get_all_categories_edit').html(data);
                    console.log(data);
                }
            });
            
        }

        // Get Selected Class ...
        function getSelectedClass(id)
        {
            var url = $('#getSelectedClass').data('url');
            

            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'HTML',
                data : { id : id },
                success : function(data){
                    $('#get_all_classes_edit').html(data);
                    console.log(data);
                }
            });
            
        }

        // Function To Get Category Name ...
        function getCategoryName(id)
        {
            var url = $('#getCourseCategoryName').data('url');
            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){
                    $('#showCourseCategoryName').html(data);
                }
            });
        }

        // Function To Get Class Name ..
        function getClassName(id)
        {
            var url = $('#getCourseClassName').data('url');
            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){
                    $('#showCourseClassName').html(data);
                }
            });

        }




    });
</script>
@endpush



@endsection





