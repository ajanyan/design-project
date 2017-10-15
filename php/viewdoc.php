<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #myiframe {width:100%; height:368%;} 
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
      <li class="nav-item active">
        <a class="nav-link" href="../php/viewpapers.php">Submitted Papers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
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
    if(isset($_POST['id']))
    {
      $id=$_POST['id'];
      $_SESSION['tempid']=$id;  
    }
    else
    {
      $id=$_SESSION['tempid'];
      
    }





  ?>

  
<!-- </div> -->

<?php 
  require("../php/connect.php");
  $sql="SELECT Name FROM des WHERE Role='subadmin'";
  $res=mysqli_query($db,$sql);
?>

<?php
$sql2="SELECT * FROM user WHERE id='$id'";
$res2=mysqli_query($db,$sql2);
$row2=mysqli_fetch_assoc($res2);

?>

<?php








  if (isset($_POST['assign1'])) 
  {
    $assign1=$_POST['assign1'];
    $sql1="UPDATE user SET sub1='$assign1' WHERE id='$id' ";
    mysqli_query($db,$sql1);
    echo mysqli_error($db);
    header("Refresh:0");
  }

  if (isset($_POST['assign2'])) 
  {
    $assign2=$_POST['assign2'];
    $sqla1="UPDATE user SET sub2='$assign2' WHERE id='$id' ";
    mysqli_query($db,$sqla1);
    echo mysqli_error($db);
    header("Refresh:0");
  }


 ?>




<div class="container-float">
  <div class="row">
    <div class="col-lg-6" >
        <?php 
     $doc="../pdf/doc".$id.".pdf" ;
     echo"<iframe name='myiframe' type='application/pdf' id='myiframe' src=$doc></iframe>";
  ?>
      
    </div>
    <div class="col-lg-6" >
      <br>
          

      <?php 
          echo"<form action='../php/fullview.php' method='post' target='_blank'>
          <input type='hidden' name='id' value='$id'> 
          <input type='submit' class='form-control btn btn-secondary' value='View full Size'>  
          </form>";
      ?>



<?php

if ($row2['sub1']==NULL)
 {


echo"<div>
<form action='viewdoc.php' method='post' id='form2'>
<div class='form-group'>
  <br>
  Select Reviewer 1 <br>
  <select class='form-control' name='assign1'>" ;
    
      while ($row=mysqli_fetch_assoc($res))
      {
        echo "<option>{$row['Name']}</option>";
      }
      
    
  echo"</select><br>
  <input type='submit'class='form-control btn btn-info'  value='Assign'>
</div>
</form>
</div>";
}


else if ($row2['sub2']==NULL)
 {


echo"<div>
<form action='viewdoc.php' method='post' id='form2'>
  <br>
  Select Reviewer 2 <br>
  <select name='assign2' class='form-control'>" ;
    
      while ($row=mysqli_fetch_assoc($res))
      { if($row["sub1"]!=$row["Name"])
        {
          
          echo "<option>{$row['Name']}</option>";
        }
      }
      
    
  echo"</select><br>
  <input type='submit' class='form-control btn btn-info' value='Assign'>

</form>
</div>";
}


if ($row2['substatus1']==NULL && $row2['sub1']!=NULL) 
{

  echo "<div id='form2'>Assigned to <b>$row2[sub1]</b></div>";
}
if ($row2['substatus2']==NULL && $row2['sub2']!=NULL) 
{

  echo "<div id='form2'><br>Assigned to <b>$row2[sub2]</b></div>";
}
if ($row2['Status']==NULL && $row2['substatus1']!=NULL && $row2['sub1']!=NULL) 
{

  ?>  
  <div>

  <form class="cf" id="form22">
    <?php //echo "<br>Reviewer 1: $row2[sub1]"; ?>
    <?php echo "<br>Status 1:$row2[substatus1]ed"; ?>
      <textarea name="message1" class="form-control" type="text" name="msg1" readonly=""><?php echo $row2['Review1']?></textarea>
  </form>
  
  


<?php



  
}


if ($row2['Status']==NULL && $row2['substatus2']!=NULL && $row2['sub2']!=NULL) 
{

  ?>


  <form class="cf23" id="form23">
    <?php //echo "<br>Reviewer 2: $row2[sub2]"; ?>
    <?php echo "<br>Status 2:$row2[substatus2]ed"; ?>
    <br>
      <textarea name="message2" class="form-control" type="text" name="msg2" readonly=""><?php echo $row2['Review2']?></textarea>
  </form>
</div>



<?php
if($row2['decision']==NULL && $row2['substatus1']!=NULL && $row2['substatus2']!=NULL)
{
  if($row2['substatus1']=="Accept" && $row2['substatus2']=="Accept")
  {
    $decision="Accept";
  }
  elseif ($row2['substatus1']=="Reject" || $row2['substatus2']=="Reject") 
  {
    $decision="Reject";
  }
  else
  {
    $decision="Reject";
  }
  $sqlfinal="UPDATE user SET decision='$decision' WHERE id='$id' ";
  mysqli_query($db,$sqlfinal);
  header("Refresh:0");
}
else
{
  
  echo "<br>Final Decision:".$row2["decision"]."ed";
  ?>
    <form class="cf" action="../php/mail.php" method="post" id="form23">
      <input type="hidden" value="<?php echo $row2['id'] ?>" name ="id">
        <input type="submit" class="form-control btn btn-danger" value="Mail" id="input-submit">
      </form>


    <?php
}

}



?>



















</div>  

    </div>
    



  </div>











<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>