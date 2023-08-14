<?php 
  session_start();

	include("connection.php");
	include("functions.php");

	$admin_data = check_adminLogin($con);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | RHU Vaccination Tracker</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../css/allAdminStyles.css" media="screen">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <script src="../js/jquery.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

</head>
<body>
    <div class="sidebar">
    <div class="logo-details">
      <i class="bx bxl-c-plus-plus icon"></i>
      <div class="logo_name">ARGAO RHU</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
      <li>
        <a href="../view/_adminIndex.php">
          <i class="bx bx-home"></i>
          <span class="links_name">HOME</span>
          <span class="tooltip">HOME</span>
        </a>
      </li>
      <li>
        <a href="../view/_vaccInventory.php">
          <i class="bx bx-table"></i>
          <span class="links_name">Vaccine Inventory</span>
          <span class="tooltip">Vaccine Inventory</span>
        </a>
      </li>
      <li>
        <a href="../view/_dataRecords.php">
          <i class="bx bx-folder-open"></i>
          <span class="links_name">Data Records</span>
          <span class="tooltip">Data Records</span>
        </a>
      </li>
      <li>
        <a href="../view/_scheduling.php">
          <i class="bx bx-calendar-week"></i>
          <span class="links_name">Schedules</span>
          <span class="tooltip">Schedules</span>
        </a>
      </li>
      <li>
        <a href="../view/_manageAdmins.php">
          <i class="bx bx-user-circle"></i>
          <span class="links_name">Manage Admins</span>
          <span class="tooltip">Manage Admins</span>
        </a>
      </li>

      <li class="profile">
        <div class="profile-details">
          <img src="../images/kirky.png">
          <div class="name_job">
            <div class="name">Kialeee</div>
            <div class="job">Web Designs</div>
          </div>
        </div>
          <a href="../php_components/adminLogout.php" id="log_out" style="margin-left: 50px;"><i class="bx bx-log-out"></i></a>
      </li>
  </div>