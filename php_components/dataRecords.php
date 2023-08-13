<section class="home-section">
    <div class="container">
      <div class="text">Administrator</div>
      <div class="pageTitle">
        <h1><b>Data Records</b></h1>
      </div>
      <div class="row">
          <div class="col-12">
              <button type="button" style="width: 150px;" id="addButtons" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addnew">
                Add New
              </button>
              <style>
                .alert2 {
                  position: fixed; /* position the element at the top of the page */
                  top: 0;
                  left: 250px;
                  right: 0;
                  z-index: 1; /* make sure the alert2 is on top of other content */
                  background-color: #c1fec1; /* give the alert2 a translucent lightgreen background */
                  color: black; /* set text color to black */
                  padding: 20px; /* add some padding */
                }
                #toHover:hover {
                  background-color: #E5E4E2;
                }
                </style>

                <?php 
                  if(isset($_SESSION['alert'])){
                ?>
                  <div class="alert2 text-center" id="alert2">
                    <?php echo $_SESSION['alert']; ?>
                  </div>
                  <script>
                    setTimeout(function(){
                      // Get the alert2 div
                      var alert2 = document.getElementById("alert2");
                      // Remove the div after 3 seconds
                      alert2.remove();
                    },3000);
                  </script>
                <?php
                  unset($_SESSION['alert']);
                  }
                ?>

              <div class="table-responsive">
                <table id="example" class="table table-striped" style="margin-top:20px;">
                    <thead>

                        <th>ID</th>
                        <th>USER_ID</th>
                        <th>FIRSTNAME</th>
                        <th>MIDDLENAME</th>
                        <th>LASTNAME</th>
                        <th>BIRTHDATE</th>
                        <th>AGE</th>
                        <th>GENDER</th>
                        <th>NATIONALITY</th>
                        <th>PROVINCE </th>
                        <th>CITY</th>
                        <th>BARANGAY</th>
                        <th>SITIO</th>
                        <th>USERNAME</th>
                        <th>PASSWORD</th>
                        <th>DATE</th>
                        <th>ACTIONS</th>
                        <th>VIEW</th>

                    </thead>
                    <tbody>
                        <?php
                            include_once('connection2.php');
     
                            $database = new Connection();
                            $db = $database->open();
                            try{    
                                $sql = 'SELECT * FROM records ORDER BY fname';
                                foreach ($db->query($sql) as $row) {
                                    ?>
                                    <tr id="toHover">
                                        <th><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['user_id']; ?></td>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['mname']; ?></td>
                                        <td><?php echo $row['lname']; ?></td>
                                        <td><?php echo $row['birthdate']; ?></td>
                                        <td><?php echo $row['age']; ?></td>
                                        <td><?php echo $row['gender']; ?></td>
                                        <td><?php echo $row['nationality']; ?></td>
                                        <td><?php echo $row['province']; ?></td>
                                        <td><?php echo $row['city']; ?></td>
                                        <td><?php echo $row['barangay']; ?></td>
                                        <td><?php echo $row['sitio']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['date']; ?></td>

                                        <td>
                                            <style>
                                                #actions {
                                                    width: 153px;
                                                }
                                                #actions:hover {
                                                    background-color: #198754;
                                                    color: white;
                                                }
                                                #action:active {
                                                    background-color: #198754;
                                                }
                                                #action {
                                                    width: 153px;
                                                }
                                                #action:hover {
                                                    background-color: #dc3545;
                                                    color: white;
                                                }
                                                #action:active {
                                                    background-color: #bb2d3b;
                                                }
                                            </style>
                                            <div class="dropdown">
                                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a id="actions" href="#addVT_<?php echo $row['id']; ?>" class="dropdown-item btn btn-success" data-bs-toggle="modal">Add Vaccines</a>

                                                <a id="actions" href="#edit_<?php echo $row['id']; ?>" class="dropdown-item btn btn-success" data-bs-toggle="modal">Edit</a>
                                                <a id="action" href="#delete_<?php echo $row['id']; ?>" class="dropdown-item btn btn-danger" data-bs-toggle="modal">Delete</a>
                                              </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="../php_components/vaccinationRecords.php?id=<?php echo $row['id']; ?>" class="btn btn-success" target="_blank">PDF</a>
                                        </td>
                                        
                                        <?php include('edit_delete_record.php'); ?>
                                        <?php include('editADDVT_Record.php'); ?>
                                                                              
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
    <?php include('addDataRec.php'); ?>
  </section>