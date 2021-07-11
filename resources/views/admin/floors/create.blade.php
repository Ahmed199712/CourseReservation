
<!-- Modal Create -->
<div class="modal fade" id="createFloorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Floor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Erros Validation -->
        <div id="allErrorsHere" class="alert alert-danger" style="display:none">

        </div>  
        
        <form id="createFloorForm" action="{{ route('floors.create') }}" >

            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Number</label>
                <input type="number" name="number" class="form-control">
            </div>

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> <i class="fa fa-spin fa-spinner fa-lg fa-fw" style="display:none"></i> Save changes</button>
            </div>

        </form>
    </div>
  </div>
</div>