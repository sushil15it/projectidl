
<?php require_once ("conn.php");
require_once ("cheksesson.php");
 
if( isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST"){
  //librarian data
    $email= $_POST['email'];
  $passkey=$_POST['password'];
  
$hash_passkey=password_hash($passkey,PASSWORD_DEFAULT);
  
 $username=$_POST['fname'] ." " .$_POST['lname']; 
   $mobile=$_POST['mobile_no'];
   $gender=$_POST['gender'];   
   
$lib_Id=$_POST['libId'];

    //std id declration
    $std_Id=mt_rand(100000,999999);
    $std_Id2=null;
    function declibid($std_Id,$lib_Id,$conn){
    $std_Id++;
     $sqlstdid1  = "SELECT stdId	 FROM student  WHERE 	stdId='$std_Id'";
     $result1 = mysqli_query($conn , $sqlstdid1);
     if(mysqli_num_rows($result1)>0){
      declibid($std_Id,$lib_Id,$conn);
    
    
     }else{
       $std_Id2=$lib_Id *1000000+$std_Id;
      $sqlstdid2  = "SELECT stdId	 FROM student  WHERE 	stdId='$std_Id2'";
      $result2 = mysqli_query($conn , $sqlstdid2);
      if(mysqli_num_rows($result2)>0){
          
        declibid($std_Id,$lib_Id,$conn);
    
     
     }
     
    }}
    
    declibid($std_Id,$lib_Id,$conn);
    $std_Id2=$lib_Id *1000000+$std_Id;
$sqlbkdb  = "SELECT bkdb FROM librarydetail  WHERE 	libraryId='$lib_Id'";
$result1 = mysqli_query($conn , $sqlbkdb);
if(mysqli_num_rows($result1)>0){
   
  $row = mysqli_fetch_assoc($result1);
            
$BkdbTName=$row["bkdb"];
}

  $organization=$_POST['organization'];
  //image
  $imgfile=$_FILES["image"]["name"];
  $tempimagfile=$_FILES["image"]["tmp_name"];
  
   $newfilen = "icon-".$_POST['fname']."-".$std_Id2.".".pathinfo($imgfile,PATHINFO_EXTENSION);
  $folder="image/".$newfilen;
 
   
    //email validation
  
    $sqlstdE = "SELECT 	email FROM student WHERE email='$email'";
    $result21 = mysqli_query($conn, $sqlstdE);
    if (mysqli_num_rows($result21) > 0 ){
      echo"email is alreday exist in db as student<br>";
      
      header("location:/projectidl/login/sign_up_librarian.html");
    }
      $sqllibE = "SELECT 	email FROM librarian WHERE email='$email'";
    $result22 = mysqli_query($conn, $sqllibE);
    if (mysqli_num_rows($result22) > 0 ){
      echo"email is alreday exist n db as librarian<br>";
      header("location:/projectidl/login/sign_up_librarian.html");
    }
  //student data insert
  $sqlrrn= "INSERT INTO	student  (stdId,libraryId	,bkdb,stdname,	password	,email,	mobile,	image,	gender,	branch )
  VALUES('$std_Id','$lib_Id','$BkdbTName','$username','$hash_passkey','$email','$mobile ','$newfilen','$gender','$organization') ";
  if(mysqli_query($conn,$sqlrrn)){
    
 if(!(move_uploaded_file($tempimagfile,$folder))){ 
   echo"file is not moved<br>";
   header("location:/projectidl/login/sign_up_librarian.html");

 }
 
 header("location:/projectidl/login/log_in.html");
    echo "<br>data student into table student is success<br>";
  }  else{
    echo"error: librarian data not inserted<br>" . mysqli_error($conn)."<br>";
  }


}else{
  echo"error: reciveing data error";
}$_FILES=$_POST=$null;
 ?>