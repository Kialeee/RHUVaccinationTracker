<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add New Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
<?php
    include_once('connection2.php');

    $database = new Connection();
    $db = $database->open();
    try{ 
        $sql = "SELECT * FROM vaccines ORDER BY vacc_name";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
?>
        <form method="POST" action="../php_components/addSchedulee.php">
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Vaccine 1</label>
                <div class="col-sm-9">
                    <select class="form-select" name="vacc1" required>
                        <option selected>Open this select menu</option>
<?php 
    foreach($result as $row) { 
        if ($row['quantity'] > 0) {
?>
            html += "<option value='<?php echo $row['vacc_name']; ?>'><?php echo $row['vacc_name']; ?></option>";
<?php 
        } 
    }
?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Vaccine 2</label>
                <div class="col-sm-9">
                    <select class="form-select" name="vacc2" required>
                        <option selected>Open this select menu</option>
<?php 
    foreach($result as $row) { 
        if ($row['quantity'] > 0) {
?>
            html += "<option value='<?php echo $row['vacc_name']; ?>'><?php echo $row['vacc_name']; ?></option>";
<?php 
        } 
    }
?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Vaccine 3</label>
                <div class="col-sm-9">
                    <select class="form-select" name="vacc3" required>
                        <option selected>Open this select menu</option>
<?php 
    foreach($result as $row) { 
        if ($row['quantity'] > 0) {
?>
            html += "<option value='<?php echo $row['vacc_name']; ?>'><?php echo $row['vacc_name']; ?></option>";
<?php 
        } 
    }
?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Vaccine 4</label>
                <div class="col-sm-9">
                    <select class="form-select" name="vacc4" required>
                        <option selected>Open this select menu</option>
<?php 
    foreach($result as $row) { 
        if ($row['quantity'] > 0) {
?>
            html += "<option value='<?php echo $row['vacc_name']; ?>'><?php echo $row['vacc_name']; ?></option>";
<?php 
        } 
    }
?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Vaccine 5</label>
                <div class="col-sm-9">
                    <select class="form-select" name="vacc5" required>
                        <option selected>Open this select menu</option>
<?php 
    foreach($result as $row) { 
        if ($row['quantity'] > 0) {
?>
            html += "<option value='<?php echo $row['vacc_name']; ?>'><?php echo $row['vacc_name']; ?></option>";
<?php 
        } 
    }
?>
                    </select>
                </div>
            </div>

<?php
    }
    catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }

    //close connection
    $database->close();
?>

            <div class="mb-4 row">
                <label class="col-sm-4 col-form-label">Week Number</label>
                <div class="col-sm-8">
                    <input type="week" class="form-control" name="week_no" required>
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