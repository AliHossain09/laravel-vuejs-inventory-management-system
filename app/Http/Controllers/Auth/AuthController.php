<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Spatie\Image\Image;

class AuthController extends Controller
{



    public function store(Request $request)  
    {
        // Validate the request data
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'userName' => 'nullable',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'nullable|in:SuperAdmin,Admin,Author',
            'image' => 'nullable|mimes:png,jpg,gif,jpeg,tiff,bmp,webp',
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

            // Resize the image  and save it
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
        $user->role = $request->role ?? 'Author';
        $user->image = $imageName;
        $user->starting_date = now();
        $user->save();



        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'user' => $user,
        ]);
    }

     public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            return response()->json([
                'success'  => true,
                'message'  => 'Login successful',
                'user'     => $user, 
                'redirect' => match ($user->role) {
        'SuperAdmin' => route('superAdmin.dashboard'),
        'Admin'      => route('admin.dashboard'),
        'Author'     => route('author.dashboard'),
        default      => route('user.login'),    // if fail then back
    }
            ]);

            
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }

     public function forgotPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(65);

        DB::table("password_forgot")->updateOrInsert(
            ['email' => $request->email],
            [
                "token" => $token,
                "created_at" => now(),
                "updated_at" => now(),
            ]
        );

        Mail::send("email.forgot", [
    "token" => $token,
    "email" => $request->email
], function($message) use($request){
    $message->to($request->email);
    $message->subject("Forgot Password");
});


        return response()->json([
            'success' => true,
            'message' => 'Password reset link has been sent to your email.'
        ]);
    }


public function resetPasswordPost(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
    ]);

    // check token
    $resetEntry = DB::table("password_forgot")
        ->where("email", $request->email)
        ->where("token", $request->token)
        ->first();

    if (!$resetEntry) {
        return response()->json([
            'success' => false,
            'message' => 'Invalid token or email.',
        ], 403);
    }

    // update password
    $user = User::where("email", $request->email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    // delete token
    DB::table("password_forgot")
        ->where("email", $request->email)
        ->where("token", $request->token)
        ->delete();

    return response()->json([
        'success' => true,
        'message' => 'Password has been reset successfully.',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();

        return response()->json([
            'success' => true,
            'message' => 'Logged out successfully'
        ]);
    }

   
}
 