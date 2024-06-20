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
  <title>Sửa sản phẩm</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
</head>

<body>
  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $id = $_GET['id'];

  //du lieu cu
  $sql = "SELECT lsp_ten,lsp_mota,lsp_id
            FROM loaisanpham
                WHERE lsp_id = '$id';";
  $data = mysqli_query($conn, $sql);

  $arrlsp = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrlsp[] = array(
      'lsp_id' => $row['lsp_id'],
      'lsp_ten' => $row['lsp_ten'],
      'lsp_mota' => $row['lsp_mota'],
    );
  }

  ?>

  <main>

    <form class="container align-items-center bg-light m-5 p-5 rounded border " action="" method="post" name="themmoi" id="themmoi">
      <div class="row">
        <div class="col-3"></div>
        <h3 class="col-5">Chỉnh sửa loại sản phẩm</h3>
      </div>
      <div class="row">
        <div class="col-3"></div>
        <div class="col-3">
          <?php foreach ($arrlsp as $lsp): ?>
            <label class="mt-5  p-1" for="">Tên loại sản phẩm (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label>
            <input class="form-control mt-2" value="<?= $lsp['lsp_ten'] ?>" type="text" name="lsp_ten" id="lsp_ten">
          </div>

          <div class="col-4">
            <label class="mt-5  p-1" for="">Mô tả </label>
            <input class="form-control mt-2" type="text" value="<?= $lsp['lsp_mota'] ?>" name="lsp_mota" id="lsp_mota">
          </div>
        <?php endforeach; ?>
      </div>
      <div class="row">
        <div class="col-3 ms-1"></div>
        <input class="btn btn-primary text-white m-2 col-auto " type="submit" value="Lưu" name="save" id="save">
        <input class="btn btn-danger text-white m-2 col-auto" type="submit" value="Huỷ" name="exit">
      </div>
    </form>

   
    <?php

    if (isset($_POST['save'])) {
      include_once __DIR__ . '/../../connect/connect.php';

      $lsp_ten = $_POST['lsp_ten'];
      $lsp_mota = $_POST['lsp_mota'];

      $sql_edit = "UPDATE loaisanpham SET lsp_ten = '$lsp_ten',lsp_mota = '$lsp_mota' WHERE lsp_id = '$id';";
      mysqli_query($conn, $sql_edit);

      echo '<script>location.href = "./../popup.php?name=loaisanpham";</script>';

    }

    if (isset($_POST['exit'])) {
      echo '<script>location.href = "index.php";</script>';
    }
    ?>
  <?php
  include_once __DIR__ . '/../js/js.php';
  include_once __DIR__ . '/../../js/js.php';
  ?>

  </main>
</body>

</html>