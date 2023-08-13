<?php
    session_start();
    include_once('connection2.php');
 
    if(isset($_POST['edit'])){
        $database = new Connection();
        $db = $database->open();

        // Retrieve existing record from the database
        $stmt = $db->prepare("SELECT * FROM records WHERE id = :id");
        $stmt->execute(array(':id' => $_GET['id']));
        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        // Compare post values with existing values
        if ($record['province'] == $_POST['province'] &&
            $record['city'] == $_POST['city'] &&
            $record['barangay'] == $_POST['barangay'] &&
            $record['sitio'] == $_POST['sitio'] &&
            $record['username'] == $_POST['username'] &&
            $record['password'] == $_POST['password']) {
            // All values are the same, skip update
            $_SESSION['updateProfile'] = 'No changes made to record';
        } else {
            // Some values are different, proceed with update
            try {
                    $id = $_GET['id'];
                    $province = $_POST['province'];
                    $city = $_POST['city'];
                    $barangay = $_POST['barangay'];
                    $sitio = $_POST['sitio'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $sql = "UPDATE records SET province = '$province', city = '$city', barangay = '$barangay', sitio = '$sitio', username = '$username', password = '$password' WHERE id = '$id'";
                    //if-else statement in executing our query
                    $_SESSION['updateProfile'] = ( $db->exec($sql) ) ? 'Record updated successfully' : 'Something went wrong. Cannot update record';

            } catch(PDOException $e) {
                $_SESSION['updateProfile'] = $e->getMessage();
            }
        }
 
        //close connection
        $database->close();
    }
    else{
        $_SESSION['updateProfile'] = 'Fill up edit form first';
    }
 
    header('location: ../view/_profile.php');
    die();
 
?>