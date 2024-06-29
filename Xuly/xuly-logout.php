<?php
session_start(); 

session_unset(); 
session_destroy(); 
header("Location: ./popup-login.php?name=logout");
exit();
?>
