<?php
session_start();
if(!(isset($_SESSION)&&$_SESSION["loged-in"]==1)){

    header("location:/projectidl/login/log_in.html");   
}

?>