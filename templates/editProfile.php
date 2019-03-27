<!-- Modal -->
<div class="modal fade" id="edit_Profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form id="edit_form" onsubmit="return false" autocomplete="off">
         
           <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="edit_name" name="edit_name" value='<?php echo $_SESSION["username"] ?>' >
    <small id="en_error" class="form-text text-muted"></small>
  </div>
         
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="edit_email" name="edit_email" value='<?php echo $_SESSION["emailUpdate"] ?>'  readonly >
    <small id="e_error" class="form-text text-muted"></small>
  </div>
   <div class="form-group">
    <label for="text">Phone no.:</label>
    <input type="text" class="form-control" id="edit_phno" name="edit_phno" value='<?php echo $_SESSION["phoneNumber"] ?>'>
    <small id="eph_error" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="edit_pwd" name="edit_pwd">
    <small id="ep_error" class="form-text text-muted"></small>
  </div>

         
<input type="hidden" id="userId"  name="userid" value='<?php echo  $_SESSION["userid"]?>' >
  

  <button type="submit" class="btn btn-primary">Update</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>