<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <style>
        #loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(50, 50, 50, 0.8);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loaded #loader-wrapper {
            display: none;
        }

        .loader {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 100px;
            margin: 130px 0;
            perspective: 780px;
        }

        .text {
            font-size: 20px;
            font-weight: 700;
            color: #cecece;
            z-index: 10;
        }

        .load-inner {
            position: absolute;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            border-radius: 50%;
        }

        .load-inner.load-one {
            left: 0%;
            top: 0%;
            border-bottom: 3px solid #5c5edc;
            animation: rotate1 1.15s linear infinite;
        }

        .load-inner.load-two {
            right: 0%;
            top: 0%;
            border-right: 3px solid #9147ff;
            animation: rotate2 1.15s 0.1s linear infinite;
        }

        .load-inner.load-three {
            right: 0%;
            bottom: 0%;
            border-top: 3px solid #3b82f6;
            animation: rotate3 1.15s 0.15s linear infinite;
        }

        @keyframes rotate1 {
            0% {
                transform: rotateX(45deg) rotateY(-45deg) rotateZ(0deg);
            }

            100% {
                transform: rotateX(45deg) rotateY(-45deg) rotateZ(360deg);
            }
        }

        @keyframes rotate2 {
            0% {
                transform: rotateX(45deg) rotateY(45deg) rotateZ(0deg);
            }

            100% {
                transform: rotateX(45deg) rotateY(45deg) rotateZ(360deg);
            }
        }

        @keyframes rotate3 {
            0% {
                transform: rotateX(-60deg) rotateY(0deg) rotateZ(0deg);
            }

            100% {
                transform: rotateX(-60deg) rotateY(0deg) rotateZ(360deg);
            }
        }
    </style>
</head>

<body>
    <div id="loader-wrapper" class="text-center">
        <div class="loader">
            <div class="load-inner load-one"></div>
            <div class="load-inner load-two"></div>
            <div class="load-inner load-three"></div>
            <span class="text">Loading...</span>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
    </script>
</body>

</html>