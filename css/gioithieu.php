<style>
        .img-bg {
            display: flex;
            justify-content: center;
            height: 300px;
            background-image: url('https://anviethouse.vn/wp-content/uploads/2021/12/Mau-thiet-ke-sieu-thi-dien-may-dep-3-5.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            color: #fff;
            text-align: center;
            padding: 20px;
            overflow: hidden; 
            transition: filter 0.3s ease-in-out;
        }

        .img-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 25%;
            height: 100%;
            background: linear-gradient(to right, rgba(255, 255, 255, 0.8), transparent);
            pointer-events: none;
            transition: width 0.3s ease; 
        }

        .img-bg:hover .img-overlay {
            width: 50%; 
        }

        .content {
            border-radius: 10px;
            width: 50%;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            transition: background-color 0.3s ease; 
        }

        .content:hover {
            background-color: rgba(0, 0, 0, 0.9);
        }

        .content-text {
            max-width: 600px;
            padding: 20px; 
        }

        .content-text h3 {
            font-size: 28px;
            font-weight: bold;
            margin: 10px 0 10px 0; 
        }

        .content-text p {
            height: 100%;
            width: 100%;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 10px;
            text-align: justify; 
        }

        .intro {
            display: flex;
            justify-content: space-around;
        }

        .intro-col {
            width: 400px;
            text-align: center;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            margin: 20px;
            padding: 20px;
            height: 200px;
            color: #555;
        }

        .intro-col p {
            text-align: justify;
        }
    </style>