<?php

// app/Http/Controllers/ViewController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
