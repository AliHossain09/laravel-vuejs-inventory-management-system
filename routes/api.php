<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('posts')->group(function () {
    Route::get('/', [AuthController::class, 'index']); 
    Route::post('/', [AuthController::class, 'store']);        
    Route::get('/{id}', [AuthController::class, 'edit']);        
    Route::get('/{id}', [AuthController::class, 'showSingle']);      
    Route::post('/{id}', [AuthController::class, 'update']);   
    Route::delete('/{id}', [AuthController::class, 'destroy']); 
});