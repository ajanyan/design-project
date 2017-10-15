
<!DOCTYPE html>
<html>
<head>
	<title>RECOVER</title>
</head>
<body>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.0/css/materialize.min.css">

<?php 
  if(!isset($_POST["email"]))
  {
    header("location:../index.php");
  }


$email=$_POST["email"];


require("connect.php");

# Prepare the SELECT Query
  $selectSQL = "SELECT Name,Password FROM des WHERE Email='$email' ";
 # Execute the SELECT Query
  if( !( $selectRes = mysqli_query($db,$selectSQL) ) ){
    echo 'Retrieval of data from Database Failed - #'.mysql_errno().': '.mysql_error();
  }else{
  	
    ?>
    

    <?php
      if( mysqli_num_rows( $selectRes )==0 ){
        echo '<tr><td colspan="4">Sorry your Email is not registered</td></tr>';
?>
    <script>
      window.setTimeout(function() 
      {
          window.location = '../html/recover.html';
        }, 2000);
    </script>
    <?php


      }else{
        while( $row = mysqli_fetch_assoc( $selectRes ) ){
          $pass= $row['Password'];
          $name= $row['Name'];
        

         	$to =$email ;
			$subject = "Password Recovery";
			$txt = "Hi $name ,
      The password of the account you requested is '$pass'.
      If you haven't requested please let us know.
      E Conference a Life";
			$headers = "From: econferencecon@gmail.com";

			mail($to,$subject,$txt,$headers);


			echo "The password has been send to your registered Email address";
			


			







        }
      }
    ?>
  

    <?php
  }















 ?>
    <script>
      window.setTimeout(function() 
      {
          window.location = '../index.php';
        }, 2000);
    </script>
<br>

<br>


</body>
</html>
