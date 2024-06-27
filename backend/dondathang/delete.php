<?php session_start();
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="/Last_project/Xuly/popup-login.php?name=Error";
        </script>';
  exit;
}

include_once __DIR__ . '/../../connect/connect.php';

$id = $_GET['id'];

$sql_kh = "SELECT kh_id FROM dondathang WHERE dh_id = $id";
$result = mysqli_query($conn, $sql_kh);

$row = mysqli_fetch_assoc($result);
$kh_id = $row['kh_id'];

$sql = "DELETE FROM dondathang WHERE dh_id = $id";
if (mysqli_query($conn, $sql)) {
  $sql = "DELETE FROM khachhang WHERE kh_id = $kh_id";
  mysqli_query($conn, $sql);
}

mysqli_close($conn);


echo '<script>location.href="index.php"</script>';
