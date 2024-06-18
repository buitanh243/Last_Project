<?php
include_once __DIR__ . '/../../connect/connect.php';

$id = $_GET['id'];

$sql_select = "SELECT hsp.hsp_url FROM sanpham AS sp
LEFT JOIN hinhsanpham AS hsp ON sp.sp_id = hsp.sp_id
WHERE sp.sp_id=$id;";

$result = mysqli_query($conn, $sql_select);

$image_paths = [];
while ($row = mysqli_fetch_assoc($result)) {
    $image_paths[] = $row['hsp_url'];
}

$sql_delete = "DELETE FROM sanpham WHERE sp_id=$id;";
mysqli_query($conn, $sql_delete);

$upload_dir = __DIR__ . '/../../uploads/';

foreach ($image_paths as $image_path) {
    $file_path_delete = $upload_dir . $image_path;
    if (file_exists($file_path_delete)) {
        unlink($file_path_delete);
    }
}
echo '<script>location.href = "./../popup.php?name=sanpham";</script>';
