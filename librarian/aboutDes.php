
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
</head><body>
<?php
require_once ("../login/loginphp/conn.php");
require_once ("../login/loginphp/sessionactive.php");

$libraryid= $_SESSION["libraryId"];
if(isset($_POST["about"])){
$about=$_POST["about"];

$sqlabout= "UPDATE librarydetail SET About='$about' WHERE libraryId='$libraryid' ";
if(mysqli_query($conn,$sqlabout)){
    header("location:../librarian/index.php");
}
}
else if(isset($_POST["discription"])){

    $des=$_POST["discription"];
    

$sqldes= "UPDATE  librarydetail SET Descrition='$des' WHERE libraryId='$libraryid' ";
if(mysqli_query($conn,$sqldes)){
    
    header("location:../librarian/index.php");
 
}
  
}
 ?><a href="index.php">go to home page</a>
 </body>