@extends('user.layouts.app')

@section('content')
  <div class="container">


      @if( $setting->stop_register == 0 )
      <form class="loginForm" action="{{ url('/doRegister') }}" method="POST" style="margin:30px auto;max-width:800px">
      {{ csrf_field() }}

      <h3 class="text-center" style="margin:0 0;color:#e9616d">Register Page</h3>
      @include('user.includes.messages')
      <br>

      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
          </div>
        </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="password">Confirm Password</label>
          <input type="password" name="confirm_password" class="form-control">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" name="address" value="{{ old('address') }}" class="form-control">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="number" name="phone" value="{{ old('phone') }}" class="form-control">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="age">Age</label>
          <input type="number" name="age" value="{{ old('age') }}" class="form-control">
        </div>
      </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="phone">Gender</label>
            <select class="form-control" name="gender">
              <option value="">Select Your Gender</option>
              <option value="0" >Male</option>
              <option value="1" >Female</option>
            </select>
          </div>
        </div>



        <div class="col-md-12">
          <div class="form-group">
            <select class="form-control" name="type">
              <option value="">Select Your Register Type</option>
              <option value="0"  >Student</option>
              <option value="1"  >Instructor</option>
            </select>
          </div>
        </div>




        </div>

      <div class="form-group">
        <button type="submit" class="btn btn-success btn-flat btn-block"><i class="fa fa-lock fa-fw fa-lg"></i> Register</button>
      </div>

    </form>
      @else
        <div class="alert alert-danger text-center" style="margin:40px;padding:40px;font-size:30px">
          The Registration Are Disabled Now From Adminstrator ...
        </div>
      @endif


  </div>
@endsection
