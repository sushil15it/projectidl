<?php
require_once ("../login/loginphp/conn.php");
require_once ("../login/loginphp/sessionactive.php");

$libraryid= $_SESSION["libraryId"];
//accept
if(isset($_POST["stdid2"])){
    $stdid1=$_POST["stdid2"];
    $stdid1+=0;
    $stdid2=$stdid1 + ($libraryid *1000000);
  
$sqlstdidup= "UPDATE student SET stdId=$stdid2 WHERE stdId=$stdid1";
if(mysqli_query($conn,$sqlstdidup)){
 echo "before update  ".$stdid1." after update".$stdid2 ." ";
 header("location:/projectidl/librarian/stdlist.php");

}
else{
 echo  " server error  ".$stdid2 ."<br>";

 echo "error :".mysqli_error($conn);
}}
//remove
if(isset($_POST["stdid21"])){
    $stdid2=$_POST["stdid21"];
 
   $stdid2+=0;
print_r($stdid2);
$sqlstdre= "DELETE FROM student  WHERE stdId=$stdid2";
if(mysqli_query($conn,$sqlstdre)){
 echo "student data of id  ".$stdid2."has removed successful ";
 header("location:/projectidl/librarian/stdlist.php");

}
else{
 echo  " server error  ".$stdid2 ."<br>";

 echo "error :".mysqli_error($conn);
}

}

 ?>
 