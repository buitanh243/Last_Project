<?php session_start(); 
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="./../../Xuly/popup-login.php?name=Error";
        </script>';
  exit; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhà sản xuất</title>
    <?php 
            include_once __DIR__ .'/../../css/style.php';
            include_once __DIR__ .'/../style.php'; //css backend
    ?>
    <link rel="icon" href="./../../Pic/favicon.ico" type="image/x-icon">
</head>
<body>

        <form class="container align-items-center bg-light m-5 p-5 rounded border " action="" method="post" name="themmoi" id="themmoi" >  
              <div class="row">
                <div class="col-3"></div>
                <h3 class="col-4">Thêm nhà sản xuất</h3>
              </div>
             <div class="row">
              <div class="col-3"></div>
              <div class="col-3">
                  <label class="mt-5  p-1" for="">Tên nhà sản xuất (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label><input class="form-control mt-2" type="text" name="nsx_ten" id="nsx_ten"> 
                </div>
              
                <div class="col-4">
                  <label class="mt-5  p-1" for="">Mô tả </label><input class="form-control mt-2" type="text" name="nsx_mota" id="nsx_mota"> 
                </div>
             </div>
            <div class="row">
              <div class="col-3 ms-1"></div>
              <input class="btn btn-primary text-white m-2 col-auto " type="submit" value="Lưu" name="save" id="save">
              <input class="btn btn-danger text-white m-2 col-auto" type="submit" value="Huỷ" name="exit" >
            </div>
        </form>
    <?php

        if(isset($_POST['save'])) {
          include_once __DIR__.'/../../connect/connect.php';

          $nsx_ten = $_POST['nsx_ten'];
          $nsx_motangan = $_POST['nsx_mota'];

          $sql = "INSERT INTO nhasanxuat (nsx_ten, nsx_mota) VALUES ('$nsx_ten','$nsx_motangan');";
          mysqli_query($conn,$sql);
          echo '<script>location.href = "./../popup.php?name=nhasanxuat";</script>';
        }
       
        if(isset($_POST['exit'])) {
          echo '<script>location.href = "index.php";</script>';
        }
    ?>
    <?php
  include_once __DIR__ . '/../js/js.php';
  include_once __DIR__ . '/../../js/js.php';
  ?>
</body>
</html>