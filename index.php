<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
   
  </head>
  <body>
    
    
		
		<form class="my-form" method="post" action="process.php">
			<div class="container">

			<?php
				if(@$_GET['Empty']==true)
				{
			?>
				<div class="alert alert-danger" role="alert"><?php echo $_GET['Empty']?></div>
			<?php
				}
			?>

			<?php
				if(@$_GET['Invalid']==true)
				{
			?>
				<div class="alert alert-danger"><?php echo $_GET['Invalid']?></div>
			<?php
				}
			?>
		<div class="myform">
			<div class="form-group">
		   	 <input type="text" class="form-control" name="username" placeholder="Username">
		 	</div>
		 	<div class="form-group">
		   	 <input type="password" class="form-control" name="password" placeholder="Password">
		 	</div>
		 	<button type="submit" class="btn btn-primary btn-lg btn-block" name="log">Log In</button>
		 	</div>
		</div>
		</form>
		
	

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>