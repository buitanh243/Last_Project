<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Góp ý khách hàng</title>
    <?php
    include_once __DIR__ . '/css/style.php';
    ?>

    <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
</head>

<body>
    
    <?php
    include_once __DIR__ . '/bocucchinh/headder.php';
    ?>
    <form class="container">

        <div class="row">
            <div class="col-3">
                <?php
                include_once __DIR__ . '/bocucchinh/sidebar.php';
                ?>
            </div>
            <div class="col-9">
                <h3 class="text-center" >Góp ý khách hàng</h3>
                <div class="row">
                <label  for="">Tên khách hàng</label>
                 <input class="form-control mt-3" type="text" name="kh_ten" id="kh_ten">
                <label class="mt-3" for="">Nội dung góp ý</label>
                 <textarea class="form-control mt-3" placeholder="Nhập nội dung góp ý..." name="gopy_noidung" id="gopy_noidung" cols="30" rows="10" ></textarea>
                </div>
                <div class="row">
                    <button class="btn btn-primary col-1 btn-sm mt-3" value="">Gửi</button>  
                </div>
            </div>
        </div>

    </form>
    <?php 
        include_once __DIR__.'./connect/connect.php';

        // $sql = "INSERT INTO gopy (hinhthuc VALUE ";

    ?>
    <?php
    include_once __DIR__ . '/bocucchinh/footer.php';
    include_once __DIR__ . '/js/js.php';
    ?>
</body>

</html>