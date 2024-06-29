<?php session_start();
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="./../../Xuly/popup-login.php?name=Error";
        </script>';
  exit;
}

include_once __DIR__ . '/../../connect/connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM dondathang WHERE dh_id = $id";
mysqli_query($conn, $sql);

mysqli_close($conn);

echo '<script>location.href="index.php"</script>';
