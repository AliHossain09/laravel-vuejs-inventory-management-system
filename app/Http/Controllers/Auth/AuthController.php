<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Image\Image;

class AuthController extends Controller
{



    public function store(Request $request)  // API: Store new post
    {
        // Validate the request data
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'userName' => 'nullable',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
            'image' => 'nullable |mimes:png,jpg,gift,gpeg,tiff,bmp,webP',
        ]);

        // Check if an image is uploaded
        if (isset($request->image)) {
            // Save the image with a unique name and the original file extension
            $imageName = $request->userName . '_' . time() . '.' . $request->image->extension();

            // Define the path for the post images
            $userImagePath = public_path('userImages');

            // Create folder if doesn't exist
            if (!File::exists($userImagePath)) {
                File::makeDirectory($userImagePath, 0755, true);
            }

            // Resize the image to 800x600 and save it
            Image::load($request->image->path())
                ->resize(400, 400)
                ->save($userImagePath . '/' . $imageName);
        } else {
            // If no uploaded image, keep the default image name 'default.png'
            $imageName = 'default.png';
        }


        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->image = $imageName;
        $user->starting_date = now();
        $user->save();



        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'user' => $user,
        ]);
    }

   
}
 public function login(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Try to login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => $user,
                'redirect' => $user->role === 'admin' ? route('admin.dashboard') : route('client.dashboard')
            ]);
        }

        // Login failed
        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ]);
    }