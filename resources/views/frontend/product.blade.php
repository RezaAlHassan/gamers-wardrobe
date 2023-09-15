<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GW</title>
    <link rel="stylesheet" href="css/product-styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Press+Start+2P">
</head>
<body style="background-color: #F85555;">
    <header>
        <img class="logo " src={{ asset("media/logo-gw.png")}} width="120px">
        <h1 style=" color: white; margin-right: 10%;">Dynasty White</h1>
        <div class="flexbox-container">
        <h3><a style="text-decoration: none; color: white;" href="#">Home</a></a></h3>
        <h3><a style="text-decoration: none; color: white;" href="#">Cart</a></a></h3>
        <h3><a style="text-decoration: none; color: white;" href="#">Shop</a></a></h3>
        <h3><a style="text-decoration: none; color: white;" href="#">About</a></a></h3>
      </div>
      </header>
    <main>
        <br><br><br><br><br><br><br><br><br><br><br>
    <div class="product-container">
    <div class="flexbox-column"><img class="product-image" src={{ asset("media/product1.jpg")}} > <p class="text-details">Made of the best quality yarn home-grown cotton and spandex fabrics which is breathable 
        and provides utmost comfort. Best for summer <br><br>Made of : <br>95% Cotton<br> 5% Spandex</p></div> 
    <div class="flexbox-column"><img class="product-image"  src={{ asset("media/product4.jpg")}} ><p class="text-details">Our customers deserve : <br> Instant Delivery<br> 7 days return <br>Color gurantee<br>Dry Washable</p> </div> 
    <div class="flexbox-column"><img class="product-image" src={{ asset("media/product3.jpg")}} ><p class="text-details">Colors Options: <br><br><span class="color">Black</span><br><br><span class="color">White</span></p></div> 
    <div class="flexbox-column"><img class="product-image" src={{ asset("media/Size-Chart.png")}} ><p class="text-details">Size Options: <br><br><span class="color">M</span><br><br><span class="color">L</span><br><br><span class="color">XL</span></p></div> 
    <div class="flexbox-column"><p class="text-details"><span class="color" style="margin-bottom: 10px;">Add to cart</span></p></div>

    </div>

    <ul class="social">
        <li><a href="#"><img src={{ asset("media/facebook.png")}} width="50em"></a></li>
        <li><a href="#"><img src={{ asset("media/instagram.png")}} width="50em"></a></li>
        <li><a href="#"><img src={{ asset("media/mail.png")}} width="55em"></a></li>
      </ul>
    </main>


</body>
</html>