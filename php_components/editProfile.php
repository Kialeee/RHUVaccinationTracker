<?php
include_once('connection2.php');

try {
    // Connect to the database
    $database = new Connection();
    $db = $database->open();

    // Prepare the SQL statement
    $stmt = $db->prepare("SELECT * FROM records WHERE user_id = :user_id");

    // Bind the parameter to the placeholders in the prepared statement
    $stmt->bindParam(':user_id', $user_data['user_id']);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the results
    $row = $stmt->fetch();
} catch (PDOException $e) {
    // Handle exception
}
?>
<style>
    #inputField {
        width: 341px;
    }
    .col-form-label {
        padding-left: 20px;
        padding-top: 15px;
    }
</style>
<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $user_data['user_id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Update Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../php_components/editProfileAction.php?id=<?php echo $row['id']; ?>">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Firstname</label>
                <div class="col-sm-9">
                    <input type="text" disabled id="inputField" class="form-control" name="fname" value="<?php echo $row['fname']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Middlename</label>
                <div class="col-sm-9">
                    <input type="text" disabled id="inputField" class="form-control" name="mname" value="<?php echo $row['mname']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Lastname</label>
                <div class="col-sm-9">
                    <input type="text" disabled id="inputField" class="form-control" name="lname" value="<?php echo $row['lname']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-9">
                    <input type="text" disabled id="inputField" class="form-control" name="age" value="<?php echo $row['age']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                    <select id="inputField" disabled class="form-select" name="gender">
                      <option selected><?php echo $row['gender']; ?></option>
                      <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Nationality</label>
                <div class="col-sm-9">
                    <input type="text" disabled id="inputField" class="form-control" name="nationality" value="<?php echo $row['nationality']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Province</label>
                <div class="col-sm-9">
                    <input type="text" id="inputField" id="inputField" class="form-control" name="province" value="<?php echo $row['province']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                    <input type="text" id="inputField" class="form-control" name="city" value="<?php echo $row['city']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Barangay</label>
                <div class="col-sm-9">
                    <input type="text" id="inputField" class="form-control" name="barangay" value="<?php echo $row['barangay']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Sitio</label>
                <div class="col-sm-9">
                    <input type="text" id="inputField" class="form-control" name="sitio" value="<?php echo $row['sitio']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                    <input type="text" id="inputField" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9" style="display: flex;">
                    <input type="password" id="password" class="form-control" name="password" value="<?php echo $row['password']; ?>" />
                    <i class="bx bx-lock password-lock" style="padding: 12px 0 0 10px;" aria-hidden="true" onclick="showPassword()"></i>  
                </div>
                <script>
                  function showPassword() {
                      var x = document.getElementById("password");
                      var y = document.getElementsByClassName("password-lock")[0];
                      if (x.type === "password") {
                          x.type = "text";
                          y.classList.remove("bx-lock");
                          y.classList.add("bx-lock-open");
                      } else {
                          x.type = "password";
                          y.classList.remove("bx-lock-open");
                          y.classList.add("bx-lock");
                      }
                  }
              </script>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Update</a>
        </form>
      </div>
    </div>
  </div>
</div>