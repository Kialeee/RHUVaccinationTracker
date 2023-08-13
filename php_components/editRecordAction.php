<?php
    session_start();
    include_once('connection2.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();

        $birthdate = new DateTime($_POST['birthdate']);
        $now = new DateTime();
        $interval = $now->diff($birthdate);
        $age = $interval->y;
      
        // Some values are different, proceed with update
        try {
                $id = $_GET['id'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $birthdate = $_POST['birthdate'];
                $gender = $_POST['gender'];
                $nationality = $_POST['nationality'];
                $province = $_POST['province'];
                $city = $_POST['city'];
                $barangay = $_POST['barangay'];
                $sitio = $_POST['sitio'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "UPDATE records SET fname = '$fname', mname = '$mname', lname = '$lname', birthdate = '$birthdate', age = '$age', gender = '$gender', nationality = '$nationality', province = '$province', city = '$city', barangay = '$barangay', sitio = '$sitio', username = '$username', password = '$password' WHERE id = '$id'";
                //if-else statement in executing our query
                 $_SESSION['alert'] = ( $db->exec($sql) ) ? 'Record updated successfully' : 'Something went wrong. Cannot update record';

        } catch(PDOException $e) {
            $_SESSION['alert'] = $e->getMessage();
        }

        // Insert data to vacc_records
        try {
            $id = $_GET['id'];
            for($i = 1; $i <= 10; $i++) {
                if(isset($_POST['vacc_name'.$i])) {
                    $vacc_name = $_POST['vacc_name'.$i];
                    $administered_by = $_POST['administered_by'.$i];
                    $age_atm_taken = $_POST['age_atm_taken'.$i];
                    $date_taken = $_POST['date_taken'.$i];

                    $sql = "UPDATE vacc_records SET vacc_name.$i = '$vacc_name', administered_by.$i = '$administered_by', age_atm_taken.$i = '$age_atm_taken', date_taken.$i = '$date_taken' WHERE id = '$id'";

                    // Execute the prepared statement 
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                } else {
                    break;
                }
            }
        } catch(PDOException $e) {
            $_SESSION['alert'] = $e->getMessage();
        }

        // Insert data to vacc_backtracking_records
        try {
            $id = $_GET['id'];
            for($i = 1; $i <= 10; $i++) {
                if(isset($_POST['vacc__name'.$i])) {
                    $vacc__name = $_POST['vacc__name'.$i];
                    $administered__by = $_POST['administered__by'.$i];
                    $age__atm__taken = $_POST['age__atm__taken'.$i];
                    $date__taken = $_POST['date__taken'.$i];

                    $sql = "UPDATE vacc_backtracking_records SET vacc__name.$i = '$vacc__name', administered__by.$i = '$administered__by', age__atm__taken.$i = '$age__atm__taken', date__taken.$i = '$date__taken' WHERE id = '$id'";

                    // Execute the prepared statement 
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                } else {
                    break;
                }
            }
        } catch(PDOException $e) {
            $_SESSION['alert'] = $e->getMessage();
        }

        //close connection
        $database->close();
    }
    else{
        $_SESSION['alert'] = 'Fill up edit form first';
    }
 
    header('location: ../view/_dataRecords.php');
    die();
 
?>