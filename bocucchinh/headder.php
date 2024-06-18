<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Header</title>
    <?php include_once __DIR__ . '/../css/style.php';
    ?>
    <style>
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
        }

        .gio-hang:hover {
            border: 2px solid black;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
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
                                <li><a class="dropdown-item hover-effect" href="/Last_Project/sanpham.php">Sản phẩm mới</a></li>
                                <li><a class="dropdown-item hover-effect" href="/Last_Project/sanpham.php">Danh mục sản phẩm</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item hover-effect" href="#">Khuyến mãi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link hover-effect" href="#" tabindex="-1" aria-disabled="true">Liên hệ</a>
                        </li>
                    </ul>
                    <div class="d-flex ms-auto align-items-center">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Tìm kiếm">
                            <button class="btn btn-outline-success" type="submit">
                                <a href="/ketquatimkiem.html"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </button>
                        </form>
                        <button class="gio-hang login-btn hover-effect"><i class="fa-solid fa-cart-shopping"></i></button>
                        <?php
                        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
                        ?>
                            <a class="login-btn hover-effect" href="/Last_Project/login.php?tab=login">ĐĂNG NHẬP</a>
                            <a class="login-btn hover-effect" href="/Last_Project/login.php?tab=register">ĐĂNG KÝ</a>
                        <?php
                        } else {
                        ?>
                            <a class="login-btn hover-effect ms-3" id="user-btn" href="/Last_Project/user/user.php"><i class="fa-regular fa-user"></i></a>

                            <form action="/Last_Project/Xuly/xuly-logout.php" name="dangxuat" id="dangxuat"><button class="login-btn hover-effect" type="submit" name="logout" id="logout">ĐĂNG XUẤT</button></form>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <?php
    include_once __DIR__ . '/../js/js.php';
    ?>
</body>

</html>