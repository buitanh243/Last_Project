<?php 
include_once __DIR__ ."/../../connect/connect.php";

$sql = "select count(*) AS Soluong from gopy";

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    $dataSoluongGopy = array(
        "Soluong"=> $row["Soluong"],
    );
}

//Chuyển dữ liệu về dạng JSON

echo json_encode($dataSoluongGopy);

?>