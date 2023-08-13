<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "rhu_vaccination_tracker_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

    die("Failed to connect!");
}
