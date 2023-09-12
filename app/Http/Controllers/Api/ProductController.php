<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function productsTableView()
    {
        
        $products = Product::all();
        return response()->json(['products' => $products]);
       
    }

    public function storeProduct(Request $request)
    {
        $otherImageNames = [];
        
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric',
            'quantity_m' => 'required|integer',
            'quantity_l' => 'required|integer',
            'quantity_xl' => 'required|integer',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
            'other_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $totalQuantity = (
            $request->input('quantity_m') +
            $request->input('quantity_l') +
            $request->input('quantity_xl')
        );
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
        } else {
            // Handle the case where no image is uploaded
            $imageName = 'no-image';
        }

        if ($request->hasFile('other_images')) {
            $otherImages = $request->file('other_images');
        
            foreach ($otherImages as $otherImage) {
                $otherImageName = time() . '_' . $otherImage->getClientOriginalName();
                $otherImage->move(public_path('uploads'), $otherImageName);
                $otherImageNames[] = $otherImageName;
            }
        }
        
        $product = Product::create([
            'name' => $request->input('product_name'),
            'description' => $request->input('product_description'),
            'price' => $request->input('product_price'),
            'quantity_m' => $request->input('quantity_m'),
            'quantity_l' => $request->input('quantity_l'),
            'quantity_xl' => $request->input('quantity_xl'),
            'total_quantity' => $totalQuantity, // Set the total quantity from the calculated value
            'main_image' => $imageName, // Store the image file name in the database
            'other_images' => json_encode($otherImageNames),
        ]);
    
        return response()->json($product, 201);
    }
   
   public function updateProductView()
   {
       return view('backend.editProduct');
   }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->all();

        $product->update($data);

        return response()->json($product);
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return response()->json(null, 204);
    }

}
