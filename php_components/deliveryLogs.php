<?php
  include_once('connection2.php');
     
  $database = new Connection();
  $db = $database->open();

  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  $qry = $db->prepare("SELECT * FROM vaccines WHERE id = ?");
  $qry->execute([$id]);
  $data = $qry->fetchAll();
  $data_count = $qry->rowCount();

  $stmt = $db->prepare("SELECT * FROM vacc_delivery_logs WHERE id = ?");
  $stmt->execute([$id]);
  $records = $stmt->fetchAll();
  $record_count = $stmt->rowCount();

  if ($record_count > 0) {
    $vacc_code = $records[0]['vacc_code'];
  }

  if ($data_count > 0) {
    $vacc_name = $data[0]['vacc_name'];
    $arrival_date = $data[0]['arrival_date'];
    $expiry_date = $data[0]['expiry_date'];
  }

?>
<style>
  ul {
    padding: 5px 10px 5px 10px;
  }
  ul:hover {
    background-color: #dfe0e1;
  }
</style>
<section class="home-section">
  <div class="container">
    <div class="text">Administrator</div>
    <div class="pageTitle">
<?php
      if ($record_count > 0) {
        echo '<h1><b>Delivery Logs</b></h1><br>';
      } else {
        echo '<h1><b>No Delivery Logs Yet!</b></h1><br>';
      }
?>
    </div>
<?php
    if ($record_count > 0) {
?>
      <div style="margin-left: 250px; margin-right: 250px;">
        <ul style="display: flex; justify-content: space-between; list-style-type: none;">
          <li><h5>Batch ID:</h5></li>
          <li><h5><b><?php echo $id; ?></b></h5></li>
        </ul>
        <ul style="display: flex; justify-content: space-between; list-style-type: none;">
          <li><h5>Arrival Date:</h5></li>
          <li><h5><b><?php echo $arrival_date; ?></b></h5></li>
        </ul>
        <ul style="display: flex; justify-content: space-between; list-style-type: none;">
          <li><h5>Expiry Date:</h5></li>
          <li><h5><b><?php echo $expiry_date; ?></b></h5></li>
        </ul>
        <ul style="display: flex; justify-content: space-between; list-style-type: none;">
          <li><h5>Vaccine Code:</h4></li>
          <li><h5><b><?php echo $vacc_code; ?></b></h5></li>
        </ul>
        <ul style="display: flex; justify-content: space-between; list-style-type: none;">
          <li><h5>Vaccine Name:</h4></li>
          <li><h5><b><?php echo $vacc_name; ?></b></h5></li>
        </ul>
        <hr>
        <br>
<?php
        $number = 1;
        $totalQuantity = 0;
        foreach ($records as $record) {

          echo '<ul style="display: flex; justify-content: space-between; list-style-type: none;">';
            echo '<li>Set No.:</li>';
            echo '<li><b>'.$number.'</b></li>';
          echo '</ul>';

          echo '<ul style="display: flex; justify-content: space-between; list-style-type: none;">';
            echo '<li>Quantity:</li>';
            echo '<li><b>'.$record['quantity'].'</b></li>';
          echo '</ul>';

          echo '<ul style="display: flex; justify-content: space-between; list-style-type: none;">';
            echo '<li>Arrival Time:</li>';
            echo '<li><b>'.$record['arrival_time'].'</b></li>';
          echo '</ul><br>';
          echo '<hr>';
          $number++;
          $totalQuantity = $totalQuantity + $record['quantity'];
        }
          echo '<ul style="display: flex; justify-content: space-between; list-style-type: none;">';
            echo '<li></li>';
            echo '<li><h5><b>Total: '.$totalQuantity.'</b></h5></li>';
          echo '</ul><br>';
?>
      </div>
<?php
    }
?>
  </div>
</section>