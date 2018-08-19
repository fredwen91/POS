<?php 
 
  include('server.php');

  if (isset($_GET['edit'])) {
      $id = $_GET['edit'];
      $edit_state = true;
      $rec = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
      $record = mysqli_fetch_array($rec);
      $firstname = $record['firstname'];
      $lastname = $record['lastname'];
      $username = $record['username'];
      $password = $record['password'];
      $email = $record['email'];
      $contact = $record['contact'];
      $city = $record['city'];
      $province = $record['province'];
      $id = $record['id'];
  }

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
    <link rel="stylesheet" type="text/css" href="css/users.css">
    
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


      <div class="container" id="product-form">

        <div id="main-block">
          <form method="POST" action="server.php">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
            <h3 class="page-header" style="margin: auto; margin-bottom: 10px;">Manage Users
              <?php if ($edit_state == false): ?>
              <button  type="submit" name="userSave" class="btn btn-success btn-sm" style="float: right;">Add User</button>
              <?php else: ?>
              <button  type="submit" name="update" class="btn btn-success btn-sm" style="float: right;">Update User</button> 
              <?php endif ?>
            </h3>

          
            <div class="form-inline" style="padding: 10px;">
              <div class="row">
                <div class="col-xs-6">
                  <label class="float-right" for="firstname" class="control-label">First Name</label>
                </div>
                <div class="col-xs-6">
                  <label class="float-left" for="lastname" class="control-label">Last Name</label>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <input class="float-right" type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>" maxlength="25" style="border-radius: 5px; padding-left: 5px;">
                </div>
                <div class="col-xs-6">
                  <input class="float-left" type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" maxlength="25" style="border-radius: 5px; padding-left: 5px;">
                </div>
              </div>
            </div>

            <div class="form-inline" style="padding: 10px;">
              <div class="row">
                <div class="col-xs-6">
                  <label class="float-right" for="username" class="control-label">Username</label>
                </div>
                <div class="col-xs-6">
                  <label class="float-left" for="password" class="control-label">Password</label>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <input class="float-right" type="text" class="form-control" name="username" value="<?php echo $username; ?>" maxlength="35" style="border-radius: 5px; padding-left: 5px;">
                </div>
                <div class="col-xs-6">
                  <input class="float-left" type="password" class="form-control" name="password" value="<?php echo $password; ?>" maxlength="35" style="border-radius: 5px; padding-left: 5px;">
                </div>
              </div>
            </div>

            <div class="form-inline" style="padding: 10px;">
              <div class="row">
                <div class="col-xs-6">
                  <label class="float-right" for="email" class="control-label">E-mail Address</label>
                </div>
                <div class="col-xs-6">
                  <label class="float-left" for="contact" class="control-label">Contact Number</label>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <input class="float-right" type="email" class="form-control" name="email" value="<?php echo $email; ?>" maxlength="25" style="border-radius: 5px; padding-left: 5px;">
                </div>
                <div class="col-xs-6">
                  <input class="float-left" type="number" class="form-control" name="contact" value="<?php echo $contact; ?>" maxlength="25" style="border-radius: 5px; padding-left: 5px;">
                </div>
              </div>
            </div>

            <div class="form-inline" style="padding: 10px;">
              <div class="row">
                <div class="col-xs-6">
                  <label class="float-right" for="city" class="control-label">City</label>
                </div>
                <div class="col-xs-6">
                  <label class="float-left" for="province" class="control-label">Province</label>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-6">
                  <input class="float-right" type="text" class="form-control" name="city" value="<?php echo $city; ?>" maxlength="25" style="border-radius: 5px; padding-left: 5px;">
                </div>
                <div class="col-xs-6">
                  <input class="float-left" type="text" class="form-control" name="province" value="<?php echo $province; ?>" maxlength="25" style="border-radius: 5px; padding-left: 5px;">
                </div>
              </div>
            </div>
          </form>

        </div>

        <div id="sidebar">
          <h3 class="page-header" style="margin: auto; margin-bottom: 10px;">Users List</h3>
              <table class="table table-hover">
                <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody style="text-transform: capitalize;">
                  <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                      <td><?php echo $row['firstname']; ?></td>
                      <td><?php echo $row['lastname']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-sm" href="users.php?edit=<?php echo $row['id']; ?>">Edit</a>
                      </td>
                      <td>
                        <a class="btn btn-danger btn-sm" href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
        </div>
      </div>
    

    

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

  </body>
</html>
 
