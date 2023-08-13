<?php
    session_start();
    include_once('connection2.php');
 
    if(isset($_GET['id'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $sql = "DELETE FROM schedules WHERE id = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['notification'] = ( $db->exec($sql) ) ? 'Schedule deleted successfully' : 'Something went wrong. Cannot delete schedule';
        }
        catch(PDOException $e){
            $_SESSION['notification'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
 
    }
    else{
        $_SESSION['notification'] = 'Select admin to delete first';
    }
 
    header('location: ../view/_scheduling.php');
    die();
?>