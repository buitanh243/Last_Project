<!DOCTYPE html>
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
  $sql = "SELECT *
            FROM khuyenmai
                WHERE km_id = '$id';";
  $data = mysqli_query($conn, $sql);

  $arrkm = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrkm[] = array(
      'km_id' => $row['km_id'],
      'km_ten' => $row['km_ten'],
      'km_mota' => $row['km_mota'],
      'km_sta' => $row['km_sta'],
      'km_end' => $row['km_end'],
    );
  }


  // // Lấy dữ liệu sản phẩm
  // $sql_sp = "SELECT sp_id, sp_ten FROM sanpham";

  // $data_sp = mysqli_query($conn, $sql_sp);
  // $arrsp = [];
  // while ($row_sp = mysqli_fetch_array($data_sp, MYSQLI_ASSOC)) {
  //   $arrsp[] = array(
  //     'sp_id' => $row_sp['sp_id'],
  //     'sp_ten' => $row_sp['sp_ten']
  //   );
  // }
  ?>

  <main>
    <form class="container bg-light p-5 rounded border shadow-sm mt-5" action="" method="post" name="themmoi" id="themmoi">
      <div class="row mb-4">
        <h3 class="col-12 ">Chỉnh sửa khuyến mãi</h3>
      </div>
      <?php foreach ($arrkm as $km): ?>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label" for="km_ten">Tên khuyến mãi (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label>
            <input class="form-control" value="<?= $km['km_ten'] ?>" type="text" name="km_ten" id="km_ten" >
          </div>

          <div class="col-md-6">
            <label class="form-label" for="km_mota">Mô tả</label>
            <input class="form-control" value="<?= $km['km_mota'] ?>" type="text" name="km_mota" id="km_mota" >
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label" for="km_end">Ngày bắt đầu (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label>
            <input class="form-control" value="<?= $km['km_sta'] ?>" type="date" name="km_sta" id="km_sta" >
          </div>
          <div class="col-md-6">
            <label class="form-label" for="km_end">Ngày kết thúc (<i class="fa-solid fa-star-of-life fa-xs"></i>)</label>
            <input class="form-control" value="<?= $km['km_end'] ?>" type="date" name="km_end" id="km_end" >
          </div>
        </div>
      <?php endforeach; ?>
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
      $km_mota = $_POST['km_mota'];
      $km_sta = $_POST['km_sta'];
      $km_end = $_POST['km_end'];

      $sql_edit = "UPDATE khuyenmai SET km_ten = '$km_ten',km_mota = '$km_mota', km_end = '$km_end', km_sta = '$km_sta' WHERE km_id = '$id';";
      mysqli_query($conn, $sql_edit);

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
  </main>
</body>

</html>