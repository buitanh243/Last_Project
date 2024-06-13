<?php
include_once __DIR__ . '/../js/js.php';
?>
<script>
     function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }
    
     window.onload = function() {
        const name = getQueryParam('name');
        showSuccessMessage("Lưu lại thành công", name);
    }
      function showSuccessMessage(title, name) {
        setTimeout(() => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: title,
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(() => {
                location.href = "./" + name + "/index.php";
            }, 1200);
        }, 500);
    }
</script>