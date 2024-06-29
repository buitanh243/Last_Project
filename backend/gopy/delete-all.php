<?php session_start(); 
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="./../../Xuly/popup-login.php?name=Error";
        </script>';
  exit; 
}
?><?php
      include_once __DIR__ . '/../../connect/connect.php';

      $sql = " DELETE FROM gopy; ";
      mysqli_query($conn, $sql);
      echo '<script>location.href = "./../popup.php?name=gopy";</script>';
?>