<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer's Wardrobe</title>
    <link rel="stylesheet"  href="css/index-styles.css">
    <link rel="icon" type="image/x-icon" href="media/favicon.png">
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Press+Start+2P">
</head>

<body>
    <section class="showcase">
        <header>
          <img class="logo" src={{ asset("media/logo-gw.png")}} width="120px">
          <div  class="toggle"></div>
        </header>
        <video src={{ asset("media/pexels-rodnae-productions.mp4")}} muted loop autoplay></video>
        <div style="color: #FF5555;" class="overlay"></div>
        <div class="text">
          <h2 style="color:#FFf">From Gamers </h2> <br>
          <h3 style="color:#FF5555">For Gamers</h3>

          <a href="/shop">Shop</a>
        </div>
        <ul class="social">
          <li><a href="#"><img src={{ asset("media/facebook.png")}} width="50em"></a></li>
          <li><a href="#"><img src={{ asset("media/instagram.png")}} width="50em"></a></li>
          <li><a href="#"><img src={{ asset("media/mail.png")}} width="55em"></a></li>
        </ul>
      </section>
      <div class="menu">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">Shop</a></li>
          <li><a href="#">Cart</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Login</a></li>
        </ul>
      </div>
    <script> 
        const menuToggle = document.querySelector('.toggle');
        const showcase = document.querySelector('.showcase');
  
        menuToggle.addEventListener('click', () => {
          menuToggle.classList.toggle('active');
          showcase.classList.toggle('active');
        })</script>
</body>
</html>