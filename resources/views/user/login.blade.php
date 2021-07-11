@extends('user.layouts.app')

@section('content')
  <div class="container">


    <form class="loginForm" action="{{ url('/doLogin') }}" method="POST" style="margin:30px auto;max-width:400px">
      {{ csrf_field() }}

      <h3 class="text-center" style="margin:20px 0;color:#e9616d">Login Page</h3>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control">
      </div>

      <a href="{{ route('password.request') }}">Forgot Password</a>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-sign-in fa-fw fa-lg"></i> LogIn</button>
      </div>

    </form>
  </div>
@endsection
