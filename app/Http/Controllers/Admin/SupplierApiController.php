<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;

class SupplierApiController extends Controller
{
     public function store(Request $request)  
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:suppliers',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg,tiff,bmp,webp',
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
        $supplier->image = $imageName;
        $supplier->save();



        return response()->json([
            'success' => true,
            'message' => 'supplier registered successfully',
            'supplier' => $supplier,
        ]);
    }
}
