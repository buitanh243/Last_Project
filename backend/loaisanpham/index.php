<?php session_start(); 
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="./../../Xuly/popup-login.php?name=Error";
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
    <link rel="icon" href="./../../Pic/favicon.ico" type="image/x-icon">
</head>

<body>

  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $sql = "SELECT * FROM loaisanpham;";

  $data = mysqli_query($conn, $sql);

  $arrLSP = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrLSP[] = array(
      'lsp_id' => $row['lsp_id'],
      'lsp_ten' => $row['lsp_ten'],
      'lsp_mota' => $row['lsp_mota'],
    );
  }

  ?>
  <main>

  <?php include_once __DIR__ . '/../bocuc/header.php'; ?>

    <div class="container mt-5">
      <div class="row">
        <div class="col-3">
          <?php
          include_once __DIR__ . '/../bocuc/sidebar.php';
          ?>
        </div>
        <div class="col-9">
          <div class="row">
            <div class="col-4 border rounded bg-secondary bg-gradient bg-gradient text-white">
              Tên loại sản phẩm
            </div>
            <div class="col-6 border rounded bg-secondary bg-gradient bg-gradient text-white ">
              Mô tả
            </div>
            <div class="col-2"></div>
          </div>

          <?php foreach ($arrLSP as $lsp): ?>
            <div class="row ">
              
              <div class="col-4 bg-light mt-2">
                <?= $lsp['lsp_ten'] ?>
              </div>
              <div class="col-6 bg-light mt-2">
                <?= $lsp['lsp_mota'] ?>
              </div>
              <div class="col-2">
                  <a href="./edit.php?id=<?= $lsp['lsp_id']?>" class="btn btn-warning btn-sm mt-1" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a href="#" class="btn btn-danger btn-sm mt-1  btn-delete" data-id="<?= $lsp['lsp_id']?>" ><i class="fa-solid fa-trash"></i></a>

              </div>
            </div>
          <?php endforeach; ?>

          <div class="row">
            
            <div class="col-4  p-2 ">
              <a href="./add.php" class="btn btn-info text-white"><i class="fa-solid fa-plus"></i> Thêm loại sản phẩm</a>
            </div>
            <div class="col-3  p-2">

            </div>
            <div class="col-2"></div>
          </div>
        </div>


      </div>

    </div>

  </main>
  <?php
  include_once __DIR__ . '/../js/js.php';
  ?>
</body>

</html>