<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT Computer - Liên hệ</title>
    
    <!-- Include CSS files -->
    <?php
    include_once __DIR__ . '../css/style.php';
    include_once __DIR__ . '../css/lienhe.php'; /* có quần què gì đâu */
    ?>
    
    <!-- Favicon -->
    <link rel="icon" href="./Pic/favicon.ico" type="image/x-icon">
    
    <style>
        /* Viết css ở đây */
        h2 {
            padding: 4px 0px 4px 0px;
            /*background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQW2CBcsq1JeH3frlaGPoHyZvUlSb2kQPqXFg&s) no-repeat center left;*/
            background-size: 30px;
            text-align: center;
        }
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        iframe {
            border: 10px;
            border-color: #555555;
            border-style: inset;
            border-radius: 20px;
        }
        .banner{
            background-color: gainsboro;
            padding-top: 20px;
            text-align: center;
            text-decoration: red;
        }
        .row{
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
            box-sizing: border-box;
        }
        .location-address{
            padding-top: 60px;
        }
        .sp{
            padding-top: 30px;
            
        }
        .mo-ta, .infomation{
            font-family: 'Courier New', monospace;
            padding-top: 10px;
            text-align: center;
        }
        .img-nv{
            padding-top: 10px;
        }
        .form-label{
            padding-top: 10px;
        }
        .infomation{
            text-align: left;
        }
    </style>
</head>
<body>

    <?php include_once __DIR__ . '../bocucchinh/headder.php'; ?>

    <main>
        <!-- viết code ở đây!!! -->
         <div class="banner">
            <div class="container">
                <h1>Hãy để đội ngũ của chúng tôi hỗ trợ bạn</h1>
                <br>
                <h1>bất cứ lúc nào</h1>
                <br>
            </div>
         </div>
         <div class="location-address">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-12">
                        <div id="map_canvas">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11112.299198542814!2d105.77087707360656!3d10.034093451007807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0881f0608decd%3A0x253e728c5c4c6a5a!2zNDEgxJAuIEzDvSBU4buxIFRy4buNbmcsIEFuIEPGsCwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1718901113664!5m2!1svi!2s" width="550" height="450" loading="lazy" ></iframe>
                        </div>
                    </div>
                    <div class="col-lg-5 col-12 info">
                        <h2>Công ty TNHH HT Computer</h2>
                        <div class="group-content">
                            <ul>
                                <li><h4>Tên viết tắt: HTV3 COOP FOOD</h4></li>
                                <li><h4>Số điện thoại: 0112-234-789</h4></li>
                                <li><h4>Fax: 88888888</h4></li>
                                <li><h4>Mã số thuế: 01234569</h4></li>
                                <li><h4>Mail: HTV3@gmail.com</h4></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
         </div>

         <div class="sp">
            <div class="container">
                <div class="row">
                    <h2>Liên hệ chúng tôi</h2>
                    <div class="col-xl-10 col-lg-10 col-md-12 offset-0 offset-lg-1 offset-xl-1">
                        
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12">
                                <form action="#">
                                    <h5 class="text-center">Hòm thư đóng góp ý kiến</h5>
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
                                        <!-- Chỗ này chưa hoạt động -->
                                            <div class="invalid-feedback">
                                                Bạn cần phải đồng ý các điều khoản trước khi gửi.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Gửi</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 text-center">
                                <img src="/Last_Project/Pic/user1.jpg" alt="Ảnh minh hoạ" width="150px" class="img-nv">
                                <p class="mo-ta">Mr.A</p>
                                <ul class="infomation">
                                    <li>Tel: 0123-456-789</li>
                                    <li>Email: NVA@gmail.com</li>
                                    <li>Facebook: Van A N</li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 col-12 text-center">
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
         </div>
        

    </main>
    <?php include_once __DIR__ . '../bocucchinh/footer.php'; ?>
    <?php include_once __DIR__ . '../js/js.php'; ?>

</body>
</html>
