<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;

class ProductApiController extends Controller
{
    public function index()   // API: List all product
    {
        $products = Product::all();
        return response()->json(
            [
                'success' => true,
                'products' => $products
            ]
        );
    }
    
    public function store(Request $request)  // API: Store new product
    {
        // Validate the request data
        $request->validate([
            'products_name' => 'required',
            'products_code' => 'nullable',
            'category_id' => 'nullable',
            'supplier_id' => 'nullable',
            'buying_price' => 'nullable',
            'buying_date' => 'nullable',
            'selling_price' => 'required',
            'unit' => 'nullable',
            'stock_quantity' => 'required',
            'shop_id' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg,tiff,bmp,webp|max:2048',
        ]);

        // Check if an image is uploaded
        if (isset($request->image)) {
            // Save the image with a unique name and the original file extension
            $imageName = $request->name . '_' . time() . '.' . $request->image->extension();

            // Define the path for the post images
            $productImagePath = public_path('productImages');

            // Create folder if doesn't exist
            if (!File::exists($productImagePath)) {
                File::makeDirectory($productImagePath, 0755, true);
            }

            // Resize the image  and save it
            Image::load($request->image->path())
                ->resize(400, 400)
                ->save($productImagePath . '/' . $imageName);
        } else {
            // If no uploaded image, keep the default image name 'default.png'
            $imageName = 'default.png';
        }

        
        $product = new Product();
        $product->products_name = $request->products_name;
        $product->products_code = $request->products_code;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->buying_price = $request->buying_price;
        $product->buying_date = $request->buying_date;
        $product->selling_price = $request->selling_price;
        $product->unit = $request->unit;
        $product->stock_quantity = $request->stock_quantity;
        $product->shop_id = $request->shop_id;
        $product->image = $imageName;
        $product->save();



        return response()->json([
            'success' => true,
            'message' => 'product registered successfully',
            'product' => $product,
        ]);
    }

    public function edit($id)  // API: Editproduct
     {
         $product = Product::findOrFail($id);
         
         return response()->json([
            'success' => true, 
            'product' => $product
        ]);
         
     }

     public function getDropdowns()  //Dropdown data  fetch
{
    return response()->json([
        'categories' => Category::select('id', 'name')->get(),
        'suppliers' => Supplier::select('id', 'name')->get(),
        'shops' => Shop::select('id', 'name')->get(),
    ]);
}


      public function update(Request $request, $id)  // API: Store updateproduct
    {
        
          // Validate the request data
        $request->validate([
            'products_name' => 'required',
            'products_code' => 'nullable',
            'category_id' => 'nullable',
            'supplier_id' => 'nullable',
            'buying_price' => 'nullable',
            'buying_date' => 'nullable',
            'selling_price' => 'required',
            'unit' => 'nullable',
            'stock_quantity' => 'required',
            'shop_id' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg,tiff,bmp,webp|max:2048',
        ]);
        
       $product = Product::findOrFail($id);
       
        $product->products_name = $request->products_name;
        $product->products_code = $request->products_code;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->buying_price = $request->buying_price;
        $product->buying_date = $request->buying_date;
        $product->selling_price = $request->selling_price;
        $product->unit = $request->unit;
        $product->stock_quantity = $request->stock_quantity;
        $product->shop_id = $request->shop_id;
        
        

        // Check if an image is uploaded
        if (isset($request->image)) {
            // Save the image with a unique name and the original file extension
            $imageName = $request->name . '_' . time() . '.' . $request->image->extension();

            // Define the path for the post images
            $productImagePath = public_path('productImages');

            // Delete the old image if it exists
            if ($product->image != $imageName && file_exists($productImagePath.'/'.$product->image)) {
                unlink($productImagePath.'/'.$product->image);

            // Resize the image  and save it
            Image::load($request->image->path())
                ->resize(400, 400)
                ->save($productImagePath . '/' . $imageName);
            }
        } else {
            // If no uploaded image, keep the default image name 'default.png'
            $imageName = $product->image;
        }
            
 

        $product->image = $imageName;
        $product->save();



        return response()->json([
            'success' => true,
            'message' => 'product updated successfully',
            'product' => $product,
        ]);
    }

    public function show($id)  // API: Show product
     {
         $product = Product::findOrFail($id);
         return response()->json([
             'success' => true,
             'product' => $product
         ]);
     }


     public function destroy($id)   // API: Deleteproduct
     {
         $product = Product::findOrFail($id);
    
         // Delete the product image from the server
         $productImagePath = public_path('sproductImages');
         if (file_exists($productImagePath . '/' . $product->image)) {
             unlink($productImagePath . '/' . $product->image);
          }
         
         $product->delete();

         return response()->json([
             'success' => true
         ]);
     }
}
