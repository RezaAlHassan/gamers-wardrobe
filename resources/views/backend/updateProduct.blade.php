<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product : GW</title>
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
     <form accept-charset="UTF-8" id="productForm" enctype="multipart/form-data">
      @csrf

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
       <button type="submit" onclick="editProduct({{ $product->id }})" class="btn btn-primary">Submit</button>
     </form>
 </div> 
    
  </main>

<script {{--src=asset("redirectionToProductsView.js")--}}>
  function editProduct(productId) {
  document.getElementById('productForm').addEventListener('submit', function (e) {
    //e.preventDefault(); // Prevent the default form submission
    
    formData.append('product_name', document.getElementById('product_name'));
    formData.append('product_description', document.getElementById('product_description').value);
    formData.append('product_price', document.getElementById('product_price').value);
    formData.append('quantity_m', document.getElementById('quantity_m').value);
    formData.append('quantity_l', document.getElementById('quantity_l').value);
    formData.append('quantity_xl', document.getElementById('quantity_xl').value);

    // Create a new FormData object to serialize the form data
    const formData = new FormData(this);
    fetch('/products/updateProduct/${productId}', {
        method: 'PUT',
        body: formData,
    })
    .then((response) => {
        if (response.status === 201) {
            // If the POST request is successful (status code 201 Created),
            // parse the response JSON to get the created product data
            return response.json();
        } else {
            // Handle errors here, such as displaying an error message to the user
            console.error('Failed to update product');
            throw new Error('Failed to update product');
        }
    })
    .then((createdProduct) => {
        // Redirect to the newly created product's page without making another POST request
        window.location.href = '/products' ; // Example redirection
    })
    .catch((error) => {
        // Handle any errors that occurred during the fetch or processing
        console.error('Error:', error);
    });
})
};
</script>

</body>
</html>