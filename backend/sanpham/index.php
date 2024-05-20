<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sản phẩm</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">

</head>

<body>

  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $sql = "SELECT sp_ten,sp_soluong,sp_gia,sp_motangan,lsp_ten,sp_id,nsx_ten
        FROM sanpham AS sp 
            JOIN loaisanpham lsp ON sp.lsp_id = lsp.lsp_id
            JOIN nhasanxuat nsx ON sp.nsx_id = nsx.nsx_id
        ;";

  $data = mysqli_query($conn, $sql);

  $arrSP = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrSP[] = array(
      'sp_id' => $row['sp_id'],
      'sp_ten' => $row['sp_ten'],
      'sp_soluong' => $row['sp_soluong'],
      'sp_motangan' => $row['sp_motangan'],
      'sp_gia' => $row['sp_gia'],
      'lsp_ten' => $row['lsp_ten'],
      'nsx_ten' => $row['nsx_ten'],
    );
  }

  ?>
  <main>

    <div class="container mt-5">
      <div class="row ">
        <div class="col-3">
          <?php
          include_once __DIR__ . '/../bocuc/sidebar.php';
          ?>
        </div>
        <div class="col-9">

          <div class="row">
            <div class="col-2 border bg-secondary text-white rounded ">Tên sản phẩm</div>
            <div class="col-1 border text-center bg-secondary text-white rounded">SL</div>
            <div class="col-2 border text-center bg-secondary text-white rounded">Giá</div>
            <div class="col-2 border bg-secondary text-white rounded text-center">Mô tả ngắn</div>
            <div class="col-2 border bg-secondary text-white rounded">Loại sản phẩm</div>
            <div class="col-2 border bg-secondary text-white rounded">Nhà sản xuất</div>
          </div>

          <?php foreach ($arrSP as $sp): ?>
            <div class="row">
              <div class="col-2 bg-light mt-2 "><?= $sp['sp_ten'] ?> </div>
              <div class="col-1 text-center bg-light mt-2 "><?= $sp['sp_soluong'] ?> </div>
              <div class="col-2 text-center bg-light mt-2"><?= $sp['sp_gia'] ?></div>
              <div class="col-2 bg-light mt-2 text-center"><?= $sp['sp_motangan'] ?> </div>
              <div class="col-2 bg-light mt-2"><?= $sp['lsp_ten'] ?></div>
              <div class="col-2 bg-light mt-2"><?= $sp['nsx_ten'] ?></div>
              <div class="col-1">
                <a href="./edit.php?id=<?= $sp['sp_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="./delete.php?id=<?= $sp['sp_id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a>
              </div>
            </div>

          <?php
          endforeach;
          ?>
          <div class="row">

            <div class="col-4  p-2 ">
              <a href="./add.php" class="btn btn-secondary text-white"><i class="fa-solid fa-plus"></i> Thêm sản
                phẩm</a>
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