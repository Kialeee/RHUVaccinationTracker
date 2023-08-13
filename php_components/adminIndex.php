<style>
  .home-section {
    display: flex; 
    flex-direction: column;
  }
  .top {
    display: flex;
  }
  #text {
    margin-top: 80px;
    margin-left: 60px;
    float: left;
  }
  #pic {
    padding-top: 20px;
    margin-left: 50px;
    float: right;
  }
  .d-flex {
    margin: -10px 80px 15px 80px;
  }
  #linkButton {
    width: 140px;
  }
  #picts {
    filter: drop-shadow(1px 1px 4px #000);
  }
  #picts:hover {
    transform: scale(1.1);
  }
</style>
<section class="home-section">
    <div class="d-flex">
      	<img id="text" src="../images/text.png" width="530px" height="110px">
        <img id="pic" src="../images/pic.png" width="320px">
    </div>
    <div class="d-flex justify-content-around">
        <a href="../view/_vaccInventory.php"> <img id="picts" src="../images/vaccines.png" width="140px"></a>
        <a href="../view/_dataRecords.php"> <img id="picts" src="../images/records.png" width="140px"></a>
        <a href="../view/_scheduling.php"> <img id="picts" src="../images/sched.png" width="140px"></a>
        <a href="../view/_manageAdmins.php"> <img id="picts" src="../images/accmngt.png" width="140px"></a>
    </div>
    <div class="d-flex justify-content-around">
        <a href="../view/_vaccInventory.php" id="linkButton" class="btn btn-success"><b>Vaccines</b></a>
        <a href="../view/_dataRecords.php" id="linkButton" class="btn btn-success"><b>Data Records</b></a>
        <a href="../view/_scheduling.php" id="linkButton" class="btn btn-success"><b>Schedules</b></a>
        <a href="../view/_manageAdmins.php" id="linkButton" class="btn btn-success"><b>Admin Mngt</b></a>
    </div>
</section>
