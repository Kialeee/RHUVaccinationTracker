<?php
    session_start();
    include_once('connection2.php');

    if(isset($_POST['addVT']) && isset($_GET['id'])){
        $database = new Connection();
        $db = $database->open();

        $id = $_GET['id'];
        $sql = $db->prepare("SELECT birthdate FROM records WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();
        $bday = $sql->fetch();

        $date_taken = new DateTime($_POST["date_taken"]);
        $birthdate = new DateTime($bday['birthdate']);
        $interval1 = $date_taken->diff($birthdate);
        $age1 = $interval1->y;

        $date__taken = new DateTime($_POST["date__taken"]);
        $interval2 = $date__taken->diff($birthdate);
        $age2 = $interval2->y;



        $vacc_name = $_POST['vacc_name'] ?? null;
        $administered_by = $_POST['administered_by'] ?? null;
        $date_taken = $_POST['date_taken'] ?? null;

        $vacc__name = $_POST['vacc__name'] ?? null;
        $administered__by = $_POST['administered__by'] ?? null;
        $date__taken = $_POST['date__taken'] ?? null;

        // Check if the user didn't have duplicate vaccines to insert.
        if ($vacc_name != $vacc__name) {

            $qry1 = $db->prepare("SELECT vacc_name1, vacc_name2, vacc_name3, vacc_name4, vacc_name5, vacc_name6, vacc_name7, vacc_name8, vacc_name9, vacc_name10 FROM vacc_records WHERE id = ?");
            $qry1->bindValue(1, $id);
            $qry1->execute();
            $qryData1 = $qry1->fetch();

            $qry2 = $db->prepare("SELECT vacc__name1, vacc__name2, vacc__name3, vacc__name4, vacc__name5, vacc__name6, vacc__name7, vacc__name8, vacc__name9, vacc__name10 FROM vacc_backtracking_records WHERE id = ?");
            $qry2->bindValue(1, $id);
            $qry2->execute();
            $qryData2 = $qry2->fetch();

            $similarVaccineTrigger = 0;
            for ($i = 1; $i <= 10; $i++) {
                if (!empty($vacc_name) && !empty($qryData1['vacc_name'.$i])) {
                    if ($vacc_name == $qryData1['vacc_name'.$i]) {
                        $similarVaccineTrigger++;
                        break;
                    }
                } else {
                    break;
                }
            }
            for ($i = 1; $i <= 10; $i++) {
                if (!empty($vacc_name) && !empty($qryData2['vacc__name'.$i])) {
                    if ($vacc_name == $qryData2['vacc__name'.$i]) {
                        $similarVaccineTrigger++;
                        break;
                    }
                } else {
                    break;
                }
            }
            for ($i = 1; $i <= 10; $i++) {
                if (!empty($vacc__name) && !empty($qryData1['vacc_name'.$i])) {
                    if ($vacc__name == $qryData1['vacc_name'.$i]) {
                        $similarVaccineTrigger++;
                        break;
                    }
                } else {
                    break;
                }
            }
            for ($i = 1; $i <= 10; $i++) {
                if (!empty($vacc__name) && !empty($qryData2['vacc__name'.$i])) {
                    if ($vacc__name == $qryData2['vacc__name'.$i]) {
                        $similarVaccineTrigger++;
                        break;
                    }
                } else {
                    break;
                }
            }
            
            if ($similarVaccineTrigger == 0) {

                if(isset($_POST['vacc_name']) && !empty($_POST['vacc_name']) && isset($_POST['administered_by']) && !empty($_POST['administered_by']) && isset($_POST['date_taken']) && !empty($_POST['date_taken'])) {

                    // check if there is any empty vacc_name field in the vacc_records table
                    $stmt = $db->prepare("SELECT vacc_name1, vacc_name2, vacc_name3, vacc_name4, vacc_name5, vacc_name6, vacc_name7, vacc_name8, vacc_name9, vacc_name10 FROM vacc_records WHERE id = :id");
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                    $data = $stmt->fetch();

                    // find the first empty vacc_name field
                    $empty_field = 'vacc_name0';
                    $i = 1;
                    for ($i = 1; $i <= 10; $i++) {
                        if(empty($data['vacc_name'.$i])) {
                            $empty_field = 'vacc_name'.$i;
                            break;
                        }
                    }

                    if($empty_field != 'vacc_name0') {
                        // Insert data to vacc_records
                        $stmt = $db->prepare("UPDATE vacc_records SET $empty_field = :vacc_name, administered_by$i = :administered_by, age_atm_taken$i = :age_atm_taken, date_taken$i = :date_taken WHERE id = :id");
                        $stmt->bindValue(':vacc_name', $vacc_name);
                        $stmt->bindValue(':administered_by', $administered_by);
                        $stmt->bindValue(':age_atm_taken', $age1);
                        $stmt->bindValue(':date_taken', $date_taken);
                        $stmt->bindValue(':id', $id);
                        $stmt->execute();
                        $_SESSION['alert'] = 'Record added successfully';
                        
                            // check the quantity of the vaccine in the vaccines table
                            $stmt = $db->prepare("SELECT quantity FROM vaccines WHERE vacc_name = :vacc_name");
                            $stmt->bindValue(':vacc_name', $vacc_name);
                            $stmt->execute();
                            $quantityValidation = $stmt->fetch();
                            if ($quantityValidation['quantity'] > 0) {
                                // decrement the quantity of the vaccine in the vaccines table
                                $stmt = $db->prepare("UPDATE vaccines SET quantity = quantity - 1 WHERE vacc_name = :vacc_name");
                                $stmt->bindValue(':vacc_name', $vacc_name);
                                $stmt->execute();

                                $stmt = $db->prepare("UPDATE schedules SET
                                quantity1 = CASE WHEN vacc1 = :vacc_name THEN quantity1 - 1 ELSE quantity1 END,
                                quantity2 = CASE WHEN vacc2 = :vacc_name THEN quantity2 - 1 ELSE quantity2 END,
                                quantity3 = CASE WHEN vacc3 = :vacc_name THEN quantity3 - 1 ELSE quantity3 END,
                                quantity4 = CASE WHEN vacc4 = :vacc_name THEN quantity4 - 1 ELSE quantity4 END,
                                quantity5 = CASE WHEN vacc5 = :vacc_name THEN quantity5 - 1 ELSE quantity5 END
                                WHERE vacc1 = :vacc_name OR vacc2 = :vacc_name OR vacc3 = :vacc_name OR vacc4 = :vacc_name OR vacc5 = :vacc_name");
                                $stmt->execute(array(':vacc_name' => $_POST["vacc_name"]));

                            } else {
                            $_SESSION['alert'] = 'No more stock of the selected vaccine!';
                        }
                    } else {
                        $_SESSION['alert'] = 'No empty fields for vaccine records left!';
                    }
                }


                if(isset($_POST['vacc__name']) && !empty($_POST['vacc__name']) && isset($_POST['administered__by']) && !empty($_POST['administered__by']) && isset($_POST['date__taken']) && !empty($_POST['date__taken'])) {

                    // check if there is any empty vacc_name field in the vacc_records table
                    $stmt = $db->prepare("SELECT vacc__name1, vacc__name2, vacc__name3, vacc__name4, vacc__name5, vacc__name6, vacc__name7, vacc__name8, vacc__name9, vacc__name10 FROM vacc_backtracking_records WHERE id = :id");
                    $stmt->bindValue(':id', $id);
                    $stmt->execute();
                    $data = $stmt->fetch();

                    // find the first empty vacc_name field
                    $empty_field = 'vacc__name0';
                    $i = 1;
                    for ($i = 1; $i <= 10; $i++) {
                        if(empty($data['vacc__name'.$i])) {
                            $empty_field = 'vacc__name'.$i;
                            break;
                        }
                    }

                    if($empty_field != 'vacc__name0') {
                        // Insert data to vacc_records
                        $stmt = $db->prepare("UPDATE vacc_backtracking_records SET $empty_field = :vacc__name, administered__by$i = :administered__by, age__atm__taken$i = :age__atm__taken, date__taken$i = :date__taken WHERE id = :id");
                        $stmt->bindValue(':vacc__name', $vacc__name);
                        $stmt->bindValue(':administered__by', $administered__by);
                        $stmt->bindValue(':age__atm__taken', $age2);
                        $stmt->bindValue(':date__taken', $date__taken);
                        $stmt->bindValue(':id', $id);
                        $stmt->execute();
                        $_SESSION['alert'] = 'Record added successfully';
                        
                    } else {
                        $_SESSION['alert'] = 'No empty fields for vaccine records left!';
                    }
                }
            } else {
                $_SESSION['alert'] = 'You are trying to input a vaccine that has already been taken by this user';
            }
        } else {
                // duplicate values found
                $_SESSION['alert'] = 'Duplicate vaccines to insert detected.';
        }
    }
    header('location: ../view/_dataRecords.php');
    die();

?>