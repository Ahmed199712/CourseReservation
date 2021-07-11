
<!-- Modal Create -->
<div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Class</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Erros Validation -->
        <div id="allErrorsHereEdit" class="alert alert-danger" style="display:none">

        </div>  
        
        <form id="updateClassForm" action="{{ route('classes.update') }}" >

            {{ csrf_field() }}

            <input type="hidden" name="classID" id="classID">

            <div class="form-group">
                <label for="name">Number</label>
                <input type="number" id="classNumber" name="number" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="className" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Floors</label>
                <select name="floor_id" id="select_floor_edit" class="form-control">
                  
                </select>
            </div>

            

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-spin fa-spinner fa-lg fa-fw" style="display:none"></i>Update</button>
            </div>

        </form>
    </div>
  </div>
</div>