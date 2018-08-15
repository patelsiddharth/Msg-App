<?php
$e = $_POST["e"];
$p = $_POST["p"];
if(isset($_POST["login"]))
{
	$con = mysqli_connect("localhost","root","","msgapp");
	$sql = "select * from user where email='$e' and password='$p'";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
	
	if($count==1)
	{
		session_start();
		$row = mysqli_fetch_assoc($result);
		$_SESSION["id"]=$row["id"];
		$_SESSION["username"]=$row["name"];
		//print_r($_SESSION["username"]);
		header("location:home.php");
	}
	else
	{
		header("location:login.php?error=1");
	}
}

?>