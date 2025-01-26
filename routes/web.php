<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'showUser'])->name("user.show")->middleware('auth');

Route::controller(AuthController::class)->group(function(){

    Route::get("/register", "register")->name("user.register")->middleware('OnlyGuest');
    Route::get("/login", "login")->name("login")->middleware('OnlyGuest');

    Route::get("/logout", "logout")->name("logout")->middleware('auth');
});
