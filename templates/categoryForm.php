<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Categories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="category_form" onsubmit="return false">
  <div class="form-group">
    <label for="category">Category</label>
    <input type="text" class="form-control" id="category_name"  name = "category_name" placeholder="Enter category">
    <small id="e_error" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Parent Category</label>
    <select class="form-control" id="parent_category" name = "parent_category">
      <option value = "0">Root</option>

    </select>
  </div>

  <button type="submit" class="btn btn-primary">Add</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>