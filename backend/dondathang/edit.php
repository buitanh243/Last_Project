<?php
session_start();
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
            location.href="/Last_project/Xuly/popup-login.php?name=Error";
          </script>';
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Hình sản phẩm</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; // CSS backend
  ?>
  <link rel="icon" href="/Last_project/Pic/favicon.ico" type="image/x-icon">

  <style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      opacity: 1;
    }

    main.container {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      flex-direction: column;
    }

    .form-ddh {
      max-width: 1000px;
      width: 100%;
    }

    .custom-select {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;

      width: 100%;
      padding: 6px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgc3Ryb2tlPSIjMDAwMDAwIiBzdHJva2Utd2lkdGg9IjEuNSI+PHBvbHlsaW5lIHBvaW50cz0iNiA4IDEyIDE0IDE4IDgiLz48L3N2Zz4=') no-repeat right 10px center;
      background-color: white;
      cursor: pointer;
      background-size: 20px;
    }

    .custom-select::-ms-expand {
      display: none;
    }

    .table td,
    .table th {
      text-align: center;
    }
  </style>
</head>

<body>
  <?php
  include_once __DIR__ . '/../../connect/connect.php';

  $id = $_GET['id'];
  //Lấy dữ liệu đơn đặt hàng
  $sql = "SELECT spdh.sp_dh_soluong, spdh.sp_dh_dongia, sp.sp_ten, spdh.sp_dh_id, spdh.sp_id
  FROM sanpham_dondathang AS spdh
  JOIN sanpham AS sp ON spdh.sp_id = sp.sp_id
  WHERE spdh.dh_id = $id;
  ";
  $result = mysqli_query($conn, $sql);

  $arrDDH = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $arrDDH[] = [
      "sp_dh_soluong" => $row["sp_dh_soluong"],
      "sp_dh_dongia" => $row["sp_dh_dongia"],
      "sp_id"=> $row["sp_id"],
      "sp_ten" => $row["sp_ten"],
      "sp_dh_id" => $row["sp_dh_id"],
    ];
  }
  //Lấy thông tin đơn hàng 
  $sql = "SELECT dh_ngaygiao,dh_ngaylap,dh_noigiao,dh_trangthai,dh_trangthai_donhang,ddh.dh_id,
  kh.kh_id,kh_ten,kh_sdt,
  httt.httt_id,httt_ten
   FROM dondathang AS ddh
  LEFT JOIN khachhang AS kh ON ddh.kh_id = kh.kh_id
  LEFT JOIN hinhthucthanhtoan AS httt 
  ON ddh.httt_id = httt.httt_id
  WHERE ddh.dh_id = $id;
  ;
  ";
  $result = mysqli_query($conn, $sql);
  $arr_TTDH = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $arr_TTDH[] = [
      "dh_id" => $row["dh_id"],
      "dh_ngaygiao" => $row["dh_ngaygiao"],
      "dh_ngaylap" => $row["dh_ngaylap"],
      "dh_noigiao" => $row["dh_noigiao"],
      "dh_trangthai" => $row["dh_trangthai"],
      "dh_trangthai_donhang" => $row["dh_trangthai_donhang"],
      "kh_id" => $row["kh_id"],
      "kh_ten" => $row["kh_ten"],
      "kh_sdt" => $row["kh_sdt"],
      "httt_id" => $row["httt_id"],
      "httt_ten" => $row["httt_ten"],
    ];
  }

  // Lấy dữ liệu khách hàng
  $sqlkh = "SELECT * FROM khachhang";
  $data_kh = mysqli_query($conn, $sqlkh);
  $arrKH = [];
  while ($row = mysqli_fetch_assoc($data_kh)) {
    $arrKH[] = [
      "kh_id" => $row["kh_id"],
      "kh_ten" => $row["kh_ten"],
      "kh_sdt" => $row["kh_sdt"],
      "kh_diachi" => $row["kh_diachi"],
    ];
  }
  //Lấy dữ liệu hình thức thanh toán
  $sqltt = "SELECT * FROM hinhthucthanhtoan";
  $data_tt = mysqli_query($conn, $sqltt);
  $arrtt = [];
  while ($row = mysqli_fetch_assoc($data_tt)) {
    $arrtt[] = [
      "httt_id" => $row["httt_id"],
      "httt_ten" => $row["httt_ten"],
    ];
  }
  //Lấy dữ liệu sản phẩm
  $sqlSP = "SELECT sp_id, sp_ten, sp_gia FROM sanpham";
  $data_SP = mysqli_query($conn, $sqlSP);
  $arrSP = [];
  while ($row = mysqli_fetch_assoc($data_SP)) {
    $arrSP[] = [
      "sp_id" => $row["sp_id"],
      "sp_ten" => $row["sp_ten"],
      "sp_gia" => $row["sp_gia"],
    ];
  }
  ?>

  <main class="container">

    <form class="form-ddh bg-light p-5 rounded border" action="" method="post" name="themmoi" id="themmoi">
      <div class="head mb-5">
        <h3>Sửa đơn đặt hàng</h3>
      </div>
      <h5>Thông tin đặt hàng</h5>
      <div class="form-group">
        <label for="kh_id">Tên khách hàng</label>
    <?php foreach ($arr_TTDH as $ttdh) : ?>

          <select class="form-control mt-2 custom-select" name="kh_id" id="kh_id">
            <option value="<?= $ttdh['kh_id'] ?>">
              <?= $ttdh['kh_ten'] ?> (<?= $ttdh['kh_sdt'] ?>)
            </option>

            <?php foreach ($arrKH as $kh) : ?>
              <option value="<?= $kh['kh_id'] ?>" data-address="<?= $kh['kh_diachi'] ?>">
                <?= $kh['kh_ten'] ?> (<?= $kh['kh_sdt'] ?>)
              </option>
            <?php endforeach; ?>
          </select>

      </div>
      <div class="row mt-2">
        <div class="col-md-4">
          <label for="ngaylap">Ngày lập</label>
          <input readonly class="form-control mt-2" type="text" value="<?= date('d/m/Y',  strtotime($ttdh['dh_ngaylap']))  ?>">
        </div>
        <div class="col-md-4">
          <label for="ngaygiao">Ngày giao</label>
          <input class="form-control mt-2" type="text" name="dh_ngaygiao" id="dh_ngaygiao" value="<?= date('d/m/Y',  strtotime($ttdh['dh_ngaygiao']))  ?>">
        </div>
        <div class="col-md-4">
          <label for="dh_diachi">Địa chỉ</label>
          <input class="form-control mt-2" type="text" name="dh_noigiao" id="dh_noigiao" value="<?= $ttdh['dh_noigiao'] ?>">
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-6">
          <label class="mb-2" for="">Trạng thái đơn hàng</label>
          <div class="form-check mt-2">
            <input class="form-check-input xuly" type="checkbox" name="dh_trangthai_donhang" value="1" <?= ($ttdh['dh_trangthai_donhang'] == 1) ? 'checked' : '' ?>>
            <label class="form-check-label" for="chua_xu_ly">Chưa xử lý</label>
          </div>
          <div class="form-check mt-2">
            <input class="form-check-input xuly" type="checkbox" name="dh_trangthai_donhang" value="2" <?= ($ttdh['dh_trangthai_donhang'] == 2) ? 'checked' : '' ?>>
            <label class="form-check-label" for="da_xu_ly">Đã xử lý</label>
          </div>
        </div>

        <div class="col-md-6">
          <label for="httt_id">Hình thức thanh toán</label>
          <select class="form-control mt-2 custom-select" name="httt_id" id="httt_id">
            <option value="<?= $ttdh['httt_id'] ?>">
              <?= $ttdh['httt_ten'] ?>
            </option>
            <?php foreach ($arrtt as $tt) : ?>
              <option value="<?= $tt['httt_id'] ?>">
                <?= $tt['httt_ten'] ?>
              </option>
            <?php endforeach; ?>
          </select>
          <div class="row ms-3 mt-2">
            <div class="col-6 form-check mt-2">
              <input class="form-check-input thanhtoan" type="checkbox" name="dh_trangthai_thanhtoan" value="1" <?= ($ttdh['dh_trangthai'] == 1) ? 'checked' : '' ?>>
              <label class="form-check-label" for="chua_thanh_toan">Chưa thanh toán</label>
            </div>
            <div class="col-6 form-check mt-2">
              <input class="form-check-input thanhtoan" type="checkbox" name="dh_trangthai_thanhtoan" value="2" <?= ($ttdh['dh_trangthai'] == 2) ? 'checked' : '' ?>>
              <label class="form-check-label" for="da_thanh_toan">Đã thanh toán</label>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <h5 class="mt-4">Chi tiết đơn hàng</h5>
    <div class="row">
      <div class="col-md-4">
        <label for="sp_id">Tên sản phẩm</label>
        <select class="form-control mt-2 custom-select" name="sp_id" id="sp_id">
          <?php foreach ($arrSP as $sp) : ?>
            <option value="<?= $sp['sp_id'] ?>" data-sp_gia="<?= $sp['sp_gia'] ?>">
              <?= $sp['sp_ten'] ?> (Giá: <?= number_format($sp['sp_gia'], 0, ',', '.') . '₫' ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-4">
        <label for="dh_soluong">Số lượng</label>
        <input id="dh_soluong" class="form-control mt-2" type="number" value="1" min="1">
      </div>
      <div class="col-md-4 d-flex align-items-end">
        <button id="add-cart" class="btn btn-info text-white mt-2"><i class="fa-solid fa-plus"></i> Thêm vào đơn hàng</button>
      </div>
    </div>

    <div class="row mt-3">
      <table class="table table-bordered" id="table-ddh">
        <thead>
          <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($arrDDH as $ddh) : ?>
            <tr>
              <td><?= $ddh['sp_ten'] ?></td>
              <td><?= $ddh['sp_dh_soluong'] ?></td>
              <td><?= number_format($ddh['sp_dh_dongia'], 0, ',', '.')  ?>&#8363</td>
              <td><?= number_format($ddh['sp_dh_soluong'] * $ddh['sp_dh_dongia'], 0, ',', '.') ?>&#8363</td>
              <td><a href="./xoadh.php?id=<?= $ddh['sp_dh_id'] ?>&dh_id=<?= $ttdh['dh_id'] ?>"" class="btn btn-danger text-white"><i class="fa-solid fa-trash"></i> Xoá</a></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <button type="submit" class="btn btn-primary mt-3 me-2 btn-save" name="save" id="save">Lưu đơn hàng</button>
    <a href="index.php" class="btn btn-danger mt-3" name="exit">Huỷ</a>
    </form>
  </main>

  <?php
  include_once __DIR__ . '/../js/js.php';
  include_once __DIR__ . '/../../js/js.php';
  ?>

<script>
    // Chỉ được chọn 1 trong 2 checkbox
    document.addEventListener('DOMContentLoaded', function() {
      function handleCheckboxes(className) {
        var checkboxes = document.querySelectorAll('.' + className);
        checkboxes.forEach(function(checkbox) {
          checkbox.addEventListener('change', function() {
            if (this.checked) {
              checkboxes.forEach(function(box) {
                if (box !== checkbox) {
                  box.checked = false;
                }
              });
            }
          });
        });
      }

      handleCheckboxes('xuly');
      handleCheckboxes('thanhtoan');

      // Hiển thị địa chỉ với từng khách hàng tương ứng
      const khSelect = document.getElementById('kh_id');
      const diachiInput = document.getElementById('dh_diachi');

      khSelect.addEventListener('change', function() {
        const selectedOption = khSelect.options[khSelect.selectedIndex];
        const address = selectedOption.getAttribute('data-address');
        diachiInput.value = address;
      });

      khSelect.dispatchEvent(new Event('change'));
    });

    // Tạo bảng đơn đặt hàng ảo
    $(function() {
      $('#add-cart').click(function(event) {
        event.preventDefault();

        var sp_id = $('select#sp_id option:selected').val();
        var sp_ten = $('select#sp_id option:selected').text();
        var sp_gia = $('select#sp_id option:selected').data('sp_gia');
        var dh_soluong = $('#dh_soluong').val();
        var thanhtien = sp_gia * dh_soluong;

        var template = '<tr>';
        template += '<td>' + sp_ten + '<input type="hidden" name="sp_id[]" value="' + sp_id + '"></td>';
        template += '<td>' + dh_soluong + '<input type="hidden" name="sp_dh_soluong[]" value="' + dh_soluong + '"></td>';
        template += '<td>' + sp_gia.toLocaleString('vi-VN', {
          style: 'currency',
          currency: 'VND'
        }) + '<input type="hidden" name="sp_dh_dongia[]" value="' + sp_gia + '"></td>';
        template += '<td>' + thanhtien.toLocaleString('vi-VN', {
          style: 'currency',
          currency: 'VND'
        }) + '</td>';
        template += '<td><a class="btn btn-danger text-white btn-delete"><i class="fa-solid fa-trash"></i> Xoá</a></td>';
        template += '</tr>';

        // Chèn DL vào bảng
        $('#table-ddh tbody').append(template);
      });

      // Xoá dòng vừa thêm
      $('#table-ddh').on('click', '.btn-delete', function() {
        $(this).closest('tr').remove();
      });
    });

    $('#save').click(function(event) {
      event.preventDefault();
      var infoData = [];
      var orderData = [];
      var kh_id = $('select[name="kh_id"]').val();
      // var dh_ngaygiao = $('input[name="dh_ngaygiao"]').val();
      var dh_noigiao = $('input[name="dh_noigiao"]').val();

      var dh_trangthai_donhang;
      if ($('input[name="dh_trangthai_donhang"]').is(':checked')) {
        dh_trangthai_donhang = $('input[name="dh_trangthai_donhang"]:checked').val();
      }
      var dh_trangthai_thanhtoan;
      if ($('input[name="dh_trangthai_thanhtoan"]').is(':checked')) {
        dh_trangthai_thanhtoan = $('input[name="dh_trangthai_thanhtoan"]:checked').val();
      }
      var httt_id = $('select[name="httt_id"]').val();

      infoData.push({
        kh_id: kh_id,
        // dh_ngaygiao: dh_ngaygiao,
        dh_noigiao: dh_noigiao,
        dh_trangthai_donhang: dh_trangthai_donhang,
        dh_trangthai_thanhtoan: dh_trangthai_thanhtoan,
        httt_id: httt_id,
      });

      $('#table-ddh tbody tr').each(function() {
        var sp_id = $(this).find('input[name="sp_id[]"]').val();
        var dh_soluong = $(this).find('input[name="sp_dh_soluong[]"]').val();
        var sp_gia = $(this).find('input[name="sp_dh_dongia[]"]').val();

        orderData.push({
          sp_id: sp_id,
          dh_soluong: dh_soluong,
          sp_gia: sp_gia
        });
      });

      if (orderData.length > 0) {
        $.ajax({
          url: './edit.php',
          type: 'POST',
          data: JSON.stringify({
            info: infoData,
            orders: orderData
          }),
          contentType: 'application/json',
          success: function(response) {
            window.location.href = './../popup.php?name=dondathang';
          },
        });
      } else {
        alert("Không có sản phẩm nào!");
      }
    });
  </script>



  <?php

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include_once __DIR__ . '/../../connect/connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    if (json_last_error() !== JSON_ERROR_NONE) {
      die("Lỗi khi phân tích dữ liệu JSON: " . json_last_error_msg());
    }

    // Chuẩn bị câu lệnh SQL cho đơn đặt hàng
    $stmt = $conn->prepare("UPDATE dondathang SET dh_noigiao = ?, dh_trangthai = ?, dh_trangthai_donhang = ?, httt_id = ?, kh_id = ? WHERE dh_id = ?");
    if (!$stmt) {
      die("Chuẩn bị câu lệnh SQL thất bại: " . $conn->error);
    }

    // Chuẩn bị câu lệnh SQL cho chi tiết đơn hàng
    $stmt_detail = $conn->prepare("INSERT INTO sanpham_dondathang (sp_id, sp_dh_soluong, sp_dh_dongia, dh_id) VALUES (?, ?, ?, ?)");
    if (!$stmt_detail) {
      die("Chuẩn bị câu lệnh SQL thất bại: " . $conn->error);
    }

    foreach ($data['info'] as $info) {
      // $ngaygiao = !empty($info['dh_ngaygiao']) ? date('Y-m-d', strtotime($info['dh_ngaygiao'])) : null;

      // Cập nhật thông tin đơn hàng
      $stmt->bind_param("siiiii", $info['dh_noigiao'], $info['dh_trangthai'], $info['dh_trangthai_donhang'], $info['httt_id'], $info['kh_id'], $id);
      if (!$stmt->execute()) {
        die("Cập nhật đơn đặt hàng thất bại: " . $stmt->error);
      }
    }

    foreach ($data['orders'] as $order) {
      // Chèn chi tiết đơn hàng
      $stmt_detail->bind_param("iidi", $order['sp_id'], $order['dh_soluong'], $order['sp_gia'], $id);
      if (!$stmt_detail->execute()) {
        die("Chèn chi tiết đơn đặt hàng thất bại: " . $stmt_detail->error);
      }
    }

    $stmt->close();
    $stmt_detail->close();
    $conn->close();
  }

  ?>
</body>

</html>