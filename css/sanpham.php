<style>
  /* The san pham */
  .col-card {
    margin: 10px 0 10px 0;
    height: 390px;
    width: 260px;
  }

  .card {
    position: relative;
    height: 390px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s;
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card-body {
    padding: 15px;
    position: relative;
  }

  .card-title {
    height: 30px;
    font-size: 15px;
    margin-bottom: 10px;
  }

  .card-img-top {
    margin: 5px;
    width: 100%;
    height: 110px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
  }

  .price {
    display: flex;
    justify-content: space-between;
    margin: 10px 0;
  }

  .price span {
    flex: 1;
  }

  .card-text {
    height: 20px;
  }

  .btn-add-to-cart {
    display: none;
    width: calc(100% - 20px);
    padding: 10px;
    background-color: gray;
    color: white;
    text-align: center;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    cursor: pointer;
    font-size: 16px;
    margin: 10px auto 0 auto;
    position: absolute;
    bottom: 5px;
    left: 10px;
    right: 10px;
  }

  .card:hover .btn-add-to-cart {
    display: block;
  }

  .btn-add-to-cart:hover {
    background-color: cadetblue;
  }

  .btn-add-to-cart:active {
    background-color: #004085;
  }

  .product-bt {
    margin-top: 20px;
    height: 360px;
    width: 640px;
  }

  .btn-add-to-cart-form- {
    display: flex;
    align-items: center;
  }

  .dh_soluong {
    text-align: center;
    border-radius: 5px;
    width: 60px;
    border: 2px solid gray;
  }

  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    opacity: 1;
  }

  .product-bt:hover {
    transform: scale(1.1);
  }

  .notification {
    display: none;
    width: calc(100% - 20px);
    padding: 10px;
    background-color: #4caf50;
    color: white;
    text-align: center;
    border: none;
    border-radius: 4px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    cursor: pointer;
    font-size: 16px;
    margin: 10px auto 0 auto;
    position: absolute;
    bottom: 5px;
    left: 10px;
    right: 10px;
    z-index: 1000;
  }
</style>