<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Computer - Trang chủ</title>
 
        <?php 
            include_once __DIR__ .'/css/style.php';
        ?>
       
        <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
 
</head>
<body>
    
    <?php 
    include_once __DIR__.'/bocucchinh/headder.php';
    ?>
    <main>
      <div class="container">
      
      <div class="row">

        <div class="col-3">
        <?php 
          include_once __DIR__.'/bocucchinh/sidebar.php';
        ?>
        </div>
        <div class="col-9">col-9</div>
      </div>
      </div>

    </main>


  <?php 
    include_once __DIR__.'/bocucchinh/footer.php';
    include_once __DIR__ .'/js/js.php';
  ?>

</body>
</html>
