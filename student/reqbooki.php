<?php
require_once ("../login/loginphp/conn.php");
require_once ("sessionver.php");
$userid=$_SESSION["useridstd"];
$libraryid= $_SESSION["libraryIdstd"];
$bkdb= $_SESSION["bkdbstd"];

 ?>
<?php 
 if( isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST"){
     $bookid=$_POST['bookid'];
     $bookissueid=mt_rand(100000,999999);
 
     function  declibid($bookissueid,$conn){
     $bookissueid++;
    
      $sqlstdid1  = "SELECT IssueId	 FROM bookisse Where IssueId='$bookissueid'";
      $result1 = mysqli_query($conn , $sqlstdid1);
      if(mysqli_num_rows($result1)>0){
        declibid($bookissueid,$conn);    
     
      }}
      declibid($bookissueid,$conn);
    
     $sqlisue="INSERT INTO bookisse (IssueId,libraryId,stdId,BookId,IsseStatus)
     VALUES('$bookissueid','$libraryid','$userid','$bookid','1')";
if(mysqli_query($conn,$sqlisue)){
    echo"request sent successfull plese check ur request status page";
    header("location:/projectidl/student/bookstore.php");
}else{
    echo"error: request not send". mysqli_error($conn);
    header("location:/projectidl/student/bookstore.php");
}
 
}else{
    echo "error : <br>";
    
}
 ?>