<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Image\Image;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

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
                'user'     => $user, // এখানে image, firstName, lastName আছে
                'redirect' => $user->role === 'Admin' 
                    ? route('admin.dashboard') 
                    : route('author.dashboard')
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

        // Mail::send("email.forgot", ["token" => $token], function($message) use($request){
        //     $message->to($request->email);
        //     $message->subject("Forgot Password");
        // });
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

// public function forgotPost(Request $request)
// {
//     // Validate the request and return JSON error if failed
//     $validator = Validator::make($request->all(), [
//         'email' => 'required|email|exists:users,email',
//     ]);

//     if ($validator->fails()) {
//         return response()->json([
//             'success' => false,
//             'message' => 'Validation error',
//             'errors' => $validator->errors(),
//         ], 422);
//     }

//     // Generate token
//     $token = Str::random(65);

//     // Insert or update token in password_forgot table
//     DB::table("password_forgot")->updateOrInsert(
//         ['email' => $request->email],
//         [
//             "token" => $token,
//             "created_at" => now(),
//             "updated_at" => now(),
//         ]
//     );

//     // Send reset email
//     try {
//         Mail::send("email.forgot", ["token" => $token], function($message) use($request){
//             $message->to($request->email);
//             $message->subject("Forgot Password");
//         });
//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             // 'message' => 'Email could not be sent. Try again later.',
//             'message' => 'এই ইমেইলটি আমাদের রেকর্ডে নেই।',
//             'error' => $e->getMessage()
//         ], 500);
//     }

//     // Success response
//     return response()->json([
//         'success' => true,
//         // 'message' => 'Password reset link has been sent to your email.',
//         'message' => 'রিসেট লিংক আপনার ইমেইলে পাঠানো হয়েছে।'
//     ]);
// }

// public function reset(Request $request)
// {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:8|confirmed',
//     ]);

//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function ($user, $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password),
//                 'remember_token' => Str::random(60),
//             ])->save();

//             event(new PasswordReset($user));
//         }
//     );

//     return $status === Password::PASSWORD_RESET
//         ? response()->json(['message' => 'পাসওয়ার্ড রিসেট সফল হয়েছে!'])
//         : response()->json(['message' => 'রিসেট করা যায়নি।'], 422);
// }

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
 