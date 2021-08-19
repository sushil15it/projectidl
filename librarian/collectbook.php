<?php
require_once ("../login/loginphp/conn.php");
require_once ("../login/loginphp/sessionactive.php");

$bkdb= $_SESSION["bkdb"];
//accept

    if(isset($_POST)&&$_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['bookisueid'])&& isset($_POST['bookid'])){
        $bookisueid=$_POST["bookisueid"];
        $bookid=$_POST["bookid"];
       
        $popavilable=$_POST["popavilable"];
       $popavilable++;
        $sqldelis= "DELETE  FROM bookisse  WHERE 	IssueId='$bookisueid'";
        
        if(mysqli_query($conn, $sqldelis)){
            $sqlupa= "UPDATE $bkdb SET avilable='$popavilable' WHERE 	BookId ='$bookid'";
        
            if(mysqli_query($conn, $sqlupa)){
                header("location:/projectidl/librarian/bookisue.php");

            }
      
}} header("location:/projectidl/librarian/bookisue.php");
$_POST=null;
?>