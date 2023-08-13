<section class="home-section">
        <div class="container">
          <div class="text">Administrator</div>
          <div class="pageTitle">
            <h1><b>Schedule Manager</b></h1>
          </div><br>
          <div class="row">
              <div class="col-12">
                <a href="../view/_weeklySchedule.php" align="center">
                  <h4>View Weekly Schedule</h4>
                </a>
                  <button type="button" style="width: 150px;" id="addButtons" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addnew">
                    Add New
                  </button><br>
                  <style>
                .alert3 {
                  position: fixed; /* position the element at the top of the page */
                  top: 0;
                  left: 250px;
                  right: 0;
                  z-index: 1; /* make sure the alert3 is on top of other content */
                  background-color: #c1fec1; /* give the alert3 a translucent lightgreen background */
                  color: black; /* set text color to black */
                  padding: 20px; /* add some padding */
                }
                #toHover:hover {
                  background-color: #E5E4E2;
                }
                </style>

                <?php 
                  if(isset($_SESSION['notification'])){
                ?>
                  <div class="alert3 text-center" id="alert3">
                    <?php echo $_SESSION['notification']; ?>
                  </div>
                  <script>
                    setTimeout(function(){
                      // Get the alert3 div
                      var alert3 = document.getElementById("alert3");
                      // Remove the div after 3 seconds
                      alert3.remove();
                    },3000);
                  </script>
                <?php
                  unset($_SESSION['notification']);
                  }
                ?>
                  <div class="table-responsive">
                    <table class="table table-striped data-table" style="margin-top:20px;">
                        <thead>

                            <th>ID</th>
                            <th>WEEK_NUMBER</th>
                            <th>VACCINE_1</th>
                            <th>QUANTITY</th>
                            <th>VACCINE_2</th>
                            <th>QUANTITY</th>
                            <th>VACCINE_3</th>
                            <th>QUANTITY</th>
                            <th>VACCINE_4</th>
                            <th>QUANTITY</th>
                            <th>VACCINE_5</th>
                            <th>QUANTITY</th>
                            <th>ACTION</th>

                        </thead>
                        <tbody>
                            <?php
                                include_once('connection2.php');
         
                                $database = new Connection();
                                $db = $database->open();
                                try{    
                                    $sql = 'SELECT * FROM schedules ORDER BY week_no';
                                    foreach ($db->query($sql) as $row) {
                                        ?>
                                        <tr id="toHover">
                                            <th><?php echo $row['id']; ?></th>
                                            <td><?php echo $row['week_no']; ?></td>
                                            <td><?php echo $row['vacc1']; ?></td>
                                            <td><?php echo $row['quantity1']; ?></td>
                                            <td><?php echo $row['vacc2']; ?></td>
                                            <td><?php echo $row['quantity2']; ?></td>
                                            <td><?php echo $row['vacc3']; ?></td>
                                            <td><?php echo $row['quantity3']; ?></td>
                                            <td><?php echo $row['vacc4']; ?></td>
                                            <td><?php echo $row['quantity4']; ?></td>
                                            <td><?php echo $row['vacc5']; ?></td>
                                            <td><?php echo $row['quantity5']; ?></td>

                                            <td>
                                                <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success d-flex" data-bs-toggle="modal">Edit</a>
                                                <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger d-flex" data-bs-toggle="modal">Delete</a>
                                            </td>
                                            <?php include('edit_delete_schedule.php'); ?>
                                        </tr>
                                        <?php 
                                    }
                                }
                                catch(PDOException $e){
                                    echo "There is some problem in connection: " . $e->getMessage();
                                }
         
                                //close connection
                                $database->close();
         
                            ?>
                        </tbody>
                    </table>
                  </div>
              </div>
          </div>
        </div>
        <?php include('addSchedule.php'); ?>
</section>