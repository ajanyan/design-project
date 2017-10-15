<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #myiframe {width:700px; height:350%;} 
  </style>
  <title>Econference</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>


  <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Welcome</a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="../php/viewpapers.php">Submitted Papers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../php/completedpapers.php">Completed Papers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/viewsubadmin.php">Create Reviewer</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../php/logout.php">Logout</a>
      </li>
     
    </ul>
  </nav>




  <?php
    session_start();
  if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]))
  {
    header("location:../index.php");
  }
  require ('../php/connect.php');
    if(isset($_POST['id']))
    {
      $id=$_POST['id'];
      $_SESSION['tempid']=$id;  
    }
    else
    {
      $id=$_SESSION['tempid'];
      
    }




    // echo"<form action='../php/fullview.php' method='post' target='_blank'>
    // <input type='hidden' name='id' value='$id'> 
    // <input type='submit' value='View full Size'>  
    // </form>";

  ?>

  <br>
</div>


<?php
$sql2="SELECT * FROM user WHERE id='$id'";
$res2=mysqli_query($db,$sql2);
$row2=mysqli_fetch_assoc($res2);

?>
<style type="text/css">
p {
    word-break: break-all;
}
/*.container{
    display: flex
}*/

</style>
<div class="container">
  <div class="row">
    <div class="col-lg-6">
      
      <div class="jumbotron col-lg-12">
            <h5 class="display-5"><?php echo "Reviewer 1:$row2[sub1]"; ?></h5>
            <p class="lead"><?php echo "Status 1:$row2[substatus1]ed"; ?></p>
            <hr class="my-4">
            <p><?php echo $row2['Review1']?></p>
            <p class="lead">
            </p>  
      </div><!-- </div> -->
    </div>
<!--     <div class="col-lg-6">
 -->      <div class="jumbotron col-lg-6">
            <h5 class="display-5"><?php echo "Reviewer 2:$row2[sub2]"; ?></h5>
            <p class="lead"><?php echo "Status 2:$row2[substatus2]ed"; ?></p>
            <hr class="my-4">
            <p><?php echo $row2['Review2']?></p>
            <p class="lead">
            </p>  
          </div>
    </div>
<!--   </div>
 -->  <div class="row">
    <div class="col-lg-6">
      <div class="jumbotron col-lg-12">
        <h5 class="display-5"><?php echo "Final Decision:".$row2["decision"]."ed"; ?></h5>              
      </div>   
    </div>
    <div class="col-lg-6">
      <?php 
        echo"<form action='../php/fullview.php' method='post' target='_blank'>
    <input type='hidden' name='id' value='$id'> 
    <input type='submit' class='btn btn-success' value='View Paper'>  
    </form>";

       ?>
    </div>
  </div>
</div>









<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>