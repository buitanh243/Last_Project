<?php
include_once __DIR__ . '/../connect/connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $ngaymua = date('Y-m-d');
    $ngaymuaDate = new DateTime($ngaymua);

    $ngaymuaDate->modify('+5 days');

    $ngaygiao = $ngaymuaDate->format('Y-m-d'); //Tự định nghĩa ngày giao = ngaymua + 5

    $httt_id = $_POST['httt_id'];
    $dh_noigiao = htmlentities($_POST['kh_diachi']);
    $kh_ten = htmlentities($_POST['kh_ten']);
    $kh_sdt = htmlentities($_POST['kh_sdt']);

    $sp_ids = $_POST['sp_id'];
    $sp_gias = $_POST['sp_gia'];
    $dh_soluongs = $_POST['dh_soluong'];

    $trangthai_thanhtoan = 1; //Gán chưa thanh toán
    $trangthai_donhang = 2; //Gán đã xử lý

    $stmt_detail = $conn->prepare("INSERT INTO khachhang (kh_ten, kh_diachi, kh_sdt) VALUES (?, ?, ?)");
    $stmt_detail->bind_param("sss", $kh_ten, $dh_noigiao, $kh_sdt);
    $stmt_detail->execute();

    $kh_id = $stmt_detail->insert_id;

    $stmt = $conn->prepare("INSERT INTO dondathang (kh_id, dh_ngaylap, dh_ngaygiao, dh_noigiao, dh_trangthai, dh_trangthai_donhang, httt_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiii", $kh_id, $ngaymua, $ngaygiao, $dh_noigiao, $trangthai_thanhtoan, $trangthai_donhang, $httt_id);
    $stmt->execute();

    $dh_id = $stmt->insert_id;

    $stmt_product = $conn->prepare("INSERT INTO sanpham_dondathang (sp_id, sp_dh_dongia, sp_dh_soluong, dh_id) VALUES (?, ?, ?, ?)");
    for ($i = 0; $i < count($sp_ids); $i++) {
        $stmt_product->bind_param("iiii", $sp_ids[$i], $sp_gias[$i], $dh_soluongs[$i], $dh_id);
        if ($stmt_product->execute()) {
            echo "Record added successfully for product $sp_id.<br>";
        } else {
            echo "Error inserting product details.<br>";
        }
    }

    $stmt_detail->close();
    $stmt->close();
    $stmt_product->close();
    $conn->close();


    unset($_SESSION['giohang']);

    header('Location: /Last_project/backend/dondathang/chitiet_dh.php?id=' . $dh_id);
    exit;
}
