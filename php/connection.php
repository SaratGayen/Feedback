<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "feedback";

  $con = mysqli_connect($hostname, $username, $password, $dbname);
if($con){
  echo"coonnection Succefull";
  }else{
    echo "connection not succfull";
  }
?>