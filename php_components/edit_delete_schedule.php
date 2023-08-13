<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Update Schedule</h5>
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
        <form method="POST" action="../php_components/editScheduleAction.php?id=<?php echo $row['id']; ?>">
                        <div class="mb-3 roww">
                            <label class="col-sm-3 col-form-label">Vaccine 1</label>
                            <div class="col-sm-9" style="float: right;">
                                <select class="form-select" name="vacc1" required>
                                    <option selected><?php echo $row['vacc1']; ?></option>
            <?php
                          foreach($result as $roww) {
                            if ($roww['quantity'] > 0) {
                                echo "<option value='" . $roww['vacc_name'] . "'>" . $roww['vacc_name'] . "</option>";
                            }
                          }
            ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 roww">
                            <label class="col-sm-3 col-form-label">Vaccine 2</label>
                            <div class="col-sm-9" style="float: right;">
                                <select class="form-select" name="vacc2" required>
                                    <option selected><?php echo $row['vacc2']; ?></option>
            <?php
                          foreach($result as $roww) {
                            if ($roww['quantity'] > 0) {
                                echo "<option value='" . $roww['vacc_name'] . "'>" . $roww['vacc_name'] . "</option>";
                            }
                          }
            ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 roww">
                            <label class="col-sm-3 col-form-label">Vaccine 3</label>
                            <div class="col-sm-9" style="float: right;">
                                <select class="form-select" name="vacc3" required>
                                    <option selected><?php echo $row['vacc3']; ?></option>
            <?php
                          foreach($result as $roww) {
                            if ($roww['quantity'] > 0) {
                                echo "<option value='" . $roww['vacc_name'] . "'>" . $roww['vacc_name'] . "</option>";
                            }
                          }
            ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 roww">
                            <label class="col-sm-3 col-form-label">Vaccine 4</label>
                            <div class="col-sm-9" style="float: right;">
                                <select class="form-select" name="vacc4" required>
                                    <option selected><?php echo $row['vacc4']; ?></option>
            <?php
                          foreach($result as $roww) {
                            if ($roww['quantity'] > 0) {
                                echo "<option value='" . $roww['vacc_name'] . "'>" . $roww['vacc_name'] . "</option>";
                            }
                          }
            ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 roww">
                            <label class="col-sm-3 col-form-label">Vaccine 5</label>
                            <div class="col-sm-9" style="float: right;">
                                <select class="form-select" name="vacc5" required>
                                    <option selected><?php echo $row['vacc5']; ?></option>
            <?php
                          foreach($result as $roww) {
                            if ($roww['quantity'] > 0) {
                                echo "<option value='" . $roww['vacc_name'] . "'>" . $roww['vacc_name'] . "</option>";
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
                    <input type="week" disabled class="form-control" name="week_no" value="<?php echo $row['week_no']; ?>">
                </div>
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
 
<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Delete Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p class="text-center">Are you sure you want to DELETE</p>
            <h2 class="text-center"><?php echo 'Schedule: '.$row['week_no'].'?'; ?></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="../php_components/deleteScheduleAction.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Yes</a>
      </div>
    </div>
  </div>
</div>