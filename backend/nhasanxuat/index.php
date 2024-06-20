<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>nhà sản xuất</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
</head>

<body>

  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $sql = "SELECT * FROM nhasanxuat;";

  $data = mysqli_query($conn, $sql);

  $arrnsx = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrnsx[] = array(
      'nsx_id' => $row['nsx_id'],
      'nsx_ten' => $row['nsx_ten'],
      'nsx_mota' => $row['nsx_mota'],
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
            <div class="col-4 border rounded bg-secondary bg-gradient text-white">
              Tên nhà sản xuất
            </div>
            <div class="col-6 border rounded bg-secondary bg-gradient text-white ">
              Mô tả
            </div>
            <div class="col-2"></div>
          </div>

          <?php foreach ($arrnsx as $nsx): ?>
            <div class="row ">
              
              <div class="col-4 bg-light mt-2">
                <?= $nsx['nsx_ten'] ?>
              </div>
              <div class="col-6 bg-light mt-2">
                <?= $nsx['nsx_mota'] ?>
              </div>
              <div class="col-2">
                  <a href="./edit.php?id=<?= $nsx['nsx_id']?>" class="btn btn-warning btn-sm mt-1" ><i class="fa-solid fa-pen-to-square"></i></a>
                  <a href="#" id="" data-id="<?= $nsx['nsx_id']?>"  class="btn btn-danger btn-sm mt-1 btn-delete" ><i class="fa-solid fa-trash"></i></a>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="row">
            
            <div class="col-4  p-2 ">
              <a href="./add.php" class="btn btn-info text-white"><i class="fa-solid fa-plus"></i> Thêm nhà sản xuất</a>
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
  include_once __DIR__ . '/../../js/js.php';
  ?>


</body>

</html>