<?php
header('Content-Type: application/json');
require '../app/db.php';

$output = array("Response" => false);

$name = isset($_POST["username"]) ? $_POST["username"] : '';
$email = isset($_POST["email"]) ? $_POST["email"] : '';
$password = isset($_POST["password"]) ? $_POST["password"] : '';

$select = mysqli_query($con, "SELECT * from users WHERE email = '$email'");
if(mysqli_num_rows($select)) {
	$output["Response"] = false;
	$output["msg"] = 'This email is already being used';
	echo json_encode($output);
	exit(); die();
}


$sql = "INSERT INTO users (first_name, email, password) VALUES ('$name', '$email', '$password')";
if(mysqli_query($con, $sql)){
	$output["Response"] = true;
}else{
	$output["msg"] = mysqli_error($con);
}

echo json_encode($output);
?>