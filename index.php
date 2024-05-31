<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HT Computer - Trang chủ</title>

  <?php
  include_once __DIR__ . '/css/style.php';
  ?>

  <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
</head>

<body>

  <?php
  include_once __DIR__ . '/bocucchinh/headder.php';
  include_once __DIR__ . '/css/trangchu.php';
  ?>
  <?php

  include_once __DIR__ . '/connect/connect.php';

  $sql = "SELECT hsp.* ,sp_ten,sp_gia,sp_giacu,sp_motangan FROM hinhsanpham AS hsp 
   LEFT JOIN sanpham AS sp ON hsp.sp_id = sp.sp_id;";

  $result = mysqli_query($conn, $sql);

  $arrHSP = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $arrHSP[] = array(
      'hsp_url' => $row['hsp_url'],
      'sp_ten' => $row['sp_ten'],
      'sp_gia' => $row['sp_gia'],
      'sp_giacu' => $row['sp_giacu'],
      'sp_motangan' => $row['sp_motangan'],
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
              <p class="card__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</p>
              <a class="card__button" href="#">Xem thêm</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-sm-3"><img class="ct_t4" src="./Pic/Slide-show head/chuong-trinh-thang-04-2.png" alt=""></div>
        <div class="col-sm-3"><img class="ct_t4" src="./Pic/Slide-show head/chuong-trinh-thang-04-3.png" alt=""></div>
        <div class="col-sm-3"><img class="ct_t4" src="./Pic/Slide-show head/chuong-trinh-thang-04-4.png" alt=""></div>
        <div class="col-sm-3"><img class="ct_t4" src="./Pic/Slide-show head/chuong-trinh-thang-04-6.png" alt=""></div>
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
      <div class="container">

        <div class="row mt-3">
          <?php
          $count = 0;
          foreach ($arrHSP as $row) :
            if ($count >= 4) {
              break;
            }
          ?>
          <!-- Nên tìm sản phẩm có khuyến mãi thôi -->
            <div class="col-sm-3">
              <div class="card">
                <img class="card-img-top" src="\Last_Project\uploads\<?= $row['hsp_url'] ?>" alt="Cool Chair">
                <div class="card-body">
                  <h5 class="card-title text-center bg-light text-uppercase"><b><?= $row['sp_ten'] ?></b></h5>
                  <div class="row text-center bg-light  border">
                    <span class="price col-6"><b>Giá: <br><?= number_format($row['sp_gia'], 0, '.', ',') ?>&#8363;</b></span>
                    <span class="price col-6 text-muted"><i>Giá cũ: <br> <s><?= empty($row['sp_giacu']) ? 'Rỗng' : number_format($row['sp_giacu'], 0, '.', ',') . '₫' ?></s></i></span>
                  </div>
                  <p class="card-text mt-3"><b>Mô tả ngắn: </b><?= $row['sp_motangan'] ?></p>
                </div>
              </div>
            </div>

          <?php
          endforeach;
          ?>
        </div>

        <div class="row">
          <div class="col-sm"><img src="./Pic/Slide-show head/Galax-GeForce-RTX-4070-EX-Gamer-Series.jpg" alt="" class="img-row"></div>
          <div class="col-sm"><img src="./Pic/Slide-show head/man-hinh-asus-proart-tang-ao.jpg" alt="" class="img-row"></div>
        </div>
      </div>
    </div>
  </main>


  <?php
  include_once __DIR__ . '/bocucchinh/footer.php';
  include_once __DIR__ . '/js/js.php';
  ?>

</body>

</html>