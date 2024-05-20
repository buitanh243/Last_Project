<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <?php 
            include_once __DIR__ .'/../../css/style.php';
            include_once __DIR__ .'/../style.php'; //css backend
    ?>
</head>
<body>
    <?php 
        include_once __DIR__.'/../../connect/connect.php';

        $id = $_GET['id'];

        //du lieu cu
        $sql = "SELECT nsx_ten,nsx_mota,nsx_id
            FROM nhasanxuat
                WHERE nsx_id = '$id';";
        $data = mysqli_query($conn,$sql);

        $arrnsx = [];

        while ($row = mysqli_fetch_array($data,MYSQLI_ASSOC)) {
            $arrnsx[] = array (
                'nsx_id' => $row['nsx_id'],
                'nsx_ten' => $row['nsx_ten'],
                'nsx_mota' => $row['nsx_mota'],
            );
        }

    ?>

<main>

         <form class="container align-items-center bg-light m-5 p-5 rounded border " action="" method="post" name="themmoi" >  
              <div class="row">
                <div class="col-3"></div>
                <h3 class="col-5">Chỉnh sửa nhà sản xuất</h3>
              </div>
             <div class="row">
              <div class="col-3"></div>
              <div class="col-3">
              <?php foreach($arrnsx as $nsx): ?>
                  <label class="mt-5  p-1" for="">Tên nhà sản xuất </label>
                  <input class="form-control mt-2" value="<?= $nsx['nsx_ten']?>" type="text" name="nsx_ten"> 
                </div>
              
                <div class="col-4">
                  <label class="mt-5  p-1" for="">Mô tả </label>
                  <input class="form-control mt-2" type="text" value="<?= $nsx['nsx_mota']?>" name="nsx_mota"> 
                </div>
                <?php endforeach; ?>
             </div>
            <div class="row">
              <div class="col-3 ms-1"></div>
              <input class="btn btn-primary text-white m-2 col-auto " type="submit" value="Lưu" name="save" >
              <input class="btn btn-danger text-white m-2 col-auto" type="submit" value="Huỷ" name="exit" >
            </div>
        </form>

          <?php 

              if(isset($_POST['save'])) {
                include_once __DIR__.'/../../connect/connect.php';
                
                $nsx_ten = $_POST['nsx_ten'];
                $nsx_mota = $_POST['nsx_mota'];

                $sql_edit = "UPDATE nhasanxuat SET nsx_ten = '$nsx_ten',nsx_mota = '$nsx_mota' WHERE nsx_id = '$id';";
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