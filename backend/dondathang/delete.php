<?php session_start(); 
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="/Last_project/Xuly/popup-login.php?name=Error";
        </script>';
  exit; 
}
?><?php 
    include_once __DIR__.'/../../connect/connect.php';

    $id = $_GET['id'];
    
    $sql = " DELETE FROM dondathang WHERE dh_id = $id; ";

    mysqli_query($conn,$sql);

    echo '<script>location.href="index.php"</script>';
?>