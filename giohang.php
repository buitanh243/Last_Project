<?php
session_start();
 if (!isset($_SESSION["giohang"])) $_SESSION["giohang"]=[]; 

 //Lay DL tu form Chitiet_sanpham
 if (isset($_POST['add-cart'])) {
    $sp_id = $_POST['sp_id'];
    $sp_soluong = $_POST['sp_soluong'];

    $sql = "SELECT hsp.hsp_ten, sp.sp_ten, sp.sp_gia";
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HT Computer - Giỏ hàng</title>

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
    }

    .table {
      background-color: #fff;
      width: 100%;
      
      border-collapse: collapse;
      margin: 20px 0;
    }

    .table th, .table td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .table th {
      background-color: #f2f2f2;
    }


    .table td img {
      height: 150px;
    }

    .table tr:hover {
      background-color: #f1f1f1;
    }

    .tamtinh {
      padding: 20px;
      margin: 20px 0;
      background-color: #fafafa;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tamtinh h5 {
      margin-bottom: 20px;
      font-size: 18px;
      color: #333;
    }

    .tamtinh label {
      display: block;
      margin-top: 10px;
      font-size: 14px;
    }

  </style>

</head>

<body>

  <?php
  include_once __DIR__ . '/bocucchinh/headder.php';
  ?>

  <main>
    <div class="container">
      <div class="row">
        <div class="col-8">
          <table class="table">
            <tr>
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
            </tr>
            <tr>
              <td>
              <img src="./Pic/Laptop/dell-vostro-15-3520-p112f007-i5-1235u-2.jpg" alt="">  
              Sản phẩm 1
              </td>
              <td>100,000</td>
              <td>2</td>
              <td>200,000,000</td>
            </tr>
            <tr>
              <td>
              <img src="./Pic/Laptop/dell-vostro-15-3520-p112f007-i5-1235u-2.jpg" alt="">    
              Sản phẩm 2</td>
              <td>150,000</td>
              <td>1</td>
              <td>150,000</td>
            </tr>
          </table>
        </div>
        <div class="col-4">
          <div class="tamtinh">
            <h5 class="text-center">HOÁ ĐƠN TẠM TÍNH</h5>
            <label for="">Tổng số sản phẩm: 0 Sản phẩm</label>
            <label for=""><i>Phương thức thanh toán</i></label>
            <select class="form-select mt-3" name="" id="">
              <option value="1">Thanh toán khi nhận hàng</option>
              <option value="2">Chuyển khoản</option>
            </select>
            <br>
            <label><b>TỔNG HOÁ ĐƠN:</b> 10.000.000d</label>
            <a href="./chitiet_thanhtoan.php" class="btn btn-danger mt-3" >ĐẶT HÀNG</a>
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
