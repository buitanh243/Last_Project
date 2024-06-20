<?php session_start() ?>
<?php
      include_once __DIR__ . '/../../connect/connect.php';

      $sql = " DELETE FROM gopy; ";
      mysqli_query($conn, $sql);
      echo '<script>location.href = "./../popup.php?name=gopy";</script>';
?>