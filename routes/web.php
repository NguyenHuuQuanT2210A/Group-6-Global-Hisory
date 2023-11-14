<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use \App\Http\Controllers\LikeEventController;
use \App\Http\Controllers\EventController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LikeBlogController;
use App\Http\Controllers\CommentBlogController;
use \App\Http\Controllers\LikeCommentController;
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


Route::prefix("forum")->group(function (){
    Route::get('/',[PostController::class,"forum"]);
    Route::get('/category/{category:slug}',[PostController::class,"forumCategory"]);
    Route::get('/tag/{tag:slug}',[PostController::class,"forumTag"]);
    Route::get('/create_post',[PostController::class,"createPost"]);
    Route::get('/edit_post/{post:slug}',[PostController::class,"editPost"]);
    Route::post('/edit_post/{post}',[PostController::class,"updatePost"]);
    Route::delete('/delete_post/{post}',[PostController::class,"deletePost"]);
    Route::get('/single/{post:slug}',[PostController::class,"singlePost"]);

    Route::middleware(["auth"])->group(function (){
        Route::post('/create_post',[PostController::class,"createPostStore"]);
        Route::post('/post/comment/{post}',[CommentController::class,"postComment"]);
        Route::post('/comment/reply/{comment}/{post}',[CommentController::class,"postCommentReply"]);
        Route::post('/comment/reply/reply/{comment}/{post}',[CommentController::class,"postCommentReply"]);
        Route::delete('/comment/reply/delete/{comment}',[CommentController::class,"deleteCommentReply"]);
        Route::get('/post/like/{post}',[LikeController::class,"likePost"]);
        Route::get('/post/comment/like/{post}/{comment}',[LikeCommentController::class,"likeCommentPost"]);
    });
});


Route::prefix("blog")->group(function (){
    Route::get('/',[BlogController::class,"blog"]);
    Route::get('/category/{category:slug}',[BlogController::class,"categoryBlog"]);
    Route::get('/tag/{tag:slug}',[BlogController::class,"tagBlog"]);
    Route::get('/single/{blog:slug}',[BlogController::class,"blogDetail"]);
    Route::middleware(["auth"])->group(function (){
        Route::post('/post/comment/{blog}',[CommentBlogController::class,"postComment"]);
        Route::post('/comment/reply/{commentBlog}/{blog}',[CommentBlogController::class,"postCommentReply"]);
        Route::post('/comment/reply/reply/{commentBlog}/{blog}',[CommentBlogController::class,"postCommentReply"]);
        Route::delete('/comment/reply/delete/{commentBlog}',[CommentBlogController::class,"deleteCommentReply"]);
        Route::get("/like/{blog}",[LikeBlogController::class,"likeBlog"]);
    });
});


Route::prefix("event")->group(function (){
    Route::get('/',[EventController::class,"event"]);
    Route::get('/single/{event:slug}',[EventController::class,"blogEvent"]);
    Route::middleware(["auth"])->group(function (){
        Route::post('/register/{event}',[EventController::class,"registerEvent"]);
        Route::get('/like/{event}',[LikeEventController::class,"likeEvent"]);
    });
});


Route::get('/about_us',[HomeController::class,"aboutUs"]);
Route::get('/contact',[HomeController::class,"contact"]);


Route::middleware(["auth","is_admin"])->prefix("admin")->group(function (){
    include_once "admin.php";
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
