<?php 
session_start();
require_once('connection.php');

if (isset($_POST['log'])) 
{
	if (empty($_POST['username']) || empty($_POST['password'])) 
	{
		header("location:index.php?Empty= Please Enter Username or Password!");
	}
	else
	{
		$query="select * from users where username='".$_POST['username']."' and password='".$_POST['password']."'";
		$result=mysqli_query($con,$query);

		if (mysqli_fetch_assoc($result)) 
		{
			$_SESSION['User']=$_POST['username'];
			header("location:main.php");
		}
		else
		{
			header("location:index.php?Invalid= Username or Password is Incorrect");
		}
	}
}
else
{
	echo 'Not Working Now Guys';
}

?>