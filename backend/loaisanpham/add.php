<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Hình sản phẩm</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
</head>

<body>

  <form class="container align-items-center bg-light m-5 p-5 rounded border" action="" method="post" name="themmoi"
    id="themmoi">
    <div class="row">
      <div class="col-3"></div>
      <h3 class="col-4">Thêm Hình sản phẩm</h3>
    </div>
    <div class="row">
      <div class="col-3"></div>
      <div class="col-3">
        <label class="mt-5 p-1" for="lsp_ten">Tên loại sản phẩm (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label>
        <input class="form-control mt-2" type="text" id="lsp_ten" name="lsp_ten">
      </div>

      <div class="col-4">
        <label class="mt-5 p-1" for="lsp_mota">Mô tả</label>
        <input class="form-control mt-2" type="text" id="lsp_mota" name="lsp_mota">
      </div>
    </div>
    <div class="row">
      <div class="col-3 ms-1"></div>
      <input class="btn btn-primary text-white m-2 col-auto" type="submit" value="Lưu" name="save" id="save">
      <input class="btn btn-danger text-white m-2 col-auto" type="submit" value="Huỷ" name="exit">
    </div>
  </form>

  <?php
  if (isset($_POST['save'])) {
    include_once __DIR__ . '/../../connect/connect.php';

    $lsp_ten = $_POST['lsp_ten'];
    $lsp_mota = $_POST['lsp_mota'];

    $sql = "INSERT INTO loaisanpham (lsp_ten, lsp_mota) VALUES ('$lsp_ten','$lsp_mota');";
    mysqli_query($conn, $sql);
    
    echo '<script>location.href = "./../popup.php?name=loaisanpham";</script>';

  }

  if (isset($_POST['exit'])) {
    echo '<script>setTimeout(function(){ location.href = "index.php"; }, 1000);</script>';
  }
  ?>

  <?php
  include_once __DIR__ . '/../js/js.php';
  include_once __DIR__ . '/../../js/js.php';
  ?>
</body>

</html>
