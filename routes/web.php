<?php

use App\Http\Controllers\BannerAdsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagController;
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

Route::get('/', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('category', [CategoryController::class, 'index']);
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'store']);
Route::post('newsletter', [NewsletterController::class, 'store']);

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('admin', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('admin/banners', [BannerAdsController::class, 'index'])->name('admin.banners.index');
    Route::get('admin/banners/create', [BannerAdsController::class, 'create'])->name('admin.banners.create');
    Route::post('admin/banners', [BannerAdsController::class, 'store']);
    Route::get('admin/banners/{bannerAds}/edit', [BannerAdsController::class, 'edit']);
    Route::patch('admin/banners/{bannerAds}', [BannerAdsController::class, 'update']);
    Route::delete('admin/banners/{bannerAds}', [BannerAdsController::class, 'destroy']);

    Route::get('admin/contacts', [ContactsController::class, 'index'])->name('admin.contacts.index');
    Route::get('admin/contacts/{contact}/edit', [ContactsController::class, 'edit']);
    Route::patch('admin/contacts/{contact}', [ContactsController::class, 'update']);
    Route::delete('admin/contacts/{contact}', [ContactsController::class, 'destroy']);

    Route::get('admin/tags', [TagController::class, 'index'])->name('admin.tags.index');
    Route::get('admin/tags/create', [TagController::class, 'create'])->name('admin.tags.create');
    Route::post('admin/tags', [TagController::class, 'store']);
    Route::get('admin/tags/{tag}/edit', [TagController::class, 'edit']);
    Route::patch('admin/tags/{tag}', [TagController::class, 'update']);
    Route::delete('admin/tags/{tag}', [TagController::class, 'destroy']);

    Route::get('admin/generals', [GeneralController::class, 'index'])->name('admin.generals.index');
    Route::get('admin/generals/create', [GeneralController::class, 'create'])->name('admin.generals.create');
    Route::post('admin/generals', [GeneralController::class, 'store']);
    Route::patch('admin/generals/{general}', [GeneralController::class, 'update']);

    Route::get('admin/newsletter', [NewsletterController::class, 'index'])->name('admin.newsletter.index');

    Route::get('admin/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('admin/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('admin/categories', [CategoriesController::class, 'store']);
    Route::get('admin/categories/{category}/edit', [CategoriesController::class, 'edit']);
    Route::patch('admin/categories/{category}', [CategoriesController::class, 'update']);
    Route::delete('admin/categories/{category}', [CategoriesController::class, 'destroy']);

    Route::get('admin/posts', [PostsController::class, 'index'])->name('admin.posts.index');
    Route::get('admin/posts/create', [PostsController::class, 'create'])->name('admin.posts.create');
    Route::post('admin/posts', [PostsController::class, 'store']);
    Route::get('admin/posts/{post}/edit', [PostsController::class, 'edit']);
    Route::patch('admin/posts/{post}', [PostsController::class, 'update']);
    Route::delete('admin/posts/{post}', [PostsController::class, 'destroy']);
});
