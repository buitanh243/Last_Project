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

  <main>

    <div class="container">
      <div class="row">
        <div class="col-8">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="./Pic/Slide-show head/rog-cetra-true-wireless-speednova-1.jpg" class="d-block w-100"
                  alt="...">
              </div>
              <div class="carousel-item">
                <img src="./Pic/Slide-show head/thu-cu-doi-moi-05-2024.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="./Pic/Slide-show head/AOC-24G4E.webp" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Lùi</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next">
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
            <div class="col-sm-3">
              <div class="card">
              <img class="image-card" src="./Pic/Slide-show head/Cau-hinh-pc-1.png" ></img>
                  <span class="title">Cool Chair</span>
                  <span class="price">Giá: 100</span>
                  <span>Mô tả ngắn: </span>
                </div>
            </div>
            <div class="col-sm-3">
              <div class="card">
              <img class="image-card" src="./Pic/Slide-show head/Cau-hinh-pc-1.png" ></img>
                  <span class="title">Cool Chair</span>
                  <span class="price">Giá: 100</span>
                  <span>Mô tả ngắn: </span>
                </div>
            </div>
            <div class="col-sm-3">
              <div class="card">
                <img class="image-card" src="./Pic/Slide-show head/Cau-hinh-pc-1.png" ></img>
                  <span class="title"> Cool Chair</span>
                  <span class="price"> Giá: 100</span>
                  <span> Mô tả ngắn: </span>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="card">
                <img class="image-card" src="./Pic/Slide-show head/Cau-hinh-pc-1.png" ></img>
                  <span class="title ms-2 mt-3">Cool Chair</span>
                  <div class="row ms-1 mt-3">
                  <span class="price col-6"><b>Giá: 10.000.000</b></span> <span class="price col-6"><b>Giá cũ: 10.000.000</b></span>
                  </div> 
                  <span class="ms-2 mt-3">Mô tả ngắn: </span>
              </div>
            </div>
          </div>
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