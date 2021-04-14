<?php
header('Content-Type: application/json');
require '../app/db.php';

$output = array("Response" => false);

$email = isset($_POST["email"]) ? $_POST["email"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$res = mysqli_query($con, $sql);
if(mysqli_num_rows($res)){
	session_start();
	$row = mysqli_fetch_array($res);
	$_SESSION["id"] = $row["id"];
	$_SESSION["name"] = $row["first_name"];
	$_SESSION["email"] = $row["email"];
	$_SESSION["is_admin"] = (int) $row["is_admin"];
	$output["Response"] = true;
	$output["is_admin"] = (int) $row["is_admin"];
}else{
	$output["Response"] = false;
	$output["msg"] = "Invalid Username/Password !";
}

echo json_encode($output);
?>