<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthorMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Support\Facades\Route;


// routes/web.php for Auth
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



//  Route::get('/employee/create', [ViewController::class, 'create'])->name('employee.create');


    

Route::prefix('superAdmin')->name('superAdmin.')->middleware([SuperAdminMiddleware::class])->group(function () {
        
    Route::get('/dashboard', [ViewController::class, 'superAdminDashboard'])->name('dashboard');
        
});


Route::prefix('admin')->name('admin.')->middleware([AdminMiddleware::class])->group(function () {
        
    Route::get('/dashboard', [ViewController::class, 'adminDashboard'])->name('dashboard');
    // routes/web.php for Employee
    Route::get('/employee/create', [ViewController::class, 'createEmployee'])->name('employee.create');
    Route::get('/employee/index', [ViewController::class, 'indexEmployee'])->name('employee.index');
    Route::get('/employee/edit/{id}', [ViewController::class, 'editEmployee'])->name('employee.edit');
    Route::get('/employee/show/{id}', [ViewController::class, 'showEmployee'])->name('employee.show');

    // routes/web.php for Supplier             
    Route::get('/supplier/create', [ViewController::class, 'createSupplier'])->name('supplier.create');
    Route::get('/supplier/index', [ViewController::class, 'indexSupplier'])->name('supplier.index');
    Route::get('/supplier/show/{id}', [ViewController::class, 'showSupplier'])->name('supplier.show');
    Route::get('/supplier/edit/{id}', [ViewController::class, 'editSupplier'])->name('supplier.edit');

    // routes/web.php
    Route::get('/shops/index', [ViewController::class, 'indexShop'])->name('shop.index');
    Route::get('/shops/create', [ViewController::class, 'createShop'])->name('shop.create');
    Route::get('/shops/{id}/edit', [ViewController::class, 'editShop'])->name('shop.edit');
    Route::get('/shop/show/{id}', [ViewController::class, 'showShop'])->name('shop.show');
        
});

  Route::prefix('author')->name('author.')->middleware([AuthorMiddleware::class])->group(function () {
        
        Route::get('/dashboard', [ViewController::class, 'authorDashboard'])->name('dashboard');
       
         
});

 
