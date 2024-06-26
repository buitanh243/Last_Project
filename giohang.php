<?php
session_start();
ob_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');
$ngaymua = date('Y-m-d');

//Khởi tạo giỏ hàng
if (!isset($_SESSION["giohang"])) $_SESSION["giohang"] = [];

//Xoá toà bộ giỏ hàng
if (isset($_POST['del-cart']) && $_POST['del-cart'] == 1) {
  unset($_SESSION['giohang']);
}

//Xoá sản phẩm 
if (isset($_GET['id']) && $_GET['id'] >= 0) {
  $id = $_GET['id'];
  if (isset($_SESSION['giohang'][$id])) {
    unset($_SESSION['giohang'][$id]);
    $_SESSION['giohang'] = array_values($_SESSION['giohang']);
    header('Location: giohang.php');
    exit;
  }
}

include_once __DIR__ . '/connect/connect.php';

$sp_id = $_POST['sp_id'] ?? null;
$dh_soluong = $_POST['dh_soluong'] ?? null;

$sp_id = mysqli_real_escape_string($conn, $sp_id);

$sql = "SELECT hsp.hsp_url, sp.sp_ten, sp.sp_gia 
            FROM hinhsanpham AS hsp
            JOIN sanpham AS sp ON hsp.sp_id = sp.sp_id 
            WHERE sp.sp_id = '$sp_id';";
$result = mysqli_query($conn, $sql);

if ($result) {
  $arrSP = mysqli_fetch_array($result);
  if ($arrSP) {
    $sp_ten = $arrSP['sp_ten'];
    $sp_gia = $arrSP['sp_gia'];
    $hsp_url = $arrSP['hsp_url'];

    $found = false;
    foreach ($_SESSION['giohang'] as &$sp) {
      if ($sp['sp_id'] == $sp_id) {
        $sp['dh_soluong'] += $dh_soluong;
        $found = true;
        break;
      }
    }
    unset($sp);

    if (!$found) {
      $_SESSION['giohang'][] = [
        'sp_id' => $sp_id,
        'hsp_url' => $hsp_url,
        'sp_ten' => $sp_ten,
        'sp_gia' => $sp_gia,
        'dh_soluong' => $dh_soluong
      ];
    }
  }
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
  include_once __DIR__ . '/css/giohang.php';
  ?>
  <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
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
              <th>STT</th>
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
              <th></th>
            </tr>
            <?php if (isset($_SESSION['giohang']) && is_array($_SESSION['giohang']) && count($_SESSION['giohang']) > 0) : ?>
              <?php foreach ($_SESSION['giohang'] as $key => $sp) : ?>
                <tr>
                  <td>
                    <label class="mt-5" for=""><?= $key + 1 ?></label>
                  </td>
                  <td class="sp">
                    <img src="/Last_project/uploads/<?= $sp['hsp_url'] ?>" alt="">
                    <b class="ms-5 mt-5"><?= $sp['sp_ten'] ?></b>
                  </td>
                  <td><label class="mt-5" for=""><?= number_format($sp['sp_gia'], 0, ',', '.') ?>đ </label></td>
                  <td>
                    <label class="mt-5" for=""><?= $sp['dh_soluong'] ?></label>
                    <input type="hidden" name="sp_dh_soluong[]" value="<?= $sp['dh_soluong'] ?>">
                  </td>
                  <td>
                    <label class="mt-5" for=""><?= number_format($sp['sp_gia'] * $sp['dh_soluong'], 0, ',', '.') ?>đ</label>
                  </td>
                  <td>
                    <a href="./giohang.php?id=<?= $key ?>" class="btn btn-danger ml-2 mt-5 btn-delete"><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="5">
                  <label for="">Giỏ hàng trống!</label>
                </td>
              </tr>
            <?php endif; ?>
          </table>

          <form method="post" action="">
            <button type="submit" name="del-cart" value="1" class="btn btn-danger">Xoá giỏ hàng</button>
          </form>
        </div>
        <div class="col-4">
          <div class="tamtinh">
            <h5 class="text-center"><b>TẠM TÍNH</b></h5>
            <label for="">Tổng số mặt hàng: <i><?= isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0 ?> mặt hàng</i></label>
            <label for=""><i>Phương thức thanh toán</i></label>
            <select class="form-select mt-3" name="" id="">
              <option value="1">Thanh toán khi nhận hàng</option>
              <option value="2">Chuyển khoản</option>
            </select>
            <br>
            <label><b>TỔNG HOÁ ĐƠN:</b>
              <?= isset($_SESSION['giohang']) ? number_format(array_reduce(
                $_SESSION['giohang'],
                function ($carry, $item) {
                  return $carry + ($item['sp_gia'] * $item['dh_soluong']);
                },
                0
              ), 0, ',', '.') : '0' ?>đ
            </label>

            <input name="sp_id" type="hidden" value="<?= $sp_id ?>">
            <input name="dh_soluong" type="hidden" value="<?= $dh_soluong ?>">
            <button type="submit" name="dathang" class="btn btn-danger mt-3">ĐẶT HÀNG</button>
          </div>
          <div class="container mt-3">
            <div class="row" style="display: flex; flex-wrap: wrap;">
              <div class="thongtin-muahang">
                <h5>THÔNG TIN MUA HÀNG</h5>
                <label for="kh_ten">Họ và tên:</label>
                <input placeholder="Họ và tên khách hàng..." type="text" class="form-control" id="kh_ten" name="kh_ten">
                <label for="sp_ten">Số điện thoại:</label>
                <input placeholder="Nhập số điện thoại..." type="text" class="form-control" id="kh_sdt" name="kh_sdt">
                <label for="sp_ten">Địa chỉ giao hàng:</label>
                <input placeholder="Địa chỉ giao hàng..." type="text" class="form-control" id="kh_diachi" name="kh_diachi">
                <label for="ngay_mua">Ngày mua: </label>
                <input class="form-control" readonly name="ngaymua" type="text" value="<?= date('d/m/Y', strtotime($ngaymua)) ?>"></input>
                <br>
                <label for="ghichu">Ghi chú đơn hàng (Tuỳ chọn)</label>
                <textarea placeholder="Nhập ghi chú..." cols="100" rows="2" class="form-control" id="ghichu" name="ghichu"></textarea>
              </div>
            </div>
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