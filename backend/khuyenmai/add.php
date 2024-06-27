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
  <title>Thêm khuyến mãi</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
    <link rel="icon" href="/Last_Project/Pic/favicon.ico" type="image/x-icon">
</head>

<body>

  <form class="container align-items-center bg-light m-5 p-5 rounded border" action="" method="post" name="themmoi" id="themmoi">
    <div class="row mb-4">
      <h3 class="col-12">Thêm khuyến mãi</h3>
    </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="mt-2 p-1" for="km_ten">Tên khuyến mãi (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label>
        <input class="form-control mt-2" type="text" name="km_ten" id="km_ten">
      </div>
      <div class="col-md-6">
        <label class="mt-2 p-1" for="km_mota">Mô tả</label>
        <input class="form-control mt-2" type="text" name="km_mota" id="km_mota">
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-6">
        <label class="mt-2 p-1" for="km_end">Ngày bắt đầu (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label>
        <input class="form-control mt-2" type="date" name="km_sta" id="km_sta">
      </div>
      <div class="col-md-6">
        <label class="mt-2 p-1" for="km_end">Ngày kết thúc (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label>
        <input class="form-control mt-2" type="date" name="km_end" id="km_end">
      </div>

    </div>
    <div class="row">
      <div class="col ">
        <input class="btn btn-primary text-white mt-2 me-3" type="submit" value="Lưu" name="save" id="save">
        <input class="btn btn-danger text-white mt-2" type="submit" value="Huỷ" name="exit">
      </div>
    </div>
  </form>

  <?php

  if (isset($_POST['save'])) {
    include_once __DIR__ . '/../../connect/connect.php';

    $km_ten = $_POST['km_ten'];
    $km_sta = $_POST['km_sta'];
    $km_end = $_POST['km_end'];
    $km_mota = $_POST['km_mota'];

    $sql = "INSERT INTO khuyenmai (km_ten,km_sta,km_end,km_mota) VALUES ('$km_ten','$km_sta','$km_end','$km_mota');";
    mysqli_query($conn, $sql);

    echo '<script>location.href = "./../popup.php?name=khuyenmai";</script>';

  }

  if (isset($_POST['exit'])) {
    echo '<script>location.href = "index.php";</script>';
  }
  ?>
  <?php
  include_once __DIR__ . '/../js/js.php';
  include_once __DIR__ . '/../../js/js.php';
  ?>
</body>

</html>