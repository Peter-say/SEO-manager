<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\MetaDescription;
use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\SettingsController;
use App\Http\Controllers\Dashboard\User\AccountSettings;
use App\Http\Controllers\Dashboard\User\Applications\WritersController;
use App\Http\Controllers\Dashboard\User\UpdateEmailAddressController;
use App\Http\Controllers\Dashboard\WebsiteDescription;
use App\Http\Controllers\Dashboard\WebsiteInspection\LinkCrawlerController;
use App\Http\Controllers\Dashboard\WriterApplicationController;
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


// web
Route::prefix('web')->as('web.')->group(function () {
  Route::get('blog/index/', [App\Http\Controllers\Web\BlogController::class, 'index'])->name('blog.index');
  Route::get('blog/{blog:blog_url}', [App\Http\Controllers\Web\BlogController::class, 'details'])->name('blog');
  Route::get('catetegory/{id}/blogs', [App\Http\Controllers\Web\BlogController::class, 'categoryBlogs'])->name('category.blogs');
});


//dashboards routes

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::prefix('dashboard')->as('dashboard.')->group(function () {
  Route::get('/link-checker', [LinkCrawlerController::class, 'linkChecker'])->name('link-checker');
  Route::get('/crawl-url', [LinkCrawlerController::class, 'getURL'])->name('crawl-url');
  Route::get('/page-information', [LinkCrawlerController::class, 'scrapedContent'])->name('page-information');

  // Route::get('run-python-script', [LinkCrawlerController::class, 'runPythonScript']);

  // Admin and sometimes Moderator previledge to operate

  Route::prefix('users')->as('users.')->group(function () {
    Route::get('/', [App\Http\Controllers\Dashboard\UsersController::class, 'index'])->name('index');
    Route::delete('delete/user{id}', [App\Http\Controllers\Dashboard\UsersController::class, 'delete'])->name('delete.user');
    Route::get('users/role/{id}', [App\Http\Controllers\Dashboard\RoleController::class, 'update'])->name('role.update');
  });

  Route::prefix('application')->as('application.')->group(function () {
    Route::prefix('writer')->as('writer.')->group(function () {
      Route::get('/index', [WriterApplicationController::class, 'index'])->name('index');
      Route::get('/approve/role/{id}', [WriterApplicationController::class, 'approve'])->name('approve');
      Route::get('/update/status/{id}', [WriterApplicationController::class, 'markStatusAsApprove'])->name('update.status');
      Route::get('/remove/author/{id}', [WriterApplicationController::class, 'removeAuthorPreviledge'])->name('remove.author');
      Route::get('/mark/as/pending/{id}', [WriterApplicationController::class, 'markStatusAsPending'])->name('mark.as.pending');

    });
  });

  // Single User //
  Route::prefix('user')->as('user.')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Dashboard\User\ProfileController::class, 'index'])->name('profile');
    Route::put('/{id}/profile/update', [App\Http\Controllers\Dashboard\User\ProfileController::class, 'update'])->name('profile.update');
    Route::get('change-password', [App\Http\Controllers\Dashboard\User\UpdatePasswordController::class, 'changePassword'])->name('change-password');
    Route::post('update-password', [App\Http\Controllers\Dashboard\User\UpdatePasswordController::class, 'updatePassword'])->name('update-password');

    Route::get('change-email', [UpdateEmailAddressController::class, 'changeEmail'])->name('change-email');
    Route::put('/{id}/update-email', [UpdateEmailAddressController::class, 'updateEmail'])->name('update-email');
    
    Route::get('/account-settings', [AccountSettings::class, 'view'])->name('account.settings');
    Route::get('/fetch-account', [AccountSettings::class, 'getAccount'])->name('fetch-account');
    Route::delete('/delete-account/{id}', [AccountSettings::class, 'destroy'])->name('delete-account');

    Route::prefix('application')->as('application.')->group(function () {
      Route::get('apply/as/writer', [WritersController::class, 'create'])->name('apply.as.writer');
      Route::post('writer/submit-request', [WritersController::class, 'sendRequest'])->name('writer.send-request');
      Route::get('writer/track-application', [WritersController::class, 'track'])->name('writer.track-application');
      Route::delete('delete-application/{id}', [WritersController::class, 'delete'])->name('delete-application');

    });
  });

  Route::prefix('role')->as('role')->group(function () {
    Route::get('/', [RoleController::class, 'index']);
  });

  // meta description
  Route::get('/website-meta-description.create', [WebsiteDescription::class, 'create'])->name('website-meta-description.create');
  Route::post('/', [WebsiteDescription::class, 'store'])->name('website-meta-description.store');
  Route::get('website-meta-description/{id}', [WebsiteDescription::class, 'edit'])->name('website-meta-description.edit');
  Route::put('website-meta-description/{id}', [WebsiteDescription::class, 'update'])->name('website-meta-description.update');
  Route::delete('website-meta-description/{id}', [WebsiteDescription::class, 'destroy'])->name('website-meta-description.destroy');

  Route::get('/', [WebsiteDescription::class, 'createMetaTitle'])->name('website-title.create');
  Route::post('website-title/store', [WebsiteDescription::class, 'storeMetaTitle'])->name('website-title.store');
  Route::get('website-title/{id}/edit', [WebsiteDescription::class, 'EditMetaTitle'])->name('website-title.edit');
  Route::put('website-title/{id}/update', [WebsiteDescription::class, 'updateMetaTitle'])->name('website-title.update');


  // settings
  Route::get('/settings', [SettingsController::class, 'settings'])->name('settings');
});


Route::resource('blog', BlogController::class);
Route::resource('category', CategoryController::class);
Route::resource('comments', CommentController::class);

Route::get('blogs/manage', [App\Http\Controllers\BlogController::class, 'manageBlogs'])->name('blogs.manage');
Route::get('category', [App\Http\Controllers\CategoryController::class, 'categoryBlogs'])->name('category.blogs');
Route::get('blogs', [App\Http\Controllers\Web\BlogController::class, 'index'])->name('blogs');
Route::get('search', [App\Http\Controllers\BlogController::class, 'search'])->name('blog.search');
Route::get('blog_url/{id}', [App\Http\Controllers\BlogController::class, 'reviewBlogURL'])->name('blog_url');
Route::put('update-blog_url/{id}', [App\Http\Controllers\BlogController::class, 'updateBlogURL'])->name('update-blog_url');
