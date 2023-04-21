<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\MetaDescription;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\WebsiteDescription;
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

// web routes

Route::get('/', function () {
  return view('welcome');
});

Route::prefix('web')->as('web.')->group(function () {
  Route::get('blog/index/', [App\Http\Controllers\Web\BlogController::class, 'index'])->name('blog.index');
  Route::get('blog/{blog:blog_url}', [App\Http\Controllers\Web\BlogController::class, 'details'])->name('blog');
});


//dashboards routes

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('dashboard')->as('dashboard.')->group(function () {
  Route::get('/link-checker', [App\Http\Controllers\Dashboard\WebsiteInspection\LinkCrawlerController::class, 'linkChecker'])->name('link-checker');
  Route::get('/', [App\Http\Controllers\Dashboard\WebsiteInspection\LinkCrawlerController::class, 'getURL'])->name('get-url');

  Route::prefix('users')->as('users.')->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\UsersController::class, 'index'])->name('index');
    Route::get('users/role/{id}', [App\Http\Controllers\Dashboard\RoleController::class, 'role'])->name('role.update');
  });

  // Single User //
  Route::prefix('user')->as('user.')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Dashboard\User\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update/{id}', [App\Http\Controllers\Dashboard\User\ProfileController::class, 'update'])->name('profile.update');
  });

  Route::prefix('role')->as('role')->group(function () {
    Route::get('/', [RoleController::class, 'index']);
  });

  // meta description
  Route::get('/', [WebsiteDescription::class, 'create'])->name('website-meta-description.create');
  Route::post('/', [WebsiteDescription::class, 'store'])->name('website-meta-description.store');
  Route::get('website-meta-description/{id}', [WebsiteDescription::class, 'edit'])->name('website-meta-description.edit');
  Route::put('website-meta-description/{id}', [WebsiteDescription::class, 'update'])->name('website-meta-description.update');
  Route::delete('website-meta-description/{id}', [WebsiteDescription::class, 'destroy'])->name('website-meta-description.destroy');
 
  // settings
  Route::get('/settings', [SettingsController::class, 'settings'])->name('settings');
});

Route::resource('blog', BlogController::class);
Route::resource('category', CategoryController::class);
Route::resource('comments', CommentController::class);

Route::get('category', [App\Http\Controllers\CategoryController::class, 'categoryBlogs'])->name('category.blogs');
Route::get('blogs', [App\Http\Controllers\Web\BlogController::class, 'index'])->name('blogs');
Route::get('search', [App\Http\Controllers\BlogController::class, 'search'])->name('blog.search');
Route::get('blog_url/{id}', [App\Http\Controllers\BlogController::class, 'reviewBlogURL'])->name('blog_url');
Route::put('update-blog_url/{id}', [App\Http\Controllers\BlogController::class, 'updateBlogURL'])->name('update-blog_url');
