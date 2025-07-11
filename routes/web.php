<?php

use App\Http\Controllers\Auth\AuthViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthViewController::class, 'userLogin'])->name('user.login');
Route::get('/register', [AuthViewController::class, 'userLogin'])->name('user.register');
Route::get('/index', [AuthViewController::class, 'userIndex'])->name('user.index');
Route::get('/edit', [AuthViewController::class, 'userEdit'])->name('user.edit');
Route::get('/show', [AuthViewController::class, 'userShow'])->name('user.show');
