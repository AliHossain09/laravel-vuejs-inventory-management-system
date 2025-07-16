<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthorMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/', [ViewController::class, 'userLogin'])->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('logedIn');
Route::get('/register', [ViewController::class, 'userLogin'])->name('user.register');

Route::get('/forgot', [ViewController::class, 'forgot'])->name('password.forgot');
// Route::post('/forgot', [ViewController::class, 'forgotPost'])->name('password.forgot.post');

Route::get('/forgot/{token}', [ViewController::class, 'resetPassword'])->name('password.forgot.likn');
// Route::post('/resetPassword/submit', [ViewController::class, 'resetPasswordPost'])->name('password.reset.post');

Route::get('/index', [ViewController::class, 'userIndex'])->name('user.index');
Route::get('/edit', [ViewController::class, 'userEdit'])->name('user.edit');
Route::get('/show', [ViewController::class, 'userShow'])->name('user.show');

// Route::post('/reset-password', [AuthController::class, 'resetPasswordPost']);
  
// Route::post('/reset-password', [AuthController::class, 'reset']);  
// Route::get('/forgotPassword', [AuthController::class, 'forgotPassword']);
// Route::post('/reset-password', [AuthController::class, 'reset']);    

  
Route::prefix('admin')->name('admin.')->middleware([AdminMiddleware::class])->group(function () {
        
    Route::get('/dashboard', [ViewController::class, 'adminDashboard'])->name('dashboard');
        
});

  Route::prefix('author')->name('author.')->middleware([AuthorMiddleware::class])->group(function () {
        
        Route::get('/dashboard', [ViewController::class, 'authorDashboard'])->name('dashboard');
       
         
});

 
// Route::get('/logout', [AuthController::class, 'logout']);   