<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectAuthenticatedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next): Response
    {    // Check if the user has the 'admin' role
        if (Auth::check() && Auth::user()->role == "Admin") {

            // return redirect;
            return redirect()->route( route: 'admin.dashboard');
           
             // Check if the user has the 'admin' role
        } elseif (Auth::check() && Auth::user()->role == "User") {

               // return redirect;
                return redirect()->route( route: 'author.dashboard');
        }
        return $next($request);
    }
}
