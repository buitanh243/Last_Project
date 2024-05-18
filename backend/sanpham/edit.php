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
        $sql = "SELECT sp_ten,sp_soluong,sp_gia,sp_motangan,sp_id
            FROM sanpham
                WHERE sp_id = '$id';";
        $data = mysqli_query($conn,$sql);

        $arrSP = [];

        while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
            $arrSP[] = array (
                'sp_id' => $row['sp_id'],
                'sp_ten' => $row['sp_ten'],
                'sp_soluong' => $row['sp_soluong'],
                'sp_motangan' => $row['sp_motangan'],
                'sp_gia' => $row['sp_gia'],
            );
        }

            // Lấy dữ liệu loại sản phẩm
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

<main>
        <h1>Chỉnh sửa sản phẩm</h1>
        
         <form action="" method="post" >
            <table class="dssp_tab" border="0">
                <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Mô tả ngắn</th>
                <th>Loại sản phẩm</th>
                <th>Nhà sản xuất</th>
                </tr>
                <?php foreach($arrSP as $sp): ?>
                <tr>
                <td><input type="text" value="<?= $sp['sp_ten']?>" name="sp_ten"> </td>
                <td><input type="text" value="<?= $sp['sp_soluong']?>" name="sp_soluong"> </td>
                <td><input type="text" value="<?= $sp['sp_gia']?>" name="sp_gia"></td>
                <td><input type="text" value="<?= $sp['sp_motangan']?>" name="sp_motangan"> </td>
                <td>
                    <select class="form-select" name="lsp_id" required>
                        <?php foreach($arrLSP as $lsp): ?>
                            <option value="<?= $lsp['lsp_id'] ?>"> 
                                <?= $lsp['lsp_ten'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                <td>
                <td>
                    <select class="form-select" name="nsx_id" required>
                        <?php foreach($arrNSX as $nsx): ?>
                            <option value="<?= $nsx['nsx_id'] ?>"> 
                                <?= $nsx['nsx_ten'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
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
                
                $sp_ten = $_POST['sp_ten'];
                $sp_soluong = $_POST['sp_soluong'];
                $sp_gia = $_POST['sp_gia'];
                $sp_motangan = $_POST['sp_motangan'];
                $lsp_id = $_POST['lsp_id'];
                $nsx_id = $_POST['nsx_id'];
      
      
      
                $sql_edit = "UPDATE sanpham SET sp_ten = '$sp_ten',sp_soluong = '$sp_soluong',sp_gia = '$sp_gia',sp_motangan = '$sp_motangan',lsp_id = '$lsp_id',nsx_id = '$nsx_id' WHERE sp_id = '$id';";
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