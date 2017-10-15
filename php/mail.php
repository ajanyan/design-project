<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
</head>
<body>
<?php 
	session_start();
	if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]))
	{
		header("location:../index.php");
	}
require("../php/connect.php");
$sql="SELECT * FROM user WHERE id ='$_POST[id]'";
$res=mysqli_query($db,$sql);
$row=mysqli_fetch_assoc($res);
	$to =$row['Email'] ;
	
	$subject = "Review of Submitted Paper";
	
	$txt = "Hi $row[Name],
	     Your submitted paper is $row[decision]ed.
	     Review of the paper is given below
	     Review 1
	     $row[Review1]
	     Review 2
	     $row[Review2]";
	$headers = "From: econferencecon@gmail.com";
mail($to,$subject,$txt,$headers);
$sql1="UPDATE user SET Status='Yes' WHERE id='$_POST[id]'";
mysqli_query($db,$sql1);
echo "Mail Sent";
	
?>
		<script>
			window.setTimeout(function() 
			{
    			window.location = '../php/viewpapers.php';
  			}, 2000);
		</script>






</body>
</html>