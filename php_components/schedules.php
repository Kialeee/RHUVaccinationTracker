<?php
          include_once('connection2.php');
          $database = new Connection();
          $db = $database->open();

          $date = new DateTime();
          $weekNum = $date->format('o-\WW');
          $weekNumber = "Week Number : " . $date->format('W');

          // Move date to beginning of week (Monday)
          $date->modify('Monday this week');
          $weekStart = $date->format('F jS');

          // Add 6 days to get end of week (Sunday)
          $date->modify('+6 days');
          $weekEnd = $date->format('jS, Y');

          $stmt = $db->prepare("SELECT * FROM schedules WHERE week_no = ?");
          $stmt->execute([$weekNum]);
          $sched = $stmt->fetch();
          $row_count = $stmt->rowCount();

          if ($row_count == 0) {
              header("Location: ../view/_schedulesNotSet.php");
              exit;
          }

          $vacc1 = $sched['vacc1'];
          $vacc2 = $sched['vacc2'];
          $vacc3 = $sched['vacc3'];
          $vacc4 = $sched['vacc4'];
          $vacc5 = $sched['vacc5'];
          $quantity1 = $sched['quantity1'];
          $quantity2 = $sched['quantity2'];
          $quantity3 = $sched['quantity3'];
          $quantity4 = $sched['quantity4'];
          $quantity5 = $sched['quantity5'];  
    ?>
<style>
  #toHover {
    padding: 5px 5px 5px 5px;
  }
  #toHover:hover {
    background-color: #dfe0e1;
  }
  #rightBorder {
      border-right: 1.5px solid #cab0a3;
      margin-top: -30px;
      height: 533px;
      margin-right: 85px;
  }
  #list {
    width: 25%;
    text-align: center;
    list-style-type: none;
  }
</style>

<div class="container" id="rightBorder">
  <h1 align="center" style="font-family: catchy wager; color: darkgreen; margin-bottom: 10px; padding-top: 60px;">WEEKLY SCHEDULE</h1><br>
  <h5 align="center" style="color: black;">AVAILABLE VACINES THIS WEEK : <b><?php echo $weekStart; ?>-<?php echo $weekEnd; ?></b></h5><br>
  <h5 style="color: black; margin-left: 105px; color: darkgreen;"><b><?php echo $weekNumber; ?></b></h5>
  <div class="table-responsive">

    <div style="display: flex; justify-content: space-between; margin-right: 20px; margin-left: 5px;">
          <p id="list"><b>Number</b></p>
          <p id="list"><b>Vaccine Name</b></p>
          <p id="list"><b>Quantity</b></p>
      </div>
      <div style="display: flex; flex-direction: column; height: 240px; margin-right: 0;">
        <div style="overflow-y: scroll; flex: 1;">
<?php
          $vaccinations = array(
            $vacc1 => $quantity1,
            $vacc2 => $quantity2,
            $vacc3 => $quantity3,
            $vacc4 => $quantity4,
            $vacc5 => $quantity5
          );

          ksort($vaccinations);

          $i = 1;
          foreach($vaccinations as $vacc => $quantity) {
            echo '<ul id="toHover" style="display: flex; justify-content: space-between;">';
              echo '<li id="list">' . $i . '</li>';
              echo '<li id="list">' . $vacc . '</li>';
              echo '<li id="list">' . $quantity . '</li>';
            echo '</ul>';
            $i++;
          }
?>
      </div>
    </div>
  </div>
</div>
<?php
//close connection
$database->close();
?>