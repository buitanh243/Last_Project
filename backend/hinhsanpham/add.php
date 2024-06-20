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
  <title>Thêm hình sản phẩm</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
</head>

<body class="">
  <?php
  include_once __DIR__ . '/../..//connect/connect.php';
  $sql = "SELECT * FROM sanpham;";

  $data_select = mysqli_query($conn, $sql);

  $arrSP = [];

  while ($row = mysqli_fetch_array($data_select, MYSQLI_ASSOC)) {
    $arrSP[] = array(
      'sp_id' => $row['sp_id'],
      'sp_ten' => $row['sp_ten'],
      'sp_gia' => $row['sp_gia'],

    );

  }

  ?>
<form class="container bg-light m-5 p-5 rounded border" action="" method="post" name="hsp" enctype="multipart/form-data" id="themmoi">
  <div class="row mb-4">
    <div class="col-3"></div>
    <h3 class="col-6 text-center">Thêm hình sản phẩm</h3>
    <div class="col-3"></div>
  </div>
  <div class="row mb-3">
    <div class="col-3 text-end">
      <label for="sp_id" class="col-form-label">Sản phẩm</label>
    </div>
    <div class="col-6">
      <select class="form-select" id="sp_id" name="sp_id">
        <?php foreach ($arrSP as $sp): ?>
          <option value="<?= $sp['sp_id'] ?>">
            <?= $sp['sp_ten'] ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-3"></div>
  </div>
  <div class="row mb-3">
    <div class="col-3 text-end">
      <label for="hsp_url" class="col-form-label">Chọn hình</label>
    </div>
    <div class="col-6">
      <input class="form-control" type="file" name="hsp_url" id="hsp_url">
    </div>
    <div class="col-3"></div>
  </div>
  <div class="row">
    <div class="col-3"></div>
    <div class="col-6 text-center">
      <button class="btn btn-primary text-white" type="submit" name="save" id="save">Lưu</button>
      <button class="btn btn-danger text-white ms-2" type="submit" name="exit">Huỷ</button>
    </div>
    <div class="col-3"></div>
  </div>
</form>


  <?php
  if (isset($_POST['save'])) {

    if (isset($_FILES['hsp_url'])) {
      $upload_dir = __DIR__ . '/../../uploads/';

      // Kiểm tra và tạo thư mục nếu không tồn tại
      if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
      }
      if ($_FILES['hsp_url']['error'] > 0) {
          echo '<script>
              Swal.fire({
                icon: "error",
                title: "Lỗi!!!",
                text: "Không tìm thấy File!",
              });
          </script>';
          die;
      }
       else {
        // Tải lên thành công
        $hsp_url = date('dmY_His') . '_' . basename($_FILES['hsp_url']['name']);
        $upload_file = $upload_dir . $hsp_url;

        if (move_uploaded_file($_FILES['hsp_url']['tmp_name'], $upload_file)) {
          $sp_id = $_POST['sp_id'];

          $sql_url = "INSERT INTO hinhsanpham (sp_id, hsp_url) VALUES ('$sp_id', '$hsp_url')";
      
      
          mysqli_query($conn, $sql_url);
          echo '<script>location.href = "./../popup.php?name=hinhsanpham";</script>';
        } else {
          echo 'Lỗi khi tải tệp lên';
        }
      }
    } else {
      echo 'Không có tệp nào được gửi lên';
    }
   
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