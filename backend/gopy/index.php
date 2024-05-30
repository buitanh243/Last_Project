<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Góp ý</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
</head>

<body>

  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $sql = "SELECT gy.*, kh.kh_ten 
  FROM gopy AS gy
  LEFT JOIN khachhang AS kh 
  ON gy.kh_id = kh.kh_id;
  ";

  $data = mysqli_query($conn, $sql);

  $arrgopy = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrgopy[] = array(
      'gopy_id' => $row['gopy_id'],
      'gopy_noidung' => $row['gopy_noidung'],
      'kh_ten' => $row['kh_ten'],
    );
  }

  ?>
  <main>

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
              Tên khách hàng
            </div>
          
            <div class="col-3 border rounded bg-secondary bg-gradient text-white ">
              Nội dung
            </div>
            <div class="col-2"></div>
          </div>

          <?php foreach ($arrgopy as $gopy): ?>
            <div class="row ">
              <div class="col-3 bg-light mt-2">
                <?= $gopy['kh_ten'] ?>
              </div>
              <div class="col-3 bg-light mt-2">
                <?= $gopy['gopy_noidung'] ?>
              </div>
              <div class="col-2">
                  <a href="./delete.php?id=<?= $gopy['gopy_id']?> " class="btn btn-danger mt-1"><i class="fa-solid fa-trash"></i></a>
              </div>
            </div>
          <?php endforeach; ?>

          <div class="row">
            <div class="col-3 p-2">
            <a href="./add.php" class="btn btn-danger text-white btn-delete" id="btn-delete-all"><i class="fa-solid fa-trash" ></i> Xoá tất cả</a>
            </div>
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