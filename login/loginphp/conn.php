<?php
$dbserver="localhost";
$dbuser="root";
$dbpassword="";
$dbdatabase="idl8480aklibrary";

$conn=mysqli_connect($dbserver,$dbuser,$dbpassword,$dbdatabase);
if(!$conn){

echo"<center><h3>error to connect</h3></center>";
}

   
?>