<?php
include_once __DIR__ ."/../../connect/connect.php";

$id = $_GET['id'];
$dh_id = $_GET['dh_id'];

$sql ="DELETE FROM sanpham_dondathang WHERE dh_id = $dh_id AND sp_dh_id = $id;";
$result = mysqli_query($conn,$sql);

echo '<script>location.href="edit.php?id='.$dh_id.'"</script>';

?>