<?php

use App\Http\Controllers\BannerAdController;
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

Route::get('admin/banner', [BannerAdController::class, 'index'])->name('admin.banner');
Route::get('admin/banner/create', [BannerAdController::class, 'create']);
Route::post('admin/banner', [BannerAdController::class, 'store']);


