<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <?php 
            include_once __DIR__ .'/../../css/style.php';
            include_once __DIR__ .'/../style.php'; //css backend
    ?>
    <link rel="icon" href="/./Pic/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php 
      include_once __DIR__.'/../../connect/connect.php';

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
    ?>

        <form  action="" method="post" name="themmoi" >  
              <div><label for="">Tên sản phẩm </label><input class="form-control" type="text" name="sp_ten"> </div>
              <div><label for="">Số lượng </label><input class="form-control" type="number" name="sp_soluong" min="1"> </div>
              <div><label for="">Giá </label><input type="number" name="sp_gia"> </div>
              <div><label for="">Mô tả ngắn </label><input type="text" name="sp_motangan"> </div>

              <div> 
                    <select class="form-select" name="lsp_id" required>
                        <?php foreach($arrLSP as $lsp): ?>
                            <option value="<?= $lsp['lsp_id'] ?>"> 
                                <?= $lsp['lsp_ten'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
              </div>

              <div> 
                    <select class="form-select" name="nsx_id" required>
                        <?php foreach($arrNSX as $nsx): ?>
                            <option value="<?= $nsx['nsx_id'] ?>"> 
                                <?= $nsx['nsx_ten'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
              </div>

            <input type="submit" value="Lưu" name="save" >
            <input type="submit" value="Huỷ" name="exit" >

        </form>
    <?php

        if(isset($_POST['save'])) {
          include_once __DIR__.'/../../connect/connect.php';

          $sp_ten = $_POST['sp_ten'];
          $sp_soluong = $_POST['sp_soluong'];
          $sp_gia = $_POST['sp_gia'];
          $sp_motangan = $_POST['sp_motangan'];
          $lsp_id = $_POST['lsp_id'];
          $nsx_id = $_POST['nsx_id'];



          $sql = "INSERT INTO sanpham (sp_ten, sp_soluong, sp_gia, sp_motangan, lsp_id, nsx_id) VALUES ('$sp_ten', '$sp_soluong', '$sp_gia', '$sp_motangan', '$lsp_id','$nsx_id');";
          echo '<script>location.href = "index.php";</script>';

          mysqli_query($conn,$sql);
        }
       
        if(isset($_POST['exit'])) {
          echo '<script>location.href = "index.php";</script>';
        }
    ?>
</body>
</html>