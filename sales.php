<?php 

	session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <title>POS</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/sales.css">
    
    <style>
      #nav{
        margin-bottom: 0;
        border-radius: 0;
      }
      .nav{
        color: #fff;
        text-transform: capitalize;
      }
    </style>
  </head>
  <body>
    
      <nav class="navbar navbar-inverse" id="nav">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="main.php">POS</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="main.php">Home</a></li>
              <li><a href="product.php">Product</a></li>
              <li><a href="sales.php">Sales</a></li>
              <li><a href="inventory.php">Inventory</a></li>
              <li><a href="users.php">Users</a></li>
            </ul>
            <div class="nav navbar-nav navbar-right" id="log">
              <?php

               if(isset($_SESSION['User']))
                 {
                   echo ' Wellcome ' . $_SESSION['User'];
                   echo ' <a class="btn btn-default" href="logout.php?logout">Logout</a> ';
                  }
                else
                 {
                  header("location:index.php");
                 }

              ?>
            </div>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    

    <h1>SALES</h1>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

  

  </body>
</html>
 
