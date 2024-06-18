<?php
session_start();
include_once __DIR__ . "/../connect/connect.php";


$username = $_POST['username'];
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$password_confirm = $_POST['password_confirm'] ?? '';

if (isset($_POST['login'])) {
    $sql = "SELECT * FROM taikhoan WHERE username = '$username' AND password = '$password';";

    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        echo '<script>
                location.href="popup-login.php?status=True";
            </script>';
    } else {
        $_SESSION['status'] = 'False';
        echo '<script>
                location.href="popup-login.php?status=False";
        </script>';
    }
}

if (isset($_POST['register'])) {
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
