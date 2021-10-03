<?php
//$con = mysqli_connect("localhost","root","","member");
$con = mysqli_connect("localhost","root","","member");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$GLOBALS["con"] = $con;

?>