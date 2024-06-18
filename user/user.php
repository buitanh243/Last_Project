<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HT Computer - Thông tin tài khoản</title>

  <?php
  include_once __DIR__ . '/../css/style.php';
  ?>

  <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
  <style>
    .icon-u {
      width: 100%;
    }

    .user-icon {
      margin-left: 50px;
      height: 50%;
    }
  </style>
</head>

<body>

  <?php
  include_once __DIR__ . '/../bocucchinh/headder.php';
  include_once __DIR__ . '/../css/trangchu.php';
  ?>

  <?php
  include_once __DIR__ . '/../connect/connect.php';

  $username = $_SESSION['username'];
  
  //Lấy id tài khoản
  $sql = "SELECT * FROM taikhoan WHERE username = '$username';  ";
  $result = mysqli_query($conn, $sql);
  $arr_tk = [];
  while ( $row = mysqli_fetch_array($result) ) {
    $arr_tk[] = array (
    "tk_id"=> $row["tk_id"],
    "email"=> $row["email"],
    );
  }


  $sql = "SELECT kh.kh_ten, kh.kh_sdt, kh.kh_diachi, tk.email
  FROM khachhang  AS kh
  LEFT JOIN taikhoan AS tk ON kh.tk_id = tk.tk_id
  WHERE tk.username = '$username'; ";
  $result = mysqli_query($conn, $sql);
  
  $arr_KH = [];
  while ( $row = mysqli_fetch_array($result) ) {
    $arr_KH[] = array (
    'kh_ten' => $row['kh_ten'],
    'kh_sdt'=> $row['kh_sdt'],
    'kh_diachi'=> $row['kh_diachi'],
    'email'=> $row['email'],
    );
  }

  if (empty($arr_KH)) {
    $arr_KH[] = array(
        'kh_ten' => '',
        'kh_sdt' => '',
        'kh_diachi' => '',
        'email' => '',
    );
}
  
  ?>

  <div class="container bg-light rounded">
    <div class="row icon-u">
      <div class="col-3 mt-5">
        <img class="user-icon" src="./../Pic/user-icon.png" alt="User Icon">
      </div>
      <div class="col-6">
        <h4 class="mt-3 text-center">Thông tin tài khoản</h4>

        <div class="row">
          Tên đăng nhập
        </div>
        <div class="row mt-2">
          <input readonly class="form-control" value="<?= $_SESSION['username'] ?>"></input>
        </div>
        
        <?php foreach( $arr_tk as $tk ): ?>
        <div class="row mt-2">
          Email
        </div>
        <div class="row mt-2">
        <input readonly class="form-control" value="<?= $tk['email'] ?>"></input>
        </div>
        <?php endforeach; ?>
        <?php foreach( $arr_KH as $kh ): ?>
        <div class="row mt-2">
          Tên khách hàng
        </div>
        <div class="row mt-2">         
          <input readonly class="form-control" value="<?= empty($kh['kh_ten']) ? '(Chưa có tên khách hàng)' : $kh['kh_ten'] ?>"></input>
        </div>

        <div class="row mt-2">
          Số điện thoại
        </div>
        <div class="row mt-2">
          <input readonly class="form-control" value="<?=  empty($kh['kh_sdt']) ? '(Chưa có số điện thoại)' : $kh['kh_sdt'] ?>"></input>
        </div>

        <div class="row mt-2">
          Địa chỉ
        </div>
        <div class="row mt-2">
          <input readonly class="form-control" value="<?= empty($kh['kh_diachi']) ? '(Chưa có địa chỉ)' : $kh['kh_diachi'] ?>"></input>
        </div>
        <?php endforeach; 
        
        foreach ( $arr_tk as $k ): ?>

          <div class="row mt-3 text-center mb-3">
          <a href="./edit.php?id=<?= $k['tk_id'] ?>">Cập nhật thông tin</a>
          </div>

          <?php endforeach; ?>
      </div>
    </div>

  </div>


  <?php
  include_once __DIR__ . '/../bocucchinh/footer.php';
  include_once __DIR__ . '/../js/js.php';
  ?>

</body>

</html>