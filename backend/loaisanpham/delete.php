<?php 
    include_once __DIR__.'/../../connect/connect.php';

    $id = $_GET['id'];
    
    $sql = " DELETE FROM loaisanpham WHERE lsp_id=$id; ";

    mysqli_query($conn,$sql);

    echo '<script>location.href="index.php"</script>';
?>