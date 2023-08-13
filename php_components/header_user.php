<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RHU Vaccination Tracker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/allStyles.css" media="screen">

    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <script src="../js/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <div class="logodiv">
          <img src="../images/logo.png" height="40px" width="330px" class="navbar-brand" id="logo">
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="_index.php">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="_recordHistory.php">RECORD HISTORY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="_schedules.php">SCHEDULES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="_aboutUs.php">ABOUT US</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <style>
              #dropdownMenuButton {
                border: none;
                background-color: #198754;
                color: white;
                border-radius: 50px;
                margin-right: 55px;
              }
              #dropdownMenuButton:hover {
                border: none;
                background-color: #157347;
                color: white;
              }
              #dropdownMenuButton:active {
                border: none;
              }
              .dropdown-menu.show {
                width: 50px;
              }
              #drop:active {
                background-color: #198754;
              }
            </style>
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-user-circle"> <?php echo $user_data['fname']; ?></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a id="drop" class="dropdown-item" href="../view/_profile.php">View Profile</a>
                <a id="drop" class="dropdown-item" href="../php_components/logout.php">Logout</a>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>

 