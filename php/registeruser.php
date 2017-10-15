<?php 
	session_start();
	if(!isset($_POST["name"] ) && !isset($_POST["email"]) && !isset($_POST["password"]))
	{
		header("location:../index.php");
	}

	require("../php/connect.php");


	$name=$_POST["name"];

	$email=$_POST["email"];

	$password=$_POST["password"];


	$sql= "INSERT INTO des (Name,Email,Password,Role) VALUES ('$name','$email','$password','user')";


if(mysqli_query($db,$sql))
	{
		echo "Registration Sucessful";
?>
		<script>
			window.setTimeout(function() 
			{
    			window.location = '../index.php';
  			}, 2000);
		</script>
<?php


	}
	else
	{
		echo "User already exists";
		mysqli_error($db);
		?>
		<script>
			window.setTimeout(function() 
			{
    			window.location = '../html/register.html';
  			}, 2000);
		</script>
<?php
	}

 ?>