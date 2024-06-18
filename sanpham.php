<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Computer - Trang chủ</title>

    <?php
    include_once __DIR__ . '/css/style.php';
    include_once __DIR__ . '/css/sanpham.php';
    ?>

    <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
</head>

<body>

    <?php
    include_once __DIR__ . '/bocucchinh/headder.php';
    ?>
    <?php

    include_once __DIR__ . '/connect/connect.php';

    $sql = "SELECT * FROM sanpham AS sp 
  JOIN hinhsanpham AS hsp ON sp.sp_id = hsp.sp_id
 ;";

    $result = mysqli_query($conn, $sql);

    $arrSPKM = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arrHSP[] = array(
            "sp_id" => $row["sp_id"],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_motangan' => $row['sp_motangan'],
            'hsp_url' => $row['hsp_url'],

        );
    }

    $sql_sp = "SELECT hsp_url,sp_id FROM hinhsanpham
   ;";

    $result_SP = mysqli_query($conn, $sql_sp);

    $arrSP = [];
    while ($row = mysqli_fetch_assoc($result_SP)) {
        $arrSP[] = array(
            "sp_id" => $row["sp_id"],
            'hsp_url' => $row['hsp_url'],
        );
    }
    ?>
    <main>

        <div class="container justify-content-center">
            <h4>Bán chạy</h4>
            <div class="row mt-3">
                <?php
                $count = 0; // Biến đếm số lượng sản phẩm trên mỗi dòng
                foreach ($arrHSP as $row) :
                    if ($count % 5 == 0 && $count != 0) : // Kiểm tra nếu đã đủ 5 sản phẩm
                        echo '</div><div class="row mt-3">'; // Kết thúc dòng hiện tại và bắt đầu dòng mới
                    endif;
                    $count++;
                ?>
                    <div class="col col-card">
                        <div class="card">
                            <img class="card-img-top" src="\Last_Project\uploads\<?= $row['hsp_url'] ?>" alt="Product Image">
                            <div class="card-body">
                                <h6 class="card-title text-uppercase text-center"><b><?= $row['sp_ten'] ?></b></h6>
                                <div class="price bg-light border mb-3">
                                    <span class="text-danger"><b>Giá: <br><?= number_format($row['sp_gia'], 0, '.', ',') ?>&#8363;</b></span>
                                    <span class="text-muted"><i>Giá cũ: <br><s><?= empty($row['sp_giacu']) ? 'Rỗng' : number_format($row['sp_giacu'], 0, '.', ',') . '₫' ?></s></i></span>
                                </div>
                                <b class="card-text text-secondary">Mô tả: </b><label><?= $row['sp_motangan'] ?></label>
                                <p class="text-center mt-2"><a href="chitet_sanpham.php?id=<?= $row['sp_id'] ?>">Xem chi tiết</a></p>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
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