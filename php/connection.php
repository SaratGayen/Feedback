<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "feedback";

  $con = mysqli_connect($hostname, $username, $password, $dbname);
if(!$con){
  echo"Unable to Connect with DB!!";
  }
?>