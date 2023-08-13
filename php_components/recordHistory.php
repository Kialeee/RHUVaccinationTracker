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
    	height: 870px;
    	margin-right: 68px;
	}
	#list {
		width: 25%;
		text-align: center;
	}
	#dropdownMenuButton {
		margin-right: 38.5px;
	}
</style>
<?php
	include_once('connection2.php');
    $database = new Connection();
    $db = $database->open();

	$id = $user_data['id'];

	$sql = $db->prepare("SELECT * FROM vacc_records WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    $data = $sql->fetch();
?>
<div class="container" id="rightBorder">
	<h1 align="center" style="font-family: catchy wager; color: darkgreen; margin-bottom: 10px; padding-top: 60px;">VACCINATION RECORD<br>HISTORY</h1><br>
	<div class="table-responsive">
		<h5 align="center" style="color: black;">VACCINES TAKEN AT ARGAO RURAL HEALTH UNITS</h5><br>

		<div style="display: flex; justify-content: space-between; margin-right: 20px; margin-left: 5px;">
	        <p id="list"><b>Number</b></p>
	        <p id="list"><b>Vaccine Name</b></p>
	        <p id="list"><b>Administered By</b></p>
	        <p id="list"><b>Age Administered</b></p>
	        <p id="list"><b>Date Taken</b></p>
	    </div>
	    <div style="display: flex; flex-direction: column; height: 220px; margin-right: 0;">
	      <div style="overflow-y: scroll; flex: 1;">
<?php
			$date_taken_array = array();
			for($i = 1; $i <= 10; $i++) {
			    if (isset($data['vacc_name' . $i]) && !empty($data['vacc_name' . $i])) {
			        $date_taken_array[$i]['vacc_name'] = $data['vacc_name'.$i];
			        $date_taken_array[$i]['administered_by'] = $data['administered_by'.$i];
			        $date_taken_array[$i]['age_atm_taken'] = $data['age_atm_taken'.$i];
			        $date_taken_array[$i]['date_taken'] = $data['date_taken'.$i];
			    }
			}

			usort($date_taken_array, function($a, $b) {
			    return strtotime($b['date_taken']) - strtotime($a['date_taken']);
			});
			$count = 1;
			foreach($date_taken_array as $key => $row) {
			    echo '<ul id="toHover" style="display: flex; justify-content: space-between;">';
			    echo '<li id="list">'.$count.'</li>';
			    echo '<li id="list">'.$row['vacc_name'].'</li>';
			    echo '<li id="list">'.$row['administered_by'].'</li>';
			    echo '<li id="list">'.$row['age_atm_taken'].'</li>';
			    echo '<li id="list">'.$row['date_taken'].'</li>';
			    echo '</ul>';
				$count++;
			}
?>

		  </div>
		</div>
	</div>
	<br><br>
<?php
	$sql = $db->prepare("SELECT * FROM vacc_backtracking_records WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
    $data = $sql->fetch();
?>
	<div class="table-responsive">
		<h5 align="center" style="color: black;">VACCINATION BACKTRACKING</h5><br>

		<div style="display: flex; justify-content: space-between; margin-right: 20px; margin-left: 5px;">
	        <p id="list"><b>Number</b></p>
	        <p id="list"><b>Vaccine Name</b></p>
	        <p id="list"><b>Administered By</b></p>
	        <p id="list"><b>Age Administered</b></p>
	        <p id="list"><b>Date Taken</b></p>
	    </div>
	    <div style="display: flex; flex-direction: column; height: 220px; margin-bottom: 50px; margin-right: 0;">
	      <div style="overflow-y: scroll; flex: 1;">
	      	
			<?php
			$date__taken_array = array();
			for($i = 1; $i <= 10; $i++) {
			    if (isset($data['vacc__name' . $i]) && !empty($data['vacc__name' . $i])) {
			        $date__taken_array[$i]['vacc__name'] = $data['vacc__name'.$i];
			        $date__taken_array[$i]['administered__by'] = $data['administered__by'.$i];
			        $date__taken_array[$i]['age__atm__taken'] = $data['age__atm__taken'.$i];
			        $date__taken_array[$i]['date__taken'] = $data['date__taken'.$i];
			    }
			}

			usort($date__taken_array, function($a, $b) {
			    return strtotime($b['date__taken']) - strtotime($a['date__taken']);
			});
			$counter = 1;
			foreach($date__taken_array as $key => $row) {
			    echo '<ul id="toHover" style="display: flex; justify-content: space-between;">';
			    echo '<li id="list">'.$counter.'</li>';
			    echo '<li id="list">'.$row['vacc__name'].'</li>';
			    echo '<li id="list">'.$row['administered__by'].'</li>';
			    echo '<li id="list">'.$row['age__atm__taken'].'</li>';
			    echo '<li id="list">'.$row['date__taken'].'</li>';
			    echo '</ul>';
			    $counter++;
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