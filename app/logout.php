<?php
//Logout from system
session_start();
session_destroy();
header("location: page_login.php");

?>