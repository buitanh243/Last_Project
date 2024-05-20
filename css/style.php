<!-- @import url(./bocucchinh.css);


.figure {
    margin: 0;
}
/* the khuyen mai */
.card-km {
  position: relative;
  width: 100%;
  height: 100%;
  margin-left: 20px;
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
  /* border-radius: 10px; */
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
  background-color: orangered;
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
  /* you can put img url here  */
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
    background-image: linear-gradient(#212121, #212121),  linear-gradient(137.48deg, #ffdb3b 10%,#FE53BB 45%, #8F51EA 67%, #0044ff 87%);
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
    font-size: 180%; /* Chỉnh kích thước font về 80% */
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
    transform: scale(1.2); /* Scale lên 120% */
    transition: transform 0.3s ease;
  }

  /* The san pham */
  .card {

    margin-top: 20px;
    position: relative;
    width: 100%;
    height: 16.5em;
    box-shadow: 0px 1px 13px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: all 120ms;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fff;
    padding: 0.5em;
    padding-bottom: 3.4em;
  }
  
  .card::after {
    content: "Add to Cart";
    padding-top: 1.25em;
    padding-left: 1.25em;
    position: absolute;
    left: 0;
    bottom: -60px;
    background: orangered;
    color: #fff;
    height: 2.5em;
    width: 90%;
    transition: all 80ms;
    font-weight: 600;
    text-transform: uppercase;
    opacity: 0;
  }
  
  .card .title {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 0.9em;
    position: absolute;
    left: 0.625em;
    bottom: 1.875em;
    font-weight: 400;
    color: #000;
  }
  
  .card .price {
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    font-size: 0.9em;
    position: absolute;
    left: 0.625em;
    bottom: 0.625em;
    color: #000;
  }
  
  .card:hover::after {
    bottom: 0;
    opacity: 1;
  }
  
  .card:active {
    transform: scale(0.98);
  }
  
  .card:active::after {
    content: "Đã thêm vào giỏ hàng !";
    height: 3.125em;
  }
  
  .text {
    max-width: 55px;
  }
  
  .image {
    background: rgb(241, 241, 241);
    width: 100%;
    height: 100%;
    display: grid;
    place-items: center;
  }
 -->



 <link href="/Last_Project\vendor\bootstrap\css\bootstrap.min.css" type="text/css" rel="stylesheet" />
 <link href="/Last_Project\vendor\fontawesome\css\font-awesome.min.css" type="text/css" rel="stylesheet" />