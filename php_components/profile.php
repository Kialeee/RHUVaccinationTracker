<?php
  include_once('connection2.php');
  $database = new Connection();
  $db = $database->open();

  // Check if user_data array exists and has a user_id key
  if (isset($user_data) && array_key_exists('user_id', $user_data)) {
    $stmt = $db->prepare("SELECT * FROM records WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $user_data['user_id']);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the result is not empty
    if (!empty($result)) {
      // Extract the values from the result array and assign them to variables
      $fname = $result['fname'];
      $mname = $result['mname'];
      $lname = $result['lname'];
      $birthdate = $result['birthdate'];
      $age = $result['age'];
      $gender = $result['gender'];
      $nationality = $result['nationality'];
      $province = $result['province'];
      $city = $result['city'];
      $barangay = $result['barangay'];
      $sitio = $result['sitio'];
      $username = $result['username'];
      $password = $result['password'];
    }
  }
?>
<style>
  .bttn {
    float: right;
    background-color: #198754;
    padding: 10px;
    border-radius: 10px;
    color: white;
    text-decoration: none;
  }
  .bttn:hover {
    background-color: #157347;
    color: white;
    text-decoration: none;
  }
  .row {
    margin-top: -15px;
    margin-bottom: -15px;
  }
  .col-sm-3 {
    padding: 10px 5px 10px 5px;
  }
  .col-sm-9 {
    padding: 10px 5px 10px 5px;
  }
  .card-body {
    border-radius: 10px;

  }
  #border {
    border-radius: 10px;
  }
  #rightBorder {
    border-right: 1.5px solid #cab0a3;
    height: 563px;
    margin-right: 68px;
  }
  .alert5 {
    position: fixed; /* position the element at the top of the page */
    top: 0;
    right: 0;
    z-index: 1; /* make sure the alert5 is on top of other content */
    background-color: #c1fec1; /* give the alert5 a translucent lightgreen background */
    color: black; /* set text color to black */
    padding: 20px; /* add some padding */
    width: 100%;
  }
  #dropdownMenuButton {
    margin-right: 38.5px;
  }
</style>

<?php 
  if(isset($_SESSION['updateProfile'])){
?>
    <div class="alert5 text-center" id="alert5">
      <?php echo $_SESSION['updateProfile']; ?>
    </div>

<script>
  setTimeout(function(){
    // Get the alert5 div
    var alert5 = document.getElementById("alert5");
    // Remove the div after 3 seconds
    alert5.remove();
     },3000);
</script>


<?php
    unset($_SESSION['updateProfile']);
  }
?>
<div class="container" id="rightBorder">
  <br>
  <h1 align="center" style="font-family: catchy wager; color: darkgreen;">My Profile</h1>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4" id="border">
          <div class="card-body text-center">
            <div style="display: flex; justify-content: center; align-items: center;">
              <i class="bx bx-user-circle"></i>
              <h5 class="my-3"><b><?php echo $fname; ?> <?php echo $lname; ?></b></h5>
            </div>
            <p class="text-muted mb-1">Currently residing in <?php echo $sitio; ?>, <?php echo $barangay; ?>, <?php echo $city; ?>, <?php echo $province; ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4" id="border">
          <div class="card-body">
            <div class="row" id="toHover">
              <div class="col-sm-3">
                <p class="mb-0"><b>Full Name :</b></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $fname; ?> <?php echo $mname; ?> <?php echo $lname; ?></p>
              </div>
            </div>
            <hr>
            <div class="row" id="toHover">
              <div class="col-sm-3">
                <p class="mb-0"><b>Birthdate :</b></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $birthdate; ?></p>
              </div>
            </div>
            <hr>
            <div class="row" id="toHover">
              <div class="col-sm-3">
                <p class="mb-0"><b>Age :</b></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $age; ?></p>
              </div>
            </div>
            <hr>
            <div class="row" id="toHover">
              <div class="col-sm-3">
                <p class="mb-0"><b>Gender :</b></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $gender; ?></p>
              </div>
            </div>
            <hr>
            <div class="row" id="toHover">
              <div class="col-sm-3">
                <p class="mb-0"><b>Nationality :</b></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $nationality; ?></p>
              </div>
            </div>
            <hr>
            <div class="row" id="toHover">
              <div class="col-sm-3">
                <p class="mb-0"><b>Address :</b></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $sitio; ?>, <?php echo $barangay; ?>, <?php echo $city; ?>, <?php echo $province; ?></p>
              </div>
            </div>
            <hr>
            <div class="row" id="toHover">
              <div class="col-sm-3">
                <p class="mb-0"><b>Username :</b></p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $username; ?></p>
              </div>
            </div>
            <hr>
            <div class="row" id="toHover">
              <div class="col-sm-3">
                <p class="mb-0"><b>Password :</b></p>
              </div>
              <div class="col-sm-9" style="display: flex;">
                <input type="password" disabled id="password2" class="form-control" value="<?php echo $password; ?>" />
                <i class="bx bx-lock password-lock2" style="padding: 12px 0 0 10px;" class="bx bx-lock" onclick="togglePassword()"></i>
              </div>
              <script>
                  function togglePassword() {
                      var x = document.getElementById("password2");
                      var y = document.getElementsByClassName("password-lock2")[0];
                      if (x.type === "password") {
                          x.type = "text";
                          y.classList.remove("bx-lock");
                          y.classList.add("bx-lock-open");
                      } else {
                          x.type = "password";
                          y.classList.remove("bx-lock-open");
                          y.classList.add("bx-lock");
                      }
                  }
              </script>
            </div>
          </div>
        </div>
      </div>
      <div>
        <?php include('editProfile.php'); ?>
        <a href="#edit_<?php echo $user_data['user_id']; ?>" class="bttn" data-bs-toggle="modal">Update</a>
      </div>
    </div>
  </div>
</div>