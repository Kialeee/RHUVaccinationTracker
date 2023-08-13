<?php
    session_start();
    include_once('connection2.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $vacc1 = $_POST['vacc1'];
            $vacc2 = $_POST['vacc2'];
            $vacc3 = $_POST['vacc3'];
            $vacc4 = $_POST['vacc4'];
            $vacc5 = $_POST['vacc5'];
            $week_no = $_POST['week_no'];

            $duplicateTrigger = 0;
            $arr = array($vacc1, $vacc2, $vacc3, $vacc4, $vacc5);
            $duplicates = array_count_values($arr);
            foreach($duplicates as $val => $count) {
                if($count > 1) {
                    $duplicateTrigger++;
                }
            }
            if ($duplicateTrigger == 0) {

                $stmt1 = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                $stmt1->execute(array(':vacc_name' => $_POST['vacc1']));
                $result1 = $stmt1->fetch();
                $quantity1 = $result1['quantity'];

                $stmt11 = $db->prepare("UPDATE schedules SET vacc1 = :vacc1, quantity1 = :quantity1 WHERE id = :id");
                $stmt11->execute(array('vacc1' => $vacc1, ':quantity1' => $quantity1, ':id' => $id));

                $stmt2 = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                $stmt2->execute(array(':vacc_name' => $_POST['vacc2']));
                $result2 = $stmt2->fetch();
                $quantity2 = $result2['quantity'];

                $stmt22 = $db->prepare("UPDATE schedules SET vacc2 = :vacc2, quantity2 = :quantity2 WHERE id = :id");
                $stmt22->execute(array('vacc2' => $vacc2, ':quantity2' => $quantity2, ':id' => $id));


                $stmt3 = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                $stmt3->execute(array(':vacc_name' => $_POST['vacc3']));
                $result3 = $stmt3->fetch();
                $quantity3 = $result3['quantity'];

                $stmt33 = $db->prepare("UPDATE schedules SET vacc3 = :vacc3, quantity3 = :quantity3 WHERE id = :id");
                $stmt33->execute(array('vacc3' => $vacc3, ':quantity3' => $quantity3, ':id' => $id));


                $stmt4 = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                $stmt4->execute(array(':vacc_name' => $_POST['vacc4']));
                $result4 = $stmt4->fetch();
                $quantity4 = $result4['quantity'];

                $stmt44 = $db->prepare("UPDATE schedules SET vacc4 = :vacc4, quantity4 = :quantity4 WHERE id = :id");
                $stmt44->execute(array('vacc4' => $vacc4, ':quantity4' => $quantity4, ':id' => $id));


                $stmt5 = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                $stmt5->execute(array(':vacc_name' => $_POST['vacc5']));
                $result5 = $stmt5->fetch();
                $quantity5 = $result5['quantity'];

                $stmt55 = $db->prepare("UPDATE schedules SET vacc5 = :vacc5, quantity5 = :quantity5 WHERE id = :id");
                $stmt55->execute(array('vacc5' => $vacc5, ':quantity5' => $quantity5, ':id' => $id));

                //if-else statement in executing our prepared statement
                $_SESSION['notification'] = 'Schedule updated successfully';
            } else {
                $_SESSION['notification'] = "Please no duplicate vacines within a week schedule.";
            }

        }
        catch(PDOException $e){
            $_SESSION['notification'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['notification'] = 'Fill up edit form first';
    }
 
    header('location: ../view/_scheduling.php');
    die();
 
?>
