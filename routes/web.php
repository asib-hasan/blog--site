<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Registration
Route::get('register',[AuthController::class,'register']);
Route::post('registerPost',[AuthController::class,'registerPost']);

//Login
Route::get('login',[AuthController::class,'login']);
Route::post('loginPost',[AuthController::class,'loginPost']);

Route::middleware('auth.check')->group(function () {

    Route::get('user/blogListingPage',[AuthController::class,'BlogListingPage']);
    Route::get('user/add-new-blog',[PostController::class,'add']);
    Route::any('user/save-post',[PostController::class,'insert']);
    Route::get('user/edit-post/{id}',[PostController::class,'edit']);
    Route::get('user/search-post',[PostController::class,'search']);
    Route::get('user/logout',[AuthController::class,'logout']);
});