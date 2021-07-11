@if( $setting->stop_website == 0 )
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Website Courses</title>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    
  </head>
  <body>

    <div class="scrollTop">
      <i class="fa fa-chevron-up fa-fw fa-2x"></i>
    </div>

    <div class="upperbar">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <i class="fa fa-envelope"></i> Email : {{ $setting->website_email }}
          </div>
          <div class="col-md-4">
            <i class="fa fa-phone"></i> Phone : {{ $setting->website_phone }}
          </div>
          <div class="col-md-4">
            <i class="fa fa-map-o"></i> City : {{ $setting->website_address }}
          </div>
        </div>
      </div>
    </div>
    <!-- Start Navbar -->
    @include('user.includes.navbar')

    @yield('content')

    @include('user.includes.footer')


    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/frontend.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
      $(document).ready(function(){
        @if( Session::has('success') )
          toastr.success('{{ Session::get("success") }}');
        @endif
        @if( Session::has('error') )
          toastr.error('{{ Session::get("error") }}');
        @endif
      });
    </script>
  </body>
</html>

@else
      Website Closed
@endif