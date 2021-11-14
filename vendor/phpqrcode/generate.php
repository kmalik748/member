<?php
include('qrlib.php');
require '../../app/db.php';

$uid = $_GET["user"];
$event = $_GET["event"];

$s = "SELECT * FROM users WHERE id=$uid";
$r = mysqli_query($con, $s);
$row = mysqli_fetch_array($r);
$username = $row["first_name"];

$s = "SELECT * FROM event WHERE id=$event";
$r = mysqli_query($con, $s);
$row = mysqli_fetch_array($r);
$eventName = $row["name"];

$img =  QRcode::png("$username is allowed for the event $eventName");
echo "data:image/png;base64,".base64_encode($img);

//echo '<img src="example_003_simple_png_output_param.php?id='.$img.'" />';

?>