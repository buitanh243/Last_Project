<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Header</title>
    <?php include_once __DIR__ . '/../css/style.php'; ?>
    <style>
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        nav {
            background: linear-gradient(90deg, #f0f0f0 0%, #c0c0c0 100%);
            opacity: 0.9;
        }

        .hover-effect {
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .hover-effect:hover {
            transform: scale(1.1);
            color: #000;
        }

        .navbar-brand img {
            max-height: 50px;
        }

        .navbar-toggler-icon {
            transition: transform 0.3s ease-in-out;
        }

        .navbar-toggler:hover .navbar-toggler-icon {
            transform: rotate(190deg);
        }

        .login-btn,
        .btn-outline-success {
            font-weight: 600;
            border: none;
            text-decoration: none;
            color: gray;
            margin-left: 10px;
        }

        .login-btn:hover,
        .btn-outline-success:hover {
            color: #000;
            transform: scale(1.1);
        }

        .btn-outline-success {
            border: none;
            background-color: none;
        }

        .btn-outline-success a {
            color: gray;
            text-decoration: none;
        }

        .btn-outline-success:hover {
            padding: auto;
            background-color: gray;
        }

        .btn-outline-success:hover a {
            color: #fff;
        }

        .nav-link,
        .dropdown-item,
        .login-btn {
            font-weight: 600;
        }


        .search {
            background-color: f0f0f0;
        }

        #user-btn {
            border: 2px solid gray;
            border-radius: 15px;
            padding: 3px 10px;
            background-color: #f0f0f0;
            text-align: center;
            display: inline-block;
        }

        #user-btn:hover {
            border: black;
            transform: scale(1.1);
        }

        .gio-hang {
            border: 1px solid gray;
            border-radius: 5px;
            margin: 10px;
            padding: 5px 8px 5px 8px;
        }

        .gio-hang:hover {
            border: 2px solid black;

        }

        .btn-logout {
            background-color:  gray;
            border: 0px;
            color: #fff;
            padding: 6px;
            border-radius: 5px;
        }

        .btn-logout:hover {
            transform: scale(1.1);
            background-color: rgb(150, 150, 150);
            font-weight: 600;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="/Last_Project/Pic/logo.png" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link hover-effect" aria-current="page" href="/Last_Project/index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-effect" href="\Last_Project\gioithieu.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle hover-effect" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item hover-effect" href="/Last_Project/sanpham.php">Bán chạy</a></li>
                                <li><a class="dropdown-item hover-effect" href="/Last_Project/sanpham.php">Danh mục sản phẩm</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item hover-effect" href="/Last_Project/khuyenmai.php">Khuyến mãi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-effect" href="lienhe.php" tabindex="-1" aria-disabled="true">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link hover-effect" href="/Last_Project/gopy-kh.php" tabindex="-1" aria-disabled="true">Góp ý</a>
                        </li>
                    </ul>
                    <div class="d-flex ms-auto align-items-center">
                        <form method="post" action="/Last_project/Xuly/ketqua_timkiem.php" class="d-flex">
                            <input class="form-control me-2 search" type="search" name="search" placeholder="Tìm kiếm sản phẩm" aria-label="Tìm kiếm">
                            <button class="btn btn-outline-success" type="submit">
                                <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </button>
                        </form>
                        <a href="/Last_Project/giohang.php" class="gio-hang login-btn hover-effect"><i class="fa-solid fa-cart-shopping"></i></a>
                        <?php
                        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
                        ?>
                            <a class="login-btn hover-effect" href="/Last_Project/login.php?tab=login">ĐĂNG NHẬP</a>
                            <a class="login-btn hover-effect" href="/Last_Project/login.php?tab=register">ĐĂNG KÝ</a>
                        <?php
                        } else {
                        ?>
                            <a class="login-btn hover-effect ms-3" id="user-btn" href="/Last_Project/user/user.php"><i class="fa-regular fa-user"></i></a>
                            <form action="/Last_Project/Xuly/xuly-logout.php" name="dangxuat" id="dangxuat">
                            <input class="ms-3 btn-logout" type="submit" name="logout" id="logout" value="ĐĂNG XUẤT" >
                        </form>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <?php include_once __DIR__ . '/../js/js.php'; ?>
</body>

</html>