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
        <img class="logo " width="120px" src={{ asset("media/logo-gw.png")}} >
        <h1 style="margin-right: 5%;">SHOP</h1>
        <div class="flexbox-container">
        <h3><a href="#">Home</a></a></h3>
        <h3><a href="#">Login</a></a></h3>
        <h3><a href="#">Cart</a></a></h3>
        <h3><a href="#">About</a></a></h3>
      </div>
      </header>

      <div class="slider">
        <div class="slider-wrapper flex">
          @foreach ($products as $product)
              
          <div class="slide flex">
            <div class="slide-image slider-link prev"><img src={{ asset("uploads/".$product->main_image)}}></div>
            <div class="slide-content">
              <div class="slide-date">30.07.2017.</div>
              <div class="slide-title">{{$product->product_name}}</div>
              <div class="slide-text">Lorem ipsum dolor sit amet, ad est abhorreant efficiantur, vero oporteat apeirian in vel. Et appareat electram appellantur est. Ei nec duis invenire. Cu mel ipsum laoreet, per rebum omittam ex. </div>
              <div class="slide-more">READ MORE</div>
            </div>	
          </div>
          @endforeach
        </div>
        <div class="arrows">
        <a href="#" title="Previous" class="arrow slider-link prev"></a>
        <a href="#" title="Next" class="arrow slider-link next"></a>
        </div>
        </div>
      
      <ul class="social">
        <li><a href="#"><img src={{asset("media/facebook.png" )}} width="50em"></a></li>
        <li><a href="#"><img src={{asset("media/instagram.png" )}} width="50em"></a></li>
        <li><a href="#"><img src={{asset("media/mail.png" )}} width="55em"></a></li>
      </ul>
      
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<script>
( function($) {
  
  $(document).ready(function() {
    
    var s           = $('.slider'),
        sWrapper    = s.find('.slider-wrapper'),
        sItem       = s.find('.slide'),
        btn         = s.find('.slider-link'),
        sWidth      = sItem.width(),
        sCount      = sItem.length,
        slide_date  = s.find('.slide-date'),
        slide_title = s.find('.slide-title'),
        slide_text  = s.find('.slide-text'),
        slide_more  = s.find('.slide-more'),
        slide_image = s.find('.slide-image img'),
        sTotalWidth = sCount * sWidth;
    
    sWrapper.css('width', sTotalWidth);
    sWrapper.css('width', sTotalWidth);
    
    var clickCount  = 0;
    
    btn.on('click', function(e) {
      e.preventDefault();

      if( $(this).hasClass('next') ) {
        
        ( clickCount < ( sCount - 1 ) ) ? clickCount++ : clickCount = 0;
      } else if ( $(this).hasClass('prev') ) {
        
        ( clickCount > 0 ) ? clickCount-- : ( clickCount = sCount - 1 );
      }
      TweenMax.to(sWrapper, 0.4, {x: '-' + ( sWidth * clickCount ) })


      //CONTENT ANIMATIONS

      var fromProperties = {autoAlpha:0, x:'-50', y:'-10'};
      var toProperties = {autoAlpha:0.8, x:'0', y:'0'};

      TweenLite.fromTo(slide_image, 1, {autoAlpha:0, y:'40'}, {autoAlpha:1, y:'0'});
      TweenLite.fromTo(slide_date, 0.4, fromProperties, toProperties);
      TweenLite.fromTo(slide_title, 0.6, fromProperties, toProperties);
      TweenLite.fromTo(slide_text, 0.8, fromProperties, toProperties);
      TweenLite.fromTo(slide_more, 1, fromProperties, toProperties);

    });
          
  });
})(jQuery);

$('.overlay').addClass('overlay-blue');
</script>
</body>
</html>