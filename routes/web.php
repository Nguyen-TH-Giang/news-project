<?php

use App\Http\Controllers\BannerAdsController;
use App\Http\Controllers\ContactController;
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

Route::get('/', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

/** Test view */
Route::get('/test', function () {
    return view('news.contact');
});
/** End test view */

Route::get('admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('admin/banners', [BannerAdsController::class, 'index'])->name('admin.banners.index');
Route::get('admin/banners/create', [BannerAdsController::class, 'create'])->name('admin.banners.create');
Route::post('admin/banners', [BannerAdsController::class, 'store']);
Route::get('admin/banners/{bannerAds}/edit', [BannerAdsController::class, 'edit']);
Route::patch('admin/banners/{bannerAds}', [BannerAdsController::class, 'update']);
Route::delete('admin/banners/{bannerAds}', [BannerAdsController::class, 'destroy']);

Route::get('admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
Route::get('admin/contacts/{contact}/edit', [ContactController::class, 'edit']);
Route::patch('admin/contacts/{contact}', [ContactController::class, 'update']);
Route::delete('admin/contacts/{contact}', [ContactController::class, 'destroy']);

