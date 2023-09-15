<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product : GW</title>
<link rel="stylesheet" href={{asset('css/createProduct-styles.css')}}>

</head>
<body>
  <main>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul style="color: red">
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<br>
  
       <img src='{{asset('media/logo-gw.png')}}' height="24" width="24"> 
       <a style="padding-left:10px; " href="/products">Products Table</a>
     </a>
     <br>
     <div class="col-md-6 offset-md-3 mt-5">
     <h1>Update Product</h1>
     <form accept-charset="UTF-8" id="productForm" method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
      @csrf
      @method ('PUT')

      <div class="form-group">
         <label for="exampleInputName">product name</label>
         <input type="text" name="product_name" class="form-control" id="product_name" placeholder="product name" value="{{$product->product_name }}">
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1" required="required">Description</label>
         <input type="text" name="product_description" class="form-control" id="product_description"  placeholder="description" value="{{$product->product_description }}">
       </div>

       <div class="form-group">
        <label for="exampleInputEmail1" required="required">Price</label>
        <input type="number" name="product_price" class="form-control" id="product_price"  placeholder="price" value="{{$product->product_price }}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" required="required">Quantity M</label>
        <input type="number" name="quantity_m" class="form-control" id="quantity_m"  placeholder="q - m" value="{{$product->quantity_m}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" required="required">Quantity L </label>
        <input type="number" name="quantity_l" class="form-control" id="quantity_l" placeholder="q - l" value="{{$product->quantity_l}}">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" required="required">Quantity XL </label>
        <input type="number" name="quantity_xl" class="form-control" id="quantity_xl"  placeholder="quantity xl" value="{{$product->quantity_xl}}">
      </div>
       {{--<div class="form-group">
      <input type="hidden" name="total_quantity" id="total_quantity">
      </div> --}}
       <hr>
       <div class="form-group mt-3">
         <label class="mr-2">Upload thumbnail/main image:</label>
         <input type="file" name="main_image" value="{{$product->main_image}}">
       </div>
       <hr>
       <div class="form-group mt-3">
         <label class="mr-2">Upload other images:</label>
         <input type="file" name="other_images[]" multiple="multiple" value="{{$product->other_images}}">
       </div>
       <hr>
       <button type="submit" id="update" class="btn btn-primary">Submit</button>
     </form>
 </div> 
 <script>
  document.getElementById('delete').addEventListener('click', function () {
  // Assuming you have a button with id "deleteButton" to trigger the deletion

  fetch('/products/' + productId, {
      method: 'DELETE',
  })
  .then(response => response.json())
  .then(data => {
      if (data.redirect) {
          window.location.href = data.redirect; // Redirect to the specified URL
      }
  })
  .catch(error => {
      console.error('Error:', error);
  });
});
    
    </script>
    
  </main>
  <script>
    document.getElementById('update').addEventListener('click', function () {
    // Assuming you have a button with id "deleteButton" to trigger the deletion

    fetch('/products/' + productId, {
        method: 'PUT',
    })
    .then(response => response.json())
    .then(data => {
        if (data.redirect) {
            window.location.href = data.redirect; // Redirect to the specified URL
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
      
      </script>
</body>
</html>