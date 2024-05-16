<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loại sản phẩm</title>
    <link rel="stylesheet" href="/./css/sanpham.css">
</head>
<body>
    <?php 
        include_once __DIR__.'/../connect/connect.php';

        $sql = "SELECT sp_ten,sp_soluong,sp_gia,hsp_url,sp_motangan
        FROM hinhsanpham AS sp 
            JOIN sanpham hsp ON sp.sp_id = hsp.sp_id
        ;";

        $data = mysqli_query($conn,$sql);

        $arrSP = [];

        while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
            $arrSP[] = array (
                'sp_ten' => $row['sp_ten'],
                'sp_soluong' => $row['sp_soluong'],
                'sp_motangan' => $row['sp_motangan'],
                'sp_gia' => $row['sp_gia'],
                'hsp_url' => $row['hsp_url'],
            );
        }
        //var_dump($arrSP);
    ?>
    <main>
        <?php foreach($arrSP as $sp): ?>
        <div class="col-sm-3">
            <div class="card">
            <div class="image"><span class="text"><img src="<?= $sp['hsp_url'] ?>" alt=""></span></div>
                <span class="title">Cool Chair</span>
                <span class="price">$100</span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="image"><span class="text">This is a chair.</span></div>
                <span class="title">Cool Chair</span>
                <span class="price">$100</span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="image"><span class="text">This is a chair.</span></div>
                <span class="title">Cool Chair</span>
                <span class="price">$100</span>
            </div>
        </div>
        <?php 
            endforeach;
        ?>
    </main>
        
</body>
</html>