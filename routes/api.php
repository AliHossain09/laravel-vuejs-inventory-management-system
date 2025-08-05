<?php

use App\Http\Controllers\Admin\CategoryApiController;
use App\Http\Controllers\Admin\EmployeeApiController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ProductApiController;
use App\Http\Controllers\Admin\ShopApiController;
use App\Http\Controllers\Admin\SupplierApiController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;






// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


// Route::prefix('user')->group(function () {
//     Route::get('/', [AuthController::class, 'index']); 
//     Route::post('/', [AuthController::class, 'store']);     
//     Route::post('/', [AuthController::class, 'login']);    
//     Route::get('/{id}', [AuthController::class, 'edit']);        
//     Route::get('/{id}', [AuthController::class, 'showSingle']);      
//     Route::post('/{id}', [AuthController::class, 'update']);   
//     Route::delete('/{id}', [AuthController::class, 'destroy']); 
// });

// routes/api.php for Auth
Route::post('/register', [AuthController::class, 'store']); 
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/forgot-password', [AuthController::class, 'forgotPost']);
Route::post('/reset-password', [AuthController::class, 'resetPasswordPost']);


// routes/api.php for Employee
Route::get('/employees', [EmployeeApiController::class, 'index']);
Route::post('/employees', [EmployeeApiController::class, 'store']);
Route::get('/employees/{id}', [EmployeeApiController::class, 'edit']);
Route::put('/employees/{id}', [EmployeeApiController::class, 'update']);
Route::get('/employees/show/{id}', [EmployeeApiController::class, 'show']);
Route::delete('/employees/{id}', [EmployeeApiController::class, 'destroy']);

// routes/api.php for Suppliers
Route::get('/suppliers', [SupplierApiController::class, 'index']);
Route::post('/suppliers', [SupplierApiController::class, 'store']);
Route::get('/suppliers/{id}', [SupplierApiController::class, 'edit']);
Route::put('/suppliers/{id}', [SupplierApiController::class, 'update']);
Route::get('/suppliers/show/{id}', [SupplierApiController::class, 'show']);
Route::delete('/suppliers/{id}', [SupplierApiController::class, 'destroy']);

// routes/api.php for Products
Route::get('/products', [ProductApiController::class, 'index']);
Route::post('/products', [ProductApiController::class, 'store']);
Route::get('/products/{id}', [ProductApiController::class, 'edit']);
Route::put('/products/{id}', [ProductApiController::class, 'update']);
Route::get('/products/show/{id}', [ProductApiController::class, 'show']);
Route::delete('/products/{id}', [ProductApiController::class, 'destroy']);
Route::get('/dropdowns/product-form', [ProductApiController::class, 'getDropdowns']);

// routes/api.php for Categories
Route::get('/categories', [CategoryApiController::class, 'index']);
Route::post('/categories', [CategoryApiController::class, 'store']);
Route::get('/categories/{id}', [CategoryApiController::class, 'edit']);
Route::put('/categories/{id}', [CategoryApiController::class, 'update']);
Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy']);



// routes/api.php for Shops
Route::get('/shops', [ShopApiController::class, 'index']);
Route::post('/shops', [ShopApiController::class, 'store']);
Route::get('/shops/{id}', [ShopApiController::class, 'show']);
Route::put('/shops/{id}', [ShopApiController::class, 'update']);
Route::delete('/shops/{id}', [ShopApiController::class, 'destroy']);
