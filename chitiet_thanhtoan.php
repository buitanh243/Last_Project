<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HT Computer - Chi tiết thanh toán</title>

  <?php
  include_once __DIR__ . '/css/style.php';
  include_once __DIR__ . '/css/trangchu.php';
  ?>

  <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 10px;
    }

    .tamtinh, .thongtin-muahang {
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tamtinh h5, .thongtin-muahang h5 {
      margin-bottom: 20px;
      font-size: 18px;
      color: #333;
    }

    .tamtinh label, .thongtin-muahang label {
      display: block;
      margin-top: 10px;
      font-size: 14px;
      color: #555;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    @media (max-width: 768px) {
      .row {
        flex-direction: column;
      }

      .col-8, .col-4 {
        width: 100%;
      }
    }
  </style>
</head>

<body>

  <?php
  include_once __DIR__ . '/bocucchinh/headder.php';
  ?>

  <main>
    <div class="container">
      <div class="row" style="display: flex; flex-wrap: wrap;">
        <div class="thongtin-muahang col-8">
          <h5>THÔNG TIN MUA HÀNG</h5>
          <label for="kh_ten">Họ và tên:</label>
          <input placeholder="Họ và tên khách hàng..." type="text" class="form-control" id="kh_ten" name="kh_ten">
          <label for="sp_ten">Số điện thoại:</label>
          <input placeholder="Nhập số điện thoại..." type="text" class="form-control" id="sp_ten" name="sp_ten">
          <label for="sp_ten">Địa chỉ giao hàng:</label>
          <input placeholder="Địa chỉ giao hàng..." type="text" class="form-control" id="sp_ten" name="sp_ten">
          <label for="ngay_mua">Ngày mua: </label>
          <label for="ngay_mua">22/6/2024</label>
          <br>
          <label for="ghichu">Ghi chú đơn hàng (Tuỳ chọn)</label>
          <textarea placeholder="Nhập ghi chú..." cols="100" rows="2" class="form-control" id="ghichu" name="ghichu"></textarea>
        </div>
        <div class="col-4">
          <div class="tamtinh">
            <h5 class="text-center">HOÁ ĐƠN TẠM TÍNH</h5>
            <label for="">Tổng số sản phẩm: 0 Sản phẩm</label>
            <label for=""><i>Phương thức thanh toán</i></label>
            <select class="form-select mt-3" name="phuong_thuc" id="phuong_thuc">
              <option value="1">Thanh toán khi nhận hàng</option>
              <option value="2">Chuyển khoản</option>
            </select>
            <br>
            <label><b>TỔNG HOÁ ĐƠN:</b> 10.000.000d</label>
            <a href="#" class="btn btn-danger mt-3">THANH TOÁN</a>
          </div>
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
