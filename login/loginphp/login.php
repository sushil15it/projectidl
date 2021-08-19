<?php
require_once ("conn.php");
 session_start();
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body><?php
     
 if(isset( $_SESSION["loged-in"])){
     echo"<center>you have already logged in </center>";
     echo'<center><a href="/projectidl/login/loginphp/log_out.php">logout</a></center>';
    
     echo'<center>go to the <a href="/projectidl/librarian/index.php">home page</a></center>';
   
 }else{
     
 if($_SERVER['REQUEST_METHOD'] == "POST"){
      
$sqldata=null;
$id=$_POST["id"];
$passkey=$_POST["password"];
$idofwhome=null;
if(is_numeric($id)){
    $idofwhome=1;
    
    $userid=$id;
    $stdve=mb_strlen($userid);
     if($stdve>9){
 $sqldata = "SELECT  *  FROM student WHERE stdId='$id'";
     
     } else{
        echo'<center>please wait till verifed <br>your  id '.$row1["stdId"].'is under proccess<br>try after some time</center>';
       
     }
}
else if(filter_var($id, FILTER_VALIDATE_EMAIL)){ 
    $sqlstdEData = "SELECT  stdId  FROM student WHERE email='$id'";
$result1= mysqli_query($conn, $sqlstdEData);
 if(mysqli_num_rows($result1) ==1){
     // student login without verified account 
     $row1= mysqli_fetch_array($result1);
    
     $userid=$row1["stdId"];
    $stdve=mb_strlen($userid);
     if($stdve==6){

        echo'<center>please verify this id '.$row1["stdId"].'  or wait</center>';
       
     } else{
        echo'<center>your  id '.$row1["stdId"].'<br>please login with your id</center>';
       
     }
   
  
 }else{
     $idofwhome=2;
    $sqldata = "SELECT  *  FROM librarian WHERE email='$id'";
  
 }
  
     
 } else {
     echo"enter  valid email or id<BR><center>thank you!</center>";
     echo' <center>  <a href="/projectidl/login/log_in.html">login-in</a></center>';
       
 }  
   //check email  exist or not and get table name
if( $sqldata){
     
 $result2 = mysqli_query($conn, $sqldata);
  if(mysqli_num_rows($result2) ==1){
     //match email and password
      $row= mysqli_fetch_array($result2);
      $hash_passkey=$row["password"];
     
     if (password_verify($passkey, $hash_passkey)){
         //after password verification
        
        
      
     echo"you have succefully loged ";
     if($idofwhome==2){
        $_SESSION["loged-in"]=true;
        $_SESSION["userid"]=$row["email"];
        $_SESSION["libraryId"]=$row["libraryId"];
        $_SESSION["bkdb"]=$row["bkdb"];
       
     header("location:/projectidl/librarian/index.php");
     } else if($idofwhome==1){
        $_SESSION["logedinstd"]=true;
        $_SESSION["useridstd"]=$row["stdId"];
        $_SESSION["libraryIdstd"]=$row["libraryId"];
        $_SESSION["bkdbstd"]=$row["bkdb"];
       
     header("location:/projectidl/student/index.php");
     }
     echo'<center><a href="/projectidl/login/loginphp/log_out.php">logout</a></center>';
       }else{ 
           echo"error :".$passkey." wrong password  <br>";
            echo'<a href="/projectidl/login/log_in.html">back to log-in page <- </a>';
       }
 
    }
    else { 
        header("location:/projectidl/login/log_in.html");
        }


}
 }else{
    
 header("location:/projectidl/login/log_in.html");
 }}
 
?>
 </body>
 </html>
 