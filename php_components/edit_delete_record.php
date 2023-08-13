<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Update Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="../php_components/editRecordAction.php?id=<?php echo $row['id']; ?>">
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
                <label class="col-sm-3 col-form-label">Birthdate</label>
                <div class="col-sm-9">
                    <input type="date" disabled class="form-control" name="birthdate" value="<?php echo $row['birthdate']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-3 col-form-label">Age</label>
                <div class="col-sm-9">
                    <input type="text" disabled class="form-control" name="age" value="<?php echo $row['age']; ?>">
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
            </div><br>
            <?php
                include_once('connection2.php');

                $database = new Connection();
                $db = $database->open();
                try{ 
                    $stmt = $db->prepare("SELECT * FROM vacc_records WHERE user_id = :user_id");
                    $stmt->execute(['user_id' => $row['user_id']]);
                    $result = $stmt->fetchAll();
            ?>

                    <!-- Start the loop -->
            <?php
                    $trap = 1; 
                    for($i = 1; $i <= 10; $i++) {
                        $vacc_name = $result[0]['vacc_name'.$i];
                        $administered_by = $result[0]['administered_by'.$i];
                        $age_atm_taken = $result[0]['age_atm_taken'.$i];
                        $date_taken = $result[0]['date_taken'.$i];
                        if(!empty($vacc_name)) {
                            if($trap==1) {
            ?>
                                <div>
                                    <h4 align="center">Vaccines Taken</h4>
                                </div>
            <?php
                            }
                            $trap = 2;
            ?>
                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label">Vaccine Name</label>
                                <div class="col-sm-8">
                                    <select class="form-select" disabled name="vacc_name<?php echo $i; ?>">
                                        <option selected><?php echo $vacc_name; ?></option>
            <?php 
                                    $vacc_name ="";
                                    $sql1 = "SELECT * FROM vaccines";
                                    $stmt1 = $db->prepare($sql1);
                                    $stmt1->execute();
                                    if($result1 = $stmt1->fetchAll()){
                                        foreach($result1 as $roww) { 
                                            echo "<option>".$roww['vacc_name']."</option>";
                                        }
                                    }
            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label">Administered By</label>
                                <div class="col-sm-8">
                                    <input type="text" disabled class="form-control" name="administered_by<?php echo $i; ?>" value="<?php echo $administered_by; ?>">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label">Age atm Taken</label>
                                <div class="col-sm-8">
                                    <input type="text" disabled class="form-control" name="age_atm_taken<?php echo $i; ?>" value="<?php echo $age_atm_taken; ?>">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label">Date Taken</label>
                                <div class="col-sm-8">
                                    <input type="date" disabled class="form-control" name="date_taken<?php echo $i; ?>" value="<?php echo $date_taken; ?>">
                                </div>
                            </div>
                            <br>
            <?php
                        }
                        else {
                            break;
                        }
                    }

                }
                catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                }

                //close connection
                $database->close();
            ?>

            <br>
            <?php
                include_once('connection2.php');

                $database = new Connection();
                $db = $database->open();
                try{ 
                    $stmt = $db->prepare("SELECT * FROM vacc_backtracking_records WHERE user_id = :user_id");
                    $stmt->execute(['user_id' => $row['user_id']]);
                    $result = $stmt->fetchAll();
            ?>

                    <!-- Start the loop -->
            <?php 
                    $trap = 1;
                    for($i = 1; $i <= 10; $i++) {
                        $vacc__name = $result[0]['vacc__name'.$i];
                        $administered__by = $result[0]['administered__by'.$i];
                        $age__atm__taken = $result[0]['age__atm__taken'.$i];
                        $date__taken = $result[0]['date__taken'.$i];
                        if(!empty($vacc__name)) {
                            if($trap==1) {
            ?>
                                <div>
                                    <h4 align="center">Vaccination Backtracking</h4>
                                </div>
            <?php
                            }
                            $trap = 2;
            ?>

                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label">Vaccine Name</label>
                                <div class="col-sm-8">
                                    <input type="text" disabled class="form-control" name="vacc__name<?php echo $i; ?>" value="<?php echo $vacc__name; ?>">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label">Administered By</label>
                                <div class="col-sm-8">
                                    <input type="text" disabled class="form-control" name="administered__by<?php echo $i; ?>" value="<?php echo $administered__by; ?>">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label">Age atm Taken</label>
                                <div class="col-sm-8">
                                    <input type="text" disabled class="form-control" name="age__atm__taken<?php echo $i; ?>" value="<?php echo $age__atm__taken; ?>">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-4 col-form-label">Date Taken</label>
                                <div class="col-sm-8">
                                    <input type="date" disabled class="form-control" name="date__taken<?php echo $i; ?>" value="<?php echo $date__taken; ?>">
                                </div>
                            </div>
                            <br>
            <?php
                        }
                        else {
                            break;
                        }
                    }

                }
                catch(PDOException $e){
                    echo "There is some problem in connection: " . $e->getMessage();
                }

                //close connection
                $database->close();
            ?>
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
        <h5 class="modal-title" id="ModalLabel">Delete Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p class="text-center">Are you sure you want to DELETE</p>
            <h2 class="text-center"><?php echo 'User: '.$row['fname'].' '.$row['mname'].' '.$row['lname'].'?'; ?></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="../php_components/deleteRecordAction.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"> Yes</a>
      </div>
    </div>
  </div>
</div>