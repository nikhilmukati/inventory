<!-- Modal -->
<div class="modal fade" id="products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="update_products_form" onsubmit="return false">
  <div class="form-row" >
    <div class="form-group col-md-6">
      <input type="hidden" id="pid" name = "pid" />
      <label for="inputEmail4">Date</label>
      <input type="text" class="form-control" name="added_date" id="added_date" value="<?php echo date("Y-m-d");?>" readonly />
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Product Name</label>
      <input type="text" class="form-control" id="update_product_name" name ="update_product_name" placeholder="Enter Product Name">
      <small id="n_error" class="form-text text-muted"></small>
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputAddress">Category</label>
    <select id="parent_category" name="parent_category" class="form-control">
      

    </select>
  </div>

    <div class="form-group" class="form-control">
    <label for="inputAddress">Brands</label>
    <select id="Brand_option" class="form-control" name="Brand_option">
      
      
    </select>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Product Price</label>
    <input type="text" class="form-control" id="update_product_price" name="update_product_price">
    <small id="p_error" class="form-text text-muted"></small>
  </div>
  
   <div class="form-group">
    <label for="inputAddress2">Quantity</label>
    <input type="text" class="form-control" id="update_product_quantity" name="update_product_quantity">
     <small id="q_error" class="form-text text-muted"></small>
  </div>
 
  <button type="submit" class="btn btn-primary">Update Products</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>