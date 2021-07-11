@extends('user.layouts.app')

@section('content')
  <div class="container">

      <h3 class="text-center" style="margin:20px 0;color:#e9616d">Contact US</h3>

      <form class="" action="{{ route('user.message') }}" method="POST" style="margin:auto;max-width:600px">
        {{ csrf_field() }}

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
                  <label for="phone">Phone</label>
                  <input type="number" name="phone" value="{{ old('phone') }}" class="form-control">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="subject" name="subject" value="{{ old('subject') }}" class="form-control">
                </div>
              </div>

            </div>

            <div class="form-group">
              <label for="subject">Message</label>
              <textarea name="message" rows="6" cols="+0" class="form-control">{{ old('message') }}</textarea>
            </div>


        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-flat btn-block"><i class="fa fa-send fa-fw fa-lg"></i> Send Message</button>
        </div>

      </form>


  </div>
@endsection
