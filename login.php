<html>
<head>
	<title> msgapp </title>
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
          <a class="navbar-brand" href="#">msgapp</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li> 
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
    </div>
    </nav> 
    <div class="container">
      <div class="row" style="padding-top: 100px;"> 
      <div class="col-md-6">
        <h3>Ths application helps you create and edit notes</h3>
        <img src="img.jpg" alt="logo" style="width: 100%;">
      </div>
      <div class="col-md-6">
        <H3>LOGIN </H3>
        <form action="login_php.php" method="post">
          
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="e" class="form-control" placeholder="EMAIL" id="email" required="">
          </div>
          <div class="form-group">
            <label for="p">Password</label>
            <input type="password" name="p" class="form-control" placeholder="PASSWORD" id="p" required="">
          </div>
          
          <button class="btn btn-info" name="login">Login</button>
        </form>
      </div>
      <?php
        if(isset($_GET["error"]))
        {
            echo"<b>Incorrect Credentials</b>";
        }
      ?>
      </div>
    </div>
</div>
</body>
</html>
