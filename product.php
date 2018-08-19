<?php 

  include('server.php');

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
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/product.css">

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
          
            <h3 class="page-header" style="margin: auto; margin-bottom: 10px;">Product
              <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#myModal">Add Product</button>
              <em><small style="float: right; padding-right: 20px;">Click the button to add product</small></em>
            </h3>          

          <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add Product</h4>
            </div>
            <div class="modal-body">
            
                <form class="form-horizontal" method="POST" action="server.php">
                  <div class="form-group">
                    <label for="barcode" class="col-sm-2 control-label">Barcode</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="barcode" placeholder="Enter Barcode">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="productname" class="col-sm-2 control-label">Product</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="productname" placeholder="Enter Product Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="quantity" class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="price" placeholder="Enter Price">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="category" placeholder="Enter Category">
                    </div>
                  </div>
                    <div class="modal-footer">
                      <button type="submit" name="save" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>

              <table class="table table-bordered table-hover">

                <thead>
                  <tr>
                    <td>Barcode</td>
                    <td>Product Name</td>
                    <td>Quantity</td>
                    <td>Price</td>
                    <td>Category</td>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        $conn = new mysqli('localhost','root','','firstproject');

                        $sql = $conn->query('SELECT * FROM product');
                        while($data = $sql->fetch_array()) {
                          echo '
                              <tr>
                                  <td>'.$data['barcode'].'</td>
                                  <td>'.$data['productname'].'</td>
                                  <td>'.$data['quantity'].'</td>
                                  <td>'.$data['price'].'</td>
                                  <td>'.$data['category'].'</td>
                              </tr>
                          ';
                        }
                     ?>
                </tbody>
              </table>
        </div>
      


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <script type="text/javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap.js"></script>

    <script type="text/javascript" src="js/product.js"></script>

  </body>
</html>
 
