@extends('user.layouts.app')

@section('content')
  <div class="container courses">
      <h3 class="text-center" style="margin:20px 0;color:#e9616d">My Profile</h3>

    <form action="{{ route('user.update.profile') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        

        <div class="row">

            
                <div class="col-md-5">
                    <img class="img-thumbnail image-preview" style="width:100%;height:350px" src="{{ $user->avatar }}" alt="">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="avatar" class="custom-file-input image" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Upload Image</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    
                @include('user.includes.messages')

                    <div class="row">
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">FullName</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="number" name="phone" value="{{ $user->phone }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="number" name="age" value="{{ $user->age }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="0" {{ $user->gender == 0 ? 'selected' : '' }} >Male</option>
                                    <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block"> <i class="fa fa-pencil"></i> Update Profile</button>
                            </div>
                        </div>



                    </div>
                    

                </div>
        </div>
    </form>        
      

  </div>
@endsection
