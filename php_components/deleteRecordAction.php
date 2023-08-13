<?php
    session_start();
    include_once('connection2.php');
 
    if(isset($_GET['id'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $sql = "DELETE FROM records WHERE id = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['alert'] = ( $db->exec($sql) ) ? 'Record deleted successfully' : 'Something went wrong. Cannot delete record';
        }
        catch(PDOException $e){
            $_SESSION['alert'] = $e->getMessage();
        }

        try{
            $sql = "DELETE FROM vacc_records WHERE id = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['alert'] = ( $db->exec($sql) ) ? 'Record deleted successfully' : 'Something went wrong. Cannot delete record';
        }
        catch(PDOException $e){
            $_SESSION['alert'] = $e->getMessage();
        }

        try{
            $sql = "DELETE FROM vacc_backtracking_records WHERE id = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['alert'] = ( $db->exec($sql) ) ? 'Record deleted successfully' : 'Something went wrong. Cannot delete record';
        }
        catch(PDOException $e){
            $_SESSION['alert'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
 
    }
    else{
        $_SESSION['alert'] = 'Select record to delete first';
    }
 
    header('location: ../view/_dataRecords.php');
    die();
?>