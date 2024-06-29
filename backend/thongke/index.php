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
    <title>Đơn đặt hàng</title>
    <?php
    include_once __DIR__ . '/../../css/style.php';
    include_once __DIR__ . '/../style.php'; //css backend
    ?>
    <link rel="icon" href="./../../Pic/favicon.ico" type="image/x-icon">
    <style>
        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <?php include_once __DIR__ . '/../bocuc/header.php'; ?>
    <main class="container mt-5">
        <h3 class="mb-4">Danh mục thống kê</h3>
        <div class="bg-light p-3 rounded mb-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card text-white bg-primary">
                        <div class="card-header">Tổng số đơn đặt hàng</div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Số lượng: <span id="baocao_ddh"></span> đơn hàng</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-white bg-secondary">
                        <div class="card-header">Tổng số khách hàng</div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Số lượng: <span id="baocao_kh"></span> khách hàng</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-white bg-warning">
                        <div class="card-header">Tổng số góp ý</div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Số lượng: <span id="baocao_gy"></span> góp ý</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-white bg-success">
                        <div class="card-header">Tổng số sản phẩm</div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Số lượng: <span id="baocao_sp"></span> sản phẩm</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-white bg-info">
                        <div class="card-header">Tổng số nhà sản xuất</div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Số lượng: <span id="baocao_nsx"></span> nhà sản xuất</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card text-white bg-danger">
                        <div class="card-header">Tổng số khuyến mãi</div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Số lượng: <span id="baocao_km"></span> khuyến mãi</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="btn_re" class="btn btn-info text-white mb-4">Cập nhật dữ liệu</button>

        <!-- Biểu đồ thống kê loại sản phẩm -->
        <div class="row mb-4">
            <div class="col-md-6 mb-3">
                <canvas id="chartOfobjChartThongKeLoaiSanPham"></canvas>
                <button class="btn btn-primary btn-sm form-control mt-3 mb-3" id="refreshThongKeLoaiSanPham">Cập nhật dữ liệu</button>
            </div>
            <div class="col-md-6 mb-3">
                <canvas id="chartOfobjChartThongKeSanPhamTonKho"></canvas>
                <button class="btn btn-primary btn-sm form-control mt-3 mb-3" id="refreshThongKeSanPhamTonKho">Cập nhật dữ liệu</button>
            </div>
        </div>
    </main>
    <script type="module" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?php include_once __DIR__ . '/../js/js.php'; ?>
    <script>
        $(document).ready(function() {
            $.ajax('./../../backend/api/api_dondathang.php', {
                success: function(data) {
                    data_ob = JSON.parse(data);
                    var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                    $('#baocao_ddh').html(htmlString);
                },
                error: function(jqXHR, textStatus, error) {}
            });

            $.ajax('./../../backend/api/api_khachhang.php', {
                success: function(data) {
                    data_ob = JSON.parse(data);
                    var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                    $('#baocao_kh').html(htmlString);
                },
                error: function(jqXHR, textStatus, error) {}
            });

            $.ajax('./../../backend/api/api_gopy.php', {
                success: function(data) {
                    data_ob = JSON.parse(data);
                    var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                    $('#baocao_gy').html(htmlString);
                },
                error: function(jqXHR, textStatus, error) {}
            });

            $.ajax('./../../backend/api/api_sanpham.php', {
                success: function(data) {
                    data_ob = JSON.parse(data);
                    var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                    $('#baocao_sp').html(htmlString);
                },
                error: function(jqXHR, textStatus, error) {}
            });

            $.ajax('./../../backend/api/api_nhasanxuat.php', {
                success: function(data) {
                    data_ob = JSON.parse(data);
                    var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                    $('#baocao_nsx').html(htmlString);
                },
                error: function(jqXHR, textStatus, error) {}
            });

            $.ajax('./../../backend/api/api_khuyenmai.php', {
                success: function(data) {
                    data_ob = JSON.parse(data);
                    var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                    $('#baocao_km').html(htmlString);
                },
                error: function(jqXHR, textStatus, error) {}
            });

            $('#btn_re').click(function() {
                location.reload();
            });

            renderChartThongKeLoaiSanPham();

            $('#refreshThongKeLoaiSanPham').click(function() {
                renderChartThongKeLoaiSanPham();
            });

            renderChartThongKeSanPhamTonKho();

            $('#refreshThongKeSanPhamTonKho').click(function(event) {
                renderChartThongKeSanPhamTonKho();
            });
        });

        // ------------------ Biểu đồ thống kê Loại sản phẩm -----------------
        var $objChartThongKeLoaiSanPham;
        var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext(
            "2d");

        function renderChartThongKeLoaiSanPham() {
            $.ajax({
                url: './../../backend/api/api_loaisanpham.php',
                type: "GET",
                success: function(response) {
                    console.log("API Response:", response); // Ghi lại phản hồi từ API
                    var data = JSON.parse(response);
                    var myLabels = [];
                    var myData = [];
                    $(data).each(function() {
                        myLabels.push((this.TenLoaiSanPham));
                        myData.push(this.SoLuong);
                    });
                    myData.push(0); // tạo dòng số liệu 0
                    if (typeof $objChartThongKeLoaiSanPham !== "undefined") {
                        $objChartThongKeLoaiSanPham.destroy();
                    }
                    $objChartThongKeLoaiSanPham = new Chart($chartOfobjChartThongKeLoaiSanPham, {
                        // Kiểu biểu đồ muốn vẽ
                        type: "line",
                        data: {
                            labels: myLabels,
                            datasets: [{
                                label: 'Thống kê Loại sản phẩm',
                                data: myData,
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(100, 203, 207)'
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(300, 203, 207, 0.5)'
                                ],
                                borderWidth: 1,
                            }]
                        },
                        // Cấu hình dành cho biểu đồ của ChartJS
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Thống kê Loại sản phẩm"
                            },
                            responsive: true
                        }
                    });
                }
            });
        };
        // ------------------ Biểu đồ thống kê sản phẩm tồn kho -----------------
        var $objChartThongKeSanPhamTonKho;
        var $chartOfobjChartThongKeSanPhamTonKho = document.getElementById("chartOfobjChartThongKeSanPhamTonKho").getContext("2d");

        function renderChartThongKeSanPhamTonKho() {
            $.ajax({
                url: './../../backend/api/api_sp_tonkho.php',
                type: "GET",
                success: function(response) {
                    console.log("API Response:", response); // Ghi lại phản hồi từ API
                    var data = JSON.parse(response);
                    var myLabels = [];
                    var myData = [];
                    $(data).each(function() {
                        myLabels.push((this.SanPham));
                        myData.push(this.SoLuong);
                    });
                    myData.push(0); // tạo dòng số liệu 0
                    if (typeof $objChartThongKeSanPhamTonKho !== "undefined") {
                        $objChartThongKeSanPhamTonKho.destroy();
                    }
                    $objChartThongKeSanPhamTonKho = new Chart($chartOfobjChartThongKeSanPhamTonKho, {
                        // Kiểu biểu đồ muốn vẽ
                        type: "bar",
                        data: {
                            labels: myLabels,
                            datasets: [{
                                data: myData,
                                label: 'Thống kê sản phẩm tồn kho',
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 159, 64)',
                                    'rgb(255, 205, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(54, 162, 235)',
                                    'rgb(153, 102, 255)',
                                    'rgb(100, 203, 207)'
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 205, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(300, 203, 207, 0.5)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        // Cấu hình dành cho biểu đồ của ChartJS
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                text: "Thống kê sản phẩm tồn kho"
                            },
                            responsive: true
                        }
                    });
                }
            });
        };
    </script>
</body>

</html>