<style>

  .col-card {
    max-width: calc(20% - 10px); 
    margin-bottom: 20px;
    height: 350px;
  }

  .card {
    position: relative;
    height: 100%; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
    overflow: hidden; 
    transition: transform 0.2s;
  }

  .card:hover {
    transform: translateY(-5px); 
  }

  .card::after {
    content: "Thêm vào giỏ hàng";
    padding: 10px;
    
    position: absolute;
    left: 0;
    bottom: -50px;
    background: rgba(0, 0, 0, 0.8);
    color: #fff;
    width: 100%;
    text-align: center;
    transition: all 0.3s ease;
    opacity: 0;
  }

  .card:hover::after {
    bottom: 0;
    opacity: 1;
    cursor: pointer;
  }

  .card:active::after {
    content: "Đã thêm vào giỏ hàng !";
    background: rgba(0, 128, 0, 0.8);
    height: 3.125em;
  }

  .card-body {
    padding: 15px;
  }

  .card-title {
    font-size: 15px;
    margin-bottom: 10px;
    height: 30px;
  }

  .card-img-top {
    margin: 5px;
    width: 100%;
    height: 120px;
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
</style>
