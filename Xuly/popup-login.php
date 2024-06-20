<?php
include_once __DIR__ . '/../js/js.php';
?>
<script>
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    window.onload = function() {
        const status = getQueryParam('status');
        const name = getQueryParam('name');
        
        if (status === "admin") {
            showSuccessMessage("Đăng nhập với quyền quản trị thành công", "/Last_Project/backend/sanpham/");
        } else if (status === "False") {
            showErrorMessage("Đăng nhập thất bại", "Tài khoản hoặc mật khẩu không đúng!", "/Last_Project/login.php");
        }

        if (status === "True") {
            showSuccessMessage("Đăng nhập thành công", "/Last_Project/index.php");
        } else if (status === "False") {
            showErrorMessage("Đăng nhập thất bại", "Tài khoản hoặc mật khẩu không đúng!", "/Last_Project/login.php");
        }

        if (name === "False") {
            showErrorMessage("Đăng ký thất bại", "Tài khoản hoặc email đã tồn tại!", "/Last_Project/login.php?tab=register");
        } else if (name === "True") {
            showSuccessMessage("Đăng ký thành công", "/Last_Project/login.php?tab=login");
        }

        if (name === "logout") {
            showSuccessMessage("Đăng xuất thành công", "/Last_Project/login.php");
        }

        if (name === "user") {
            showSuccessMessage("Lưu lại thành công", "/Last_Project/user/user.php");
        }

        if (name === "Error") {
            showErrorMessage("Bạn không có quyền truy cập vào trang này!", "Vui lòng đăng nhập với tài khoản quản trị quản trị!", "/Last_Project/login.php?tab=login");
        }

    }

    function showSuccessMessage(title, redirectUrl) {
        setTimeout(() => {
            Swal.fire({
                position: "center",
                icon: "success",
                title: title,
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(() => {
                location.href = redirectUrl;
            }, 1500);
        }, 500);
    }

    function showErrorMessage(title, text, redirectUrl) {
        setTimeout(() => {
            Swal.fire({
                position: "top",
                icon: "error",
                title: title,
                text: text,
                showConfirmButton: false,
                timer: 2000
            });

            setTimeout(() => {
                location.href = redirectUrl;
            }, 1500);
        }, 500);
    }
</script>
