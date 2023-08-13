<section class="home-section">
    <div class="container">
      <div class="text">Administrator</div>
      <div class="pageTitle">
        <h1><b>Vaccine Inventory</b></h1>
      </div>
      <div class="row">
          <div class="col-12">
              <button type="button" style="width: 150px; align-content: right;" id="addButtons" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addnew">
                Add New
              </button>
              <style>
                .alert1 {
                  position: fixed; /* position the element at the top of the page */
                  top: 0;
                  left: 250px;
                  right: 0;
                  z-index: 1; /* make sure the alert1 is on top of other content */
                  background-color: #c1fec1; /* give the alert1 a translucent lightgreen background */
                  color: black; /* set text color to black */
                  padding: 20px; /* add some padding */
                }
                #toHover:hover {
                  background-color: #E5E4E2;
                }
                #linkCursur {
                  cursor: pointer;
                }
                </style>
                <?php 
                  if(isset($_SESSION['message'])){
                ?>
                  <div class="alert1 text-center" id="alert1">
                    <?php echo $_SESSION['message']; ?>
                  </div>
                  <script>
                    setTimeout(function(){
                      // Get the alert1 div
                      var alert1 = document.getElementById("alert1");
                      // Remove the div after 3 seconds
                      alert1.remove();
                    },3000);
                  </script>
                <?php
                  unset($_SESSION['message']);
                  }
                ?>
                <div class="table-responsive">
                <table id="vaccines" class="table table-striped data-table" style="margin-top:20px;">
                    <thead>
                        <th>BATCH_ID</th>
                        <th>VACC_CODE</th>
                        <th>VACC_ADM_CODE</th>
                        <th>VACC_NAME</th>
                        <th>MANUFACTURER</th>
                        <th>QUANTITY</th>
                        <th>NDC10</th>
                        <th>NDC11</th>
                        <th>ARRIVAL_DATE</th>
                        <th>EXPIRY_DATE</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody> 
 
                            <!--$sequel ="SELECT vacc_code, expiry_date, SUM(quantity) FROM vaccines GROUP BY vacc_code, expiry_date";-->

                        <?php
                            include_once('connection2.php');
     
                            $database = new Connection();
                            $db = $database->open();
                            try{  
                                $sql = 'SELECT * FROM vaccines ORDER BY vacc_name';
                                foreach ($db->query($sql) as $row) {
                                    ?>
                                    <tr id="toHover">
                                        <th id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['id']; ?></th>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['vacc_code']; ?></td>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['vacc_administration_code']; ?></td>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['vacc_name']; ?></td>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['manufacturer']; ?></td>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['quantity']; ?></td>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['ndc10']; ?></td>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['ndc11']; ?></td>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['arrival_date']; ?></td>
                                        <td id="linkCursur" onclick="window.open('../view/_deliveryLogs.php?id=<?php echo $row['id']; ?>', '_blank')"><?php echo $row['expiry_date']; ?></td>
                                        <td>
                                            <a href="#edit_<?php echo $row['id']; ?>" class="btn btn-success d-flex" data-bs-toggle="modal">Edit</a>
                                        </td>
                                        <?php include('edit_vaccine.php'); ?>
                                        </a>
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
    <?php include('addVacc.php'); ?>
  </section>
