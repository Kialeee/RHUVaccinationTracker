<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Update Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../php_components/editAdminAction.php?id=<?php echo $row['id']; ?>">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Firstname</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="fname" value="<?php echo $row['fname']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Middlename</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mname" value="<?php echo $row['mname']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Lastname</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lname" value="<?php echo $row['lname']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="age" value="<?php echo $row['age']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="gender" value="<?php echo $row['gender']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Province</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="province" value="<?php echo $row['province']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="city" value="<?php echo $row['city']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Barangay</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="barangay" value="<?php echo $row['barangay']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Sitio</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sitio" value="<?php echo $row['sitio']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                </div>
            </div>
                  <input type="hidden" name="date" value="<?php echo $date; ?>" class="form-control"> <br>

                  <script type="text/javascript">
                    $(document).ready(function(){
                      var today = moment().format('YYYY-MM-DD HH:mm:ss');
                      $('#date').val(today);
                     // alert($('#date').val());
                    });
                  </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Update</a>
        </form>
      </div>
    </div>
  </div>
</div>
 
<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Delete Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p class="text-center">Are you sure you want to DELETE</p>
            <h2 class="text-center"><?php echo 'Admin: '.$row['fname'].' '.$row['mname'].' '.$row['lname'].'?'; ?></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="../php_components/deleteAdminAction.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Yes</a>
      </div>
    </div>
  </div>
</div>