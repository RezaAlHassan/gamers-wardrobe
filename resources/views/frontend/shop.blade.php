<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GW: Shop</title>
    <link rel="stylesheet"  href="css/shop-styles.css">
    <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Press+Start+2P">
    <link rel="icon" type="image/x-icon" href="media/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <header>
        <img class="logo " width="140px" src={{ asset("media/logo-gw.png")}} >
        <h1 style="font-size: 5em; margin-right: 5%;">SHOP</h1>
        <div class="flexbox-container">
        <h3><a href="#">Home</a></a></h3>
        <h3><a href="#">Login</a></a></h3>
        <h3><a href="#">Cart</a></a></h3>
        <h3><a href="#">About</a></a></h3>
      </div>
      </header>

      <div class="carousel">
      @foreach($products as $product)
        <div class="carousel-item">
          <div class="carousel-box">
            <div class="flexbox-column">
            <div class="title">Details</div>
            <div class="num">{{$product->product_name}}</div>
            </div>
            <img class="card-image" src="{{asset('uploads/' . $product->main_image) }}" alt="Product Image" />
          </div>
        </div>
      @endforeach
      </div>
      <ul class="social">
        <li><a href="#"><img src={{asset("media/facebook.png" )}} width="50em"></a></li>
        <li><a href="#"><img src={{asset("media/instagram.png" )}} width="50em"></a></li>
        <li><a href="#"><img src={{asset("media/mail.png" )}} width="55em"></a></li>
      </ul>
      
     
     <script >

     /*--------------------
Vars
--------------------*/
let progress = 50
let startX = 0
let active = 0
let isDown = false

/*--------------------
Contants
--------------------*/
const speedWheel = 0.02
const speedDrag = -0.1

/*--------------------
Get Z
--------------------*/
const getZindex = (array, index) => (array.map((_, i) => (index === i) ? array.length : array.length - Math.abs(index - i)))

/*--------------------
Items
--------------------*/
const $items = document.querySelectorAll('.carousel-item')
const $cursors = document.querySelectorAll('.cursor')

const displayItems = (item, index, active) => {
  const zIndex = getZindex([...$items], active)[index]
  item.style.setProperty('--zIndex', zIndex)
  item.style.setProperty('--active', (index-active)/$items.length)
}

/*--------------------
Animate
--------------------*/
const animate = () => {
  progress = Math.max(0, Math.min(progress, 100))
  active = Math.floor(progress/100*($items.length-1))
  
  $items.forEach((item, index) => displayItems(item, index, active))
}
animate()

/*--------------------
Click on Items
--------------------*/
$items.forEach((item, i) => {
  item.addEventListener('click', () => {
    progress = (i/$items.length) * 100 + 10
    animate()
  })
})
     </script>

</body>
</html>