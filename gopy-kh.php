<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Computer - Góp ý khách hàng</title>
    <?php include_once __DIR__ . '/css/style.php'; ?>
    <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
    <style>
        .col {
            width: 600px;
            box-shadow: 7px 10px 97px 4px #937b7b;
            padding: 30px;
            border-radius: 20px;
        }

        .btn-warning {
            width: 40px;
        }
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/bocucchinh/headder.php'; ?>

    <?php
    include_once __DIR__ . '/connect/connect.php';

    $username = empty($_SESSION['username']) ? '' : $_SESSION['username'];

    $sql = "SELECT kh.kh_ten, kh.kh_id FROM khachhang AS kh
            JOIN taikhoan AS tk ON kh.tk_id = tk.tk_id 
            WHERE tk.username='$username'";

    $result = mysqli_query($conn, $sql);

    $arr_KH = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr_KH[] = array(
            "kh_ten" => $row["kh_ten"],
            "kh_id" => $row["kh_id"],
        );
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="text-center">Góp ý khách hàng</h3>
                <form action="" method="post">
                    <?php if (!empty($arr_KH)) {
                        foreach ($arr_KH as $kh) : ?>
                            <div class="row mb-3">
                                <label for="">Tên khách hàng:</label>
                                <div class="row mt-3">
                                    <label class="col-2"><b><?= $kh['kh_ten'] ?></b></label>
                                    <a href="./user/user.php" class="col-1 btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                </div>
                            </div>
                        <?php endforeach;
                    } else { ?>

                        <div class="row mb-3">
                            <label for="">Tên khách hàng:</label>
                            <div class="row mt-3">
                                <input type="text" name="ten_kh" class="form-control ms-3" placeholder="Nhập tên của bạn...">
                            </div>
                        </div>
                    <?php }
                    ?>

                    <div class="mb-3">
                        <label for="gopy_noidung" class="form-label">Nội dung góp ý:</label>
                        <textarea class="form-control" id="gopy_noidung" name="gopy_noidung" rows="5" placeholder="Nhập nội dung góp ý..."></textarea>
                    </div>
                    <button type="submit" class=" btn btn-primary" name="submit" id="submit">Gửi</button>
                </form>

                <?php
                include_once __DIR__ . '/connect/connect.php';

                if (isset($_POST['submit'])) {
                    $ten_kh = empty($_POST['ten_kh']) ? 'Ẩn danh' : htmlentities($_POST['ten_kh']);
                    $gopy_noidung = htmlentities($_POST['gopy_noidung']);
                    $kh_id = empty($_POST['kh_id']) ? 'NULL' : $_POST['kh_id'];

                    if (!isset($_SESSION['tk_id'])) {
                        $stmt_detail = $conn->prepare("INSERT INTO khachhang (kh_ten) VALUES (?)");
                        $stmt_detail->bind_param("s", $ten_kh);
                        $stmt_detail->execute() or die(mysqli_error($conn));
                        $kh_id_new = $stmt_detail->insert_id;

                        $sql_insert = "INSERT INTO gopy (gopy_noidung, kh_id) VALUES ('$gopy_noidung', $kh_id_new);";
                        $result_insert = mysqli_query($conn, $sql_insert);
                    } else {
                        $sql_insert = "INSERT INTO gopy (gopy_noidung, kh_id) VALUES ('$gopy_noidung', $kh_id);";
                        $result_insert = mysqli_query($conn, $sql_insert);
                    }

                    if ($result_insert) {
                        echo '<div class="alert alert-success mt-3" role="alert">Gửi góp ý thành công!</div>';
                    } else {
                        echo '<div class="alert alert-danger mt-3" role="alert">Có lỗi xảy ra, vui lòng thử lại sau.</div>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . '/bocucchinh/footer.php'; ?>
    <?php include_once __DIR__ . '/js/js.php'; ?>
</body>

</html>