<section class="home-section">
    <div class="container">
      <div class="text">Administrator</div>
      <div class="pageTitle">
        <h1><b>Admin Manager</b></h1>
      </div>
      <div class="row">
          <div class="col-12">
              <button type="button" style="width: 150px;" id="addButtons" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addnew">
                Add New
              </button>
              <style>
                .alert4 {
                  position: fixed; /* position the element at the top of the page */
                  top: 0;
                  left: 250px;
                  right: 0;
                  z-index: 1; /* make sure the alert4 is on top of other content */
                  background-color: #c1fec1; /* give the alert4 a translucent lightgreen background */
                  color: black; /* set text color to black */
                  padding: 20px; /* add some padding */
                }
                #toHover:hover {
                  background-color: #E5E4E2;
                }
                </style>

                <?php 
                  if(isset($_SESSION['flash'])){
                ?>
                  <div class="alert4 text-center" id="alert4">
                    <?php echo $_SESSION['flash']; ?>
                  </div>
                  <script>
                    setTimeout(function(){
                      // Get the alert4 div
                      var alert4 = document.getElementById("alert4");
                      // Remove the div after 3 seconds
                      alert4.remove();
                    },3000);
                  </script>
                <?php
                  unset($_SESSION['flash']);
                  }
                ?>
              <div class="table-responsive">
                <table class="table table-striped data-table" style="margin-top:20px;">
                    <thead>

                        <th>ID</th>
                        <th>ADMIN_ID</th>
                        <th>FIRSTNAME</th>
                        <th>MIDDLENAME</th>
                        <th>LASTNAME</th>
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

                    </thead>
                    <tbody>
                        <?php
                            include_once('connection2.php');
     
                            $database = new Connection();
                            $db = $database->open();
                            try{    
                                $sql = 'SELECT * FROM admins ORDER BY fname';
                                foreach ($db->query($sql) as $row) {
                                    ?>
                                    <tr id="toHover">
                                        <th><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['admin_id']; ?></td>
                                        <td><?php echo $row['fname']; ?></td>
                                        <td><?php echo $row['mname']; ?></td>
                                        <td><?php echo $row['lname']; ?></td>
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
                                            <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success d-flex" data-bs-toggle="modal">Edit</a>
                                            <a href="#delete_<?php echo $row['id']; ?>" class="btn btn-danger d-flex" data-bs-toggle="modal">Delete</a>
                                        </td>
                                        <?php include('edit_delete_admin.php'); ?>
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
    <?php include('addAdmin.php'); ?>
  </section>