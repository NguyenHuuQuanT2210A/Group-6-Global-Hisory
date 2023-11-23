<?php
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[\App\Http\Controllers\Admin\AdminController::class,"dashboard"]);
Route::get('/user',[\App\Http\Controllers\Admin\AdminController::class,"user"]);

Route::prefix("/category")->group(function (){
    Route::get("/", [\App\Http\Controllers\Admin\CategoryController::class, "index"]);
    Route::get("/create", [\App\Http\Controllers\Admin\CategoryController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\Admin\CategoryController::class, "store"]);
    Route::get("/edit/{category}", [\App\Http\Controllers\Admin\CategoryController::class, "edit"]);
    Route::put("/edit/{category}", [\App\Http\Controllers\Admin\CategoryController::class, "update"]);
    Route::delete("/delete/{category}", [\App\Http\Controllers\Admin\CategoryController::class, "delete"]);
});

Route::prefix("/tag")->group(function (){
    Route::get("/", [\App\Http\Controllers\Admin\TagController::class, "index"]);
    Route::get("/create", [\App\Http\Controllers\Admin\TagController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\Admin\TagController::class, "store"]);
    Route::get("/edit/{tag}", [\App\Http\Controllers\Admin\TagController::class, "edit"]);
    Route::post("/edit/{tag}", [\App\Http\Controllers\Admin\TagController::class, "update"]);
    Route::delete("/delete/{tag}", [\App\Http\Controllers\Admin\TagController::class, "delete"]);
});

Route::prefix("/post")->group(function (){
    Route::get("/", [\App\Http\Controllers\Admin\PostController::class, "listPost"]);
    Route::get("/post_detail/{post:slug}", [\App\Http\Controllers\Admin\PostController::class, "postDetail"]);
    Route::post("/approved_post/{post:slug}", [\App\Http\Controllers\Admin\PostController::class, "postDetailApproved"]);
    Route::post("/unapproved_post/{post:slug}", [\App\Http\Controllers\Admin\PostController::class, "postDetailUnapproved"]);
    Route::delete("/admin/post/delete/{post}", [\App\Http\Controllers\Admin\PostController::class, "delete"]);
});

Route::prefix("/blog")->group(function (){
    Route::get("/", [\App\Http\Controllers\Admin\BlogController::class, "index"]);
    Route::get("/create", [\App\Http\Controllers\Admin\BlogController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\Admin\BlogController::class, "store"]);
    Route::get("/blog_detail/{blog:slug}", [\App\Http\Controllers\Admin\BlogController::class, "blogDetail"]);
    Route::get("/edit/{blog:slug}", [\App\Http\Controllers\Admin\BlogController::class, "edit"]);
    Route::post("/edit/{blog:slug}", [\App\Http\Controllers\Admin\BlogController::class, "update"]);
    Route::delete("/delete/{blog}", [\App\Http\Controllers\Admin\BlogController::class, "delete"]);
});

Route::prefix("/event")->group(function (){
    Route::get("/", [\App\Http\Controllers\Admin\EventController::class, "index"]);
    Route::get("/create", [\App\Http\Controllers\Admin\EventController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\Admin\EventController::class, "store"]);
    Route::get("/edit/{event}", [\App\Http\Controllers\Admin\EventController::class, "edit"]);
    Route::put("/edit/{event}", [\App\Http\Controllers\Admin\EventController::class, "update"]);
    Route::delete("/delete/{event}", [\App\Http\Controllers\Admin\EventController::class, "delete"]);
});
Route::prefix("/mail")->group(function (){
    Route::get("/", [\App\Http\Controllers\Admin\MailController::class, "index"]);
    Route::get("/create", [\App\Http\Controllers\Admin\MailController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\Admin\MailController::class, "store"]);
    Route::get("/edit/{event}", [\App\Http\Controllers\Admin\MailController::class, "edit"]);
    Route::put("/edit/{event}", [\App\Http\Controllers\Admin\MailController::class, "update"]);
    Route::delete("/delete/{event}", [\App\Http\Controllers\Admin\MailController::class, "delete"]);
});
