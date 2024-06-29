<?php session_start(); 
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="./../../Xuly/popup-login.php?name=Error";
        </script>';
  exit; 
}
?><?php 
    include_once __DIR__.'/../../connect/connect.php';

    $id = $_GET['id'];
    
    $sql = " DELETE FROM gopy WHERE gopy_id=$id; ";

    mysqli_query($conn,$sql);

    echo '<script>location.href = "./../popup.php?name=gopy";</script>';
?>