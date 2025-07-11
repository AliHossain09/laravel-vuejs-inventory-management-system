<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthViewController extends Controller
{
     public function userLogin()
    {
        return view('auth.login');
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
