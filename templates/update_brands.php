<!-- Modal -->
<div class="modal fade" id="update_brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Brands</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_brand_form" onsubmit="return false">
  <div class="form-group">
    <input type="hidden" id="bid" name="bid" />
    <label for="category">Brand</label>
    <input type="text" class="form-control" id="update_brand_name"  name = "update_brand_name" placeholder="Enter Brands">
    <small id="e_error" class="form-text text-muted"></small>
  </div>

  

  <button type="submit" class="btn btn-primary">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>