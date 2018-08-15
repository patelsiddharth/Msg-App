<?php
/*echo $_GET["msg_id"];*/
session_start();
$con = mysqli_connect("localhost","root","","msgapp");
$q = "select * from message where m_id = ".$_GET["msg_id"];
$res = mysqli_query($con,$q);
$row = mysqli_fetch_assoc($res);
$r = $row['receiver_id'];
$s = $row['sender_id'];
$sql = "delete from message where m_id = ".$_GET["msg_id"];
mysqli_query($con,$sql);

//echo $row;
if($r == $_SESSION['id'])
{
	//header("location:home.php?id=".$s);
}
else
{
	//header("location:home.php?id=".$r);
}

?>