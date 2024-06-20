<?php session_start() ?>
<?php 
include_once __DIR__.'/../../connect/connect.php';

$id = $_GET['id'];

$sql_dongMuonXoa = "SELECT * FROM hinhsanpham WHERE hsp_id = $id";
$data_dongMuonXoa = mysqli_query($conn, $sql_dongMuonXoa);
$rowMuonXoa = mysqli_fetch_array($data_dongMuonXoa, MYSQLI_ASSOC);

if ($rowMuonXoa) {
    $upload_dir = __DIR__.'/../../uploads/';
    $file_path_delete = $upload_dir . $rowMuonXoa['hsp_url'];

    if (file_exists($file_path_delete)) {
        unlink($file_path_delete);
    }

    $sql = "DELETE FROM hinhsanpham WHERE hsp_id = $id";
    mysqli_query($conn, $sql);
    echo '<script>location.href = "./../popup.php?name=hinhsanpham";</script>';
    
} 
?>
