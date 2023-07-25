<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AuthController,ProfileController,UserController};


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AuthController::class, "getLogin"])->name('getLogin');
Route::post('/admin/login', [AuthController::class, "postLogin"])->name('postLogin');
Route::group(['middleware'=>['admin_auth']],function () {
    Route::get('/admin/dashboard', [ProfileController::class, "dashboard"])->name('dashboard');
    Route::get('/admin/users', [UserController::class, "index"])->name('users.index');
    Route::get('/admin/logout', [UserController::class, "logout"])->name('logout');
});
