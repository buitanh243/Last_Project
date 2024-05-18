<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>

        <form action="" method="post" name="themmoi" >  
              <div><label for="">Tên loại sản phẩm </label><input type="text" name="lsp_ten"> </div>
            
              <div><label for="">Mô tả </label><input type="text" name="lsp_mota"> </div>

            <input type="submit" value="Lưu" name="save" >
            <input type="submit" value="Huỷ" name="exit" >
        </form>
    <?php

        if(isset($_POST['save'])) {
          include_once __DIR__.'/../../connect/connect.php';

          $lsp_ten = $_POST['lsp_ten'];
          $lsp_motangan = $_POST['lsp_mota'];

          $sql = "INSERT INTO loaisanpham (lsp_ten, lsp_mota) VALUES ('$lsp_ten','$lsp_motangan');";
          echo '<script>location.href = "index.php";</script>';

          mysqli_query($conn,$sql);
        }
       
        if(isset($_POST['exit'])) {
          echo '<script>location.href = "index.php";</script>';
        }
    ?>
</body>
</html>