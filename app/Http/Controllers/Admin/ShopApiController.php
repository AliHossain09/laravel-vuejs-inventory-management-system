<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopApiController extends Controller
{
     public function index()   // API: List all shops
    {
        $shops = Shop::all();
        return response()->json(
            [
                'success' => true,
                'shops' => $shops
            ]
        );
    }


    public function store(Request $request)  // API: Store new shop
    {
        
          // Validate the request data
        $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'phone' => 'nullable',
            // 'admin_id' => 'nullable',
            
        ]);
        
        $shop = new Shop();
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->phone = $request->phone;
        $shop->admin_id = $request->admin_id;
    
        $shop->save();



        return response()->json([
            'success' => true,
            'message' => 'shop created successfully',
            'category' => $shop,
        ]);
    }


    public function edit($id)  // API: Edit shop
     {
         $shop = Shop::findOrFail($id);
         
         return response()->json([
            'success' => true, 
            'shop' => $shop
        ]);
         
     }

      public function update(Request $request, $id)  // API: Store new shop
    {
        
          // Validate the request data
        $request->validate([
            'name' => 'required',
            'address' => 'nullable',
            'phone' => 'nullable',
            // 'admin_id' => 'nullable',
            
        ]);
        
       $shop = Shop::findOrFail($id);
       
        $shop->name = $request->name;
        $shop->address = $request->address;
        $shop->phone = $request->phone;
        $shop->admin_id = $request->admin_id;
    
        $shop->save();



        return response()->json([
            'success' => true,
            'message' => 'shop updated successfully',
            'shop' => $shop,
        ]);
    }

    public function show($id)  // API: Show  shop
     {
         $shop = Shop::findOrFail($id);
         return response()->json([
             'success' => true,
             'shop' => $shop
         ]);
     }


     public function destroy($id)   // API: Delete shop
     {
         $shop = Shop::findOrFail($id);
    
         
         $shop->delete();

         return response()->json([
             'success' => true
         ]);
     }
}
