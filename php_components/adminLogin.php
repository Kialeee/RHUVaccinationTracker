<?php 

session_start();

  include("connection.php");
  include("functions.php");
?>
<style>
  #img:hover {
    transform: scale(1.1);
  }
</style>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | RHU Vaccination Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/allStyles.css" media="screen">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <div class="logodiv">
          <img src="../images/logo.png" height="40px" width="330px" class="navbar-brand" id="logo"  style="margin-left: 19px;">
        </div>
          <div class="adminlogin">
          <a href="../view/_login.php"><img src="../images/user.png" height="40px" width="35px" class="navbar-brand" id="img" alt="user"></a>
        </div>
      </div>
    </nav>
    
    <div class="parent" style="display: grid; place-items: center; height: 88.5vh;">
      <form method="post">
        <div>
          <h2 align="center">Admin Login</h2>
          <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
              //something was posted
              $username = $_POST['username'];
              $password = $_POST['password'];

              if(!empty($username) && !empty($password) && !is_numeric($username))
              {

                //read from database
                $query = "select * from admins where username = '$username' limit 1";
                $result = mysqli_query($con, $query);

                if($result)
                {
                  if($result && mysqli_num_rows($result) > 0)
                  {

                    $admin_data = mysqli_fetch_assoc($result);
                    
                    if($admin_data['password'] === $password)
                    {

                      $_SESSION['admin_id'] = $admin_data['admin_id'];
                      header("Location: ../view/_adminIndex.php");
                      die;
                    }
                  }
                }
                
                echo  "<center>Wrong username or password!</center>";
              }else
              {
                echo  "<center>Wrong username or password!</center>";
              }
            }
          ?>
        </div>
        <input class="form-control" type="text" name="username" placeholder="Username..." required style="margin-bottom: 10px;">
        <input class="form-control" id="password" type="password" name="password" placeholder="Password..." required style="margin-bottom: 10px;">

        <input class="btn btn-success" id="button" type="submit" value="Login" style="margin: 0 auto; display: block;"><br><br>

      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>