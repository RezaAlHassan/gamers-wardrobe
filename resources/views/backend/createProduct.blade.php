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
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    
   <div class="col-md-6 offset-md-3 mt-5">
    <a target="_blank" href="https://getform.io?ref=codepenHTML">
       <img src='https://i.imgur.com/O1cKLCn.png'>
     </a>
     <br>
     <a target="_blank" href="https://getform.io?ref=codepenHTML" class="mt-3 d-flex">Getform.io |  Get your free endpoint now</a>
     <h1>Getform.io HTML Form Example with File Upload</h1>
     <form accept-charset="UTF-8" action='/products/createProduct' method="POST" enctype="multipart/form-data" target="_blank">
      @csrf
       <div class="form-group">
         <label for="exampleInputName">product name</label>
         <input type="text" name="product_name" class="form-control" id="product_name" placeholder="product name">
       </div>
       <div class="form-group">
         <label for="exampleInputEmail1" required="required">Description</label>
         <input type="text" name="product_description" class="form-control" id="exampleInputEmail1"  placeholder="description">
       </div>
       <div class="form-group">
        <label for="exampleInputEmail1" required="required">Price</label>
        <input type="number" name="product_price" class="form-control" id="exampleInputEmail1"  placeholder="price" >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" required="required">Quantity M</label>
        <input type="number" name="quantity_m" class="form-control" id="exampleInputEmail1"  placeholder="q - m">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" required="required">Quantity L </label>
        <input type="number" name="quantity_l" class="form-control" id="exampleInputEmail1"  placeholder="q - l">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1" required="required">Quantity XL /label>
        <input type="number" name="quantity_xl" class="form-control" id="exampleInputEmail1"  placeholder="quantity xl">
      </div>
       <hr>
       <div class="form-group mt-3">
         <label class="mr-2">Upload thumbnail/main image:</label>
         <input type="file" name="main_image">
       </div>
       <hr>
       <div class="form-group mt-3">
         <label class="mr-2">Upload other images:</label>
         <input type="file" name="other_images">
       </div>
       <hr>
       <button type="submit" class="btn btn-primary">Submit</button>
     </form>
 </div> 
 

    
  </main>
</body>
</html>