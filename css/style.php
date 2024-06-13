<link href="\Last_Project\vendor\bootstrap\css\bootstrap.min.css" type="text/css" rel="stylesheet" />
<link href="\Last_Project\vendor\fontawesome\css\all.min.css" type="text/css" rel="stylesheet" />
<link href="\Last_Project\vendor\parpercss\paper.min.css" type="text/css" rel="stylesheet" />


<style>
    /* Nut back-top */
    .button {
        display: none;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: rgb(20, 20, 20);
        border: none;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0px 0px 0px 4px rgba(180, 160, 255, 0.253);
        cursor: pointer;
        transition-duration: 0.3s;
        overflow: hidden;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999;
    }

    .svgIcon {
        width: 12px;
        transition-duration: 0.3s;
    }

    .svgIcon path {
        fill: white;
    }

    .button:hover {
        width: 140px;
        border-radius: 50px;
        transition-duration: 0.3s;
        background-color: gray;
        align-items: center;
    }

    .button:hover .svgIcon {
        transition-duration: 0.3s;
        transform: translateY(-200%);
    }

    .button::before {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        content: "Trở lại đầu trang";
        color: white;
        font-size: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

</style>