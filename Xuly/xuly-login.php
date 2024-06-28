<?php
session_start();
include_once __DIR__ . "/../connect/connect.php";


$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);


if (isset($_POST['login'])) {
    $sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password';";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $tk_id = $row['tk_id'];

        $_SESSION['username'] = $username;
        $_SESSION['tk_id'] = $tk_id;

        if ($tk_id == 1) {
            echo '<script>  
                location.href="popup-login.php?status=admin";
            </script>';
        } else {
            echo '<script>
                location.href="popup-login.php?status=True";
            </script>';
        }
    } else {
        $_SESSION['status'] = 'False';
        echo '<script>
                location.href="popup-login.php?status=False";
        </script>';
    }
}

if (isset($_POST['register'])) {
    $email = addslashes($_POST['email']) ;
    $password_confirm = addslashes($_POST['password_confirm']);

    $sql = "SELECT * FROM taikhoan WHERE username = '$username' OR email = '$email' ;";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>
            location.href="popup-login.php?name=False";
        </script>';
    } else {
        $sql_register = "INSERT INTO taikhoan (username,password,email) VALUE ('$username','$password','$email');";
        mysqli_query($conn, $sql_register);
        echo '<script>
            location.href="popup-login.php?name=True";
        </script>';
    }
}
