<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin;
use App\Http\Controllers\Post;

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

Route::get('/',[Admin::class,'login'])->name('login');

Route::post('login',[Admin::class,'do_login'])->name('do_login');

Route::middleware('loggedUser')->group(function(){
    Route::get('posts',[Post::class,'index'])->name('posts');
    Route::match(['get','post'],'add-post',[Post::class,'add'])->name('add_post');
    Route::get('view-post{post_id}',[Post::class,'view'])->name('view_post');
    Route::match(['get','post'],'edit-post{post_id}',[Post::class,'edit'])->name('edit_post');
    Route::get('delete-post{post_id}',[Post::class,'delete'])->name('delete_post');

    Route::get('logout',[Admin::class,'logout'])->name('logout');
});

