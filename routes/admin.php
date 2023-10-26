<?php


use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[\App\Http\Controllers\admin\AdminController::class,"dashboard"]);
Route::get('/user',[\App\Http\Controllers\admin\AdminController::class,"user"]);


Route::prefix("/category")->group(function (){
    Route::get("/", [\App\Http\Controllers\admin\CategoryController::class, "index"]);
    Route::get("/create", [\App\Http\Controllers\admin\CategoryController::class, "create"]);
    Route::post("/create", [\App\Http\Controllers\admin\CategoryController::class, "store"]);
    Route::get("/edit/{category}", [\App\Http\Controllers\admin\CategoryController::class, "edit"]);
    Route::put("/edit/{category}", [\App\Http\Controllers\admin\CategoryController::class, "update"]);
    Route::delete("/delete/{category}", [\App\Http\Controllers\admin\CategoryController::class, "delete"]);
});


Route::prefix("/post")->group(function (){
    Route::get("/", [\App\Http\Controllers\admin\CategoryController::class, "index"]);
});
