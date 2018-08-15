<?php
$n = $_POST['search'];
if(isset($_POST['btn_search']))
{
	$con = mysqli_connect("localhost","root","","msgapp");
	$sql = "select * from user where name ='$n'";
	$result = mysqli_query($con,$sql);
	
	//print_r($row);
	$count = mysqli_num_rows($result);
	//echo $count;
	if($count != 0)
	{
		$row = mysqli_fetch_assoc($result);
		header("location:home.php?id=".$row['id']);
	}
	else
	{
		header("location:home.php?id=0");
	}
}


?>