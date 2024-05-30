<!DOCTYPE html>
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
  <style>
    .img-pro-edit {
      width: 100%;
      margin: 5px;
    }
  </style>
</head>

<body class="">
  <?php
  include_once __DIR__ . '/../..//connect/connect.php';

  $id = $_GET['id'];
  $sql = "SELECT * FROM hinhsanpham AS hsp LEFT JOIN sanpham AS sp ON hsp.sp_id = sp.sp_id WHERE hsp_id  = $id ;";

  $data_select = mysqli_query($conn, $sql);

  $arrSP = [];

  while ($row = mysqli_fetch_array($data_select, MYSQLI_ASSOC)) {
    $arrSP[] = array(
      'hsp_id' => $row['hsp_id'],
      'hsp_url' => $row['hsp_url'],
      'sp_id' => $row['sp_id'],
      'sp_ten' => $row['sp_ten'],
    );

  }

  ?>
  <form class="container bg-light m-5 p-5 rounded border" action="" method="post" name="hsp"
    enctype="multipart/form-data" id="themmoi">
    <div class="row mb-4">
      <div class="col-3"></div>
      <h3 class="col-6 text-center">Sửa hình sản phẩm</h3>
      <div class="col-3"></div>
    </div>
    <div class="row mb-3">
      <div class="col-3 text-end">
        <label for="sp_id" class="col-form-label">Sản phẩm</label>
      </div>
      <div class="col-6">
        <?php foreach ($arrSP as $hsp): ?>
          <input class="form-control" type="text" name="sp_ten" id="sp_ten" value="<?= $hsp['sp_ten'] ?>" readonly>
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
        <div class="col-3">

        </div>
      </div>
      <div class="row">
        <div class="col-3 text-end">
          <label for="">Hình ảnh cũ</label>
        </div>
        <div class="col-6">
          <img class="img-pro-edit " src="\Last_Project\uploads\<?= $hsp['hsp_url'] ?>" alt="">
        </div>
      </div>
    <?php endforeach; ?>
    <div class="row mt-3">
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
        die;
      } else {
        // Tải lên thành công
        $hsp_url = date('dmY_His') . '_' . basename($_FILES['hsp_url']['name']);
        $upload_file = $upload_dir . $hsp_url;

        move_uploaded_file($_FILES['hsp_url']['tmp_name'], $upload_file);
      }
    } 

    $sql_dongMuonXoa = "SELECT * FROM hinhsanpham WHERE hsp_id = $id";
    $data_dongMuonXoa = mysqli_query($conn, $sql_dongMuonXoa);
    $rowMuonXoa = mysqli_fetch_array($data_dongMuonXoa, MYSQLI_ASSOC);

    if ($rowMuonXoa) {
      $upload_dir = __DIR__ . '/../../uploads/';
      $file_path_delete = $upload_dir . $rowMuonXoa['hsp_url'];

      if (file_exists($file_path_delete)) {
        unlink($file_path_delete);
      }
    }

    $sql_url = "UPDATE hinhsanpham SET hsp_url = '$hsp_url' WHERE hsp_id = $id;
    ";

    mysqli_query($conn, $sql_url);
    //echo '<script>location.href = "index.php";</script>';
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