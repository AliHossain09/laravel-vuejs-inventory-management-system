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

    public function superAdminDashboard()
    {
        return view('superAdmin.dashboard'); 
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
    
// Employee
     public function createEmployee() {
        return view('admin.employees.create');
    }

    public function indexEmployee() {
        return view('admin.employees.index');
    }

    public function editEmployee($id) {
        return view('admin.employees.edit', compact('id'));
    }

    public function showEmployee($id) {
        return view('admin.employees.show', compact('id'));
    }

// Suppliers
     public function createSupplier() {
        return view('admin.suppliers.create');
    }

     public function indexSupplier() {
        return view('admin.suppliers.index');
    }

    public function editSupplier($id) {
        return view('admin.suppliers.edit', compact('id'));
    }

    public function showSupplier($id) {
        return view('admin.suppliers.show', compact('id'));
    }

    //shop
      public function indexShop()
    {
        return view('admin.shop.index');
    }

    public function createShop()
    {
        return view('admin.shop.create');
    }

    public function editShop($id)
    {
        return view('admin.shop.edit', compact('id'));
    }
    public function showShop($id) {
        return view('admin.shop.show', compact('id'));
    }

    // Product
     public function createProduct() {
        return view('admin.product.create');
    }

     public function indexProduct() {
        return view('admin.product.index');
    }

    public function editProduct($id) {
        return view('admin.product.edit', compact('id'));
    }

    public function showProduct($id) {
        return view('admin.product.show', compact('id'));
    }
    
}
