<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;

class CategoryApiController extends Controller
{

    public function index()   // API: List all categorys
    {
        $categories = Category::all();
        return response()->json(
            [
                'success' => true,
                'categories' => $categories
            ]
        );
    }


    public function store(Request $request)  // API: Store new category
    {
        
          // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            
        ]);
        
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
    
        $category->save();



        return response()->json([
            'success' => true,
            'message' => 'category created successfully',
            'category' => $category,
        ]);
    }


    public function edit($id)  // API: Edit category
     {
         $category = Category::findOrFail($id);
         
         return response()->json([
            'success' => true, 
            'category' => $category
        ]);
         
     }

      public function update(Request $request, $id)  // API: Store new category
    {
        
          // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            
        ]);
        
       $category = Category::findOrFail($id);
       
        $category->name = $request->name;
        $category->description = $request->description;
    
        $category->save();



        return response()->json([
            'success' => true,
            'message' => 'category updated successfully',
            'category' => $category,
        ]);
    }

    public function show($id)  // API: Show  category
     {
         $category = Category::findOrFail($id);
         return response()->json([
             'success' => true,
             'category' => $category
         ]);
     }


     public function destroy($id)   // API: Delete category
     {
         $category = Category::findOrFail($id);
    
         
         $category->delete();

         return response()->json([
             'success' => true
         ]);
     }
}


