<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\User\GuestMiddleware;
use App\Http\Middleware\User\UserMiddleware;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;

Route::get('/run-artisan/{cmd}', function ($cmd) {
$allowed = [
    'migrate' => 'migrate --force',
    'migrate-fresh' => 'migrate:fresh --force', // 👈 Add this line
    'config-cache' => 'config:cache',
    'optimize-clear' => 'optimize:clear',
    'storage-link' => 'storage:link',
    'db-seed' => 'db:seed --force',
];

    if (!array_key_exists($cmd, $allowed)) {
        abort(403, 'Command not allowed.');
    }

    Artisan::call($allowed[$cmd]);
    return "✅ Artisan command <b>{$cmd}</b> executed.";
});



Route::post('otp', [EmailController::class, 'otpSender']);
Route::get('/', [PageController::class, 'homePage'])->name('home.page');
Route::get('/post/{id}', [PageController::class, 'fetchUserPost'])->name('post.page');
Route::get('/user/profile/{id}', [PageController::class, 'fetchUserProfile'])->name('user.page');



Route::prefix('account')->middleware(GuestMiddleware::class)->group(function () {
    Route::get('register', [AuthController::class, 'registerPage'])->name('register.page');
    Route::get('login', [AuthController::class, 'loginPage'])->name('login.page');

    Route::post('register', [AuthController::class, 'registerCheck'])->name('register.check');
    Route::post('login', [AuthController::class, 'loginCheck'])->name('login.check');
});


Route::prefix('user/account')->middleware(UserMiddleware::class)->group(function () {
    Route::get('posts', [UserController::class, 'dashboardPage'])->name('dashboard.page');
    Route::get('post/{id}', [UserController::class, 'postView'])->name('user.post.view');
    Route::get('create/post', [UserController::class, 'postAddPage'])->name('post.add.page');
    Route::get('post/edit/{id}', [UserController::class, 'postEditPage'])->name('post.edit.page');
    Route::get('profile', [UserController::class, 'profilePage'])->name('profile.page');
    Route::get('post/comment/{id}', [UserController::class, 'viewComment'])->name('viewComment');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.page');


    Route::post('post/edit', [UserController::class, 'postEdit'])->name('post.edit');
    Route::post('post', [UserController::class, 'postStore'])->name('post.store');
    Route::post('/follow/{user}', [PageController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [PageController::class, 'unfollow'])->name('unfollow');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::delete('delete/comment/{id}', [UserController::class, 'deleteComment'])->name('comment.delete');
    Route::delete('post/edit/{id}', [UserController::class, 'deletePost'])->name('post.delete');
});
