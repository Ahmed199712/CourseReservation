
<!-- Modal Create -->
<div class="modal fade" id="createCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Erros Validation -->
        <div id="allErrorsHere" class="alert alert-danger" style="display:none">

        </div>  
        
        <form id="createCourseForm" action="{{ route('courses.create') }}" >

            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-4">
                    <img class="img-thumbnail image-preview" style="width:100%;height:220px" src="{{ asset('uploads/courses/default.jpg') }}" alt="">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Upload Image</label>
                      </div>
                    </div>
                </div>

                <div class="col-md-8">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Course Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="hours" class="form-control" placeholder="Course Duration ( Hours )">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="price" class="form-control" placeholder="Course Price">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" name="discount" value="0" class="form-control" placeholder="Course Discount">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="category_id" id="get_all_categories" class="form-control">
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="class_id" id="get_all_classes" class="form-control">
                                    
                                </select>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="desc" id="desc" style="min-height:98px" class="form-control" placeholder="Course Description"></textarea>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="active" class="form-control">
                                    <option value="">Select Active ...</option>
                                    <option value="0">Active</option>
                                    <option value="1">Non-Active</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="requirements" class="form-control" placeholder="Course Requirements">
                            </div>
                        </div>

                        

                    </div>

                </div>


            </div>
            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-spin fa-spinner fa-lg fa-fw" style="display:none"></i> Save changes</button>
            </div>

        </form>
    </div>
  </div>
</div>