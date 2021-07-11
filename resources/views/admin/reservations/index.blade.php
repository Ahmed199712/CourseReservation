@extends('admin.layouts.app')

@section('content')

    <span id="getAllReservations" data-url="{{ route('reservations.all') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="far fa-handshake text-primary"></i> &nbsp;
                Reservations
            </h5>
            
        </div>
        <div class="card-body" style="padding:10px">
            
            <div class="table table-responsive" id="allDataHere">
                <table id="myTable" class="table table-hover table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Course</th>
                            <th>Student</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $reservations as $index=>$reservation )
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img style="width:30px;height:30px" src="{{ asset($reservation->course->image) }}" alt="">
                                </td>
                                <td>{{ $reservation->course->name }}</td>
                                <td>{{ $reservation->user->email }}</td>
                                <td>{{ $reservation->created_at->diffForHumans() }}</td>
                                <td>
                                    <a title="Show" href="{{ route('reservations.show' , $reservation->id) }}" class="btn btn-info btn-sm" id="show" data-id="{{ $reservation->id }}" ><i class="fa fa-eye"></i></a>
                                    <a title="Delete" href="{{ route('reservations.delete' , $reservation->id) }}" class="btn btn-danger btn-sm confirmDelete" id="delete" data-id="{{ $reservation->id }}"><i class="fa fa-trash"></i></a>
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


        



    });
</script>
@endpush



@endsection





