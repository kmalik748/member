<?php

$con = mysqli_connect("localhost","root","","project_member");
//$con = mysqli_connect("localhost","lmecorp_member","member@123","lmecorp_member");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$GLOBALS["con"] = $con;

?>