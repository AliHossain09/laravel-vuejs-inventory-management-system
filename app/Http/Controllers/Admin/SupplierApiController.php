<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;

class SupplierApiController extends Controller
{
    public function index()   // API: List all suppliers
    {
        $suppliers = Supplier::all();
        return response()->json(
            [
                'success' => true,
                'suppliers' => $suppliers
            ]
        );
    }
    
    public function store(Request $request)  // API: Store new suppliers
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:suppliers',
            'phone' => 'required|numeric',
            'address' => 'required',
            'shop_id' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg,tiff,bmp,webp|max:2048',
        ]);

        // Check if an image is uploaded
        if (isset($request->image)) {
            // Save the image with a unique name and the original file extension
            $imageName = $request->name . '_' . time() . '.' . $request->image->extension();

            // Define the path for the post images
            $supplierImagePath = public_path('supplierImages');

            // Create folder if doesn't exist
            if (!File::exists($supplierImagePath)) {
                File::makeDirectory($supplierImagePath, 0755, true);
            }

            // Resize the image  and save it
            Image::load($request->image->path())
                ->resize(400, 400)
                ->save($supplierImagePath . '/' . $imageName);
        } else {
            // If no uploaded image, keep the default image name 'default.png'
            $imageName = 'default.png';
        }

        
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->shop_id = $request->shop_id;
        $supplier->image = $imageName;
        $supplier->save();



        return response()->json([
            'success' => true,
            'message' => 'supplier registered successfully',
            'supplier' => $supplier,
        ]);
    }

    public function edit($id)  // API: Edit supplier
     {
         $supplier = Supplier::findOrFail($id);
         
         return response()->json([
            'success' => true, 
            'supplier' => $supplier
        ]);
         
     }

      public function update(Request $request, $id)  // API: Store update supplier
    {
        
          // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:supplier,email,' . $id,
            'phone' => 'required|numeric',
            'address' => 'required',
            'shop_id' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg,tiff,bmp,webp|max:2048',
        ]);
        
       $supplier = Supplier::findOrFail($id);
       
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->shop_id = $request->shop_id;
        

        // Check if an image is uploaded
        if (isset($request->image)) {
            // Save the image with a unique name and the original file extension
            $imageName = $request->name . '_' . time() . '.' . $request->image->extension();

            // Define the path for the post images
            $supplierImagePath = public_path('supplierImages');

            // Delete the old image if it exists
            if ($supplier->image != $imageName && file_exists($supplierImagePath.'/'.$supplier->image)) {
                unlink($supplierImagePath.'/'.$supplier->image);

            // Resize the image  and save it
            Image::load($request->image->path())
                ->resize(400, 400)
                ->save($supplierImagePath . '/' . $imageName);
            }
        } else {
            // If no uploaded image, keep the default image name 'default.png'
            $imageName = $supplier->image;
        }
            
 

        $supplier->image = $imageName;
        $supplier->save();



        return response()->json([
            'success' => true,
            'message' => 'supplier updated successfully',
            'supplier' => $supplier,
        ]);
    }

    public function show($id)  // API: Show  supplier
     {
         $supplier = Supplier::findOrFail($id);
         return response()->json([
             'success' => true,
             'supplier' => $supplier
         ]);
     }


     public function destroy($id)   // API: Delete supplier
     {
         $supplier = Supplier::findOrFail($id);
    
         // Delete the supplier image from the server
         $supplierImagePath = public_path('supplierImages');
         if (file_exists($supplierImagePath . '/' . $supplier->image)) {
             unlink($supplierImagePath . '/' . $supplier->image);
          }
         
         $supplier->delete();

         return response()->json([
             'success' => true
         ]);
     }
}
