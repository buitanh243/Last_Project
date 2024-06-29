<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Computer - Kết quả tìm kiếm</title>

    <?php
    include_once __DIR__ . '/../css/style.php';
    include_once __DIR__ . '/../css/sanpham.php';
    ?>

    <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php
    include_once __DIR__ . '/../bocucchinh/headder.php';
    ?>

    <?php
    include_once __DIR__ . '/../connect/connect.php';
    $search = $_POST['search'] ?? null;

    $sql = "SELECT * FROM sanpham AS sp 
    JOIN hinhsanpham AS hsp ON sp.sp_id = hsp.sp_id
    WHERE sp_ten LIKE '%" . $search . "%'";

    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $arrHSP[] = array(
            "sp_id" => $row["sp_id"],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_motangan' => $row['sp_motangan'],
            'hsp_url' => $row['hsp_url'],
        );
    }
    ?>
    <main>

        <div class="container justify-content-center">
            <h4>Kết quả tìm kiếm</h4>
            <div class="row mt-3">
                <?php
                if (!empty($arrHSP)) {
                    $count = 0;
                    foreach ($arrHSP as $row) :
                        if ($count % 5 == 0 && $count != 0) :
                            echo '</div><div class="row mt-3">';
                        endif;
                        $count++;
                ?>
                        <div class="col-2 col-card">
                            <div class="card">
                                <img class="card-img-top" src=".\..\uploads\<?= $row['hsp_url'] ?>" alt="Product Image">
                                <div class="card-body">
                                    <h6 class="card-title text-uppercase text-center"><b><?= $row['sp_ten'] ?></b></h6>
                                    <div class="price bg-light border mb-3">
                                        <span class="text-danger text-center"><b>Giá:
                                                <br>
                                                <label for=""><?= number_format($row['sp_gia'], 0, '.', ',') ?>&#8363;</label></b>
                                        </span>
                                        <span class="text-muted text-center"><i>Giá cũ:
                                                <br><s>
                                                    <?= empty($row['sp_giacu']) ? 'Rỗng' : number_format($row['sp_giacu'], 0, '.', ',') . '₫' ?></s></i>
                                        </span>
                                    </div>
                                    <b class="card-text text-secondary">Mô tả: </b><label><?= $row['sp_motangan'] ?></label>
                                    <form id="add-to-cart-form-<?= $row['sp_id'] ?>" action="./../giohang.php" method="post" onsubmit="return addToCart(<?= $row['sp_id'] ?>)">
                                        <div class="row mt-2">
                                            <label class="col-5" for="">Số lượng </label>
                                            <input class="col-3 dh_soluong" type="number" min="1" name="dh_soluong" value="1">
                                        </div>
                                        <p class="text-center mt-2"><a href="chitiet_sanpham.php?id=<?= $row['sp_id'] ?>">Xem chi tiết</a></p>
                                        <input type="hidden" name="sp_id" value="<?= $row['sp_id'] ?>">
                                        <button type="submit" class="btn-add-to-cart">Thêm vào giỏ hàng</button>
                                    </form>
                                    <div id="notification-<?= $row['sp_id'] ?>" class="notification"></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
            </div>
        <?php } else { ?>
            <div class="row text-center ">
                <span>Không tìm thấy kết quả phù hợp</span>
            </div>
        <?php } ?>
        </div>

        </div>
        <script>
            function addToCart(productId) {
                const form = document.getElementById(`add-to-cart-form-${productId}`);
                const formData = new FormData(form);
                const xhr = new XMLHttpRequest();
                xhr.open("POST", form.action, true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const notification = document.getElementById(`notification-${productId}`);
                        notification.innerHTML = "Đã thêm vào giỏ hàng!";
                        notification.style.display = 'block';
                        setTimeout(() => {
                            notification.style.display = 'none';
                        }, 1500);
                    }
                };
                xhr.send(formData);
                return false;
            }
        </script>
    </main>


    <?php
    include_once __DIR__ . '/../bocucchinh/footer.php';
    include_once __DIR__ . '/../js/js.php';
    ?>

</body>

</html>