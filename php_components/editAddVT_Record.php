<!-- AddVT -->
<script>
  function checkFields() {
    var vacc_name = document.forms["form"]["vacc_name"].value;
    var administered_by = document.forms["form"]["administered_by"].value;
    var date_taken = document.forms["form"]["date_taken"].value;
    var vacc_name = document.forms["form"]["vacc__name"].value;
    var administered_by = document.forms["form"]["administered__by"].value;
    var date_taken = document.forms["form"]["date__taken"].value;

    if (vacc_name != "Open this select menu" || administered_by != "" || age_atm_taken != "" || date_taken != "") {
      document.forms["form"]["vacc_name"].required = true;
      document.forms["form"]["administered_by"].required = true;
      document.forms["form"]["date_taken"].required = true;
    }
    else {
      document.forms["form"]["vacc_name"].required = false;
      document.forms["form"]["administered_by"].required = false;
      document.forms["form"]["date_taken"].required = false;
    }

    if (vacc__name != "" || administered__by != "" || age__atm__taken != "" || date__taken != "") {
      document.forms["form"]["vacc__name"].required = true;
      document.forms["form"]["administered__by"].required = true;
      document.forms["form"]["date__taken"].required = true;
    }
    else {
      document.forms["form"]["vacc__name"].required = false;
      document.forms["form"]["administered__by"].required = false;
      document.forms["form"]["date__taken"].required = false;
    }
  }
</script>
<div class="modal fade" id="addVT_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Add Vaccine</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../php_components/editAddVT_RecordAction.php?id=<?php echo $row['id']; ?>">
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
          <div>
            <h4 align="center">Vaccines Taken at RHU's</h4>
          </div>
          <div class="mb-4 row">
            <label class="col-sm-4 col-form-label">Vaccine Name</label>
            <div class="col-sm-8">
              <select class="form-select" name="vacc_name" placeholder="Open this select menu">
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
          
          <div class="mb-4 row">
            <label class="col-sm-4 col-form-label">Administered By</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="administered_by">
            </div>
          </div>
          <div class="mb-4 row">
            <label class="col-sm-4 col-form-label">Date Taken</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="date_taken">
            </div>
          </div>

          <div>
            <h4 align="center">Vaccination Backtracking</h4>
          </div>
          <div class="mb-4 row">
            <label class="col-sm-4 col-form-label">Vaccine Name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="vacc__name">
            </div>
          </div>
          <div class="mb-4 row">
            <label class="col-sm-4 col-form-label">Administered By</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="administered__by">
            </div>
          </div>
          <div class="mb-4 row">
            <label class="col-sm-4 col-form-label">Date Taken</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="date__taken">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addVT" class="btn btn-primary">Save</a>
        </form>
      </div>
    </div>
  </div>
</div>