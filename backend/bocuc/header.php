<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
      include_once __DIR__ . '/../../css/style.php';
      include_once __DIR__ . '/../style.php'; //css backend
      include_once __DIR__ . '/../../js/js.php';
      ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
  <style>
    a {
      white-space: nowrap;
    }
  </style>
</head>
<body>
        
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="\Last_Project\backend\sanpham\index.php?name=sanpham">Trang chủ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="\Last_Project\backend\dondathang">Đơn đặt hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
    
      </ul>
    </div>
  </div>
</nav>
              
</body>
</html> 