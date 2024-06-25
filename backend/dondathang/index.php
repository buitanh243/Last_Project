<?php session_start(); 
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="/Last_project/Xuly/popup-login.php?name=Error";
        </script>';
  exit; 
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loại sản phẩm</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
  <style>
    th {
      white-space: nowrap;
    }
  </style>
</head>

<body>
  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $sql = "SELECT ddh.dh_id, ddh.dh_ngaylap, ddh.dh_ngaygiao, ddh.dh_noigiao, ddh.dh_trangthai, ddh.dh_trangthai_donhang,
                kh.kh_ten, kh.kh_sdt, 
                httt.httt_ten, 
                SUM(spddh.sp_dh_soluong * spddh.sp_dh_dongia) AS thanhtien
          FROM dondathang ddh 
          JOIN khachhang kh ON ddh.kh_id = kh.kh_id
          JOIN hinhthucthanhtoan httt ON ddh.httt_id = httt.httt_id
          JOIN sanpham_dondathang spddh ON ddh.dh_id = spddh.dh_id
          GROUP BY ddh.dh_id, ddh.dh_ngaylap, ddh.dh_ngaygiao, ddh.dh_noigiao, ddh.dh_trangthai, 
                   kh.kh_ten, kh.kh_sdt, httt.httt_ten
          ;";

  $data = mysqli_query($conn, $sql);

  $arrDDH = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrDDH[] = array(
      "dh_id" => $row["dh_id"],
      "dh_ngaylap" => $row["dh_ngaylap"],
      "dh_ngaygiao" => $row["dh_ngaygiao"],
      "dh_noigiao" => $row["dh_noigiao"],
      "dh_trangthai" => $row["dh_trangthai"],
      "dh_trangthai_donhang" => $row["dh_trangthai_donhang"],
      "kh_ten" => $row["kh_ten"],
      "kh_sdt" => $row["kh_sdt"],
      "httt_ten" => $row["httt_ten"],
      "thanhtien" => $row["thanhtien"],
    );
  }
  ?>
  <main>
  <div class="col-3">
          <?php include_once __DIR__ . '/../bocuc/header.php'; ?>
        </div>
    <div class="container mt-3">
      <div class="row">
        <div class="col-12 m-3">
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày lập</th>
                <th scope="col">Ngày giao</th>
                <th scope="col">Nơi giao</th>
                <th scope="col">Hình thức thanh toán</th>
                <th scope="col">Trạng thái thanh toán</th>
                <th scope="col">Trạng thái đơn hàng</th>
                <th scope="col">Thành tiền</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($arrDDH as $ddh) : ?>
                <tr>
                  <td><?= 'DH' . $ddh['dh_id'] ?></td>
                  <td class="text-center"><?= $ddh['kh_ten'] ?></td>
                  <td class="text-center"><?= $ddh['kh_sdt'] ?></td>
                  <td><?= date('d/m/Y', strtotime($ddh['dh_ngaylap'])) ?></td>
                  <td><?= empty($ddh['dh_ngaygiao']) ? 'Rỗng': date('d/m/Y', strtotime($ddh['dh_ngaygiao'])) ?></td>
                  <td><?= $ddh['dh_noigiao'] ?></td>
                  <td class="text-center"><span class="badge bg-secondary"><?= $ddh['httt_ten'] ?></span></td>
                  <td class="text-center">
                    <?php if ($ddh['dh_trangthai'] != 1) : ?>
                      <span class="badge bg-info">Đã thanh toán</span>
                    <?php else : ?>
                      <span class="badge bg-danger">Chưa thanh toán</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center">
                    <?php if ($ddh['dh_trangthai_donhang'] != 1) : ?>
                      <span class="badge bg-info">Đã xử lý</span>
                    <?php else : ?>
                      <span class="badge bg-danger">Chưa xử lý</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-end"><?= number_format($ddh['thanhtien'], 0, ',', '.').'₫' ?> </td>
                  <td class="text-center">
                    <?php if ($ddh['dh_trangthai_donhang'] != 1) : ?>
                      <a href="./chitiet_dh.php?id= <?= $ddh['dh_id']?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-print"></i> In</a>
                    <?php else : ?>
                      <a href="./edit.php?id=<?= $ddh['dh_id'] ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <a href="./add.php" class="btn btn-info text-white "><i class="fa-solid fa-plus"></i> Thêm đơn hàng</a>
        </div>
      </div>
    </div>
  </main>
  <?php include_once __DIR__ . '/../js/js.php'; ?>
</body>

</html>
