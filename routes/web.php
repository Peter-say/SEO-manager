<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Dashboard\ImageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
  return view('welcome');
});

Route::prefix('web')->as('web.')->group( function() {
  Route::get('blog/index/' ,[App\Http\Controllers\Web\BlogController::class, 'index'])->name('blog.index');
  Route::get('blog/{blog:blog_url}' ,[App\Http\Controllers\Web\BlogController::class, 'details'])->name('blog');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->as('dashboard.')->group(function () {
  Route::get('/link-checker', [App\Http\Controllers\Dashboard\WebsiteInspection\LinkCrawlerController::class, 'linkChecker'])->name('link-checker');
  Route::get('/', [App\Http\Controllers\Dashboard\WebsiteInspection\LinkCrawlerController::class, 'getURL'])->name('get-url');

  Route::prefix('users')->as('users.')->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\UsersController::class, 'index'])->name('index');
  });

  // Single User //
  Route::prefix('user')->as('user.')->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\User\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [App\Http\Controllers\Dashboard\User\ProfileController::class, 'update'])->name('profile.update');
  });

  Route::resource('/file-upload', ImageController::class);
});

Route::resource('blog', BlogController::class);
Route::resource('category', CategoryController::class);
Route::resource('comments', CommentController::class);

Route::get('category' , [App\Http\Controllers\CategoryController::class , 'categoryBlogs'])->name('category.blogs');
Route::get('blogs', [App\Http\Controllers\Web\BlogController::class, 'index'])->name('blogs');
Route::get('search' , [App\Http\Controllers\BlogController::class , 'search'])->name('blog.search');
Route::get('blog_url/{id}' , [App\Http\Controllers\BlogController::class , 'reviewBlogURL'])->name('blog_url');
Route::put('update-blog_url/{id}' , [App\Http\Controllers\BlogController::class , 'updateBlogURL'])->name('update-blog_url');

