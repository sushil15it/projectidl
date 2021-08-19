<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once ("conn.php");
 require_once ("cheksesson.php");
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=10.0">
    <title>Document</title>
</head>
<body>
<?php 

  if( isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST"){
    //librarian data
      $email= $_POST['email'];
    $passkey=$_POST['password'];
    
$hash_passkey=password_hash($passkey,PASSWORD_DEFAULT);
  
   $username=$_POST['fname'] ." " .$_POST['lname']; 
     $mobile=$_POST['mobile_no'];
     $gender=$_POST['gender'];   
     $qualification=$_POST['qualification'];
     //library data
    //lib id declration
$lib_Id=80000+mt_rand(1000,9999);
function declibid($lib_Id,$conn){
$lib_Id++;
 $sqllibid  = "SELECT libraryId		 FROM librarydetail  WHERE 	libraryId='$lib_Id'";
 $result1 = mysqli_query($conn , $sqllibid);
 if(mysqli_num_rows($result1)>0){
     
declibid($lib_Id,$conn);

 }
 
}
declibid($lib_Id,$conn);

      $lib_name=$_POST['libname'];
    $libaray_type=$_POST['Lib_type'];
    $organization=$_POST['organization'];
    $estYear=$_POST['est_year'];
    $address=$_POST['address'];
    //image
    $imgfile=$_FILES["image"]["name"];
    $tempimagfile=$_FILES["image"]["tmp_name"];
    
     $newfilen = "icon-".$lib_Id.".".pathinfo($imgfile,PATHINFO_EXTENSION);
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

  //lib name and organigation validtion
  $sqllibn = "SELECT 	libName	 FROM librarydetail WHERE OrgName='$organization'";
  $result3 = mysqli_query($conn, $sqllibn);
  if (mysqli_num_rows($result3) > 0 ){
  $row = mysqli_fetch_assoc($result3);
            
  if ($lib_name ==$row["libName"]){
    echo"ur library and organigation is already exist<br>";
    header("location:/projectidl/login/sign_up_librarian.html");
  }}
//book table name
$BkdbTName="idl" . $lib_Id;

    // sql to create bookbank table
    $sqlcbT = "CREATE TABLE $BkdbTName (
      BookId VARCHAR(30)  NOT NULL PRIMARY KEY, 
          bookName VARCHAR(500) NOT NULL,
          author VARCHAR(100) NOT NULL,
          publication VARCHAR(300) NOT NULL,
          totalcopy INT(5) UNSIGNED  ,
           avilable INT(5) UNSIGNED  ,
     addcopyDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
     )";
     if (mysqli_query($conn, $sqlcbT)) {
      echo "Table $BkdbTName created successfully";
   //library detail insert 
   $sqllbry= "INSERT INTO librarydetail  (	libraryId	,bkdb,	libName	,OrgType,	OrgName,	adress)
   VALUES('$lib_Id','$BkdbTName', '$lib_name','$libaray_type','$organization','$address') ";
   if(mysqli_query($conn,$sqllbry)){
     echo "<br>library detail store  into table library detail  is success<br>";
    //libarian data insert
    $sqlrrn= "INSERT INTO	librarian  (email,		libraryId,bkdb,	name,	MNo,	password	,icon,	HiQ)
     VALUES('$email','$lib_Id','$BkdbTName','$username','$mobile','$hash_passkey','$newfilen','$qualification') ";
     if(mysqli_query($conn,$sqlrrn)){
       
    if(!(move_uploaded_file($tempimagfile,$folder))){ 
      echo"file is not moved<br>";
      header("location:/projectidl/login/sign_up_librarian.html");
 
    }
    header("location:/projectidl/login/log_in.html");
       echo "<br>data insertion into table librarian is success<br>";
     }  else{
       echo"error: librarian data not inserted<br>" . mysqli_error($conn)."<br>";
     }
    }else{
      echo"error: library data not inserted<br>"  . mysqli_error($conn)."<br>";
    
     }
       } else {
         echo "Error creating table: " . mysqli_error($conn)."<br>";
       }

  }else{echo"error in data transfer<br> ";

  }$_FILES=$_POST=$null;
    ?>
</body>
</html>