<?php
require_once ("../login/loginphp/conn.php");
require_once ("sessionver.php");
$userid=$_SESSION["useridstd"];
$libraryid= $_SESSION["libraryIdstd"];
$bkdb= $_SESSION["bkdbstd"];
 ?>
<?php 
 if( isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST"){
 
 $username=$_POST["username"];
 $email=$_POST["email"];
 $mobile=$_POST["mobile"];
 $HiQ=$_POST["HiQ"];
 $passkey=$_POST['password'];
$hash_passkey=password_hash($passkey,PASSWORD_DEFAULT);

   //image
   $imgfile=$_FILES["image"]["name"];
   $tempimagfile=$_FILES["image"]["tmp_name"];
   
    $newfilen = "icon-".$userid.".".pathinfo($imgfile,PATHINFO_EXTENSION);
   $folder="../login/loginphp/image/".$newfilen;
  
   //email validation
 
 $sqlstdE = "SELECT 	email FROM student WHERE email='$email'";
 $result21 = mysqli_query($conn, $sqlstdE);
 if (mysqli_num_rows($result21) > 0 ){
    $row1= mysqli_fetch_array($result21);
    if($row1["email"]==$email){
        echo"same email";
    }else{
       
       echo"email is new<br>";
    }
  
 }
   $sqllibE = "SELECT 	email FROM librarian WHERE email='$email'";
 $result22 = mysqli_query($conn, $sqllibE);
 if (mysqli_num_rows($result22) > 0 ){
    
    header("location:../student/index.php");
   echo"email is alreday exist n db as librarian<br>";

 }

 
$sqluser= "UPDATE student SET email='$email',
stdname='$username',mobile='$mobile',branch='$HiQ',image='$newfilen',
password='$hash_passkey' WHERE stdId='$userid' ";
if(mysqli_query($conn,$sqluser)){
echo"user dataa update";
   
        if(!(move_uploaded_file($tempimagfile,$folder))){
            echo"file is not moved";
        }
        echo"data update succefull";
        $_SESSION["stdicon"]=$newfilen;
        header("location:../student/index.php");
    
}else{
    echo"error: user data not update";
}

}else{
    echo "error : <br>";
    
}
 ?>