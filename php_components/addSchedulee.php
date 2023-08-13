<?php
    session_start();
    include_once('../php_components/connection2.php');

    if(isset($_POST['add'])){
        $database = new Connection();
        $db = $database->open();

        $query = $db->prepare("SELECT * FROM schedules WHERE week_no = :week_no");
        $query->execute(array(':week_no' => $_POST['week_no']));
        $row_count = $query->rowCount();

        // Check if the week_no sched exist.
        if ($row_count < 1) {

            $vacc1 = $_POST['vacc1'];
            $vacc2 = $_POST['vacc2'];
            $vacc3 = $_POST['vacc3'];
            $vacc4 = $_POST['vacc4'];
            $vacc5 = $_POST['vacc5'];

            if ($vacc1 != "Open this select menu" && $vacc2 != "Open this select menu" && $vacc3 != "Open this select menu" && $vacc4 != "Open this select menu" && $vacc5 != "Open this select menu") {

                $duplicateTrigger = 0;
                $arr = array($vacc1, $vacc2, $vacc3, $vacc4, $vacc5);
                $duplicates = array_count_values($arr);
                foreach($duplicates as $val => $count) {
                    if($count > 1) {
                        $duplicateTrigger++;
                    }
                }
                if ($duplicateTrigger == 0) {

                    try{
                        //use prepared statement to prevent sql injection
                        $stmt = $db->prepare("INSERT INTO schedules (vacc1, vacc2, vacc3, vacc4, vacc5, week_no) VALUES (:vacc1, :vacc2, :vacc3, :vacc4, :vacc5, :week_no)");

                        //if-else statement in executing our prepared statement
                        $_SESSION['notification'] = ( $stmt->execute(array(':vacc1' => $_POST['vacc1'] , ':vacc2' => $_POST['vacc2'] , ':vacc3' => $_POST['vacc3'], ':vacc4' => $_POST['vacc4'] , ':vacc5' => $_POST['vacc5'] , ':week_no' => $_POST['week_no'])) ) ? 'Schedule added successfully' : 'Something went wrong. Cannot add schedule';  
                    }
                    catch(PDOException $e){
                        $_SESSION['notification'] = $e->getMessage();
                    }

                    try{
                        $stmt = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                        $stmt->execute(array(':vacc_name' => $_POST['vacc1']));
                        $result = $stmt->fetch();
                        $quantity1 = $result['quantity'];

                        $stmt2 = $db->prepare("UPDATE schedules SET quantity1 = :quantity WHERE vacc1 = :vacc_name");
                        $stmt2->execute(array(':quantity' => $quantity1, ':vacc_name' => $_POST['vacc1']));
                    }
                    catch(PDOException $e){
                        $_SESSION['notification'] = $e->getMessage();
                    }

                    try{
                        $stmt = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                        $stmt->execute(array(':vacc_name' => $_POST['vacc2']));
                        $result = $stmt->fetch();
                        $quantity2 = $result['quantity'];

                        $stmt2 = $db->prepare("UPDATE schedules SET quantity2 = :quantity WHERE vacc2 = :vacc_name");
                        $stmt2->execute(array(':quantity' => $quantity2, ':vacc_name' => $_POST['vacc2']));
                    }
                    catch(PDOException $e){
                        $_SESSION['notification'] = $e->getMessage();
                    }

                    try{
                        $stmt = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                        $stmt->execute(array(':vacc_name' => $_POST['vacc3']));
                        $result = $stmt->fetch();
                        $quantity3 = $result['quantity'];

                        $stmt2 = $db->prepare("UPDATE schedules SET quantity3 = :quantity WHERE vacc3 = :vacc_name");
                        $stmt2->execute(array(':quantity' => $quantity3, ':vacc_name' => $_POST['vacc3']));
                    }
                    catch(PDOException $e){
                        $_SESSION['notification'] = $e->getMessage();
                    }

                    try{
                        $stmt = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                        $stmt->execute(array(':vacc_name' => $_POST['vacc4']));
                        $result = $stmt->fetch();
                        $quantity4 = $result['quantity'];

                        $stmt2 = $db->prepare("UPDATE schedules SET quantity4 = :quantity WHERE vacc4 = :vacc_name");
                        $stmt2->execute(array(':quantity' => $quantity4, ':vacc_name' => $_POST['vacc4']));
                    }
                    catch(PDOException $e){
                        $_SESSION['notification'] = $e->getMessage();
                    }

                    try{
                        $stmt = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                        $stmt->execute(array(':vacc_name' => $_POST['vacc5']));
                        $result = $stmt->fetch();
                        $quantity5 = $result['quantity'];

                        $stmt2 = $db->prepare("UPDATE schedules SET quantity5 = :quantity WHERE vacc5 = :vacc_name");
                        $stmt2->execute(array(':quantity' => $quantity5, ':vacc_name' => $_POST['vacc5']));
                    }
                    catch(PDOException $e){
                        $_SESSION['notification'] = $e->getMessage();
                    }
                } else {
                $_SESSION['notification'] = "Please no duplicate vacines within a week schedule.";
            }
            } else {
                $_SESSION['notification'] = "Please set all the vaccines.";
            }

        } else {
            $_SESSION['notification'] = "The " . $_POST['week_no'] . " has already been scheduled.";
        }
 
        //close connection
        $database->close();
    }
 
    else{
        $_SESSION['notification'] = 'Fill up add form first';
    }
    header('Location: ../view/_scheduling.php');
    exit();
?>