<?php 
	$barcode = "";
	$productname = "";
	$quantity = "";
	$price = "";
	$category = "";
	$id = 0;

	$db = mysqli_connect('localhost','root','','firstproject');

	if (isset($_POST['save'])) {
		$barcode = $_POST['barcode'];
		$productname = $_POST['productname'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$category = $_POST['category'];

		$query = "INSERT INTO product (barcode, productname, quantity, price, category) VALUES ('$barcode','$productname','$quantity','$price','$category')";
		mysqli_query($db, $query);
		header('location: product.php');
	}

	$firstname = "";
	$lastname = "";
	$username = "";
	$password = "";
	$email = "";
	$contact = "";
	$city = "";
	$province = "";
	$id = 0;
	$edit_state = false;

	$db = mysqli_connect('localhost','root','','firstproject');

	if (isset($_POST['userSave'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$city = $_POST['city'];
		$province = $_POST['province'];

		$query = "INSERT INTO users (firstname, lastname, username, password, email, contact, city, province) VALUES ('$firstname','$lastname','$username','$password','$email','$contact','$city','$province')";
		mysqli_query($db, $query);
		header('location: users.php');
		
	}

	if (isset($_POST['update'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$city = $_POST['city'];
		$province = $_POST['province'];
		$id = $_POST['id'];

		mysqli_query($db, "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', password='$password', email='$email', contact='$contact', city='$city', province='$province' WHERE id=$id");
		header('location: users.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM users WHERE id=$id");
		header('location: users.php');
	}

	$results = mysqli_query($db, "SELECT * FROM users");

?>