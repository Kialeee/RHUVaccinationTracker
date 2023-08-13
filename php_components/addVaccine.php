<?php
    session_start();
    include_once('connection2.php');

    if(isset($_POST['add'])){
        $database = new Connection();
        $db = $database->open();
        try{
            // Check if a record with the same vacc code and expiry date already exists
            $stmt = $db->prepare("SELECT * FROM vaccines WHERE vacc_code = :vacc_code AND arrival_date = :arrival_date AND expiry_date = :expiry_date");
            $stmt->execute(array(':vacc_code' => $_POST['vacc_code'], ':arrival_date' => $_POST['arrival_date'], ':expiry_date' => $_POST['expiry_date']));
            $result = $stmt->fetchAll();
            $id = $result[0]['id'];
            date_default_timezone_set('Asia/Manila');
            $now = time();
            $arrival_time = date("h:i:s A", $now);


            $existingVaccines = $stmt->rowCount();

            // If a matching record exists, update its quantity
            if ($existingVaccines > 0) {

                // Delivery Logs
                $logs = $db->prepare("INSERT INTO vacc_delivery_logs (id, vacc_code, quantity, arrival_time) VALUES (:id, :vacc_code, :quantity, :arrival_time)");
                $logs->execute(array(':id' => $id, ':vacc_code' => $_POST['vacc_code'], ':quantity' => $_POST['quantity'], ':arrival_time' => $arrival_time));

                $stmt1 = $db->prepare("UPDATE vaccines SET quantity = quantity + :quantity WHERE vacc_code = :vacc_code AND arrival_date = :arrival_date AND expiry_date = :expiry_date");
                $stmt1->execute(array(':vacc_code' => $_POST['vacc_code'], ':quantity' => $_POST['quantity'], ':arrival_date' => $_POST['arrival_date'], ':expiry_date' => $_POST['expiry_date']));
                $_SESSION['message'] = 'Vaccine quantity updated successfully';

                $vacc_name = $result[0]['vacc_name'];
                $addedQuan = $_POST['quantity'];

                $sql = 'SELECT * FROM schedules';
                foreach ($db->query($sql) as $roow) {

                    $stmt2 = $db->prepare("UPDATE schedules SET quantity1 = quantity1 + :quantity WHERE vacc1 = :vacc_name");
                    $stmt2->execute(array(':quantity' => $addedQuan,':vacc_name' => $vacc_name));

                    $stmt3 = $db->prepare("UPDATE schedules SET quantity2 = quantity2 + :quantity WHERE vacc2 = :vacc_name");
                    $stmt3->execute(array(':quantity' => $addedQuan,':vacc_name' => $vacc_name));

                    $stmt4 = $db->prepare("UPDATE schedules SET quantity3 = quantity3 + :quantity WHERE vacc3 = :vacc_name");
                    $stmt4->execute(array(':quantity' => $addedQuan,':vacc_name' => $vacc_name));

                    $stmt5 = $db->prepare("UPDATE schedules SET quantity4 = quantity4 + :quantity WHERE vacc4 = :vacc_name");
                    $stmt5->execute(array(':quantity' => $addedQuan,':vacc_name' => $vacc_name));

                    $stmt6 = $db->prepare("UPDATE schedules SET quantity5 = quantity5 + :quantity WHERE vacc5 = :vacc_name");
                    $stmt6->execute(array(':quantity' => $addedQuan,':vacc_name' => $vacc_name));

                    $addedQuan = $addedQuan - $addedQuan;
                }
            }
            // Otherwise, insert a new record
            else {
                // Use prepared statement to prevent sql injection
                $stmt = $db->prepare("INSERT INTO vaccines (vacc_code, vacc_administration_code, manufacturer, vacc_name, quantity, ndc10, ndc11, arrival_date, expiry_date) VALUES (:vacc_code, :vacc_administration_code, :manufacturer, :vacc_name, :quantity, :ndc10, :ndc11, :arrival_date, :expiry_date)");

                // If-else statement in executing our prepared statement
                $_SESSION['message'] = ( $stmt->execute(array(':vacc_code' => $_POST['vacc_code'] , ':vacc_administration_code' => $_POST['vacc_administration_code'] , ':manufacturer' => $_POST['manufacturer'], ':vacc_name' => $_POST['vacc_name'] , ':quantity' => $_POST['quantity'] , ':ndc10' => $_POST['ndc10'], ':ndc11' => $_POST['ndc11'], ':arrival_date' => $_POST['arrival_date'], ':expiry_date' => $_POST['expiry_date'])) ) ? 'Vaccine added successfully' : 'Something went wrong. Cannot add vaccine';

                $query = $db->prepare("SELECT * FROM vaccines WHERE vacc_code = :vacc_code AND arrival_date = :arrival_date AND expiry_date = :expiry_date");
                $query->execute(array(':vacc_code' => $_POST['vacc_code'], ':arrival_date' => $_POST['arrival_date'], ':expiry_date' => $_POST['expiry_date']));
                $result2 = $query->fetchAll();
                $id2 = $result2[0]['id'];

                // Delivery Logs
                $logs = $db->prepare("INSERT INTO vacc_delivery_logs (id, vacc_code, quantity, arrival_time) VALUES (:id, :vacc_code, :quantity, :arrival_time)");
                $logs->execute(array(':id' => $id2, ':vacc_code' => $_POST['vacc_code'], ':quantity' => $_POST['quantity'], ':arrival_time' => $arrival_time));
            }
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }

        // Close connection
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Fill up add form first';
    }
    header('Location: ../view/_vaccInventory.php');
    exit();
?>