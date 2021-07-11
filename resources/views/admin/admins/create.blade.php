
<!-- Modal Create -->
<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Erros Validation -->
        <div id="allErrorsHere" class="alert alert-danger" style="display:none">

        </div>  
        
        <form id="createAdminForm" action="{{ route('admins.create') }}" >

            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-4">
                    <img class="img-thumbnail image-preview" style="width:100%;height:220px" src="{{ asset('uploads/avatars/admin/default.png') }}" alt="">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input image" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Upload Image</label>
                      </div>
                    </div>
                </div>

                <div class="col-md-8">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" name="email" class="form-control">
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
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" class="form-control">
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