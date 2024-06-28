<?php 
include_once __DIR__ ."/../../connect/connect.php";

$sql = <<<EOT
    SELECT lsp.lsp_ten, COUNT(*) AS Soluong
    FROM sanpham sp 
    JOIN loaisanpham lsp ON sp.lsp_id = lsp.lsp_id
    GROUP BY  sp.lsp_id
EOT;

$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $dataSoluongLSP[] = array(
        "TenLoaiSanPham"=> $row["lsp_ten"],
        "SoLuong"=> $row["Soluong"],
    );
}

//Chuyển dữ liệu về dạng JSON
echo json_encode($dataSoluongLSP);

?>