<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Econference Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
    <!--     <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
 -->
    </head>

    <body>


        <?php 
    session_start();
    if(!isset($_SESSION["user"] ) && !isset($_SESSION["email"]))
    {
        header("location:../index.php");
    }

 ?>










        <!-- Top content -->
        <div class="top-content">
          
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Create</strong>Reviewer</h1>
                            <div class="description">
                              <p>
                                Create account for <strong>Reviewers</strong>
                              </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                          <div class="form-top">
                            <div class="form-top-left">
                              <h3>Enter details</h3>
                                
                            </div>
                            
                            </div>
                            <div class="form-bottom">
                          <form role="form" action="../php/createsubadmin.php" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Name</label>
                                <input type="text" name="name" placeholder="Name..." class="form-name form-control" id="form-password">
                              </div>
                            <div class="form-group">
                              <label class="sr-only" for="form-username">Username</label>
                                <input type="text" name="email" placeholder="Email..." class="form-username form-control" id="form-username">
                              </div>
                              <div class="form-group">
                                <label class="sr-only" for="form-password">Password</label>
                                <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                              </div>
                                    
                              <button type="submit" class="btn">Create</button>
                          </form>
                        </div>
                        </div>
                    </div>
                   
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->





<?php 
    require("../php/connect.php");

    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) 
    {
        $name=$_POST["name"];

        $password=$_POST["password"];
    
        $email=$_POST["email"];

        $sql="INSERT INTO des (Name,Email,Password,Role) VALUES ('$name','$email','$password','subadmin')";
        if (mysqli_query($db,$sql)) 
        {
?>
        <script>
            window.setTimeout(function() 
            {
                window.location = '../php/viewsubadmin.php';
            }, 2000);
        </script>
<?php
        }
        else
        {







            echo "User already registered";  
?>
      <!--   <script>
            window.setTimeout(function() 
            {
                window.location = '../php/viewsubadmin.php';
            }, 2000);
        </script> -->
<?php
            
        }
    }


 ?>














    </body>

</html>