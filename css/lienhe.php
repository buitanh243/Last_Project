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