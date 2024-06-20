<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <?php
    include_once __DIR__ . '/../../css/style.php';
    include_once __DIR__ . '/../style.php'; // css backend
    include_once __DIR__ . '/../../js/js.php';
    ?>
</head>

<body>
    <?php
    include_once __DIR__ . '/../../connect/connect.php';

    $id = $_GET['id'];

    // Lấy dữ liệu cũ
    $sql = "SELECT *
            FROM sanpham AS sp 
            LEFT JOIN khuyenmai AS km ON sp.km_id = km.km_id
            LEFT JOIN loaisanpham AS lsp ON sp.lsp_id = lsp.lsp_id
            LEFT JOIN nhasanxuat AS nsx ON sp.nsx_id = nsx.nsx_id
            WHERE sp_id = '$id';";
    $data = mysqli_query($conn, $sql);

    $arrSP = [];

    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrSP[] = array(
            'sp_id' => $row['sp_id'],
            'sp_ten' => $row['sp_ten'],
            'sp_soluong' => $row['sp_soluong'],
            'sp_motangan' => $row['sp_motangan'],
            'sp_mota_chitiet' => $row['sp_mota_chitiet'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_ngaynhaphang' => $row['sp_ngaynhaphang'],
            'sp_ngaycapnhat' => $row['sp_ngaycapnhat'],
            'lsp_id' => $row['lsp_id'],
            'lsp_ten' => $row['lsp_ten'],
            'lsp_mota' => $row['lsp_mota'],
            'nsx_id' => $row['nsx_id'],
            'nsx_ten' => $row['nsx_ten'],
            'nsx_mota' => $row['nsx_mota'],
            'km_id' => $row['km_id'],
            'km_ten' => $row['km_ten'],
            'km_mota' => $row['km_mota'],
        );
    }

    // Lấy dữ liệu loại sản phẩm
    $sql_lsp = "SELECT lsp_id, lsp_ten FROM loaisanpham";
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

    // Lấy dữ liệu khuyến mãi
    $sql_km = "SELECT km_id, km_ten FROM khuyenmai";
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
        <form class="container mt-5 bg-light p-5 rounded border" action="" method="post" id="themmoi" name="themmoi">
            <h3>Sửa sản phẩm</h3>
            <?php foreach ($arrSP as $sp): ?>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sp_ten" class="form-label">Tên sản phẩm (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                            <input type="text" class="form-control" id="sp_ten" value="<?= $sp['sp_ten'] ?>" name="sp_ten">
                        </div>
                        <div class="mb-3">
                            <label for="sp_gia" class="form-label">Giá (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                            <input type="number" class="form-control" value="<?= $sp['sp_gia'] ?>" id="sp_gia"
                                name="sp_gia">
                        </div>
                        <div class="mb-3">
                            <label for="lsp_id" class="form-label">Loại sản phẩm (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                            <select class="form-select" id="lsp_id" name="lsp_id">
                                <option value="<?= $sp['lsp_id'] ?>" selected>
                                    <?= $sp['lsp_ten'] ?>
                                </option>
                                <?php foreach ($arrLSP as $lsp): ?>
                                    <?php if ($lsp['lsp_id'] != $sp['lsp_id']): ?>
                                        <option value="<?= $lsp['lsp_id'] ?>">
                                            <?= $lsp['lsp_ten'] ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sp_soluong" class="form-label">Số lượng (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                            <input type="number" class="form-control" id="sp_soluong" value="<?= $sp['sp_soluong'] ?>"
                                name="sp_soluong" min="1">
                        </div>
                        <div class="mb-3">
                            <label for="sp_giacu" class="form-label">Giá cũ</label>
                            <input placeholder="Nhập giá cũ..." type="number" min="0" class="form-control" id="sp_giacu" value="<?= $sp['sp_giacu'] ?>"
                                name="sp_giacu">
                        </div>
                        <div class="mb-3">
                            <label for="nsx_id" class="form-label">Nhà sản xuất (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                            <select class="form-select" id="nsx_id" name="nsx_id">
                                <option value="<?= $sp['nsx_id'] ?>" selected>
                                    <?= $sp['nsx_ten'] ?>
                                </option>
                                <?php foreach ($arrNSX as $nsx): ?>
                                    <?php if ($nsx['nsx_id'] != $sp['nsx_id']): ?>
                                        <option value="<?= $nsx['nsx_id'] ?>">
                                            <?= $nsx['nsx_ten'] ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="sp_ngaynhaphang" class="form-label">Ngày nhập hàng (<i
                                class="fa-solid fa-star-of-life fa-xs"></i>)</label>
                        <input type="date" class="form-control" id="sp_ngaynhaphang" value="<?= $sp['sp_ngaynhaphang'] ?>"
                            name="sp_ngaynhaphang">
                    </div>
                    <div class="col-6">
                        <label for="km_id" class="form-label">Loại khuyến mãi (nếu có) </label>
                        <select class="form-select" id="km_id" name="km_id">
                            <option value="" <?= empty($sp['km_id']) ? 'selected' : '' ?>>Không có khuyến mãi</option>
                            <?php foreach ($arrkm as $km): ?>
                                <option value="<?= $km['km_id'] ?>" <?= $km['km_id'] == $sp['km_id'] ? 'selected' : '' ?>>
                                    <?= $km['km_ten'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label for="sp_motangan" class="form-label">Mô tả ngắn</label>
                    <textarea placeholder="Nhập mô tả ngắn..." cols="100" rows="2" class="form-control" id="sp_motangan"
                        name="sp_motangan"><?= $sp['sp_motangan'] ?></textarea>
                </div>
                <div class="mt-3">
                    <label for="sp_mota_chitiet" class="form-label">Mô tả chi tiết</label>
                    <textarea placeholder="Nhập mô tả chi tiết..." cols="100" rows="10" class="form-control" id="sp_mota_chitiet"
                        name="sp_mota_chitiet"><?= $sp['sp_mota_chitiet'] ?></textarea>
                </div>
            <?php endforeach; ?>
            <div class="">
                <button type="submit" class="btn btn-primary mt-3 me-2" name="save" id="save">Lưu</button>
                <button type="submit" class="btn btn-danger mt-3" name="exit">Huỷ</button>
            </div>
        </form>

        <?php
        if (isset($_POST['save'])) {
            include_once __DIR__ . '/../../connect/connect.php';
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $sp_ten = $_POST['sp_ten'];
            $sp_soluong = $_POST['sp_soluong'];
            $sp_gia = $_POST['sp_gia'];
            $sp_giacu = empty($_POST['sp_giacu']) ? 'NULL' : $_POST['sp_giacu'];
            $sp_motangan = empty($_POST['sp_motangan']) ? '' : $_POST['sp_motangan'];
            $sp_mota_chitiet = empty($_POST['sp_mota_chitiet']) ? '' : $_POST['sp_mota_chitiet'];
            $sp_ngaynhaphang = $_POST['sp_ngaynhaphang'];
            $sp_ngaycapnhat = date('Y-m-d H:i:s');
            $lsp_id = $_POST['lsp_id'];
            $nsx_id = $_POST['nsx_id'];
            $km_id = empty($_POST['km_id']) ? 'NULL' : $_POST['km_id'];

            $sql_edit = "UPDATE sanpham SET sp_ten = '$sp_ten', sp_soluong = $sp_soluong, sp_gia = $sp_gia, sp_giacu = $sp_giacu, sp_motangan = '$sp_motangan', sp_mota_chitiet = '$sp_mota_chitiet', lsp_id = $lsp_id, nsx_id = $nsx_id, sp_ngaynhaphang = '$sp_ngaynhaphang', sp_ngaycapnhat = '$sp_ngaycapnhat', km_id = $km_id WHERE sp_id = $id;";
            mysqli_query($conn, $sql_edit);
            echo '<script>location.href = "./../popup.php?name=sanpham";</script>';
        }

        if (isset($_POST['exit'])) {
            echo '<script>location.href = "index.php";</script>';
        }
        ?>
    </main>
    <?php
  include_once __DIR__ . '/../js/js.php';
  include_once __DIR__ . '/../../js/js.php';
  ?>
</body>

</html>
