<?php 
include_once __DIR__ ."/../../connect/connect.php";

$sql = "select count(*) AS Soluong from khachhang";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $dataSoluongKH = array(
        "Soluong"=> $row["Soluong"],
    );
}

//Chuyển dữ liệu về dạng JSON

echo json_encode($dataSoluongKH);

?>