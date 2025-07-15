<?php

// app/Http/Controllers/ViewController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ViewController extends Controller
{
    public function userLogin()
    {
        return view('auth.login');
    }

    public function adminDashboard()
    {
        return view('admin.dashboard'); 
    }
    public function authorDashboard()
    {
        return view('author.dashboard'); 
    }

    public function forgot()
    {
        return view('auth.forgot'); 
    }

     public function forgotPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(65); 

        DB::table("password_forgot")->insert([
            "email" => $request->email,
            "token" =>  $token,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        Mail::send("email.forgot", ["token" => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject("Forgot Password");
        });
        return redirect()->route("user.login")->with("success", "we have sent email for reset password.");
    }

    

    public function resetPassword($token)
    {
        return view('auth.resetPassword', compact("token")); 
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

         $first = DB::table("password_forgot")->where( "email", $request->email)
            ->where("token", $request->token)
            ->first();

            if(is_null($first)){
                return back()->with("error", "something is wrong");
            }

            $user = User::where("email", $request->email)->first();

            $user->password = Hash::make($request->password);
             $user->save();

             $first = DB::table("password_forgot")->where( "email", $request->email)
            ->where("token", $request->token)
            ->delete();
            return redirect()->route("user.login")->with("success", "Reset password sucessfully.");

      
    
    }


    

    public function userIndex()
    {
        return view(); 
    }

    public function userEdit()
    {
        return view();  
    }

    public function userShow()
    {
        return view(); 
    }

    

    
}
