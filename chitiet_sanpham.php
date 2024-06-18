<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HT Computer - Trang chủ</title>

  <?php
  include_once __DIR__ . '/css/style.php';
  include_once __DIR__ . '/css/trangchu.php';
  ?>

  <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
  <style>
    
  </style>
</head>

<body>

  <?php
  include_once __DIR__ . '/bocucchinh/headder.php';
  ?>
  <?php

  include_once __DIR__ . '/connect/connect.php';

  $sql = "SELECT sp.*, km_ten, hsp_url FROM sanpham AS sp 
  JOIN khuyenmai AS km ON sp.km_id = km.km_id
  JOIN hinhsanpham AS hsp ON sp.sp_id = hsp.sp_id
 ;";

  $result = mysqli_query($conn, $sql);

  $arrSPKM = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $arrHSP[] = array(
      "sp_id" => $row["sp_id"],
      'sp_ten' => $row['sp_ten'],
      'sp_gia' => $row['sp_gia'],
      'sp_giacu' => $row['sp_giacu'],
      'sp_motangan' => $row['sp_motangan'],
      'km_ten' => $row['km_ten'],
      'hsp_url' => $row['hsp_url'],

    );
  }

  $sql_sp = "SELECT hsp_url,sp_id FROM hinhsanpham
   ;";

  $result_SP = mysqli_query($conn, $sql_sp);

  $arrSP = [];
  while ($row = mysqli_fetch_assoc($result_SP)) {
    $arrSP[] = array(
      "sp_id" => $row["sp_id"],
      'hsp_url' => $row['hsp_url'],
    );
  }
  ?>
    
    <main>
        <div class="container">

        </div>
    </main>


  <?php
  include_once __DIR__ . '/bocucchinh/footer.php';
  include_once __DIR__ . '/js/js.php';
  ?>

</body>

</html>