<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<body>


<?php
require("./php/connect.php");

$name=$_POST["name"];
$email=$_POST["email"];
$sql1="INSERT INTO user(Name,Email) VALUES('$name','$email')";
mysqli_query($db,$sql1);
echo mysqli_error($db);
$sql2="SELECT id FROM user WHERE Email='$email' ORDER BY id DESC LIMIT 1";
$res=mysqli_query($db,$sql2);
$row=mysqli_fetch_assoc($res);



 define ("filesplace","./pdf");

 if (is_uploaded_file($_FILES['paper_pdf']['tmp_name']))
{

    if ($_FILES['paper_pdf']['type'] != "application/pdf")
    {
        echo "<p>Paper must be uploaded in PDF format.</p>";
    } 
    else
    {
        $name = "doc".$row['id'];
        $result = move_uploaded_file($_FILES['paper_pdf']['tmp_name'], filesplace."/$name.pdf");
       
    }
} 



define("filesplacedoc","./doc");
if (is_uploaded_file($_FILES['paper_source']['tmp_name']))
{
    $path_parts = pathinfo($_FILES["paper_source"]["name"]);
    $ext = $path_parts['extension'];

    $namedoc = "doc".$row['id'];
    $resultdoc = move_uploaded_file($_FILES['paper_source']['tmp_name'], filesplacedoc."/$namedoc"."."."$ext");


} 

$sql3="UPDATE user SET Upload='$name' WHERE id='$row[id]'";
 			mysqli_query($db,$sql3);
echo mysqli_error($db);

?>
</body>
</html>