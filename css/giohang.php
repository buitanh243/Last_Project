<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      margin-top: 100px;
    }

    .table {
      background-color: #fff;
      width: 100%;

      border-collapse: collapse;
      margin: 20px 0;
    }

    .table td {
      padding: 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

   
    .table th {
      text-align: center;
      background-color: #f2f2f2;
    }

    .sp {
      display: flex;
      justify-content: start;
    }


    .table td img {
      height: 150px;
    }

    .table tr:hover {
      background-color: #f1f1f1;
    }

    .tamtinh {
      padding: 20px;
      margin: 20px 0;
      background-color: #fafafa;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tamtinh h5 {
      margin-bottom: 20px;
      font-size: 18px;
      color: #333;
    }

    .tamtinh label {
      display: block;
      margin-top: 10px;
      font-size: 14px;
    }


    .thongtin-muahang {
      padding: 20px;
      background-color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .thongtin-muahang h5 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 20px;
      font-size: 20px;
      color: #333;
    }

    .thongtin-muahang label {
      display: block;
      margin-top: 10px;
      font-size: 14px;
      color: #555;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-select {
      width: 100%;
      padding: 10px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    @media (max-width: 768px) {
      .row {
        flex-direction: column;
      }

      .col-8, .col-4 {
        width: 100%;
      }
    }

  </style>