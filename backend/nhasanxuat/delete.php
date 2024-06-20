<?php session_start() ?>

<?php 
    include_once __DIR__.'/../../connect/connect.php';

    $id = $_GET['id'];
    
    $sql = " DELETE FROM nhasanxuat WHERE nsx_id=$id; ";

    mysqli_query($conn,$sql);

    echo '<script>location.href = "./../popup.php?name=nhasanxuat";</script>';
    ?>