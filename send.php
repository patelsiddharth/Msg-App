<?php
session_start();
if(!isset($_SESSION["id"]))
{
    header("location:index.php");
    exit;
}
$con = mysqli_connect("localhost","root","","msgapp");
?>
<html>
<head>
	<title>msgapp</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse  navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand" href="#">Notes</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="home.php">msgapp</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li style="color:#9d9d9d;padding:16px 10px 0px 0px ; ">WELCOME&nbsp;&nbsp; 
              <?php 
              print_r($_SESSION["username"]);
              ?></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div>
    </div>
    </nav> 
    <div class="container" style="padding-top:70px">
		<h3>Compose Message</h3>
		<form action="send_msg.php" method="post">
      <div class="form-group">
        <textarea class="form-control" placeholder="Message..." style="resize: none;height: 100px;" name="message" required=""></textarea>  
      </div>
      <button class="btn btn-success" name="send">Send Message</button>
      <input type="hidden" name="r_id" value="<?php echo $_GET['id'];?>">
    </form>
	</div>
</body>
</html>
<?php
if(isset($_GET["sent"]))
{
    echo"<script>alert('Message Sent')</script>";
}


?>