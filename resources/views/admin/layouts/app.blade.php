<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Course Center</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">



  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <!-- For RTL -->

  <!-- 
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/RTL/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/RTL/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/RTL/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/RTL/custom-style.css') }}">

    
  .nav-sidebar .nav-item > .nav-link
  {
    direction: rtl;
  }
  -->



  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">

  
  <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/noty.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mint.css') }}">
  <link rel="stylesheet" href="{{ asset('css/back.css') }}">

  <style>
    .btn , .form-control
    {
      border-radius : 0
    }
    *
    {
      font-family: 'Poppins', sans-serif;
    }
  </style>

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">





  <!-- Navbar -->
  @include('admin.includes.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.includes.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        

        @yield('content')
        
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('admin.includes.footer')

 





</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminlte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('adminlte/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>


<!-- Custom Plugins -->
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('js/jquery.countTo.js')}}"></script>
<script src="{{ asset('js/noty.js')}}"></script>
<script src="{{ asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
<script src="{{ asset('js/back.js')}}"></script>

<script>
    $(document).ready(function(){
      

      @if( Session::has('successLogin') )
        new Noty({
          type: 'success',
          layout: 'topRight',
          theme : 'mint',
          timeout : 3000,
          progressBar : true,
          text: '{{ Session::get("successLogin") }}'
        }).on('onShow', function() {
            var audio = new Audio('{{ asset("sounds/welcome.mp3") }}');
            audio.play();
        }).show();
      @endif


      @if( Session::has('success') )
        new Noty({
          type: 'success',
          layout: 'topRight',
          theme : 'mint',
          timeout : 3000,
          progressBar : true,
          text: '{{ Session::get("success") }}'
        }).on('onShow', function() {
            var audio = new Audio('{{ asset("sounds/success.mp3") }}');
            audio.play();
        }).show();
      @endif





    });
</script>

@stack('scripts')

</body>
</html>
