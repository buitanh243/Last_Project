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
    $arrSPKM[] = array(
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
      <div class="row">
        <div class="col-8">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./Pic/Slide-show head/rog-cetra-true-wireless-speednova-1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./Pic/Slide-show head/thu-cu-doi-moi-05-2024.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./Pic/Slide-show head/AOC-24G4E.webp" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Lùi</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Tiếp</span>
            </button>
          </div>
        </div>
        <div class="col-4">
          <div class="card-km">
            <div class="card__image">
              <img src="./Pic/Slide-show head/thu-cu-doi-moi-05-2024.webp" alt="">
            </div>
            <div class="card__content">
              <p class="card__title">Khuyến Mãi</p>
              <p class="card__text">Chương trình khuyến mãi hấp dẫn với giảm giá lên đến 50%, tặng quà kèm và miễn phí vận chuyển toàn quốc.</p>
              <a class="card__button" href="./khuyenmai.php">Xem thêm</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <?php
        $count = 0;
        foreach ($arrSP as $row) :
          if ($count == 4) {
            break;
          }
        ?>
          <a href="chitiet_sanpham.php?id=<?= $row['sp_id']?>" class="col-sm-3"><img class="ct_t4" src="\Last_Project\uploads\<?= $row['hsp_url'] ?>" alt=""></a>
        <?php
          $count++;
        endforeach; ?>
      </div>
      <div class="row">
        <button class="btn-uudai" type="button">
          <strong>ƯU ĐÃI ĐẶC BIỆT</strong>
          <div id="container-stars">
            <div id="stars"></div>
          </div>

          <div id="glow">
            <div class="circle"></div>
            <div class="circle"></div>
          </div>
        </button>
      </div>
      <div class="container km bg-secondary mt-3 rounded">

        <div class="row mt-3 justify-content-center">
          <?php
          $count = 0;
          foreach ($arrSPKM as $row) :
            if ($count == 5) {
              break;
            }
          ?>
            <div class="col col-card">
              <div class="card">
                <img class="card-img-top" src="\Last_Project\uploads\<?= $row['hsp_url'] ?>" alt="Cool Chair">
                <div class="card-body">
                  <h6 class="card-title text-center text-uppercase"><b><?= $row['sp_ten'] ?></b></h6>
                  <div class="row text-center bg-light  border mb-3">
                    <span class="price col-6 text-danger "><b>Giá: <br><?= number_format($row['sp_gia'], 0, '.', ',') ?>&#8363;</b></span>
                    <span class="price col-6 text-muted"><i>Giá cũ: <br> <s><?= empty($row['sp_giacu']) ? 'Rỗng' : number_format($row['sp_giacu'], 0, '.', ',') . '₫' ?></s></i></span>
                  </div>
                  <b>Khuyến mãi: </b><label class="badge bg-primary mb-1" for=""><?= $row['km_ten'] ?></label>
                  <br>
                  <b class="card-text mt-3 text-secondary">Mô tả ngắn: </b><label class="" for=""><?= $row['sp_motangan'] ?></label>
                  <br>
                  <p class="mt-2 text-center"><a href="chitiet_sanpham.php?id=<?= $row['sp_id'] ?>">Xem chi tiết</a></p>
                </div>
              </div>
            </div>
          <?php
            $count++;
          endforeach;
          ?>
        </div>
      </div>
      <div class="row ">
      <?php
        $count = 0;
        foreach ($arrSP as $row) :
          if ($count == 2) {
            break;
          }
        ?>
        <a href="chitiet_sanpham.php?id=<?= $row['sp_id'] ?>" class="col-sm"><img class="product-bt" src="./uploads/<?=$row['hsp_url']?>" alt="" class="img-row"></a>        <?php
          $count++;
        endforeach; ?>
      </div>

    </div>

  </main>


  <?php
  include_once __DIR__ . '/bocucchinh/footer.php';
  include_once __DIR__ . '/js/js.php';
  ?>

</body>

</html>