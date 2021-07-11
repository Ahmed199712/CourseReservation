
<!-- Modal Create -->
<div class="modal fade" id="editAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Erros Validation -->
        <div id="allErrorsHereEdit" class="alert alert-danger" style="display:none">

        </div>  
        
        <form id="updateAdminForm" action="{{ route('admins.update') }}" >

            {{ csrf_field() }}

            <input type="hidden" name="adminID" id="adminID">

            <div class="row">

                <div class="col-md-4">
                    <img class="img-thumbnail image-preview" id="adminAvatar" style="width:100%;height:220px" alt="">
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
                                <input type="text" name="name" id="adminName" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="text" name="email" id="adminEmail" class="form-control">
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
                                <input type="number" name="phone" id="adminPhone" class="form-control">
                            </div>
                        </div>

                    </div>

                </div>


            </div>
            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-spin fa-spinner fa-lg fa-fw" style="display:none"></i> Update</button>
            </div>

        </form>
    </div>
  </div>
</div>