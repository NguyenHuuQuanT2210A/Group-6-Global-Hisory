<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
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

Route::get('/',[HomeController::class,"index"]);


Route::get('/blog',[HomeController::class,"blog"]);
Route::get('/category',[HomeController::class,"categoryList"]);
Route::get('/category/{category:slug}',[HomeController::class,"categoryChild"]);
Route::get('/single/{post:slug}',[HomeController::class,"blogDetail"]);

Route::get('/event',[HomeController::class,"event"]);
Route::get('/blog_event',[HomeController::class,"blogEvent"]);
Route::get('/about_us',[HomeController::class,"aboutUs"]);
Route::get('/contact',[HomeController::class,"contact"]);



Route::get('/create_blog',[PostController::class,"create"]);
Route::post('/create_blog',[PostController::class,"store"]);



Route::middleware(["auth","is_admin"])->prefix("admin")->group(function (){
    include_once "admin.php";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
