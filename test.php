<!-- <?php session_start();
if (!isset($_SESSION['tk_id']) || $_SESSION['tk_id'] != 1) {
  echo '<script>
        location.href="/Last_project/Xuly/popup-login.php?name=Error";
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
  <link rel="icon" href="/Last_Project/Pic/favicon.ico" type="image/x-icon">
  <style>

  </style>
</head>

<body>
  <?php include_once __DIR__ . '/../bocuc/header.php'; ?>
  <main>
      <div class="container">
          <h3>Danh sách thống kê</h3>
          <div class="row ms-5 mt-5">
              <div class="col-4">
                  <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                      <div class="card-header">Tổng số đơn đặt hàng</div>
                      <div class="card-body text-center">
                          <h5 class="card-title">Số lượng: <h5 id="baocao_ddh"></h5> đơn hàng</h5>
                          <div class="card-text">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                  <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
                      <div class="card-header">Tổng số khách hàng</div>
                      <div class="card-body text-center">
                          <h5 class="card-title">Số lượng: <h5 id="baocao_kh"></h5> khách hàng</h5>
                          <div class="card-text">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-4">
                  <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
                      <div class="card-header">Tổng số góp ý</div>
                      <div class="card-body text-center">
                          <h5 class="card-title">Số lượng: <h5 id="baocao_gy"></h5> góp ý</h5>
                          <div class="card-text">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-3">
                  <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                      <div class="card-header">Tổng số sản phẩm</div>
                      <div class="card-body text-center">
                          <h5 class="card-title">Số lượng: <h5 id="baocao_sp"></h5>sản phẩm</h5>
                          <div class="card-text">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-3">
                  <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                      <div class="card-header">Tổng số loại sản phẩm</div>
                      <div class="card-body text-center">
                          <h5 class="card-title">Số lượng: <h5 id="baocao_lsp"></h5> loại sản phẩm</h5>
                          <div class="card-text">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-3">
                  <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                      <div class="card-header">Tổng số nhà sản xuất</div>
                      <div class="card-body text-center">
                          <h5 class="card-title">Số lượng: <h5 id="baocao_nsx"></h5> nhà sản xuất</h5>
                          <div class="card-text">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-3">
                  <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                      <div class="card-header">Tổng số khuyến mãi</div>
                      <div class="card-body text-center">
                          <h5 class="card-title">Số lượng: <h5 id="baocao_km"></h5> khuyến mãi</h5>
                          <div class="card-text">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <button id="btn_re" class="btn btn-light mt-3">Cập nhật dữ liệu</button>

          <div class="row">
              <div class="col-md-6">
                  <canvas id="chartOfobjChartThongKeLoaiSanPham">

                  </canvas>
                  <button class="btn btn-info text-white" id="refreshThongKeLoaiSanPham">Cập nhật biểu đồ</button>
              </div>
              <div class="col-md-6">

              </div>
          </div>
      </div>

  </main>

  <?php include_once __DIR__ . '/../js/js.php'; ?>
  <script>
      $(function() {
          $.ajax('/Last_Project/backend/api/api_dondathang.php', {
              success: function(data) {
                  data_ob = JSON.parse(data);
                  var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                  $('#baocao_ddh').html(htmlString);
              },
              error: function(jqXHR, textStatus, error) {}
          });

          $.ajax('/Last_Project/backend/api/api_khachhang.php', {
              success: function(data) {
                  data_ob = JSON.parse(data);
                  var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                  $('#baocao_kh').html(htmlString);
              },
              error: function(jqXHR, textStatus, error) {}
          });

          $.ajax('/Last_Project/backend/api/api_gopy.php', {
              success: function(data) {
                  data_ob = JSON.parse(data);
                  var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                  $('#baocao_gy').html(htmlString);
              },
              error: function(jqXHR, textStatus, error) {}
          });

          $.ajax('/Last_Project/backend/api/api_sanpham.php', {
              success: function(data) {
                  data_ob = JSON.parse(data);
                  var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                  $('#baocao_sp').html(htmlString);
              },
              error: function(jqXHR, textStatus, error) {}
          });

          $.ajax('/Last_Project/backend/api/api_loaisanpham.php', {
              success: function(data) {
                  data_ob = JSON.parse(data);
                  var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                  $('#baocao_lsp').html(htmlString);
              },
              error: function(jqXHR, textStatus, error) {}
          });

          $.ajax('/Last_Project/backend/api/api_nhasanxuat.php', {
              success: function(data) {
                  data_ob = JSON.parse(data);
                  var htmlString = `<h5>${data_ob.Soluong}</h5>`;
                  $('#baocao_nsx').html(htmlString);
              },
              error: function(jqXHR, textStatus, error) {}
          });

          $.ajax('/Last_Project/backend/api/api_khuyenmai.php', {
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
      });

      // ------------------ Vẽ biểu đồ thống kê Loại sản phẩm -----------------
      // Vẽ biểu đổ Thống kê Loại sản phẩm sử dụng ChartJS
      var $objChartThongKeLoaiSanPham;
      var $chartOfobjChartThongKeLoaiSanPham = document.getElementById("chartOfobjChartThongKeLoaiSanPham").getContext( "2d");

      function renderChartThongKeLoaiSanPham() {
          $.ajax({
              url: '/Last_Project/backend/api/api_loaisanpham.php',
              type: "GET",
              success: function(response) {
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
                      // Kiểu biểu đồ muốn vẽ. Các bạn xem thêm trên trang ChartJS
                      type: "bar",
                      data: {
                          labels: myLabels,
                          datasets: [{
                              data: myData,
                              borderColor: "#9ad0f5",
                              backgroundColor: "#9ad0f5",
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
                              text: "Thống kê Loại sản phẩm"
                          },
                          responsive: true
                      }
                  });
              }
          });
      };
      $('#refreshThongKeLoaiSanPham').click(function(event) {
          event.preventDefault();
          renderChartThongKeLoaiSanPham();
      });

      // Mới mở web (khi trang web load xong)
      // thì sẽ gọi lập tức một số hàm AJAX gọi API lấy dữ liệu
      getDuLieuBaoCaoTongSoMatHang();
      getDuLieuBaoCaoTongSoKhachHang();
      getDuLieuBaoCaoTongSoDonHang();
      getDuLieuBaoCaoTongSoGopY();
      renderChartThongKeLoaiSanPham();
  </script>
</body>

</html> -->