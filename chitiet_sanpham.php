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
    include_once __DIR__ . '/css/chitiet_sanpham.php';
    ?>

    <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
    
</head>

<body>

    <?php
    include_once __DIR__ . '/bocucchinh/headder.php';
    ?>
    <?php

    include_once __DIR__ . '/connect/connect.php';

    //Lấy id sản phẩm
    $id = $_GET['id'];


    //Chi tiết sản phẩm khuyến mãi
    $sql = "SELECT sp.*, lsp.lsp_ten, nsx.nsx_ten, km.km_ten, hsp.hsp_url FROM sanpham AS sp 
        JOIN khuyenmai AS km ON sp.km_id = km.km_id
        JOIN loaisanpham AS lsp ON sp.lsp_id = lsp.lsp_id
        JOIN nhasanxuat AS nsx ON sp.nsx_id = nsx.nsx_id
        JOIN hinhsanpham AS hsp ON sp.sp_id = hsp.sp_id WHERE sp.sp_id = $id;
        ;";

    $result = mysqli_query($conn, $sql);

    $arrSPKM = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arrSPKM[] = array(
            "sp_id" => $row["sp_id"],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_motangan' => $row['sp_motangan'],
            'sp_mota_chitiet' => $row['sp_mota_chitiet'],
            'lsp_ten' => $row['lsp_ten'],
            'nsx_ten' => $row['nsx_ten'],
            'km_ten' => $row['km_ten'],
            'hsp_url' => $row['hsp_url'],

        );
    }

    //CHi tiết sản phẩm bình thường
    $sql_sp = "SELECT sp.*, lsp.lsp_ten, nsx.nsx_ten, hsp.hsp_url FROM sanpham AS sp 
    JOIN loaisanpham AS lsp ON sp.lsp_id = lsp.lsp_id
    JOIN nhasanxuat AS nsx ON sp.nsx_id = nsx.nsx_id
    JOIN hinhsanpham AS hsp ON sp.sp_id = hsp.sp_id WHERE sp.sp_id = $id;
    ;";

    $result_SP = mysqli_query($conn, $sql_sp);

    $arrSP = [];
    while ($row = mysqli_fetch_assoc($result_SP)) {
        $arrSP[] = array(
            "sp_id" => $row["sp_id"],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_motangan' => $row['sp_motangan'],
            'sp_mota_chitiet' => $row['sp_mota_chitiet'],
            'lsp_ten' => $row['lsp_ten'],
            'nsx_ten' => $row['nsx_ten'],
            'hsp_url' => $row['hsp_url'],
        );
    }
    ?>

    <main>
        <div class="container">
            <?php if (!empty($arrSPKM)) : ?>
                <?php foreach ($arrSPKM as $row) : ?>
                    <div class="product row">
                        <div class="col">
                            <img class="img-sp" src="\Last_Project\uploads\<?= $row['hsp_url'] ?>" alt="Ảnh sản phẩm">
                        </div>
                        <div class="col">
                            <h1 class="mt-5"><?= $row['sp_ten'] ?></h1>
                            <div class="row row-price">
                                <span class="price col text-danger"><i><?= number_format($row['sp_gia'], 0, '.', ',') ?>&#8363;</i></span>
                                <span class="price col text-muted"> <s><?= empty($row['sp_giacu']) ? 'Chưa cập nhật' : number_format($row['sp_giacu'], 0, '.', ',') . '₫' ?></s></i></span>
                            </div>
                            <div class="row">
                                <span class="col"><b>Loại sản phẩm:</b> <?= $row['lsp_ten'] ?></span>
                                <span class="col"><b>Nhà sản xuất:</b> <?= $row['nsx_ten'] ?></span>
                            </div>
                            <div class="km-col row mt-3">

                                <label for=""> Khuyến mãi <?= $row['km_ten'] ?>
                                    <i class="fa-solid fa-fire"></i></label> </span>
                            </div>
                            <div class="row mt-3">
                                <span class="row mt-3"><b>Mô tả chi tiết:</b></span>
                                <p class="mota_chitiet"><?= $row['sp_mota_chitiet'] ?></p>
                            </div>
                            <div class="row">
                                <form action="giohang.php" method="post">
                                    <button class="col-5 btn btn-warning text-white" type="submit" name="add-cart" id="add-cart">
                                        <i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
                                    <input type="hidden" name="sp_id" value="<?= $row['sp_id'] ?>">
                                    <input name="sp_soluong" class="quantity col-2 ms-3" min="1" value="1" type="number">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else : ?>

                <!-- Sản phẩm bình thường -->
                <?php foreach ($arrSP as $row) : ?>
                    <div class="product row">
                        <div class="col">
                            <img class="img-sp" src="\Last_Project\uploads\<?= $row['hsp_url'] ?>" alt="Ảnh sản phẩm">
                        </div>
                        <div class="col">
                            <h1 class="mt-5"><?= $row['sp_ten'] ?></h1>
                            <div class="row row-price">
                                <span class="price col text-danger"><i><?= number_format($row['sp_gia'], 0, '.', ',') ?>&#8363;</i></span>
                                <span class="price col text-muted"> <s><?= empty($row['sp_giacu']) ? 'Chưa cập nhật' : number_format($row['sp_giacu'], 0, '.', ',') . '₫' ?></s></i></span>
                            </div>
                            <div class="row">
                                <span class="col"><b>Loại sản phẩm:</b> <?= $row['lsp_ten'] ?></span>
                                <span class="col"><b>Nhà sản xuất:</b> <?= $row['nsx_ten'] ?></span>
                            </div>

                            <div class="row mt-3">
                                <span class="col"><b>Mô tả chi tiết:</b></span>
                                <p class="mota_chitiet"><?= $row['sp_mota_chitiet'] ?></p>
                            </div>
                            <div class="row">
                                <button class="col-5 btn btn-warning text-white" type="submit" name="add" id="add"><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button>
                                <!-- <button class="col-5 btn btn-danger text-white" type="submit" name="muangay" id="muangay" ><i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng</button> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </main>


    <?php
    include_once __DIR__ . '/bocucchinh/footer.php';
    include_once __DIR__ . '/js/js.php';
    ?>

</body>

</html>