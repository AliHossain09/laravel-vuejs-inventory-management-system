<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthorMiddleware;
use Illuminate\Support\Facades\Route;



Route::get('/', [ViewController::class, 'userLogin'])->name('user.login');
Route::get('/register', [ViewController::class, 'userLogin'])->name('user.register');
Route::get('/index', [ViewController::class, 'userIndex'])->name('user.index');
Route::get('/edit', [ViewController::class, 'userEdit'])->name('user.edit');
Route::get('/show', [ViewController::class, 'userShow'])->name('user.show');



  
Route::prefix('admin')->name('admin.')->middleware([AdminMiddleware::class])->group(function () {
        
    Route::get('/dashboard', [ViewController::class, 'adminDashboard'])->name('dashboard');
        
});

  Route::prefix('author')->name('author.')->middleware([AuthorMiddleware::class])->group(function () {
        
        Route::get('/dashboard', [ViewController::class, 'authorDashboard'])->name('dashboard');
       
         
});

Route::post('/login', [AuthController::class, 'login']); 
// Route::get('/logout', [AuthController::class, 'logout']);   