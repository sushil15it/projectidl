<?php
require_once ("../login/loginphp/conn.php");
require_once ("../login/loginphp/sessionactive.php");

$libraryid= $_SESSION["libraryId"];
 ?>
<?php 
 if( isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST"){
 $libname=$_POST["libname"];
 $username=$_POST["username"];
 $email=$_POST["email"];
 $mobile=$_POST["mobile"];
 $HiQ=$_POST["HiQ"];
 $passkey=$_POST['password'];
$hash_passkey=password_hash($passkey,PASSWORD_DEFAULT);

   //image
   $imgfile=$_FILES["image"]["name"];
   $tempimagfile=$_FILES["image"]["tmp_name"];
   
    $newfilen = "icon-up-".$libraryid.".".pathinfo($imgfile,PATHINFO_EXTENSION);
   $folder="../login/loginphp/image/".$newfilen;
  
   //email validation
 
 $sqlstdE = "SELECT 	email FROM student WHERE email='$email'";
 $result21 = mysqli_query($conn, $sqlstdE);
 if (mysqli_num_rows($result21) > 0 ){
   echo"email is alreday exist in db as student<br>";
//    header("location:../librarian/index.php");
 }
   $sqllibE = "SELECT 	libraryId FROM librarian WHERE email='$email'";
 $result22 = mysqli_query($conn, $sqllibE);
 if (mysqli_num_rows($result22) > 0 ){
    $row1= mysqli_fetch_array($result22);
if($row1["libraryId"]==$libraryid){
    echo"same email";
}else{
    // header("location:../librarian/index.php");
   echo"email is alreday exist n db as librarian<br>";
}
 }

 
$sqluser= "UPDATE librarian SET email='$email',
name='$username',MNo='$mobile',HiQ='$HiQ',icon='$newfilen',
password='$hash_passkey' WHERE libraryId='$libraryid' ";
if(mysqli_query($conn,$sqluser)){
echo"librarian dataa update";
    $sqllibnameup= "UPDATE librarydetail SET libName='$libname' WHERE libraryId='$libraryid' ";
    if(mysqli_query($conn,$sqllibnameup)){

        if(!(move_uploaded_file($tempimagfile,$folder))){
            echo"file is not moved";
        }
        echo"data update succefull";
        // header("location:../librarian/index.php");
    }else{
        echo"error: lib name not update";
    }
}else{
    echo"error: librarian data not update";
}

}else{
    echo "error : <br>";
    
}
 ?>