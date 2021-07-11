@extends('admin.layouts.app')

@section('content')

    <span id="getAllReservations" data-url="{{ route('reservations.all') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="far fa-eye text-primary"></i> &nbsp;
                {{ $reservation->course->name }}
            </h5>
            
        </div>
        <div class="card-body" style="padding:10px">
            
            
            <div class="row">

                <div class="col-md-5 text-center">
                    <img class="img-thumbnail" style="width:100%;height:420px" src="{{ asset($reservation->course->image) }}" alt="">
                </div>

                <div class="col-md-7" style="padding:10px">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h6> <i class="fa fa-user-graduate text-info"></i> <b class="text-danger">StudentName</b> : {{ $reservation->user->name }}</h6>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h6> <i class="fa fa-envelope text-info"></i> <b class="text-danger">StudentEmail</b> : {{ $reservation->user->email }}</h6>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <h6> <i class="fa fa-phone text-info"></i> <b class="text-danger">StudentPhone</b> : {{ $reservation->user->phone }}</h6>
                        </div>
                    </div>

                    <hr>


                    <div class="row">
                        <div class="col-md-12">
                            <h6> <i class="fas fa-map-marker-alt text-info"></i> <b class="text-danger">StudentAddress</b> : {{ $reservation->user->address }}</h6>
                        </div>
                    </div>



                    <hr>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <h6> <i class="fa fa-hand-holding-usd text-info"></i> <b class="text-danger">Price</b> : {{ $reservation->course->price }}</h6>
                        </div>
                        <div class="col-md-4">
                            <h6> <i class="fa fa-arrow-circle-down text-info"></i> <b class="text-danger">Discount</b> : {{ $reservation->course->discount }}</h6>
                        </div>
                        <div class="col-md-4">
                            <h6> <i class="fa fa-hand-holding-usd text-info"></i> <b class="text-danger">Total</b> : {{ $reservation->course->price - $reservation->course->discount }}</h6>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-4">
                            <h6> <i class="fa fa-history text-info"></i> <b class="text-danger">Hours</b> : {{ $reservation->course->hours }} H</h6>
                        </div>
                        <div class="col-md-8">
                            <h6> <i class="fa fa-reply-all text-info"></i> <b class="text-danger">Requirements</b> : {{ $reservation->course->requirements }}</h6>
                        </div>
                        
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h6> <i class="fas fa-tags text-info"></i> <b class="text-danger">Category</b> : {{ $reservation->course->category->name }} H</h6>
                        </div>
                        <div class="col-md-6">
                            <h6> <i class="fa fa-school text-info"></i> <b class="text-danger">Class</b> : {{ $reservation->course->class->name }}</h6>
                        </div>
                        
                    </div>

                    <hr>

                </div>

                <div class="col-md-12">
                    <div class="" style="background-color:#eee;padding:10px">
                        <h6 style="line-height:30px"> <i class="fa fa-school text-info"></i> <b class="text-danger">Description :- <br></b> : {{ $reservation->course->desc }}</h6>
                        <div class="text-center">
                            @if( $reservation->active == 0 )
                                <a href="{{ route('reservations.active' , $reservation->id) }}" class="btn btn-success confirmDelete"> <i class="fa fa-check"></i> Accept Reservation</a> &nbsp; &nbsp; &nbsp; &nbsp;
                            @endif
                            <a href="{{ route('reservations.delete' , $reservation->id) }}" class="btn btn-danger confirmDelete"> <i class="fa fa-trash"></i> Delete Reservation</a>
                        </div>
                    </div>
                </div>

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





