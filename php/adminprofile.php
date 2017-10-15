<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
<?php 
	
	session_start();
	
	if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]) && !isset($_SESSION["id"]))
	{
		header("location:../index.php");
	}
	$name=$_SESSION['name'];
	echo "Welcome $name";

 ?>
 <br><br><br><br>
<a href="viewpapers.php"><button>Submitted Papers</button></a>
<a href="completedpapers.php"><button>Completed Papers</button></a>
<a href="../php/viewsubadmin.php"><button>Manage Sub Admins</button></a>

<a href="../php/logout.php"><button>Logout</button></a>
</body>
</html>