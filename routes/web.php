<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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
//General routes
Route::controller(PageController::class)->group(function () {
    Route::get("/", "index");
    Route::get("/post-name/{slug}", "details");
});

//Users routes
Route::controller(UserController::class)->group(function () {
    Route::get("Admin/user", "index")->name("user.show");
    Route::get("Admin/user/add", "Add")->name("user.add");
    Route::get("Admin/user/edit/{id}", "Edit")->name("user.edit");
    Route::get("/login", "login")->name("user.login");
});


//Authorization of users routes
Route::controller(UserAuthController::class)->group(function () {
    Route::get("/Admin", "index")->name("auth.index");
    Route::post("/save","storage")->name("auth.save");
    Route::post("/destroy", "destroy")->name("auth.destroy");
});

Route::controller(ApiController::class)->group(function () {
    Route::get("/api/rand3", 'random3');
    Route::get("api/lastblogs", "lastblogs");
    Route::get("/api/all", "all");
    Route::post("api/byname", "getname");

    Route::delete("api/post/{id}", "DelPost")->name("post.destroy");
    Route::post("api/post/", "createPost")->name("post.storage");

    Route::get("api/user/alluser", "allusers")->name("user.all");
    Route::delete("api/user/{id}", "DelUser")->name("user.destroy");
    Route::post("api/user/create", "createUser")->name("user.create");
    Route::put("/api/user/update", "UpdateUser")->name("user.put");

    Route::get("api/post/getcomment/{slug}", "getcomments")->name("comment.get");
    Route::post("api/post/createcomment", "createcomment")->name("comment.post");
    Route::delete("api/post/destroycomment/{id}", "destroycomment")->name("comment.delete");
});

Route::controller(PostController::class)->group(function () {
    Route::get("Admin/post/add", "create")->name("post.add");
    
});