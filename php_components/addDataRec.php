<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add New Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST" action="../php_components/addRecord.php">
                <?php  
                    $user_id = mt_rand(1000000000, 9999999999);
                ?>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" class="form-control">

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
            <div class="form-group row">
                <div class="col-sm-6">
                    <label class="col-form-label">Birthdate</label>
                        <input type="date" class="form-control" name="birthdate" required>
                </div>
                <div class="col-sm-6">
                    <label class="col-form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div><br>
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
            <div class="mb-4 row">
                <label class="col-sm-3 col-form-label">City/Municipality</label>
                <div class="col-sm-8" style="margin-left: 40px;">
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
            <div>
                <h4 align="center">Vaccines Taken at RHU's</h4>
            </div>
            <div id="vaccines">
            </div>
            <div class="btn-group d-flex">
                <button class="btn btn-light" type="button" onclick="addNewFields()">Add More</button>
                <button class="btn btn-light" type="button" onclick="undoNewFields()">Remove Fields</button><br>
            </div><br>
            <div>
                <h4 align="center">Vaccination Backtracking</h4>
            </div>
            <div id="vaccines1">
            </div>
            <div class="btn-group d-flex">
                <button class="btn btn-light" type="button" onclick="addNewFields1()">Add More</button>
                <button class="btn btn-light" type="button" onclick="undoNewFields1()">Remove Fields</button><br>
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
<?php
    include_once('connection2.php');

    $database = new Connection();
    $db = $database->open();
    try{ 
        $sql = "SELECT * FROM vaccines ORDER BY vacc_name";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }

    //close connection
    $database->close();
?>

<script>
  var counter = 1;
  function addNewFields() {
    // Generate the HTML code for the new set of input fields
    var html = '<div class="mb-4 row">';
    html += '<label class="col-sm-4 col-form-label">Vaccine Name</label>';
    html += '<div class="col-sm-8">';
    html += '<select class="form-select" name="vacc_name' + counter + '" required>';
    html += '<option selected>Open this select menu</option>';
<?php 
    foreach($result as $row) { 
        if ($row['quantity'] > 0) {
?>
            html += "<option value='<?php echo $row['vacc_name']; ?>'><?php echo $row['vacc_name']; ?></option>";
<?php 
        } 
    }
?>
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '<div class="mb-4 row">';
    html += '<label class="col-sm-4 col-form-label">Administered By</label>';
    html += '<div class="col-sm-8">';
    html += '<input type="text" class="form-control" name="administered_by' + counter + '" required>';
    html += '</div>';
    html += '</div>';
    html += '<div class="mb-4 row">';
    html += '<label class="col-sm-4 col-form-label">Date Taken</label>';
    html += '<div class="col-sm-8">';
    html += '<input type="date" class="form-control" name="date_taken' + counter + '" required>';
    html += '</div>';
    html += '</div>';
    // Increment the counter
    counter++;
    // Add the new set of input fields to the form
    $('#vaccines').append(html);
  }

  function undoNewFields() {
    // Remove the last set of input fields from the form
    $('#vaccines .mb-4:last-child').prev().remove();
    $('#vaccines .mb-4:last-child').prev().remove();
    $('#vaccines .mb-4:last-child').remove();

    // Decrement the counter
    counter--;
  }


  var count = 1;
  function addNewFields1() {
    // Generate the HTML code for the new set of input fields
    var html = '<div class="mb-4 row">';
    html += '<label class="col-sm-4 col-form-label">Vaccine Name</label>';
    html += '<div class="col-sm-8">';
    html += '<input type="text" class="form-control" name="vacc__name' + count + '" required>';
    html += '</div>';
    html += '</div>';
    html += '<div class="mb-4 row">';
    html += '<label class="col-sm-4 col-form-label">Administered By</label>';
    html += '<div class="col-sm-8">';
    html += '<input type="text" class="form-control" name="administered__by' + count + '" required>';
    html += '</div>';
    html += '</div>';
    html += '<div class="mb-4 row">';
    html += '<label class="col-sm-4 col-form-label">Date Taken</label>';
    html += '<div class="col-sm-8">';
    html += '<input type="date" class="form-control" name="date__taken' + count + '" required>';
    html += '</div>';
    html += '</div>';
    // Increment the counter
    count++;
    // Add the new set of input fields to the form
    $('#vaccines1').append(html);
  }

  function undoNewFields1() {
    // Remove the last set of input fields from the form
    $('#vaccines1 .mb-4:last-child').prev().remove();
    $('#vaccines1 .mb-4:last-child').prev().remove();
    $('#vaccines1 .mb-4:last-child').remove();

    // Decrement the counter
    count--;
  }
</script>