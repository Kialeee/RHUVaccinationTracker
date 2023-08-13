<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add New Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST" action="../php_components/addAdministrator.php">
            <div class="mb-3 row">
                <?php  
                    $admin_id = mt_rand(1000000000, 9999999999);
                ?>
                <input type="hidden" name="admin_id" value="<?php echo $admin_id; ?>" class="form-control"> <br>

            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Firstname</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="fname" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Middlename</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mname">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Lastname</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="lname" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="age" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                    <select class="form-select" name="gender">
                      <option selected>Select Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nationality" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Province</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="province" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="city" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Barangay</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="barangay" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Sitio</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="sitio" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="password" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Save</a>
        </form>
      </div>
    </div>
  </div>
</div>