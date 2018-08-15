<?php
session_start();
$msg = $_POST["message"];
$r = $_POST["r_id"];
$s = $_SESSION["id"];
//date_default_timezone_get('Asia/Kolkata');
$t = date('Y-m-d h:i:sa');
if(isset($_POST["message"]))
{
	$con = mysqli_connect("localhost","root","","msgapp");
	$sql = "insert into message set message = '$msg',sender_id = '$s',receiver_id = '$r',time='$t'";
	mysqli_query($con,$sql);
	//header("location:home.php?id=".$r);
	//echo "ok";
}
else
{
	echo "nok";
	//header("location:home.php?id=".$r);
}
?>