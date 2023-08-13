<?php
    session_start();
    include_once('connection2.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $manufacturer = $_POST['manufacturer'];
            $vacc_name = $_POST['vacc_name'];

            // store the old vaccine name
            $old_vacc_name_query = $db->prepare('SELECT vacc_name FROM vaccines WHERE id = :id');
            $old_vacc_name_query->bindParam(':id', $id);
            $old_vacc_name_query->execute();
            $old_vacc_name = $old_vacc_name_query->fetchColumn();

            // update the vaccine
            $stmt = $db->prepare('UPDATE vaccines SET manufacturer = :manufacturer, vacc_name = :vacc_name WHERE id = :id');
            $stmt->bindParam(':manufacturer', $manufacturer);
            $stmt->bindParam(':vacc_name', $vacc_name);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            // select all schedules
            $select_schedules_query = $db->prepare("SELECT * FROM schedules");
            $select_schedules_query->execute();
            $schedules = $select_schedules_query->fetchAll();
            foreach ($schedules as $schedule) {
                //update the schedule
                $update_schedule_query = $db->prepare("UPDATE schedules SET vacc1 = :new_vacc_name WHERE vacc1 = :old_vacc_name;
                                                      UPDATE schedules SET vacc2 = :new_vacc_name WHERE vacc2 = :old_vacc_name;
                                                      UPDATE schedules SET vacc3 = :new_vacc_name WHERE vacc3 = :old_vacc_name;
                                                      UPDATE schedules SET vacc4 = :new_vacc_name WHERE vacc4 = :old_vacc_name;
                                                      UPDATE schedules SET vacc5 = :new_vacc_name WHERE vacc5 = :old_vacc_name;");
                $update_schedule_query->bindParam(':new_vacc_name', $vacc_name);
                $update_schedule_query->bindParam(':old_vacc_name', $old_vacc_name);
                $update_schedule_query->execute();
            }

            //if-else statement in executing our query
            $_SESSION['message'] = "Vaccine updated successfully";
 
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['message'] = 'Fill up edit form first';
    }
 
    header('location: ../view/_vaccInventory.php');
    die();
 
?>