<?php
session_start();
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
    <title>Sản phẩm</title>
    <?php
    include_once __DIR__ . '/../../css/style.php';
    include_once __DIR__ . '/../style.php'; //css backend
    ?>
    <link rel="icon" href="./../../Pic/favicon.ico" type="image/x-icon">
    <style>
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            border-radius: 5px;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        .tab button:hover {
            background-color: #ddd;
        }

        .tab button.active {
            background-color: #ccc;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>

<body>

    <?php
    include_once __DIR__ . '/../../connect/connect.php';

    $sql = "SELECT sp_ten, sp_soluong, sp_gia, sp_giacu, sp_motangan, sp_mota_chitiet, lsp_ten, sp_id, nsx_ten, sp_ngaynhaphang, sp_ngaycapnhat, km_ten, km_mota, km_end, km_sta
            FROM sanpham AS sp 
            JOIN loaisanpham lsp ON sp.lsp_id = lsp.lsp_id
            JOIN nhasanxuat nsx ON sp.nsx_id = nsx.nsx_id
            LEFT JOIN khuyenmai km ON sp.km_id = km.km_id;";
    
    $data = mysqli_query($conn, $sql);

    $arrSP = [];

    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrSP[] = array(
            'sp_id' => $row['sp_id'],
            'sp_ten' => $row['sp_ten'],
            'sp_soluong' => $row['sp_soluong'],
            'sp_motangan' => $row['sp_motangan'],
            'sp_ngaynhaphang' => $row['sp_ngaynhaphang'],
            'sp_ngaycapnhat' => $row['sp_ngaycapnhat'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_mota_chitiet' => $row['sp_mota_chitiet'],
            'lsp_ten' => $row['lsp_ten'],
            'nsx_ten' => $row['nsx_ten'],
            'km_ten' => $row['km_ten'],
            'km_mota' => $row['km_mota'],
            'km_sta' => $row['km_sta'],
            'km_end' => $row['km_end'],
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
                    <div class="row mb-3">
                        <div class="col-4">
                            <a href="./add.php" class="btn btn-info text-white"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
                        </div>
                    </div>

                    <div class="tab">
                        <?php foreach ($arrSP as $index => $sp) : ?>
                            <button class="tablinks" onclick="openCity(event, 'Product<?= $index ?>')"><?=$index+1?></button>
                        <?php endforeach; ?>
                    </div>

                    <?php foreach ($arrSP as $index => $sp) : ?>
                        <div id="Product<?= $index ?>" class="tabcontent">
                            <div class="product-details mb-5 bg-light p-3 rounded border">
                                <div class="row">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Tên sản phẩm:</div>
                                    <div class="col-3"><b><?= $sp['sp_ten'] ?></b></div>
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Số lượng:</div>
                                    <div class="col-3"><?= number_format($sp['sp_soluong'], 0, '.', ',') ?></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Giá bán:</div>
                                    <div class="col-3"><?= number_format($sp['sp_gia'], 0, '.', ',') ?>&#8363;</div>
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Giá cũ:</div>
                                    <div class="col-3"><?= empty($sp['sp_giacu']) ? '(Rỗng)' : number_format($sp['sp_giacu'], 0, '.', ',') . '&#8363;' ?></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Loại sản phẩm:</div>
                                    <div class="col-3"><?= $sp['lsp_ten'] ?></div>
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Nhà sản xuất:</div>
                                    <div class="col-3"><?= $sp['nsx_ten'] ?></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Ngày nhập hàng:</div>
                                    <div class="col-3"><?= date('d/m/Y', strtotime($sp['sp_ngaynhaphang'])) ?></div>
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Ngày cập nhật:</div>
                                    <div class="col-3"><?= empty($sp['sp_ngaycapnhat']) ? '(Rỗng)' : date('d/m/Y H:i:s', strtotime($sp['sp_ngaycapnhat'])) ?></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Khuyến mãi:</div>
                                    <div class="col-9"><?= empty($sp['km_ten']) ? '(Rỗng)' : $sp['km_ten'] ?></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center mb-2">Mô tả khuyến mãi:</div>
                                    <div class="col-9">
                                        <textarea readonly class="form-control"><?= empty($sp['km_mota']) ? '(Rỗng)' : $sp['km_mota'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Từ ngày:</div>
                                    <div class="col-3"><?= empty($sp['km_sta']) ? '(Rỗng)' : date('d/m/Y', strtotime($sp['km_sta'])) ?></div>
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center">Đến ngày:</div>
                                    <div class="col-3"><?= empty($sp['km_end']) ? '(Rỗng)' : date('d/m/Y', strtotime($sp['km_end'])) ?></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center mb-2">Mô tả ngắn:</div>
                                    <div class="col-9">
                                        <textarea readonly class="form-control"><?= empty($sp['sp_motangan']) ? '(Không có mô tả ngắn)' : $sp['sp_motangan'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3 border bg-secondary bg-gradient text-white rounded text-center mb-2">Mô tả chi tiết:</div>
                                    <div class="col-9">
                                        <textarea readonly class="form-control" rows="5"><?= empty($sp['sp_mota_chitiet']) ? '(Không có mô tả chi tiết)' : $sp['sp_mota_chitiet'] ?></textarea>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <a href="./edit.php?id=<?= $sp['sp_id'] ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm ml-2 btn-delete" data-id="<?= $sp['sp_id'] ?>"><i class="fa-solid fa-trash"></i></a>
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
