<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xuất hoá đơn</title>
    <?php
    include_once __DIR__ . '/../../css/style.php';
    include_once __DIR__ . '/../style.php'; //css backend
    ?>
    <link rel="icon" href=".\..\..\Pic\favicon.ico" type="image/x-icon">
    <style>
        @page {
            size: A5
        }

        .container {
            width: 800px;
            height: 1000px;
        }


        .sheet {
            height: 100%;
            position: relative;
        }

        .text-sm {
            font-size: 13px;
        }

        .table-chuan {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 12px;
            text-align: center;
        }

        .table-chuan th,
        .table-chuan td {
            border: 1px solid black;
        }

        .footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
        }
    </style>

</head>

<body>
    <?php
    include_once __DIR__ . '/../../connect/connect.php';

    $id = $_GET['id'];

    //Lấy dữ liệu thông tin khách hàng đã đặt hàng và tổng thành tiền
    $sql_ttdh = "SELECT  ddh.dh_id, ddh.dh_ngaylap, ddh.dh_ngaygiao, ddh.dh_noigiao, ddh.dh_trangthai, ddh.dh_trangthai_donhang,
    kh.kh_ten, kh.kh_sdt, 
    httt.httt_ten, 
    SUM(sp_dh_soluong * sp_dh_dongia) AS tongthanhtien
        FROM dondathang ddh 
        JOIN khachhang kh ON ddh.kh_id = kh.kh_id
        JOIN hinhthucthanhtoan httt ON ddh.httt_id = httt.httt_id
        JOIN sanpham_dondathang spddh ON ddh.dh_id = spddh.dh_id
        GROUP BY ddh.dh_id, ddh.dh_ngaylap, ddh.dh_ngaygiao, ddh.dh_noigiao, ddh.dh_trangthai, 
            kh.kh_ten, kh.kh_sdt, httt.httt_ten
            HAVING ddh.dh_id = $id;
        ";


    $data = mysqli_query($conn, $sql_ttdh);

    $arrDDH = [];

    while ($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $arrDDH[] = array(
            "dh_id" => $row["dh_id"],
            "dh_ngaylap" => $row["dh_ngaylap"],
            "dh_ngaygiao" => $row["dh_ngaygiao"],
            "dh_noigiao" => $row["dh_noigiao"],
            "dh_trangthai" => $row["dh_trangthai"],
            "dh_trangthai_donhang" => $row["dh_trangthai_donhang"],
            "kh_ten" => $row["kh_ten"],
            "kh_sdt" => $row["kh_sdt"],
            "httt_ten" => $row["httt_ten"],
            "tongthanhtien" => $row["tongthanhtien"],
        );
    }

    // lấy dữ liệu đơn hàng và thành tiền
    $sql = "SELECT 
        spddh.dh_id,
        sp.sp_ten,
        lsp.lsp_ten,
        nsx_ten,
        spddh.sp_dh_soluong, spddh.sp_dh_dongia,
        (spddh.sp_dh_soluong * spddh.sp_dh_dongia) AS thanhtien
    FROM 
        sanpham_dondathang spddh
    JOIN 
        sanpham sp ON spddh.sp_id = sp.sp_id
    JOIN 
        loaisanpham lsp ON sp.lsp_id = lsp.lsp_id
    JOIN 
        nhasanxuat nsx ON sp.nsx_id = nsx.nsx_id
    WHERE 
        spddh.dh_id = $id;
    ";

    $data_tdh = mysqli_query($conn, $sql);

    $arrTDH = [];

    while ($row = mysqli_fetch_array($data_tdh, MYSQLI_ASSOC)) {
        $arrTDH[] = array(
            "dh_id" => $row["dh_id"],
            "sp_ten" => $row["sp_ten"],
            "thanhtien" => $row["thanhtien"],
            "lsp_ten" => $row["lsp_ten"],
            "nsx_ten" => $row["nsx_ten"],
            "sp_dh_soluong" => $row["sp_dh_soluong"],
            "sp_dh_dongia" => $row["sp_dh_dongia"],
        );
    }
    ?>
    <?php if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) :
        include_once __DIR__ . '/../../bocucchinh/headder.php';
    ?>
    <?php elseif (isset($_SESSION['tk_id']) || $_SESSION['tk_id'] == 1) :
        include_once __DIR__ . '/../bocuc/header.php';
    ?>
    <?php endif; ?>
    <div class="A5 container">
        <section class="sheet padding-20mm">
            <!-- Write HTML just like a web page -->
            <table width="100%">
                <tr>
                    <td width="50mm">
                        <img src=".\..\..\Pic\logo.png" width="160px" alt="Logo H&T Computer">
                    </td>
                    <td class="text-center" style="vertical-align: top;">
                        <label for="">
                            <h4 style="color: red;"><i>H&T Computer</i></h4>
                        </label><br>
                        <label for="" style="font-size: 12px;"><i>Công ty H&T Computer là địa chỉ uy tín chuyên cung cấp máy tính <br> và linh kiện máy tính chất lượng cao, đáp ứng nhu cầu đa dạng của khách hàng.</i></label>
                    </td>
                </tr>
            </table>

            <p class="mt-3"><i style="font-family: 'Times New Roman', Times, serif; font-size: 15px;" class="text-sm">Thông tin khách hàng</i></p>

            <table style="margin-top: 5px; font-size: 15px;" class="text-sm">
                <?php
                foreach ($arrDDH as $ddh) :
                ?>
                    <tr>
                        <td width="220mm">
                            <b>Khách hàng:</b>
                        </td>
                        <td><?= $ddh['kh_ten']  ?></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Số điện thoại:</b>
                        </td>
                        <td><?= $ddh['kh_sdt']  ?></td>
                    </tr>
                    <tr>
                        <td><b>Địa chỉ:</b></td>
                        <td><?= $ddh['dh_noigiao']  ?></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Mã đơn hàng:</b>
                        </td>
                        <td>DH<?= $ddh['dh_id']  ?></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Ngày lập:</b>
                        </td>
                        <td><?= date('d/m/Y', strtotime($ddh['dh_ngaylap']))  ?></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Ngày giao:</b>
                        </td>
                        <td><?= date('d/m/Y', strtotime($ddh['dh_ngaygiao']))  ?></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Hình thức thanh toán:</b>
                        </td>
                        <td><i><?= $ddh['httt_ten']  ?></i></td>
                    </tr>
                    <tr>
                        <td>
                            <b>Trạng thái đơn hàng:</b>
                        </td>
                        <td>
                            <?php if ($ddh['dh_trangthai'] != 1) : ?>
                                <span><i>Đã thanh toán</i></span>
                            <?php else : ?>
                                <span><i>Chưa thanh toán</i></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <p class="mt-3"><i style=" font-family: 'Times New Roman', Times, serif; font-size: 15px;" class="text-sm">Thông tin đơn hàng</i></p>

            <table class="table-chuan" border="1" style="margin-top: 5px; font-size: 15px;" class="text-sm">
                <tr>
                    <th>STT</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
                <?php foreach ($arrTDH as $index => $ct) : ?>
                    <tr>
                        <td> <?= $index + 1 ?></td>
                        <td><?= $ct['sp_ten'] ?></td>
                        <td><?= $ct['sp_dh_soluong'] ?> </td>
                        <td><?= number_format($ct['sp_dh_dongia'], 0, ',', '.') . '₫' ?></td>
                        <td><?= number_format($ct['thanhtien'], 0, ',', '.') . '₫' ?> </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2"><b>Tổng sản số sản phẩm:</b> <?= count($arrTDH) ?></td>

                    <td colspan="3"><b>Tổng thành tiền:</b>
                        <?php foreach ($arrDDH as $ddh) : ?>
                            <i><?= number_format($ddh['tongthanhtien'], 0, ',', '.') . '₫' ?></i>
                        <?php endforeach; ?>
                    </td>
                </tr>

            </table>

            <table width="100%" style="font-size: 15px;" class="text-sm">
                <tr>
                    <td width="470mm">Chữ ký bên giao hàng</td>
                    <td>Chữ ký bên nhận hàng</td>
                </tr>
                <tr>
                    <td><i>(Ký và ghi rõ họ tên)</i></td>
                    <td><i>(Ký và ghi rõ họ tên)</i></td>
                </tr>
            </table>

            <p class="footer text-sm text-center"><i>H&T Computer xin chân thành cảm ơn quý khách hàng đã ủng hộ</i></p>
        </section>
        <?php if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) : ?>
            <a class="btn btn-info mb-5 text-white" href="./../../">Quay về trang chủ</a>
        <?php elseif (isset($_SESSION['tk_id']) || $_SESSION['tk_id'] == 1) : ?>
            <a class="btn btn-info mb-5 text-white" href="index.php">Quay về trang chủ</a>
        <?php endif; ?>
    </div>


    <?php include_once __DIR__ . '/../js/js.php'; ?>
</body>

</html>