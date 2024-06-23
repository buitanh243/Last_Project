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
    while ($row = mysqli_fetch_array($result)) {
        $arr_tk[] = array(
            "tk_id" => $row["tk_id"],
            "email" => $row["email"],
        );
    }

    $sql = "SELECT kh.kh_ten, kh.kh_sdt, kh.kh_diachi
    FROM khachhang AS kh
    LEFT JOIN taikhoan AS tk ON kh.tk_id = tk.tk_id
    WHERE tk.username = '$username'; ";
    $result = mysqli_query($conn, $sql);

    $arr_KH = [];
    while ($row = mysqli_fetch_array($result)) {
        $arr_KH[] = array(
            'kh_ten' => $row['kh_ten'],
            'kh_sdt' => $row['kh_sdt'],
            'kh_diachi' => $row['kh_diachi'],
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

                <form method="post" name="edit" action="">
                    <div class="row">
                        Tên đăng nhập
                    </div>
                    <div class="row mt-2">
                        <input readonly class="form-control" value="<?= $_SESSION['username'] ?>"></input>
                    </div>
                    <?php foreach ($arr_tk as $tk) : ?>

                        <div class="row mt-2">
                            Email
                        </div>
                        <div class="row mt-2">
                            <input class="form-control" value="<?= $tk['email'] ?>" name="email"></input>
                        </div>
                    <?php endforeach; ?>

                    <?php foreach ($arr_KH as $kh) : ?>

                        <div class="row mt-2">
                            Tên khách hàng
                        </div>
                        <div class="row mt-2">
                            <input class="form-control" value="<?= $kh['kh_ten'] ?>" placeholder="Nhập họ tên..." name="kh_ten"></input>
                        </div>

                        <div class="row mt-2">
                            Số điện thoại
                        </div>
                        <div class="row mt-2">
                            <input class="form-control" placeholder="Nhập số điện thoại..." value="<?= $kh['kh_sdt'] ?>" name="kh_sdt"></input>
                        </div>

                        <div class="row mt-2">
                            Địa chỉ
                        </div>
                        <div class="row mt-2">
                            <input class="form-control" value="<?= $kh['kh_diachi'] ?>" name="kh_diachi" placeholder="Nhập email..."></input>
                        </div>
                    <?php endforeach; ?>
                    <div class="row mb-3">
                        <div class="col-1"> <button type="submit" class="btn btn-primary mt-3 me-2" name="save" id="save">Lưu</button>
                        </div>
                        <div class="ms-2 col-1"> <button type="submit" class="btn btn-danger mt-3" name="exit">Huỷ</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <?php
    if (isset($_POST['save'])) {
        include_once __DIR__ . '/../connect/connect.php';

        $id = $_GET['id'];
        $email = $_POST['email'];
        $kh_ten = empty($_POST['kh_ten']) ? 'NULL' : "'" . mysqli_real_escape_string($conn, $_POST['kh_ten']) . "'";
        $kh_sdt = empty($_POST['kh_sdt']) ? 'NULL' : "'" . mysqli_real_escape_string($conn, $_POST['kh_sdt']) . "'";
        $kh_diachi = empty($_POST['kh_diachi']) ? 'NULL' : "'" . mysqli_real_escape_string($conn, $_POST['kh_diachi']) . "'";

        $sql = "SELECT tk_id FROM khachhang WHERE tk_id = $id";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 0) {
            $sql_edit = "INSERT INTO khachhang (kh_ten, kh_sdt, kh_diachi, tk_id) VALUES ($kh_ten, $kh_sdt, $kh_diachi, $id)";
            if (!mysqli_query($conn, $sql_edit)) {
                die('Error: ' . mysqli_error($conn));
            }
            $sql = "UPDATE taikhoan SET email = '$email' WHERE username = '$username'";
            if (!mysqli_query($conn, $sql)) {
                die('Error: ' . mysqli_error($conn));
            }
        } else {
            $sql_edit = "UPDATE khachhang SET kh_ten = $kh_ten, kh_sdt = $kh_sdt, kh_diachi = $kh_diachi WHERE tk_id = $id";
            if (!mysqli_query($conn, $sql_edit)) {
                die('Error: ' . mysqli_error($conn));
            }
            $sql = "UPDATE taikhoan SET email = '$email' WHERE username = '$username'";
            if (!mysqli_query($conn, $sql)) {
                die('Error: ' . mysqli_error($conn));
            }
        }
        echo '<script>location.href = "./../Xuly/popup-login.php?name=user";</script>';
    }

    if (isset($_POST['exit'])) {
        echo '<script>location.href = "user.php";</script>';
    }
    ?>


</body>

</html>