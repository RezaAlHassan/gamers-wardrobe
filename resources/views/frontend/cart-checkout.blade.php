<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Basket</title>
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Press+Start+2P">
  <link rel="stylesheet" href="css/cart-styles.css">
</head>

<body>

    <header>
        <img class="logo " src={{ asset("media/logo-gw.png") }}width="120px">
        <h1 style="font-size: 5em; margin-left: 5%;">Cart</h1>
        <div class="flexbox-container">
        <h3><a href="#">Home</a></a></h3>
        <h3><a href="#">Shop</a></a></h3>
        <h3><a href="#">Cart</a></a></h3>
        <h3><a href="#">About</a></a></h3>
      </div>
      </header>
  <main>    

    <div class="basket" style="padding-top:29%">
        
      <div class="basket-module" >
        <label for="promo-code">Enter a promotional code</label>
        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
        <button class="promo-code-cta">Apply</button>
      </div>
      <div class="main-basket" >
      <div class="basket-labels" >
        <ul>
          <li class="item item-head" >Item</li>
          <li class="price" >Price</li>
          <li class="quantity">Quantity</li>
          <li class="subtotal">Subtotal</li>
        </ul>
      </div>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src={{ asset("http://placehold.it/120x166") }}alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <span class="product-name"><span class="item-quantity">4 *</span> Dynasty White</span>
            <p>Navy, Size 18</p>

          </div>
        </div>
        <div class="price" style="position:relative; right:10px;">26.00</div>
        <div class="quantity">
          <input type="number" value="4" min="1" class="quantity-field">
        </div>
        <div class="subtotal">104.00</div>
        <div class="remove">
          <button style="color: white;">Remove</button>
        </div>
      </div>
      <div class="basket-product">
        <div class="item">
          <div class="product-image">
            <img src="http://placehold.it/120x166" alt="Placholder Image 2" class="product-frame">
          </div>
          <div class="product-details">
            <span class="product-name"></span><span class="item-quantity">1</span> * Dark Souls - Ethereal</span>
            <p>Navy, Size 10</p>
          </div>
        </div>
        <div class="price" style="position:relative; right:10px;" >26.00</div>
        <div class="quantity">
          <input type="number" value="1" min="1" class="quantity-field">
        </div>
        <div class="subtotal">26.00</div>
        <div class="remove">
          <button style="color: white;">Remove</button>
        </div>
      </div>
    </div>
</div>
    
    <aside style="padding-top:38%">
      <div class="summary">
        <div class="summary-total-items"><span class="total-items"></span> Items in your Bag</div>
        <div class="summary-subtotal">
          <div class="subtotal-title" >Subtotal</div>
          <div class="subtotal-value final-value" id="basket-subtotal">130.00</div>
          <div class="summary-promo hide">
            <div class="promo-title">Promotion</div>
            <div class="promo-value final-value" id="basket-promo"></div>
          </div>
        </div>
        <div class="summary-delivery">
          <select style="font-size: 8.2px;" name="delivery-collection" class="summary-delivery-selection">
              <option style="font-size: 8.2px;" value="0" selected="selected">Select Collection or Delivery Type</option>
             <option style="font-size: 8.2px;" value="standard_delivery">
              Standard Delivery (3-5 Days)
             </option>
             <option style="font-size: 8.2px;" value="express_delivery">Express Delivery (Within 24 hours)</option>
             <option  style="font-size: 8.2px;" value="collection">Collection from office</option>
          </select>
        </div>
        <div class="summary-total">
          <div class="total-title">Total</div>
          <div class="total-value final-value" id="basket-total">130.00</div>
        </div>
        <div class="summary-checkout">
          <button class="checkout-cta">Go to Secure Checkout</button>
        </div>
      </div>
    </aside>
  </main>
<script>
    /* Set values + misc */
var promoCode;
var promoPrice;
var fadeTime = 300;

/* Assign actions */
$('.quantity input').change(function() {
  updateQuantity(this);
});

$('.remove button').click(function() {
  removeItem(this);
});

$(document).ready(function() {
  updateSumItems();
});

$('.promo-code-cta').click(function() {

  promoCode = $('#promo-code').val();

  if (promoCode == '10off' || promoCode == '10OFF') {
    //If promoPrice has no value, set it as 10 for the 10OFF promocode
    if (!promoPrice) {
      promoPrice = 10;
    } else if (promoCode) {
      promoPrice = promoPrice * 1;
    }
  } else if (promoCode != '') {
    alert("Invalid Promo Code");
    promoPrice = 0;
  }
  //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
  if (promoPrice) {
    $('.summary-promo').removeClass('hide');
    $('.promo-value').text(promoPrice.toFixed(2));
    recalculateCart(true);
  }
});

/* Recalculate cart */
function recalculateCart(onlyTotal) {
  var subtotal = 0;

  /* Sum up row totals */
  $('.basket-product').each(function() {
    subtotal += parseFloat($(this).children('.subtotal').text());
  });

  /* Calculate totals */
  var total = subtotal;

  //If there is a valid promoCode, and subtotal < 10 subtract from total
  var promoPrice = parseFloat($('.promo-value').text());
  if (promoPrice) {
    if (subtotal >= 10) {
      total -= promoPrice;
    } else {
      alert('Order must be more than £10 for Promo code to apply.');
      $('.summary-promo').addClass('hide');
    }
  }

  /*If switch for update only total, update only total display*/
  if (onlyTotal) {
    /* Update total display */
    $('.total-value').fadeOut(fadeTime, function() {
      $('#basket-total').html(total.toFixed(2));
      $('.total-value').fadeIn(fadeTime);
    });
  } else {
    /* Update summary display. */
    $('.final-value').fadeOut(fadeTime, function() {
      $('#basket-subtotal').html(subtotal.toFixed(2));
      $('#basket-total').html(total.toFixed(2));
      if (total == 0) {
        $('.checkout-cta').fadeOut(fadeTime);
      } else {
        $('.checkout-cta').fadeIn(fadeTime);
      }
      $('.final-value').fadeIn(fadeTime);
    });
  }
}

/* Update quantity */
function updateQuantity(quantityInput) {
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;

  /* Update line price display and recalc cart totals */
  productRow.children('.subtotal').each(function() {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });

  productRow.find('.item-quantity').text(quantity);
  updateSumItems();
}

function updateSumItems() {
  var sumItems = 0;
  $('.quantity input').each(function() {
    sumItems += parseInt($(this).val());
  });
  $('.total-items').text(sumItems);
}

/* Remove item from cart */
function removeItem(removeButton) {
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
    updateSumItems();
  });
}
</script>

</body>

</html>

