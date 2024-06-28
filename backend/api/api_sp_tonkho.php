<?php 
include_once __DIR__ ."/../../connect/connect.php";

$sql = "SELECT sp_soluong, sp_ten
FROM sanpham;";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $dataSoluongLSP[] = array(
        "SanPham"=> $row["sp_ten"],
        "SoLuong"=> $row["sp_soluong"],
    );
}

//Chuyển dữ liệu về dạng JSON
echo json_encode($dataSoluongLSP);

?>