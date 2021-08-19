<?php
require_once ("../login/loginphp/conn.php");
require_once ("sessionver.php");
$userid=$_SESSION["useridstd"];

if(isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['bookissueid'])){
    $bookisueid=$_POST["bookissueid"];
     $sqlupa= "UPDATE bookisse SET 	IsseStatus=3 WHERE IsseStatus=2  AND  	IssueId='$bookisueid' AND 	stdId='$userid'";
    
        if(mysqli_query($conn, $sqlupa)){
            header("location:/projectidl/student/index.php");
           }} header("location:/projectidl/student/index.php");
$_POST=null;
?>

