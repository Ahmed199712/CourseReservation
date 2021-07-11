@extends('admin.layouts.app')

@section('content')

    <span id="getAllCourses" data-url="{{ route('courses.all') }}"></span>
    <span id="getAllCategories" data-url="{{ route('courses.all.categories') }}"></span>
    <span id="getAllClasses" data-url="{{ route('courses.all.classes') }}"></span>
    <span id="getSelectedCategory" data-url="{{ route('courses.selected.category') }}"></span>
    <span id="getSelectedClass" data-url="{{ route('courses.selected.class') }}"></span>
    <span id="getCourseCategoryName" data-url="{{ route('courses.category.name') }}"></span>
    <span id="getCourseClassName" data-url="{{ route('courses.class.name') }}"></span>

    <div style="padding:5px 0"></div>
    
    <div class="card" style="border-top:4px solid #007bff">
        <div class="card-header">
            <h5 style="margin:0;display:inline">
                <i class="fa fa-cogs text-primary"></i> &nbsp;
                Settings
            </h5>
            
        </div>
        <div class="card-body" style="padding:10px">
            
            <div class="row text-center">
                <div class="col-md-4">
                    <h6><i class="fa fa-comments text-success"></i> Comments</h6>
                    <a href="{{ route('admin.stop_comments') }}" class="btn  {{ $settings->stop_comments == 0 ? 'btn-danger' : 'btn-success' }} "> <i class="fa {{ $settings->stop_comments == 0 ? 'fa-times-circle' : 'fa-lock-open' }} fa-fw"></i> {{ $settings->stop_comments == 0 ? 'Stop Comments' : 'Open Comments' }}</a>
                </div>
                
                <div class="col-md-4">
                <h6><i class="fa fa-lock text-success"></i> Register</h6>
                    <a href="{{ route('admin.stop_register') }}" class="btn {{ $settings->stop_register == 0 ? 'btn-danger' : 'btn-success' }}"><i class="fa {{ $settings->stop_register == 0 ? 'fa-times-circle' : 'fa-lock-open' }} fa-fw"></i>  {{ $settings->stop_register == 0 ? 'Stop Register' : 'Open Register' }} </a>
                </div>

                <div class="col-md-4">
                    <h6><i class="fa fa-allergies text-success"></i> Website</h6>
                    <a href="{{ route('admin.stop_website') }}" class="btn {{ $settings->stop_website == 0 ? 'btn-danger' : 'btn-success' }}"><i class="fa {{ $settings->stop_website == 0 ? 'fa-times-circle' : 'fa-lock-open' }} fa-fw"></i> {{ $settings->stop_website == 0 ? 'Stop Website' : 'Open Website' }} </a>
                </div>
            </div>

        <hr>

                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include('admin.includes.messages')

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Website Name</label>
                                <input type="text" name="website_name" value="{{ $settings->website_name }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Website Email</label>
                                <input type="email" name="website_email" value="{{ $settings->website_email }}" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Website Phone</label>
                                <input type="number" name="website_phone" value="{{ $settings->website_phone}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Website Address</label>
                                <input type="text" name="website_address" value="{{ $settings->website_address }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="">Website Description</label>
                                <textarea name="website_desc" id="" rows="6" class="form-control"> {{ $settings->website_desc }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Website Logo</label>
                                
                                <img class="img-thumbnail image-preview" style="width:100%;height:121px" src="{{ asset($settings->website_logo) }}" alt="">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="website_logo" class="custom-file-input image" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Upload</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-info btn-block"> <i class="fa fa-retweet"></i> Save Settings</button>

                </form>


        </div>



    </div>



@push('scripts')
<script>
    $(document).ready(function(){






    });
</script>
@endpush



@endsection





