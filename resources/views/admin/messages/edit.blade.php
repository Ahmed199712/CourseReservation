
<!-- Modal Create -->

<div class="modal fade" id="editCategoryModal" tabindex="-2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Erros Validation -->
        <div id="allErrorsHereEdit" class="alert alert-danger" style="display:none">

        </div>  
        
        <form id="updateCategoryForm" action="{{ route('categories.update') }}" >

            {{ csrf_field() }}

            <input type="hidden" name="categoryID" id="categoryID">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="categoryName" name="name" class="form-control">
            </div>

            

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success"> <i class="fa fa-spin fa-spinner fa-lg fa-fw" style="display:none"></i> Update</button>
            </div>

        </form>
    </div>
  </div>
</div>


