<style>
#carouselIndicators {
    box-shadow: -10px 10px 14px 0px rgba(0,0,0,0.49);
    -webkit-box-shadow: -10px 10px 14px 0px rgba(0,0,0,0.49);
    -moz-box-shadow: -10px 10px 14px 0px rgba(0,0,0,0.49);
    margin-top: 30px;
  }
  .btnn {
    background-color: #198754;
    padding: 10px;
    border-radius: 50px;
    color: white;
    text-decoration: none;
  }
  .btnn:hover {
    background-color: #157347;
    color: white;
    text-decoration: none;
  }
  .btnForm{
    background-color: #198754;
    padding: 10px;
    border-radius: 10px;
    color: white;
    text-decoration: none;
    border: none;
  }
  .btnForm:hover {
    background-color: #157347;
    color: white;
    text-decoration: none;
  }
  .right {
    border-right: 1.5px solid #cab0a3;
  }
  .syringe {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #quan {
    padding-right: 30px;
  }
  .table-responsive {
    border-bottom: 1.5px solid #cab0a3;
  }
  #selectForm {
    margin-left: 3px;
    padding-bottom: 32px;
    display: flex;
    padding-top: 35px;
  }
  #selectLabel {
    padding-right: 5px;
  }
  .form-select {
    height: 46px;
    border-radius: 10px;
  }
</style>
<br>
<div class="container" style="display: flex; margin-top: -30px;">
  <div class="left" style="float: left; width: 38%;">
    <div id="carouselIndicators" class="carousel slide" data-ride="true">
      <div class="carousel-indicators">
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../images/poster1.png" class="d-block w-100" alt="image1" id="poster">
        </div>
        <div class="carousel-item">
          <img src="../images/poster2.png" class="d-block w-100" alt="image2" id="poster">
        </div>
        <div class="carousel-item">
          <img src="../images/poster3.png" class="d-block w-100" alt="image3" id="poster">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="right" style="float: right; width: 62%; margin-left: 50px;">
    <h1 style="font-family: catchy wager; margin-top: 30px;">VACCINES CURRENTLY<br>AVAILABLE</h1>
    <div style="display: flex; justify-content: space-between;">
        <p style="margin-left: 30px;"><b>Vaccine</b></p>
        <p style="padding-right: 45px;"><b>Quantity</b></p>
    </div>
    <div style="display: flex; flex-direction: column; height: 200px;">
      <div style="overflow-y: scroll; flex: 1;">
        <?php
          include_once('connection2.php');
          $database = new Connection();
          $db = $database->open();
          
          $sql = 'SELECT * FROM vaccines ORDER BY vacc_name';
          foreach ($db->query($sql) as $row) {
            $vacc_name = $row['vacc_name'];
            $quantity = $row['quantity'];

            if($quantity != 0) {

              echo '<ul style="display: flex; justify-content: space-between;">';
              echo '<li>'.$vacc_name.'</li>';
              echo '<li id="quan">'.$quantity.'</li>';
              echo '</ul>';
            }
          }
        ?>
      </div>
    </div>
    <div class="syringe">
      <img src="../images/syringe.png" width="100px" height="100px">

      <form method="POST" id="selectForm" action="../php_components/userVaccinationRecords.php?id=<?php echo $user_data['id']; ?>" target="_blank">
        <input type="submit" value="My Vaccination Record PDF" class="btnForm">
        <label for="year-select" id="selectLabel" style="padding-left: 3px; padding-top: 12px;">From:</label>
        <select id="year-select" name="year" class="form-select" aria-label="Default select example">
          <option selected value=''>Year</option>
        <?php
                 $current_year = date("Y");
                 $user_age = $user_data['age'];
                 $start_year = $current_year - $user_age;
                 for ($i = $start_year; $i <= $current_year; $i++) {
                   echo "<option value='$i'>$i</option>";
                 }
        ?>
        </select>
      </form>

    </div>
  </div>
</div>