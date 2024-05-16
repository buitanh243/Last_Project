<?php 
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['register'])) {
        echo 'Day la DK'.$username;
        echo 'MK'.$password;
    } 

    if (isset($_POST['login'])) {
        echo 'Day la DN'.$username;
        echo 'MK'.$password;
    } 
?>