<?php
    session_start();
    include_once('connection2.php');
 
    if(isset($_GET['id'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $sql = "DELETE FROM admins WHERE id = '".$_GET['id']."'";
            //if-else statement in executing our query
            $_SESSION['flash'] = ( $db->exec($sql) ) ? 'Admin deleted successfully' : 'Something went wrong. Cannot delete admin';
        }
        catch(PDOException $e){
            $_SESSION['flash'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
 
    }
    else{
        $_SESSION['flash'] = 'Select admin to delete first';
    }
 
    header('location: ../view/_manageAdmins.php');
    die();
?>