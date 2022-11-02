<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\BlogCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\BlogPostController;

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

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');


// Admin All Route
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');

});


// Blog Category All Route
Route::controller(BlogCategoryController::class)->group(function(){
    Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
    
    Route::get('/add/blog/category','AddBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category','StoreBlogCategory')->name('store.blog.category');

    Route::get('/edit/blog/{BlogCategory}/category','EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}','UpdateBlogCategory')->name('update.blog.category');

    Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');
    
});

// Blog  Route
Route::controller(BlogPostController::class)->group(function(){
    Route::get('/all/post','AllPost')->name('all.blog.post');
    
    Route::get('/add/post','AddPost')->name('add.blog.post');
    Route::post('/store/post','StorePost')->name('store.blog.post');

    Route::get('/edit/post/{Blog}','EditBlogPost')->name('edit.blog.post');
    Route::get('/delete/post/{id}','DeleteBlogPost')->name('delete.blog.post');

    
});

require __DIR__.'/auth.php';
