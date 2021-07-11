@extends('admin.layouts.app')

@section('content')

    <span id="getAllFloors" data-url="{{ route('floors.all') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="fa fa-building text-primary"></i> &nbsp;
                Floors
            </h5>
            <a style="float:right" href="" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#createFloorModal"><i class="fa fa-plus"></i> Add New</a>
        </div>
        <div class="card-body" style="padding:10px">
            
            <div class="table table-responsive" id="allDataHere">
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
            </div>

            @include('admin.floors.create')

        </div>


        
        @include('admin.floors.edit')

        

    </div>



@push('scripts')
<script>
    $(document).ready(function(){

        // Function To Get All Data ..
        function getAllData(){
            var url = $('#getAllFloors').data('url');
            
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

    

        // Store Floor By AJAX ...
        $('#createFloorForm').submit(function(e){
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
                        $('#createFloorModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Floor Created Successfully ♫'
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
            $('#editFloorModal').modal('show');
            

            $.ajax({
                url : url ,
                type : 'GET',
                dataType : 'JSON',
                data : { id : id },
                success : function(data){

                    

                    $('#floorID').val(data.id);
                    $('#floorNumber').val(data.number);
                    $('#floorName').val(data.name);

                    

                }
            });


        });

        // Update Category By AJAX ...
        $('#updateFloorForm').submit(function(e){
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
                        $('#editFloorModal').modal('hide');
                        form[0].reset();
                        
                        new Noty({
                            type: 'success',
                            layout: 'topRight',
                            theme : 'mint',
                            timeout : 3000,
                            progressBar : true,
                            text: 'Floor Updated Successfully ♫'
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
                                text: 'Floor Deleted Successfully ♫'
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





