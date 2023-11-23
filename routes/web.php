<?php

use App\Http\Controllers\Interact\CommentBlogController;
use App\Http\Controllers\Interact\CommentController;
use App\Http\Controllers\Interact\LikeBlogController;
use App\Http\Controllers\Interact\LikeCommentBlogController;
use App\Http\Controllers\Interact\LikeCommentController;
use App\Http\Controllers\Interact\LikeController;
use App\Http\Controllers\Interact\LikeEventController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\EventController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

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
    Route::post('/edit_post/{post:slug}',[PostController::class,"updatePost"]);
    Route::delete('/delete_post/{post}',[PostController::class,"deletePost"]);
    Route::get('/single/{post:slug}',[PostController::class,"singlePost"]);

    Route::middleware(["auth"])->group(function (){
        Route::post('/create_post',[PostController::class,"createPostStore"]);
        Route::post('/post/comment/{post}',[CommentController::class,"postComment"]);
        Route::post('/comment/reply/{comment}/{post}',[CommentController::class,"postCommentReply"]);
        Route::post('/comment/reply/reply/{comment}/{post}',[CommentController::class,"postCommentReply"]);
        Route::delete('/comment/reply/delete/{comment}/{post}',[CommentController::class,"deleteCommentReply"]);
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
        Route::get('/comment/like/{blog}/{commentBlog}',[LikeCommentBlogController::class,"likeCommentBlog"]);
    });
});


Route::prefix("event")->group(function (){
    Route::get('/',[EventController::class,"event"]);
    Route::get('/category/{category:slug}',[EventController::class,"categoryEvent"]);
    Route::get('/tag/{tag:slug}',[EventController::class,"tagEvent"]);
    Route::get('/single/{event:slug}',[EventController::class,"blogEvent"]);
    Route::middleware(["auth"])->group(function (){
        Route::post('/register/{event}',[EventController::class,"registerEvent"]);
        Route::get('/like/{event}',[LikeEventController::class,"likeEvent"]);
    });
    Route::get('/mail_confirm/{user_events}',[EventController::class,"mailConfirm"]);

});

Route::prefix("payment")->group(function (){
    Route::get('/', [PaymentController::class,"createPayment"]);
        Route::get('/pay', [PaymentController::class,"createPay"]);
        Route::get('/paypal-success',[PaymentController::class,"paypalSuccess"]);
        Route::get('/paypal-cancel',[PaymentController::class,"paypalCancel"]);
    Route::get('/thank-you', [PaymentController::class,"thankYou"]);
    });

Route::get('/about_us',[HomeController::class,"aboutUs"]);
Route::get('/contact',[HomeController::class,"contact"]);


Route::middleware(["auth","is_admin"])->prefix("admin")->group(function (){
    include_once "admin.php";
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
