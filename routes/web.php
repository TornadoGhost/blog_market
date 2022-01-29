<?php

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

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/approve', [UserController::class, 'showToApprove'])->middleware(['auth', 'verified', 'admin'])->name('approve');
Route::post('/dashboard/approve', [UserController::class, 'storeApprove'])->middleware(['auth', 'verified', 'admin'])->name('approve.store');

Route::resource('/dashboard/posts', PostController::class);

require __DIR__.'/auth.php';
