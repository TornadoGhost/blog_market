<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostApproveController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{id}', [HomeController::class, 'show'])->name('home.post');

Route::get('/post/edit/{id}', [HomeController::class, 'edit'])->name('home.post.edit');
Route::put('/post/edit/{id}', [HomeController::class, 'update'])->name('home.post.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/approve/authors', [UserController::class, 'showToApprove'])->middleware(['auth', 'verified', 'admin'])->name('approve');
Route::post('/dashboard/approve/authors', [UserController::class, 'storeApprove'])->middleware(['auth', 'verified', 'admin'])->name('approve.store');

Route::get('/dashboard/approve/posts', [PostApproveController::class, 'showToApprove'])->middleware(['auth', 'verified', 'admin'])->name('post.approve');
Route::post('/dashboard/approve/posts', [PostApproveController::class, 'storeApprove'])->middleware(['auth', 'verified', 'admin'])->name('postApprove.store');
Route::delete('/dashboard/approve/posts', [PostApproveController::class, 'drop'])->middleware(['auth', 'verified', 'admin'])->name('postApprove.drop');

Route::resource('/dashboard/posts', PostController::class);

require __DIR__.'/auth.php';
