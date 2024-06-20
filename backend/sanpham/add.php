<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <?php
    include_once __DIR__ . '/../../css/style.php';
    include_once __DIR__ . '/../style.php'; //css backend
    ?>
    <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include_once __DIR__ . '/../../connect/connect.php';

    $sql_lsp = "SELECT lsp_id , lsp_ten FROM loaisanpham";

    $data_lsp = mysqli_query($conn, $sql_lsp);
    $arrLSP = [];
    while ($row_lsp = mysqli_fetch_array($data_lsp, MYSQLI_ASSOC)) {
        $arrLSP[] = array(
            'lsp_id' => $row_lsp['lsp_id'],
            'lsp_ten' => $row_lsp['lsp_ten'],
        );
    }

    // Lấy dữ liệu nhà sản xuất
    $sql_nsx = "SELECT nsx_id, nsx_ten FROM nhasanxuat";

    $data_nsx = mysqli_query($conn, $sql_nsx);
    $arrNSX = [];
    while ($row_nsx = mysqli_fetch_array($data_nsx, MYSQLI_ASSOC)) {
        $arrNSX[] = array(
            'nsx_id' => $row_nsx['nsx_id'],
            'nsx_ten' => $row_nsx['nsx_ten']
        );
    }

    // Lấy dữ liệu KHUYẾN MÃI
    $sql_km = "SELECT * FROM khuyenmai";

    $data_km = mysqli_query($conn, $sql_km);
    $arrkm = [];
    while ($row_km = mysqli_fetch_array($data_km, MYSQLI_ASSOC)) {
        $arrkm[] = array(
            'km_id' => $row_km['km_id'],
            'km_ten' => $row_km['km_ten']
        );
    }
    ?>

    <main>

        <form class="container mt-5 bg-light p-5 rounded border" id="themmoi" action="" method="post" name="themmoi">
            <h3>Thêm sản phẩm</h3>
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sp_ten" class="form-label">Tên sản phẩm (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                        <input placeholder="Nhập tên sản phẩm..." type="text" class="form-control" id="sp_ten"
                            name="sp_ten">
                    </div>
                    <div class="mb-3">
                        <label for="nsx_id" class="form-label">Nhà sản xuất (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                        <select class="form-select" id="nsx_id" name="nsx_id">
                            <?php foreach ($arrNSX as $nsx): ?>
                                <option value="<?= $nsx['nsx_id'] ?>">
                                    <?= $nsx['nsx_ten'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="sp_gia" class="form-label">Giá (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                        <input placeholder="Nhập giá bán..." type="number" class="form-control" id="sp_gia"
                            name="sp_gia">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sp_soluong" class="form-label">Số lượng (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                        <input placeholder="Nhập số lượng..." type="number" class="form-control" id="sp_soluong"
                            name="sp_soluong" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="lsp_id" class="form-label">Loại sản phẩm (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                        <select class="form-select" id="lsp_id" name="lsp_id">
                            <?php foreach ($arrLSP as $lsp): ?>
                                <option value="<?= $lsp['lsp_id'] ?>">
                                    <?= $lsp['lsp_ten'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sp_giacu" class="form-label">Giá cũ</label>
                        <input placeholder="Nhập giá cũ..." type="number" class="form-control" id="sp_giacu"
                            name="sp_giacu">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="sp_ngaynhaphang" class="form-label">Ngày nhập hàng (<i
                            class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                    <input type="date" class="form-control" id="sp_ngaynhaphang" name="sp_ngaynhaphang">
                </div>
                <div class="col-6">
                    <label for="km_id" class="form-label">Loại khuyến mãi (nếu có) </label>
                    <select class="form-select" id="km_id" name="km_id">
                        <option value="">Không có khuyến mãi</option>

                        <?php foreach ($arrkm as $km): ?>
                            <option value="<?= $km['km_id'] ?>">
                                <?= $km['km_ten'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <label for="sp_motangan" class="form-label">Mô tả ngắn</label>
                <textarea placeholder="Nhập mô tả ngắn..." cols="100" rows="2" class="form-control" id="sp_motangan"
                    name="sp_motangan"></textarea>

            </div>
            <div class="mt-3">
                <label for="sp_motangan" class="form-label">Mô tả chi tiết</label>
                <textarea placeholder="Nhập mô tả chi tiết..." cols="100" rows="10" class="form-control"
                    id="sp_mota_chitiet" name="sp_mota_chitiet"></textarea>

            </div>

            </div>

            <!-- nut luu va xoa -->
            <div class="">
                <button type="submit" class="btn btn-primary mt-3 me-2 btn-save" name="save" id="save">Lưu</button>
                <button type="submit" class="btn btn-danger mt-3" name="exit">Huỷ</button>
            </div>
            <div class="row">

        </form>
    </main>

    <?php

    if (isset($_POST['save'])) {
        include_once __DIR__ . '/../../connect/connect.php';

        $sp_ten = $_POST['sp_ten'];
        $sp_soluong = $_POST['sp_soluong'];
        $sp_gia = $_POST['sp_gia'];
        $sp_giacu = empty($_POST['sp_giacu']) ? 'NULL' : $_POST['sp_giacu'];
        $sp_motangan = empty($_POST['sp_motangan']) ? '' : $_POST['sp_motangan'];
        $sp_mota_chitiet = empty($_POST['sp_mota_chitiet']) ? '' : $_POST['sp_mota_chitiet'];
        $sp_ngaynhaphang = $_POST['sp_ngaynhaphang'];

        $lsp_id = $_POST['lsp_id'];
        $nsx_id = $_POST['nsx_id'];
        $km_id = empty($_POST['km_id']) ? 'NULL' : $_POST['km_id'];


        $sql = "INSERT INTO sanpham (sp_ten, sp_soluong, sp_gia, sp_giacu, sp_ngaynhaphang, sp_motangan, sp_mota_chitiet, lsp_id, nsx_id, km_id) 
         VALUES ('$sp_ten', $sp_soluong, $sp_gia, $sp_giacu, '$sp_ngaynhaphang', '$sp_motangan', '$sp_mota_chitiet', $lsp_id, $nsx_id, $km_id);";
        mysqli_query($conn, $sql);
        echo '<script>location.href = "./../popup.php?name=sanpham";</script>';
       
    }
    if (isset($_POST['exit'])) {
        echo '<script>location.href = "index.php";</script>';
    }
    ?>
    <?php
    include_once __DIR__ . '/../js/js.php';
    include_once __DIR__ . '/../../js/js.php';
    ?>
</body>

</html>