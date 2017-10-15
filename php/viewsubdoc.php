<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #myiframe {width:100%; height:220%;} 
  </style>
  <title>Econference</title>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

<script>$(window).resize(function () {

    windowWidth = $(window).innerWidth();

    if (windowWidth < 100) {

        $("#myiframe").hide();

    } else if (windowWidth >= YOUR_FACEBOOK_WIDTH) {

        $("#YOUR_COMMENT_BOX").show();

    }

});</script>
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
      $task=$_POST['task'];
      $_SESSION['task']=$task;  
    }
    else
    {
      $id=$_SESSION['tempid'];
      $task=$_SESSION['task'];
      
    }

    if($task=="sub1")
    {
      $review="Review1";
      $substatus="substatus1";
    }
    elseif ($task=="sub2")
    {
      $review="Review2";
      $substatus="substatus2";
    }





?>
  <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><?php echo "Welcome ".$_SESSION["name"]; ?></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../php/subadminprofile.php">Assigned Papers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../php/logout.php">Logout</a>
      </li>
     
    </ul>
  </nav>


<div class="container-float">
  <div class="row">
    <div class="col-lg-6">

      <?php 
    $doc="../pdf/doc".$id.".pdf" ;
     echo"<iframe name='myiframe' frameborder= class='embed-responsive-item col-lg-6' id='myiframe' src=$doc></iframe>";


   

  ?>
      
    </div>
    <div class="col-lg-6">
      
<!-- kkkkkkkkkkkkkkkkkkkkkkkkkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjkkkkkkkkkkkk -->

<div class="col-lg-12">
<?php
      

    echo"<br><form action='../php/fullview.php' method='post' target='_blank'>
    <input type='hidden' name='id' value='$id'></input>
    <input type='submit' class='btn btn-secondary form-control' value='View full Size'></input>  
    </form>";


    function edit($id,$review)
    {
      require("../php/connect.php");
      $sql2="SELECT $review FROM user WHERE id ='$id'";
      $res2=mysqli_query($db,$sql2);
      $row2=mysqli_fetch_assoc($res2);
      echo mysqli_error($db);

      ?>
      
      <form id="form3" action='../php/viewsubdoc.php' method='post'>
      <div class="form-group">
        <textarea name="message" rows="10" cols="85"  class="form-element"><?php echo $row2[$review]?></textarea>
        
 
       <input type='submit' class="form-control btn bg-danger" value='Submit' id='input-submit'></input>
     </div>
      </form>
      

  <?php
    

}

    function des($id,$substatus)
    {
      require("../php/connect.php");
      $sql3="UPDATE user SET $substatus='$_POST[decision]' WHERE id='$id'";
      mysqli_query($db,$sql3);
      echo mysqli_error($db);
      header("Refresh:0");
    }





  ?>
  <br>


<?php 
  require("../php/connect.php");
  $sql="SELECT * FROM user WHERE id='$id'";
  $res=mysqli_query($db,$sql);
  $row=mysqli_fetch_assoc($res);

if ($row[$review]== NULL)
 {
?>
</div>

<form  action='../php/viewsubdoc.php' method='post' id="form1">
    <textarea rows=15 cols="95" class="form-control" name='message' type='text'  placeholder='Review' required=''></textarea><br>
 
  <input type='submit' class="form-control btn btn-danger"  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" value='Submit' rows="5" id='input-submit'></input>
</form>

<?php

}
else if ($row[$substatus]==NULL) 
{

?>

<form  action="viewsubdoc.php" method="post">
<div class="form-group">
<input type="submit" class="form-control" name="decision" value="Edit"><br><br>
<input type="submit" class="btn bg-success" name="decision" value="Accept">
<input type="submit" class="btn bg-danger" name="decision" value="Reject">
<input type="submit" class="btn bg-warning" name="decision" value="Unable">
</div>
  
</form>
<?php

}
else
{
  echo "<div class='jumbotron'>Review completed</div>";
}
?>
















<?php 
  if (isset($_POST['assign'])) 
  {
    $assign=$_POST['assign'];
    $sql1="UPDATE user SET $task='$assign' WHERE id='$id' ";
    mysqli_query($db,$sql1);
    echo mysqli_error($db);
  }
  if(isset($_POST['message']))
  {
    $sql1="UPDATE user SET $review='$_POST[message]' WHERE id='$id'";
    mysqli_query($db,$sql1);
    echo mysqli_error($db);
    header("Refresh:0");

  }
  if(isset($_POST['decision']))
  {
    if($_POST['decision']=='Edit')
    {
      edit($id,$review);
    }
    elseif ($_POST['decision']=='Accept' || $_POST['decision']=='Reject' || $_POST['decision']=='Unable') 
    {
      des($id,$substatus);
    }
    
  }

 ?>






    </div>
  </div>
</div>



</div>
















<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>