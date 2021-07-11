<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/noty.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mint.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

  <style>
      .btn , .form-control
      {
          border-radius:0
      }

      *
      {
        font-family: 'Poppins', sans-serif;
      }
  </style>
  

</head>
<body class="hold-transition login-page" >
<div class="login-box">

<div class="getLoginURL" data-url="{{ route('admin.doLogin') }}"></div>
  
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body"  style="border-top:5px solid #007bff">
    
      <h5 style="margin:0;margin-bottom:10px" class="text-center">Reset Password</h5>
      <p class="login-box-msg">
          
        
      </p>

      <form id="adminLoginForm" action="{{ route('admin.forgot_password_post') }}" method="post">

        {{ csrf_field() }}


        @include('admin.includes.messages')
        
        @if( session()->has('success') )
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif

        <div class="input-group mb-3">
          <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-sync"></i> Reset</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      <p class="mb-1">
          <br>
        <a href="{{ route('admin.login') }}">Login</a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>

<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('js/back.js')}}"></script>
<script src="{{ asset('js/noty.js')}}"></script>

<script>
  @if( Session::has('successLogout') )
        new Noty({
          type: 'success',
          layout: 'topRight',
          theme : 'mint',
          timeout : 3000,
          progressBar : true,
          text: '{{ Session::get("successLogout") }}'
        }).on('onShow', function() {
            var audio = new Audio('{{ asset("sounds/success.mp3") }}');
            audio.play();
        }).show();
      @endif
</script>

</body>
</html>
