<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<link rel="stylesheet" type="text/css" href="css/a.css">
<?php 
	session_start();
	if(isset($_SESSION["user"]))
	{
		header("location:php/autologin.php");
	}
?>

<form class="form-style-6" action="php/login.php" method="post">
EMAIL:<br>
        <input name="email" required="" type="email"><br>
PASSWORD:<br>
        <input name="password" required="" type="password"><br>
        <a href="html/recover.html"><b>Forgot Password</b></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <a href="html/register.html"><b>Not yet registered?</b></a><br><br><br>
        <input value="LOG IN" type="submit" >
        </form>
       


</form>





</body>
</html>