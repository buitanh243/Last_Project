<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include_once __DIR__ . '/../css/style.php';
    ?>
    <style>
        a {
            text-decoration: none;
        }

        .footer-link:hover {
            transform: scale(1.5);
            transition: transform 0.3s ease-in-out;
        }

        .social-icon:hover {

            transform: scale(1.2);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>

<body>

    <footer class="mt-5 bg-secondary text-white">
        <button class="button" onclick="scrollToTop()" id="back-top-btn">
            <svg class="svgIcon" viewBox="0 0 384 512">
                <path
                    d="M214.6 41.4c-12.5-12.5-32.8-12.5-45.3 0l-160 160c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L160 141.2V448c0 17.7 14.3 32 32 32s32-14.3 32-32V141.2L329.4 246.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3l-160-160z">
                </path>
            </svg>
        </button>
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6 text-center">
                    <h2>Theo dõi và liên lạc</h2>
                    <div class="d-flex justify-content-center">
                        <a class="text-white me-3 social-icon" href=""><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a class="text-white me-3 social-icon" href=""><i class="fab fa-twitter fa-2x"></i></a>
                        <a class="text-white me-3 social-icon" href=""><i class="far fa-envelope fa-2x"></i></a>
                        <a class="text-white social-icon" href=""><i class="fa-solid fa-square-phone fa-2x"></i></a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <h2>Chính sách và dịch vụ</h2>
                    <ul class="list-unstyled">
                        <li><a class="text-white footer-link" href="">CHÍNH SÁCH BẢO MẬT</a></li>
                        <li><a class="text-white footer-link" href="">CHÍNH SÁCH ĐỔI TRẢ</a></li>
                        <li><a class="text-white footer-link" href="">ĐIỀU KHOẢN DỊCH VỤ</a></li>
                    </ul>
                </div>
            </div>
            <div class="row text-center mt-3">
                <div class="col-12">
                    <p>&copy; 2024 Bản Quyền thuộc về BHT</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>