<?php
    session_start();
    include_once('../php_components/connection2.php');

    if(isset($_POST['add'])){
        $database = new Connection();
        $db = $database->open();

        $query = $db->prepare("SELECT * FROM admins WHERE fname = :fname AND mname = :mname AND lname = :lname");
        $query->execute(array(':fname' => $_POST['fname'] , ':mname' => $_POST['mname'], ':lname' => $_POST['lname']));
        $row_count = $query->rowCount();

        // Check if the user already exist.
        if ($row_count < 1) {       
            try{
                //use prepared statement to prevent sql injection
                $stmt = $db->prepare("INSERT INTO admins (admin_id, fname, mname, lname, age, gender, nationality, province, city, barangay, sitio, username, password) VALUES (:admin_id, :fname, :mname, :lname, :age, :gender, :nationality, :province, :city, :barangay, :sitio, :username, :password)");

                //if-else statement in executing our prepared statement
                $_SESSION['flash'] = ( $stmt->execute(array(':admin_id' => $_POST['admin_id'] , ':fname' => $_POST['fname'] , ':mname' => $_POST['mname'], ':lname' => $_POST['lname'] , ':age' => $_POST['age'] , ':gender' => $_POST['gender'], ':nationality' => $_POST['nationality'] , ':province' => $_POST['province'] , ':city' => $_POST['city'] , ':barangay' => $_POST['barangay'], ':sitio' => $_POST['sitio'] , ':username' => $_POST['username'] , ':password' => $_POST['password'])) ) ? 'Admin added successfully' : 'Something went wrong. Cannot add admin';  
            }
            catch(PDOException $e){
                $_SESSION['flash'] = $e->getMessage();
            }
        } else {
            $_SESSION['flash'] = "Admin " . $_POST['fname'] . " " . $_POST['mname'] . " " . $_POST['lname'] ." already exists.";
        }
 
        //close connection
        $database->close();
    }
 
    else{
        $_SESSION['flash'] = 'Fill up add form first';
    }
    header('Location: ../view/_manageAdmins.php');
    exit();
?>
       