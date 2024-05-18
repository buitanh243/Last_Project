<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
</head>
<body>
    <?php 
        include_once __DIR__.'/../../connect/connect.php';

        $id = $_GET['id'];

        //du lieu cu
        $sql = "SELECT lsp_ten,lsp_mota,lsp_id
            FROM loaisanpham
                WHERE lsp_id = '$id';";
        $data = mysqli_query($conn,$sql);

        $arrlsp = [];

        while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
            $arrlsp[] = array (
                'lsp_id' => $row['lsp_id'],
                'lsp_ten' => $row['lsp_ten'],
                'lsp_mota' => $row['lsp_mota'],
            );
        }

    ?>

<main>
        <h1>Chỉnh sửa loại sản phẩm</h1>
        
         <form action="" method="post" >
            <table class="dslsp_tab" border="0">
                <tr>
                <th>Tên loại sản phẩm</th>
                <th>Mô tả</th>
                </tr>
                <?php foreach($arrlsp as $lsp): ?>
                <tr>
                <td><input type="text" value="<?= $lsp['lsp_ten']?>" name="lsp_ten"> </td>
                <td><input type="text" value="<?= $lsp['lsp_mota']?>" name="lsp_mota"> </td>
                
                <td>
                    <input type="submit" value="Lưu" name="save" >
                    <input type="submit" value="Huỷ" name="exit" >
                </td>
                </tr>
                <?php endforeach; ?>
            </table>
         </form>

          <?php 

              if(isset($_POST['save'])) {
                include_once __DIR__.'/../../connect/connect.php';
                
                $lsp_ten = $_POST['lsp_ten'];
                $lsp_mota = $_POST['lsp_mota'];

                $sql_edit = "UPDATE loaisanpham SET lsp_ten = '$lsp_ten',lsp_mota = '$lsp_mota' WHERE lsp_id = '$id';";
                echo '<script>location.href = "index.php";</script>';
      
                mysqli_query($conn,$sql_edit);
              }
             
              if(isset($_POST['exit'])) {
                echo '<script>location.href = "index.php";</script>';
              }
            ?>
          
       
    </main>
</body>
</html>