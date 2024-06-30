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
    
    
</head>
<body>

    <?php 
    include_once __DIR__ . '/loader.php';
    include_once __DIR__ . '/bocucchinh/headder.php'; 
    ?>

    <div class="container">
        <div class="img-bg">
            <div class="img-overlay"></div>
            <div class="content">
                <div class="content-text">
                    <h3>CỬA HÀNG H&T COMPUTER</h3>
                    <p>H&T Computer là một cửa hàng tại trung tâm thành phố, 
                        chuyên cung cấp các sản phẩm liên quan đến máy tính và linh kiện. 
                        Không gian của H&T Computer được bày trí hợp lý và sắp xếp gọn gàng, 
                        giúp cho việc mua sắm trở nên thuận tiện và dễ dàng hơn. 
                        Bạn có thể tìm thấy đa dạng các sản phẩm từ các thương hiệu nổi tiếng như Intel, AMD, Asus, MSI 
                        và nhiều hãng linh kiện khác, cũng như các sản phẩm thay thế và phụ kiện đa dạng như bàn phím, chuột, 
                        màn hình và loa. Nhân viên tại H&T Computer luôn sẵn sàng tư vấn và hỗ trợ khách hàng trong việc chọn lựa sản phẩm phù hợp nhất với nhu cầu và ngân sách của họ, 
                        cũng như là điểm đến lý tưởng cho những ai đam mê công nghệ và muốn tìm kiếm những sản phẩm chất lượng với mức giá hợp lý nhất. </p>
                </div>
            </div>
        </div>

        <div class="row intro">
            <div class="intro-col col-3">
            <i class="fa-solid fa-gears fa-2x"></i><br>
                <b>Lịch sự phát triển</b>
                <p>Cửa hàng H&T Computer đã từ gian hàng nhỏ phát triển thành điểm đến uy tín với đa dạng sản phẩm và dịch vụ chăm sóc khách hàng tận tình, cam kết mang lại sự hài lòng và niềm tin cho mọi khách hàng.</p>
            </div>
            <div class="intro-col col-3">
            <i class="fa-solid fa-circle-info fa-2x"></i><br>
                <b>Hỗ trợ mọi lúc</b>
                <p>Cửa hàng H&T Computer luôn sẵn sàng hỗ trợ khách hàng mọi lúc, đảm bảo sự tiện lợi và tin cậy trong mọi giao dịch.</p>
            </div>
            <div class="intro-col col-3">
            <i class="fa-regular fa-handshake fa-2x"></i> <br>
                <b>Sự tin tưởng</b>
                <p>Cửa hàng H&T Computer luôn xây dựng sự tin tưởng bằng đa dạng sản phẩm và dịch vụ chăm sóc khách hàng tận tình và chuyên nghiệp.</p>
            </div>
        </div>
    </div>

    <?php include_once __DIR__ . '/bocucchinh/footer.php'; ?>
    <?php include_once __DIR__ . '/js/js.php'; ?>

</body>
</html>
