<?php session_start(); 
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
          location.href="/Last_project/Xuly/popup-login.php?name=Error";
        </script>';
  exit; 
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm Hình sản phẩm</title>
  <?php
  include_once __DIR__ . '/../../css/style.php';
  include_once __DIR__ . '/../style.php'; //css backend
  ?>
  <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
</head>
<?php
include_once __DIR__ . '/../../connect/connect.php';

$sqlkh = "SELECT * FROM khachhang";

$data_kh = mysqli_query($conn, $sqlkh);

$arrKH = [];
while ($row = mysqli_fetch_assoc($data_kh)) {
  $arrKH[] = array(
    "kh_id" => $row["kh_id"],
    "kh_ten" => $row["kh_ten"],
    "kh_sdt" => $row["kh_sdt"],
  );
}

?>

<body>

  <form class="container align-items-center bg-light m-5 p-5 rounded border" action="" method="post" name="themmoi" id="themmoi">
    <h3>Thêm đơn đặt hàng</h3>
    <label for="">Tên khách hàng</label>

    <select name="kh_ten" id="kh_ten">
      <?php foreach ($arrKH as $kh) : ?>
        <option value="<?= $kh['kh_id'] ?>">
          <?= $kh['kh_ten']  ?>
          (<?= $kh['kh_sdt'] ?>)

        </option>
      <?php endforeach; ?>
    </select>

  </form>



  <?php
  if (isset($_POST['save'])) {
    include_once __DIR__ . '/../../connect/connect.php';

    $lsp_ten = $_POST['lsp_ten'];
    $lsp_mota = $_POST['lsp_mota'];

    $sql = "INSERT INTO loaisanpham (lsp_ten, lsp_mota) VALUES ('$lsp_ten','$lsp_mota');";

    if (mysqli_query($conn, $sql)) {
      echo '<script>setTimeout(function(){ location.href = "index.php"; }, 300);</script>';
    }
  }

  if (isset($_POST['exit'])) {
    echo '<script>setTimeout(function(){ location.href = "index.php"; }, 1000);</script>';
  }
  ?>

  <?php
  include_once __DIR__ . '/../js/js.php';
  include_once __DIR__ . '/../../js/js.php';
  ?>
</body>

</html>