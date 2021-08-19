<?php
session_start();
if(isset($_SESSION["loged-in"])&& $_SESSION["loged-in"]===true){
   // remove all session variables
session_unset();

// destroy the session
session_destroy();

}
    header("location:/projectidl/index.html");

?>