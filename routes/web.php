<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SubServiceController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ContactController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/editor/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    // Dashboard
    Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');
    Route::resource('services', ServiceController::class);
    Route::resource('services.sub_services', 'App\Http\Controllers\Admin\SubServiceController');

    Route::delete('admin/services/{service}/sub_services/{subService}', [SubServiceController::class, 'destroy'])
        ->name('admin.services.sub_services.destroy');
    Route::get('admin/services/{service}/sub_services/{subService}/edit', [SubServiceController::class, 'edit'])
        ->name('admin.services.sub_services.edit');
    Route::put('/admin/services/{service}/sub_services/{subService}', [SubServiceController::class, 'update'])
        ->name('admin.services.sub_services.update');

    Route::resource('pages', PageController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);

    // Blog Posts Routes
    Route::get('blog_posts', [BlogPostController::class, 'index'])->name('blog_posts.index');
    Route::get('blog_posts/create', [BlogPostController::class, 'create'])->name('blog_posts.create');
    Route::post('blog_posts', [BlogPostController::class, 'store'])->name('blog_posts.store');
    Route::get('blog_posts/{blog_post}', [BlogPostController::class, 'show'])->name('blog_posts.show');
    Route::get('blog_posts/{blog_post}/edit', [BlogPostController::class, 'edit'])->name('blog_posts.edit');
    Route::put('blog_posts/{blog_post}', [BlogPostController::class, 'update'])->name('blog_posts.update');
    Route::delete('blog_posts/{blog_post}', [BlogPostController::class, 'destroy'])->name('blog_posts.destroy');



    Route::resource('project-categories', ProjectCategoryController::class);
    Route::resource('projects', ProjectController::class);

    Route::resource('designations', DesignationController::class);

    Route::resource('members', MemberController::class);

    Route::resource('contacts', ContactController::class)->except(['create', 'store', 'edit', 'update']);

});
