<?php

session_start();
require_once ("../login/loginphp/conn.php");
require_once ("sessionver.php");
$userid=$_SESSION["useridstd"];
if(!(isset($_SESSION)&& $_SESSION["logedinstd"]==1)){

    header("location:/projectidl/login/log_in.html");   
}
$sqluser= "SELECT  stdId  FROM student WHERE stdId='$userid'";
$result1 = mysqli_query($conn, $sqluser);
if(mysqli_num_rows($result1) !=1){
    require_once ("../login/loginphp/log_out.php");
  
    header("location:/projectidl/login/log_in.html");   
    echo"hi hlw";
}

?>