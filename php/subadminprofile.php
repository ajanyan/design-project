
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


  <?php 
session_start();
  
  if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]))
  {
    header("location:../index.php");
  }
$name=$_SESSION['name'];
$email=$_SESSION['user'];

require('../php/connect.php');
$sql="SELECT * FROM user WHERE (sub1='$name' OR sub2='$name') AND (substatus1 IS  NULL OR substatus2 IS NULL)";
$res=mysqli_query($db,$sql);
echo mysqli_error($db);

?>



  <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><?php echo "Welcome $name"; ?></a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../php/subadminprofile.php">Assigned Papers <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/completedpapers.php"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../php/viewsubadmin.php"></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../php/logout.php">Logout</a>
      </li>
     
    </ul>
  </nav>







<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th> 
      <th>Status</th>   
    </tr>
  </thead>
  <tbody>
    <?php
      if( mysqli_num_rows( $res )==0 )
      {
        echo '<tr><td colspan="4">No Tasks Found</td></tr>';
      }
      else
      {
while($row=mysqli_fetch_assoc($res))
        {
  
      if($row["sub1"]==$name)
        {
          $task="sub1";
        }
        elseif ($row["sub2"]==$name)
        {
          $task="sub2";
        }
        
if ($task=="sub1") 
{ 

          if ($row['Review1'] == NULL) 
          {
              $status="Review not written";
          }
          elseif ($row['substatus1'] ==  NULL) 
          {
            
            $status="Decision not taken";
          }
          else
          {
            $status="Submitted to Admin";
          }

       echo "<tr><td>{$row['Name']}</td><td>{$row['Email']}</td><td>{$status}</td>

          <td>
          <form action=viewsubdoc.php method='post'>
          <input type='hidden' name ='id' value='$row[id]'>
          <input type='hidden' name ='task' value='$task'>
          <input type='submit' value ='Manage' ></form>
       </tr>";
}

if ($task=="sub2") 
{ 

          if ($row['Review2'] == NULL) 
          {
              $status="Review not written";
          }
          elseif ($row['substatus2'] ==  NULL) 
          {
            
            $status="Decision not taken";
          }
          else
          {
            $status="Submitted to Admin";
          }

       echo "<tr><td>{$row['Name']}</td><td>{$row['Email']}</td><td>{$status}</td>

          <td>
          <form action=viewsubdoc.php method='post'>
          <input type='hidden' name ='id' value='$row[id]'>
          <input type='hidden' name ='task' value='$task'>
          <input type='submit' value ='Manage' ></form>
       </tr>";
}

        }
      }
   
    ?>
  </tbody>
</table>










<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</body>
</html>