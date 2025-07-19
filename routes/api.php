<?php

use App\Http\Controllers\Admin\EmployeeApiController;
use App\Http\Controllers\Admin\EmployeeController;
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

Route::get('/suppliers', [SupplierApiController::class, 'index']);
Route::post('/suppliers', [SupplierApiController::class, 'store']);

// Route::post('/employees', [EmployeeController::class, 'store']);
// Route::get('/employees', [EmployeeController::class, 'index']);