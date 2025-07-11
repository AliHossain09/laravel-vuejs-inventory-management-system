<?php

namespace App\Http\Controllers\Auth;
use Spatie\Image\Image;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
     public function index()   // API: List all posts
    {
        $posts = User::all();
        return response()->json(
            [
                'success' => true,
                'postsIndex' => $posts
            ]
        );
    }


    public function store(Request $request)  // API: Store new post
    {
        // Validate the request data
        $request->validate([
            'postTitle' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable',
            'body' => 'required|string',

        ]);
        // Check if an image is uploaded
        if (isset($request->image)) {
            // Save the image with a unique name and the original file extension
            $imageName = $request->postTitle . '_' . time() . '.' . $request->image->extension();

            // Define the path for the post images
            $postImagePath = public_path('postImages');

            // Create folder if doesn't exist
            if (!File::exists($postImagePath)) {
            File::makeDirectory($postImagePath, 0755, true);
}

            // Resize the image to 800x600 and save it
            Image::load($request->image->path())
            ->resize(1600, 1066)
            ->save($postImagePath . '/' . $imageName);
        } else {
            // If no uploaded image, keep the default image name 'default.png'
            $imageName = 'default.png';
        }

       

        // Create a new post instance
        // $post = new Post();
        // $post->user_id = Auth::id();
        // $post->title = $request->postTitle;
        // $post->slug =  $slug;
        // $post->image = $imageName; // Default image
        // $post->body = $request->body;

        

      

        // Redirect to the index page with success message
      
        


        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $post = new User();
        $post->title = $request->title;
        $post->description = $request->description;


        if ($request->hasFile('image')) {
            $imageName = $request->title . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('postImages'), $imageName);
        } else {
            $imageName = 'PostImage.png';
        }

        $post->image = $imageName;
         // Save the post
        $post->save();

        return response()->json([
            'success' => true
        ]);
    }


    public function edit($id)  // API: Edit post
    {
        $posts = User::findOrFail($id);
        return response()->json(
            [
                'postsIndex' => [
                    'title' => $posts->title,
                    'description' => $posts->description,
                    'image' => asset('postImages/' . $posts->image), // ✅ Full image URL
                ],
                'success' => true,
                // 'postsIndex' => $posts
            ]
        );
    }

    public function update(Request $request, $id)  // API: Update post
    {
        // Validate the request data
        $request->validate([
            'postTitle' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'tags' => 'nullable',
            'body' => 'required|string',
        ]);

        // // Check if an image is uploaded
        // if (isset($request->image)) {
        //     // Save the image with a unique name and the original file extension
        //     $imageName = $request->postTitle . '_' . time() . '.' . $request->image->extension();

        //     // Define the path for the post images
        //     $postImagePath = public_path('postImages');

        //     // Delete the old image if it exists
        //     if ($post->image != $imageName && file_exists($postImagePath.'/'.$post->image)) {
        //         unlink($postImagePath.'/'.$post->image);

        //         // Resize the image to 800x600 and save it
        //     Image::load($request->image->path())->resize(1600, 1066)->save($postImagePath . '/' . $imageName);
        //     }

            
        // } else {
        //     // If no uploaded image, keep the existing image name
        //     $imageName = $post->image;
        // }

        // // Update the post details
        // $post->title = $request->postTitle;
        // $post->slug = Str::slug($request->postTitle, '-');
        // $post->image = $imageName; // Updated image
        // $post->body = $request->body;

        // if (isset($request->status)) {
        //     $post->status = true; // If status is set, mark as published
        // } else {
        //     $post->status = false; // If status is not set, mark as draft
        // }
        // $post->is_approved = false; // Automatically approve the post
        
        // // Save the updated post
        // $post->save();

        

        
    
        
        
        
        
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $post = User::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;

        $deleteOldImage = 'postImages/' . $post->image;

        if ($request->hasFile('image')) {
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }

            $imageName = $request->title . '-' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('postImages'), $imageName);
            $post->image = $imageName;
        }

        $post->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function showSingle($id)  // API: Show single post
    {
        $post = User::findOrFail($id);
        return response()->json([
            'success' => true,
            'post' => $post
        ]);
    }

    public function destroy($id)   // API: Delete post
    {
        
        //  // Check if the post belongs to the authenticated user
        // if ($post->user_id != Auth::id()) {
        //     return redirect()->route('author.post.index')->with('error', 'You do not have permission to delete this post.');
        // }
        // // Check if the user is authenticated and has author access
        // if (!Auth::check() || Auth::User()->role->id != 2) {
        //     return redirect()->route('login')->with('error', 'You do not have author access.');
        // }
        // // Check if the post exists
        // if (!$post) {
        //     return redirect()->route('author.post.index')->with('error', 'Post not found.');
        // }
        // // Check if the post is already deleted
        // if ($post->deleted_at) {
        //     return redirect()->route('author.post.index')->with('error', 'Post is already deleted.');
        // }
        //  // Delete the post image from the server
        // $postImagePath = public_path('postImages');
        // if (file_exists($postImagePath . '/' . $post->image)) {
        //     unlink($postImagePath . '/' . $post->image);
        // }
        // // Detach/Remove the categories and tags associated with the post
        // // If the post has categories, delete them
        // $post->categories()->detach();
        // // If the post has tags, delete them
        // $post->tags()->detach();

        // // Delete the post from the database
        // $post->delete();

        
        
        
        $post = User::findOrFail($id);
        $deleteOldImage = 'userImages/' . $post->image;

        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }

        $post->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
