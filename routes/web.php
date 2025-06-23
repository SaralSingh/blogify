<?php

use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\User\GuestMiddleware;
use App\Http\Middleware\User\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homePage'])->name('home.page');
Route::get('/post/{id}', [PageController::class, 'fetchUserPost'])->name('post.page');


Route::prefix('account')->middleware(GuestMiddleware::class)->group(function () {
    Route::get('register', [AuthController::class, 'registerPage'])->name('register.page');
    Route::get('login', [AuthController::class, 'loginPage'])->name('login.page');

    Route::post('register',[AuthController::class,'registerCheck'])->name('register.check');
    Route::post('login', [AuthController::class, 'loginCheck'])->name('login.check');
});


Route::prefix('user/account')->middleware(UserMiddleware::class)->group(function () {
    Route::get('posts', [UserController::class, 'dashboardPage'])->name('dashboard.page');
    Route::get('post/{id}',[UserController::class,'postView'])->name('user.post.view');
    Route::get('create/post', [UserController::class, 'postAddPage'])->name('post.add.page');
    Route::get('post/edit/{id}', [UserController::class, 'postEditPage'])->name('post.edit.page');
    Route::get('post/comment/{id}',[UserController::class, 'viewComment'])->name('viewComment');

    Route::post('post/edit', [UserController::class, 'postEdit'])->name('post.edit');
    Route::post('post', [UserController::class, 'postStore'])->name('post.store');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::delete('post/edit/{id}',[UserController::class,'deletePost'])->name('post.delete');
});

