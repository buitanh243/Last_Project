<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Computer - Liên hệ</title>

    <!-- Include CSS files -->
    <?php
    include_once __DIR__ . '/css/style.php';
    include_once __DIR__ . '/css/lienhe.php';
    ?>

    <!-- Favicon -->
    <link rel="icon" href="/Last_Project/Pic/favicon.ico" type="image/x-icon">

    <style>
        body {
            background: linear-gradient(0deg, #ffffff 17%, #ffffff 20%, #eeafaf 41%, #ffffff 93%);        }

        main h2 {
            padding: 4px 0;
            text-align: center;
            font-size: 2rem;
            font-weight: bold;
            color: #333;
        }

        .container {
            width: 80%;
            padding: 0 15px;
            margin: 0 auto;
        }
         
        .map_canvas {
            width: 90%;
            height: 100%;
        }

        iframe {
            height: 100%;
            width: 100%;
            border: 5px solid #555555;
            border-radius: 10px;
        }

        iframe:hover {
            transform: scale(1.05);
        }

        .banner {
            padding: 20px 0;
            text-align: center;
            color: gray;
        }

        .banner h1 {
            margin: 0;
            font-size: 2.5rem;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .row {
            margin: -15px;
            padding: 20px;
            border-radius: 10px;
        }

        .row>[class*='col-'] {
            padding: 15px;
        }

        .group-content ul {
            list-style: none;
            padding: 0;
        }

        .group-content ul li {
            padding: 10px 0;
            font-size: 1.2rem;
        }

        .form-label,
        .infomation,
        .mo-ta {
            font-family: 'Courier New', monospace;
            padding-top: 10px;
            text-align: center;
        }

        .img-nv {
            padding-top: 10px;
            border-radius: 50%;
            transition: transform 0.3s ease-in-out;
        }

        .img-nv:hover {
            transform: scale(1.1);
        }

        .infomation {
            text-align: left;
            list-style: none;
            padding: 0;
        }

        .infomation li {
            padding: 5px 0;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <?php include_once __DIR__ . '../bocucchinh/headder.php'; ?>

    <main>
        <div class="banner">
            <div class="container">
                <h1>Hãy để đội ngũ của chúng tôi hỗ trợ bạn</h1>
                <br>
                <h1>Bất cứ lúc nào</h1>
                <br>
            </div>
        </div>
        <div class="location-address">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div class="map_canvas">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11112.299198542814!2d105.77087707360656!3d10.034093451007807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0881f0608decd%3A0x253e728c5c4c6a5a!2zNDEgxJAuIEzDvSBU4buxIFRy4buNbmcsIEFuIEPGsCwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1718901113664!5m2!1svi!2s" width="550" height="450" loading="lazy"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 info">
                        <h2>Công ty TNHH HT Computer</h2>
                        <div class="group-content">
                            <ul>
                                <li>
                                    <h4>Tên viết tắt: HTV COMP</h4>
                                </li>
                                <li>
                                    <h4>Số điện thoại: 0112-234-789</h4>
                                </li>
                                <li>
                                    <h4>Fax: 88888888</h4>
                                </li>
                                <li>
                                    <h4>Mã số thuế: 01234569</h4>
                                </li>
                                <li>
                                    <h4>Mail: htvcomp@gmail.com</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row bg-light mt-5">
                <h2>Liên hệ chúng tôi</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <form action="#">
                            <h5 class="text-center">Hộp thư hỗ trợ khách hàng</h5>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email của bạn</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Ý kiến của bạn</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">
                                        Tôi đồng ý với các điều khoản về quyền riêng tư của trang.
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary mt-3" type="submit">Gửi</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-8 row ms-2 text-center">
                        <h5>Người quản trị</h5>
                        <div class="col-6 text-center ">
                            <img src="/Last_Project/Pic/user1.jpg" alt="Ảnh minh hoạ" width="150px" class="img-nv">
                            <p class="mo-ta">Mr.A</p>
                            <ul class="infomation">
                                <li>Tel: 0123-456-789</li>
                                <li>Email: NVA@gmail.com</li>
                                <li>Facebook: Van A N</li>
                            </ul>
                        </div>
                        <div class="col-6 text-center">
                            <img src="/Last_Project/Pic/user2.png" alt="Ảnh minh hoạ" width="150px" class="img-nv">
                            <p class="mo-ta">Ms.B</p>
                            <ul class="infomation">
                                <li>Tel: 0123-888-999</li>
                                <li>Email: VTTB@gmail.com</li>
                                <li>Facebook: Thu B V</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include_once __DIR__ . '../bocucchinh/footer.php'; ?>
    <?php include_once __DIR__ . '../js/js.php'; ?>

</body>

</html>