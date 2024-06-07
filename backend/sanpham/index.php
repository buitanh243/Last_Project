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
  <link rel="icon" href="/../../Pic/favicon.ico" type="image/x-icon">

</head>

<body>

  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $sql = "SELECT sp_ten,sp_soluong,sp_gia,sp_giacu,sp_motangan,sp_mota_chitiet,lsp_ten,
  sp_id,nsx_ten,sp_ngaynhaphang,sp_ngaycapnhat, km_ten, km_mota, km_end, km_sta
  FROM sanpham AS sp 
      JOIN loaisanpham lsp ON sp.lsp_id = lsp.lsp_id
      JOIN nhasanxuat nsx ON sp.nsx_id = nsx.nsx_id
      LEFT JOIN khuyenmai km ON sp.km_id = km.km_id
  ;";
  // co khuyen mai thi sai 
  $data = mysqli_query($conn, $sql);

  $arrSP = [];

  while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
    $arrSP[] = array(
      'sp_id' => $row['sp_id'],
      'sp_ten' => $row['sp_ten'],
      'sp_soluong' => $row['sp_soluong'],
      'sp_motangan' => $row['sp_motangan'],
      'sp_ngaynhaphang' => $row['sp_ngaynhaphang'],
      'sp_ngaycapnhat' => $row['sp_ngaycapnhat'],
      'sp_gia' => $row['sp_gia'],
      'sp_giacu' => $row['sp_giacu'],
      'sp_mota_chitiet' => $row['sp_mota_chitiet'],
      'lsp_ten' => $row['lsp_ten'],
      'nsx_ten' => $row['nsx_ten'],
      'km_ten' => $row['km_ten'],
      'km_mota' => $row['km_mota'],
      'km_sta' => $row['km_sta'],
      'km_end' => $row['km_end'],

    );

  }

  ?>
  <main>
  <?php include_once __DIR__ . '/../bocuc/header.php'; ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col-3">
          <?php include_once __DIR__ . '/../bocuc/sidebar.php'; ?>
        </div>
        <div class="col-9">
          <div class="row mb-3">
            <div class="col-4">
              <a href="./add.php" class="btn btn-info text-white "><i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
            </div>
          </div>

          <?php foreach ($arrSP as $sp): ?>
            <div class="product-details mb-5 bg-light p-3 rounded border">
              <div class="row">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Tên sản phẩm:</div>
                <div class="col-3"><b><?= $sp['sp_ten'] ?></b></div>
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Số lượng:</div>
                <div class="col-3"><?= number_format($sp['sp_soluong'], 0, '.', ',') ?></div>
              </div>
              <div class="row mt-2">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Giá bán:</div>
                <div class="col-3"><?= number_format($sp['sp_gia'], 0, '.', ',') ?></div>
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Giá cũ:</div>
                <div class="col-3"><?= empty($sp['sp_giacu']) ? '(Rỗng)' : number_format($sp['sp_giacu'], 0, '.', ',') ?>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Loại sản phẩm:</div>
                <div class="col-3"><?= $sp['lsp_ten'] ?></div>
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Nhà sản xuất:</div>
                <div class="col-3"><?= $sp['nsx_ten'] ?></div>
              </div>
              <div class="row mt-2">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Ngày nhập hàng:</div>
                <div class="col-3"><?= date('d/m/Y', strtotime($sp['sp_ngaynhaphang'])) ?></div>
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Ngày cập nhật</div>
                <div class="col-3"><?= empty($sp['sp_ngaycapnhat']) ? '(Rỗng)' : date('d/m/Y H:i:s', strtotime($sp['sp_ngaycapnhat'])) ?></div>
              </div>
              <div class="row mt-2">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Khuyến mãi:</div>
                <div class="col-9"><?= empty($sp['km_ten']) ? '(Rỗng)' : $sp['km_ten'] ?></div>
              </div>

              <div class="row mt-2">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center mb-2">Mô tả khuyến mãi
                </div>
                <textarea readonly
                  class="form-control col-9"><?= empty($sp['km_mota']) ? '(Rỗng)' : $sp['km_mota'] ?></textarea>
              </div>
              <div class="row mt-2">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Từ ngày:</div>
                <div class="col-3"><?= empty($sp['km_sta']) ? '(Rỗng)' : date('d/m/Y', strtotime($sp['km_sta'])) ?></div>
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Đến ngày:</div>
                <div class="col-3"><?= empty($sp['km_end']) ? '(Rỗng)' : date('d/m/Y', strtotime($sp['km_end'])) ?></div>
              </div>
              <div class="row mt-2">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center mb-2">Mô tả ngắn:</div>
                <textarea readonly
                  class="form-control col-9"><?= empty($sp['sp_motangan']) ? '(Không có mô tả ngắn)' : $sp['sp_motangan'] ?></textarea>
              </div>
              <div class="row mt-2">
                <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center mb-2">Mô tả chi tiết:
                </div>
                <textarea readonly class="form-control col-9"
                  rows="5"><?= empty($sp['sp_mota_chitiet']) ? '(Không có mô tả chi tiết)' : $sp['sp_mota_chitiet'] ?></textarea>
              </div>
              <div class="row mt-2">
                <div class="col-6">
                  <a href="./edit.php?id=<?= $sp['sp_id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                  <!-- href="./edit.php?id=<?= $sp['sp_id'] ?>" -->
                  <a href="#" class="btn btn-danger btn-sm ml-2 btn-delete " id="" data-id="<?= $sp['sp_id']?>"><i class="fa-solid fa-trash"></i></a>
                  
                </div>
              </div>
            </div>

          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Nút Back to Top -->
    <button onclick="topFunction()" id="backToTopBtn" class="btn btn-primary"><i
        class="fa-solid fa-arrow-up"></i></button>

  </main>

  <?php
  include_once __DIR__ . '/../js/js.php';
  include_once __DIR__ . '/../../js/js.php';
  ?>
  
</body>

</html>