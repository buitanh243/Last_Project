<?php session_start();
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
    echo '<script>
          location.href="./../../Xuly/popup-login.php?name=Error";
        </script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hình sản phẩm</title>
    <?php
    include_once __DIR__ . '/../../css/style.php';
    include_once __DIR__ . '/../style.php'; //css backend
    ?>
    <link rel="icon" href="./../../Pic/favicon.ico" type="image/x-icon">
    <style>
        .img-product {
            width: 220px;
        }
    </style>
</head>

<body>

    <?php
    include_once __DIR__ . '/../../connect/connect.php';

    $sql = "SELECT hsp.*, sp.sp_ten,sp.sp_gia FROM hinhsanpham AS hsp
  JOIN sanpham AS sp ON hsp.sp_id = sp.sp_id;
  ";

    $data = mysqli_query($conn, $sql);

    $arrHSP = [];

    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrHSP[] = array(
            'hsp_id' => $row['hsp_id'],
            'hsp_url' => $row['hsp_url'],
            'sp_id' => $row['sp_id'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
        );
    }

    ?>
    <main>
        <?php include_once __DIR__ . '/../bocuc/header.php'; ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-3">
                    <?php include_once __DIR__ . '/../bocuc/sidebar.php'; ?>
                </div>
                <div class="col-9">
                    <div class="col-4  p-2 mt-2 ">
                        <a href="./add.php" class="btn btn-info text-white"><i class="fa-solid fa-plus"></i> Thêm hình sản</a>
                    </div>
                    <div class="col-3  p-2">

                        <div class="tab">
                            <?php foreach ($arrHSP as $index => $hsp) : ?>
                                <button class="tablinks" onclick="openCity(event, 'Product<?= $index ?>')"><?= $index + 1 ?></button>
                            <?php endforeach; ?>
                        </div>
                        <div class="row">
                            <label class="col-3 border rounded bg-secondary bg-gradient text-white text-center" for="">Tên sản phẩm </label>
                            <label class="col-3 border rounded bg-secondary bg-gradient text-white text-center" for="">Giá </label>
                            <label class="col-3 border rounded bg-secondary bg-gradient text-white text-center" for="">Hình sản phẩm </label>
                        </div>
                        <?php foreach ($arrHSP as $index => $hsp) : ?>
                            <div id="Product<?= $index ?>" class="tabcontent">
                                <div class="product-details mb-5 bg-light p-3 rounded border">
                                    <div class="row mt-3 ">
                                        <div class="col-3 bg-light p-1 pt-5 text-center"><b><?= $hsp['sp_ten'] ?></b></div>
                                        <div class="col-3 bg-light p-1 pe-3 pt-5 text-center">
                                            <i><?= number_format($hsp['sp_gia'], 0, '.', ',')  ?>&#8363;</i>
                                        </div>
                                        <div class="col-3 bg-light p-1 "><img class="img-product" src=".\..\..\uploads\<?= $hsp['hsp_url'] ?>" alt=""></div>
                                        <div class="col-2">
                                            <a href="./edit.php?id=<?= $hsp['hsp_id'] ?>" class="btn btn-warning btn-sm mt-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm mt-1 btn-delete" data-id="<?= $hsp['hsp_id'] ?>"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    </main>

    <?php
    include_once __DIR__ . '/../js/js.php';
    include_once __DIR__ . '/../../js/js.php';
    ?>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>

</html>