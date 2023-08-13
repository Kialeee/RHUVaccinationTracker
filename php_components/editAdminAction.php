<?php
    session_start();
    include_once('connection2.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();
        try{
            $id = $_GET['id'];
            $fname = $_POST['fname'];
            $mname = $_POST['mname'];
            $lname = $_POST['lname'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $nationality = $_POST['nationality'];
            $province = $_POST['province'];
            $city = $_POST['city'];
            $barangay = $_POST['barangay'];
            $sitio = $_POST['sitio'];
            $username = $_POST['username'];
            $password = $_POST['password'];
 
            $sql = "UPDATE admins SET fname = '$fname', mname = '$mname', lname = '$lname', age = '$age', gender = '$gender', nationality = '$nationality', province = '$province', city = '$city', barangay = '$barangay', sitio = '$sitio', username = '$username', password = '$password' WHERE id = '$id'";
            //if-else statement in executing our query
            $_SESSION['flash'] = ( $db->exec($sql) ) ? 'Admin updated successfully' : 'Something went wrong. Cannot update admin';
 
        }
        catch(PDOException $e){
            $_SESSION['flash'] = $e->getMessage();
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['flash'] = 'Fill up edit form first';
    }
 
    header('location: ../view/_manageAdmins.php');
    die();
 
?>