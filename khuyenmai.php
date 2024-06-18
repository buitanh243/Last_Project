<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Computer - Giới thiệu</title>

    <!-- Include CSS files -->
    <?php
    include_once __DIR__ . '/css/style.php';
    include_once __DIR__ . '/css/gioithieu.php';
    ?>

    <!-- Favicon -->
    <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
    <style>
        .km-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .km-item {
            background: linear-gradient(90deg, #4e54c8, #8f94fb);
            color: #fff;
            font-size: 22px;
            text-align: center;
            padding: 15px;
            border-radius: 10px;
            margin: 10px;
            width: 48%;
            font-weight: 600;
            box-sizing: border-box;
        }

        .km-item:hover {
            transform: scale(1.1);
            cursor: pointer;
        }

        .km-label {
            display: flex;
            justify-content: space-between;
        }

        .km-label .col-4 {
            flex: 1;
            text-align: center;
        }

    </style>
</head>

<body>
    <?php
    include_once __DIR__ . '/connect/connect.php';

    $sql = "SELECT * FROM khuyenmai;";

    $result = mysqli_query($conn, $sql);
    $arrKM = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arrKM[] = array(
            "km_id" => $row["km_id"],
            "km_mota"=> $row["km_mota"],
            "km_ten" => $row["km_ten"],
            "km_sta" => $row["km_sta"],
            "km_end" => $row["km_end"],
        );
    }
    ?>
    <?php include_once __DIR__ . '/bocucchinh/headder.php'; ?>

    <div class="container">
        <div class="head text-danger text-center">
            <h1 class="">Khuyến mãi HOT <i class="fa-solid fa-fire"></i></h1>
        </div>
        <div class="km-container mt-5">
            <?php foreach ($arrKM as $row) : ?>
                <div class="km-item">
                    <label for="">Ưu đãi: <?= $row['km_ten'] ?></label>
                    <div class="km-label mt-2">
                        <label class="col-4" for="">Từ ngày: <?= date('d/m/Y', strtotime($row['km_sta'])) ?></label>
                        <label class="col-4" for="">Đến hết ngày: <?= date('d/m/Y', strtotime($row['km_end'])) ?></label>
                    </div>
                    <div class="text-dark" ><i><?= $row['km_mota']?></i></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include_once __DIR__ . '/bocucchinh/footer.php'; ?>
    <?php include_once __DIR__ . '/js/js.php'; ?>
</body>

</html>
