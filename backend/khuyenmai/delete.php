<?php 
    include_once __DIR__.'/../../connect/connect.php';

    $id = $_GET['id'];
    //Viet them kiem tra xem co
    $sql = " DELETE FROM khuyenmai WHERE km_id=$id; ";
    
    mysqli_query($conn,$sql);

    echo '<script>location.href="index.php"</script>';
?>