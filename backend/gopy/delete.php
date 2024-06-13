<?php 
    include_once __DIR__.'/../../connect/connect.php';

    $id = $_GET['id'];
    
    $sql = " DELETE FROM gopy WHERE gopy_id=$id; ";

    mysqli_query($conn,$sql);

    echo '<script>location.href = "./../popup.php?name=gopy";</script>';
?>