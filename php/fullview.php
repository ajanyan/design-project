<html>
<head>
<style type="text/css">
#myiframe {width:100%; height:100%;} 
</style>
</head>

<body>
<?php 
	session_start();
	if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]) && !isset($_SESSION["id"]))
	{
		header("location:../index.php");
	}

 ?>


<div id="scroller" >

<?php 
	$id=$_POST['id'];
	$doc="../pdf/doc".$id.".pdf" ;

echo"<iframe name='myiframe' id='myiframe' src=$doc>";


?>

</div>

</body>
</html>