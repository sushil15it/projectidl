<?php
require_once ("../login/loginphp/conn.php");
require_once ("../login/loginphp/sessionactive.php");

$libraryid= $_SESSION["libraryId"];
$bkdb=  $_SESSION["bkdb"];
 ?>
<?php 
 if( isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST"){
 if( isset($_POST['bookName'])&& isset($_POST['author'])){
  $bookid=$_POST["bookid"];
  $bookName=$_POST["bookName"]; 
  $author=$_POST["author"];
   $publication=$_POST["publication"];
   $quantity=$_POST["quantity"];
  
   $sqladd="INSERT INTO $bkdb (BookId,bookName,author,publication,totalcopy,avilable)
   VALUES('$bookid','$bookName','$author','$publication','$quantity','$quantity')";
   if(mysqli_query($conn,$sqladd)){
 echo"book have added sucefully";
 header("location:/projectidl/librarian/bookbank.php");
   }else{
 
   
       echo"error:" .mysqli_error($conn);
       header("location:/projectidl/librarian/bookbank.php");
   }
 }else{
 $bookid=$_POST["bookid"];
   $quantity=$_POST["quantity"];
   $oldquantity=intval($_POST["oldquantity"]);
   $numup=$quantity-$oldquantity;
   $exavilble=$_POST['avilable'];
   
   $avilble=number_format($exavilble)+$numup;
   $sqlupq="UPDATE $bkdb SET totalcopy='$quantity' ,avilable='$avilble'WHERE BookId='$bookid'";
  if(mysqli_query($conn,$sqlupq)){
    echo"update succefull";
    header("location:/projectidl/librarian/bookbank.php");
  
  }
  else{
    echo"error :". mysqli_error($conn);
    header("location:/projectidl/librarian/bookbank.php");
  
  }
 
 }
}else{
    echo "error : <br>";
    
}
 ?>