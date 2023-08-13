<?php
    session_start();
    include_once('../php_components/connection2.php');

    if(isset($_POST['add'])){
        $database = new Connection();
        $db = $database->open();

        $birthdate = new DateTime($_POST['birthdate']);
        $now = new DateTime();
        $interval = $now->diff($birthdate);
        $age = $interval->y;

        $query = $db->prepare("SELECT * FROM records WHERE fname = :fname AND mname = :mname AND lname = :lname");
        $query->execute(array(':fname' => $_POST['fname'] , ':mname' => $_POST['mname'], ':lname' => $_POST['lname']));
        $row_count = $query->rowCount();

        // Check if the user already exist.
        if ($row_count < 1) {

            try{
                    //use prepared statement to prevent sql injection
                    $stmt = $db->prepare("INSERT INTO records (user_id, fname, mname, lname, birthdate, age, gender, nationality, province, city, barangay, sitio, username, password) VALUES (:user_id, :fname, :mname, :lname, :birthdate, :age, :gender, :nationality, :province, :city, :barangay, :sitio, :username, :password)");

                    //if-else statement in executing our prepared statement
                    $_SESSION['alert'] = ( $stmt->execute(array(':user_id' => $_POST['user_id'] , ':fname' => $_POST['fname'] , ':mname' => $_POST['mname'], ':lname' => $_POST['lname'] , ':birthdate' => $_POST['birthdate'] , ':age' => $age , ':gender' => $_POST['gender'], ':nationality' => $_POST['nationality'] , ':province' => $_POST['province'] , ':city' => $_POST['city'] , ':barangay' => $_POST['barangay'], ':sitio' => $_POST['sitio'] , ':username' => $_POST['username'] , ':password' => $_POST['password'])) ) ? 'Record added successfully' : 'Something went wrong. Cannot add record'; 

            }
            catch(PDOException $e){
                $_SESSION['alert'] = $e->getMessage();
            }



            // Check if the user didn't have duplicate vaccines to insert.
            $vaccinations = array();
            $countToInsertVT = 1;
            while (isset($_POST['vacc_name'.$countToInsertVT]) && isset($_POST['administered_by'.$countToInsertVT]) && isset($_POST['date_taken'.$countToInsertVT])) {

                $vaccinations[] = $_POST['vacc_name' . $countToInsertVT];
                $countToInsertVT++;
            }

            $countToInsertVB = 1;
            while (isset($_POST['vacc__name'.$countToInsertVB]) && isset($_POST['administered__by'.$countToInsertVB]) && isset($_POST['date__taken'.$countToInsertVB])) {

                $vaccinations[] = $_POST['vacc__name' . $countToInsertVB];
                $countToInsertVB++;
            }

            // Select id from records where user_id = $_POST['user_id']
            $stmt1 = $db->prepare("SELECT id FROM records WHERE user_id = ?");
            $stmt1->execute([$_POST['user_id']]);
            $rowww = $stmt1->fetch();
            $id = $rowww['id'];

            // Insert $id and user_id into vacc_records table
            $stmt2 = $db->prepare("INSERT INTO vacc_records (id, user_id) VALUES (?, ?)");
            $stmt2->execute([$id, $_POST['user_id']]); 

            // Select id from records where user_id = $_POST['user_id']
            $stmt = $db->prepare("SELECT id FROM records WHERE user_id = ?");
            $stmt->execute([$_POST['user_id']]);
            $rowww = $stmt->fetch();
            $id = $rowww['id'];

                    // Insert $id and user_id into vacc_backtracking_records table
            $stmt = $db->prepare("INSERT INTO vacc_backtracking_records (id, user_id) VALUES (?, ?)");
            $stmt->execute([$id, $_POST['user_id']]);

            $unique_vaccinations = array_unique($vaccinations);

            if(count($vaccinations) == count($unique_vaccinations)) {

                // no duplicate values found
                try{

                    // Insert records for all non-empty input fields
                    for ($i = 1; $i <= 100; $i++) {
                        if (!empty($_POST["vacc_name$i"]) && !empty($_POST["administered_by$i"]) && !empty($_POST["date_taken$i"])) {

                                $stmt3 = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = ?");
                                $stmt3->execute([$_POST['vacc_name' . $i]]);
                                $quantityValidation = $stmt3->fetch();
                                if ($quantityValidation['quantity']>0) {

                                    $qry = $db->prepare("UPDATE vaccines SET quantity = quantity - 1 WHERE vacc_name = :vacc_name");
                                    $qry->execute(array(':vacc_name' => $_POST["vacc_name$i"]));

                                    $stmt4 = $db->prepare("UPDATE schedules SET quantity1 = quantity1 - 1 WHERE vacc1 = :vacc_name");
                                    $stmt4->execute(array(':vacc_name' => $_POST["vacc_name$i"]));

                                    $stmt44 = $db->prepare("UPDATE schedules SET quantity2 = quantity2 - 1 WHERE vacc2 = :vacc_name");
                                    $stmt44->execute(array(':vacc_name' => $_POST["vacc_name$i"]));

                                    $stmt444 = $db->prepare("UPDATE schedules SET quantity3 = quantity3 - 1 WHERE vacc3 = :vacc_name");
                                    $stmt444->execute(array(':vacc_name' => $_POST["vacc_name$i"]));

                                    $stmt4444 = $db->prepare("UPDATE schedules SET quantity4 = quantity4 - 1 WHERE vacc4 = :vacc_name");
                                    $stmt4444->execute(array(':vacc_name' => $_POST["vacc_name$i"]));

                                    $stmt44444 = $db->prepare("UPDATE schedules SET quantity5 = quantity5 - 1 WHERE vacc5 = :vacc_name");
                                    $stmt44444->execute(array(':vacc_name' => $_POST["vacc_name$i"]));

                                    $date_taken = new DateTime($_POST["date_taken$i"]);
                                    $birthdate = new DateTime($_POST["birthdate"]);
                                    $interval = $date_taken->diff($birthdate);
                                    $age = $interval->y;

                                    $stmt5 = $db->prepare("UPDATE vacc_records SET vacc_name" . $i . " = :vacc_name" . $i . ", administered_by" . $i . " = :administered_by" . $i . ", age_atm_taken" . $i . " = :age, date_taken" . $i . " = :date_taken" . $i . " WHERE user_id = :user_id");

                                    $stmt5->execute(array(
                                        ':vacc_name' . $i => $_POST["vacc_name$i"],
                                        ':administered_by' . $i =>$_POST["administered_by$i"],
                                        ':age' => $age,
                                        ':date_taken' . $i => $_POST["date_taken$i"],
                                        ':user_id' => $_POST['user_id']
                                    ));
                                } else {
                                    $_SESSION['alert'] = "No more available " . $_POST['vacc_name' . $i] . " vaccine.";
                                }

                        } else {
                            // Stop the loop if an empty input field is encountered
                            break;
                        }
                    }

                    $_SESSION['alert'] = 'Records added successfully';
                }
                catch(PDOException $e){
                    $_SESSION['alert'] = $e->getMessage();
                }


                try{ 

                    // Insert records for all non-empty input fields
                    for ($i = 1; $i <= 10; $i++) {
                        if (!empty($_POST["vacc__name$i"]) && !empty($_POST["administered__by$i"]) && !empty($_POST["date__taken$i"])) {

                            $date_taken = new DateTime($_POST["date__taken$i"]);
                            $birthdate = new DateTime($_POST["birthdate"]);
                            $interval = $date_taken->diff($birthdate);
                            $age = $interval->y;

                            $stmt = $db->prepare("UPDATE vacc_backtracking_records SET vacc__name" . $i . " = :vacc__name" . $i . ", administered__by" . $i . " = :administered__by" . $i . ", age__atm__taken" . $i . " = :age, date__taken" . $i . " = :date__taken" . $i . " WHERE user_id = :user_id");

                            $stmt->execute(array(
                                ':vacc__name' . $i => $_POST["vacc__name$i"],
                                ':administered__by' . $i =>$_POST["administered__by$i"],
                                ':age' => $age,
                                ':date__taken' . $i => $_POST["date__taken$i"],
                                ':user_id' => $_POST['user_id']
                            ));
                        } else {
                            // Stop the loop if an empty input field is encountered
                            break;
                        }
                    }

                    $_SESSION['alert'] = 'Records added successfully';
                }
                catch(PDOException $e){
                    $_SESSION['alert'] = $e->getMessage();
                }
            } else {
                // duplicate values found
                $_SESSION['alert'] = 'Duplicate vaccines to insert detected.';
            }
        } else {
            $_SESSION['alert'] = "User " . $_POST['fname'] . " " . $_POST['mname'] . " " . $_POST['lname'] ." already exists.";
        }

        //close connection
        $database->close();
    }

    else{
        $_SESSION['alert'] = 'Fill up add form first';
    }
    header('Location: ../view/_dataRecords.php');
    exit();
?>