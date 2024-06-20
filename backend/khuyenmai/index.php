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
  <title>Khuyến mãi</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
</head>

<body>

  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $sql = "SELECT * FROM khuyenmai;";
 

  $data = mysqli_query($conn, $sql);

  $arrkm = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrkm[] = array(
      'km_id' => $row['km_id'],
      'km_ten' => $row['km_ten'],
      'km_mota' => $row['km_mota'],
      'km_end' => $row['km_end'],
      'km_sta' => $row['km_sta'],

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
            <div class="col-3 border rounded bg-secondary bg-gradient text-white">
              Tên khuyến mãi
            </div>
            <div class="col-2 border rounded bg-secondary bg-gradient text-white text-center ">
              Ngày bắt đầu
            </div>
            <div class="col-2 border rounded bg-secondary bg-gradient text-white  text-center">
              Ngày kết thúc
            </div>
            <div class="col-2 border rounded bg-secondary bg-gradient text-white ">
              Mô tả
            </div>
          </div>

          <?php foreach ($arrkm as $km): ?>
            <div class="row ">
              
              <div class="col-3 bg-light mt-2">
                <?= $km['km_ten'] ?>
              </div>
              <div class="col-2 bg-light mt-2 text-center">
                <?= date('d/m/Y',strtotime($km['km_sta']))  ?>
              </div>
              <div class="col-2 bg-light mt-2 text-center">
                <?= date('d/m/Y',strtotime($km['km_end']))  ?>
              </div>
              <div class="col-2 bg-light mt-2">
                <?= $km['km_mota'] ?>
              </div>
              <div class="col-2">
                  <a href="./edit.php?id=<?= $km['km_id']?>" class="btn btn-warning btn-sm mt-1" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a href="#" class="btn btn-danger btn-sm mt-1 btn-delete" data-id="<?= $km['km_id']?>"><i class="fa-solid fa-trash"></i></a>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="row">
            
            <div class="col-4  p-2 mt-2 ">
              <a href="./add.php" class="btn btn-info text-white"><i class="fa-solid fa-plus"></i> Thêm khuyến mãi</a>
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