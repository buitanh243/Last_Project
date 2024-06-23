<style>
  .figure {
    margin: 0;
  }

  /* the khuyen mai */
  .card-km {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: transform 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  .card__image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }

  .card__image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  .card__content {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 15px;
    background-color: #fff;
    transition: transform 0.5s cubic-bezier(0.215, 0.61, 0.355, 1);
  }

  .card__title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
  }

  .card__text {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 20px;
  }

  .card__button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
  }

  .card__button:hover {
    background-color: gray;
    color: white;
  }

  .card-km:hover {
    transform: translateY(-10px);
  }

  .card-km:hover .card__image img {
    transform: scale(1.2);
  }

  .card-km:hover .card__content {
    transform: translateY(-100%);
  }

  .card__image {
    height: 100%;
    width: 100%;
    background-color: #000;
  }

  /* Th uu dai  */
  .btn-uudai {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    overflow: hidden;
    height: 5rem;
    background-size: 300% 300%;
    backdrop-filter: blur(1rem);
    border-radius: 5px;
    transition: 0.5s;
    animation: gradient_301 5s ease infinite;
    border: double 4px transparent;
    background-image: linear-gradient(#212121, #212121), linear-gradient(137.48deg, #ffdb3b 10%, #FE53BB 45%, #8F51EA 67%, #0044ff 87%);
    background-origin: border-box;
    background-clip: content-box, border-box;
  }

  #container-stars {
    position: absolute;
    z-index: -1;
    width: 100%;
    height: 100%;
    overflow: hidden;
    transition: 0.5s;
    backdrop-filter: blur(1rem);
    border-radius: 5px;
  }

  strong {
    z-index: 2;
    font-family: 'Avalors Personal Use';
    font-size: 180%;
    letter-spacing: 5px;
    color: #FFFFFF;
    text-shadow: 0 0 4px white;
  }

  #glow {
    position: absolute;
    display: flex;
    width: 12rem;
  }

  .circle-uudai {
    width: 100%;
    height: 30px;
    filter: blur(2rem);
    animation: pulse_3011 4s infinite;
    z-index: -1;
  }

  .circle-uudai:nth-of-type(1) {
    background: rgba(254, 83, 186, 0.636);
  }

  .circle-uudai:nth-of-type(2) {
    background: rgba(142, 81, 234, 0.704);
  }

  .btn-uudai:hover #container-stars {
    z-index: 1;
    background-color: #212121;
  }

  .btn-uudai:hover {
    transform: scale(1.1)
  }

  .btn-uudai:active {
    border: double 4px #FE53BB;
    background-origin: border-box;
    background-clip: content-box, border-box;
    animation: none;
  }

  .btn-uudai:active .circle-uudai {
    background: #FE53BB;
  }

  #stars {
    position: relative;
    background: transparent;
    width: 200rem;
    height: 200rem;
  }

  #stars::after {
    content: "";
    position: absolute;
    top: -10rem;
    left: -100rem;
    width: 100%;
    height: 100%;
    animation: animStarRotate 90s linear infinite;
  }

  #stars::after {
    background-image: radial-gradient(#ffffff 1px, transparent 1%);
    background-size: 50px 50px;
  }

  #stars::before {
    content: "";
    position: absolute;
    top: 0;
    left: -50%;
    width: 170%;
    height: 500%;
    animation: animStar 60s linear infinite;
  }

  #stars::before {
    background-image: radial-gradient(#ffffff 1px, transparent 1%);
    background-size: 50px 50px;
    opacity: 0.5;
  }

  @keyframes animStar {
    from {
      transform: translateY(0);
    }

    to {
      transform: translateY(-135rem);
    }
  }

  @keyframes animStarRotate {
    from {
      transform: rotate(360deg);
    }

    to {
      transform: rotate(0);
    }
  }

  @keyframes gradient_301 {
    0% {
      background-position: 0% 50%;
    }

    50% {
      background-position: 100% 50%;
    }

    100% {
      background-position: 0% 50%;
    }
  }

  @keyframes pulse_3011 {
    0% {
      transform: scale(0.75);
      box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.7);
    }

    70% {
      transform: scale(1);
      box-shadow: 0 0 0 10px rgba(0, 0, 0, 0);
    }

    100% {
      transform: scale(0.75);
      box-shadow: 0 0 0 0 rgba(0, 0, 0, 0);
    }
  }

  .ct_t4 {
    width: 100%;
    margin: 10px 0 20px 0;
    cursor: pointer;
  }

  .ct_t4:hover {
    transform: scale(1.1);
    transition: transform 0.3s ease;
  }



  .img-row {
    width: 100%;
    margin-top: 20px;
    height: 80%;
  }

  .img-row:hover {
    transform: scale(1.2);
    transition: transform 0.3s ease;
  }

/* The san pham */
.col-card {
  width: 250px; 
  margin: 20px 0 20px 0;
  height: 390px;
}

.card {
  position: relative;
  height: 400px; 
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

/* Kích thước cơ bản */
.product-bt {
    margin-top: 20px;
    height: 360px;
    width: 640px;
}

@media (max-width: 1400px) {
    .product-bt {
        height: 250px;  
        width: 550px;   
    }
}

@media (max-width: 1200px) {
    .product-bt {
        height: 200px;  
        width: 460px;   
    }
}

@media (max-width: 1000px) {
    .product-bt {
        height: 200px;  
        width: 450px;   
    }
}

@media (max-width: 900px) {
    .product-bt {
        height: 180px;  
        width: 330px;   
    }
}

@media (max-width: 767px) {
    .product-bt {
        height: 180px;  
        width: 250px;   
    }
}

@media (max-width: 479px) {
    .product-bt {
        height: 150px;  
        width: 180px;   
    }
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

 