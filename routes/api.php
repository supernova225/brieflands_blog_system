<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Register
Route::post('/register', [\App\Http\Controllers\API\Auth\AuthController::class, 'register'])->name('register');

// Login
Route::post('/login', [\App\Http\Controllers\API\Auth\AuthController::class, 'login'])->name('login');

// Published Posts
Route::apiResource('/published-posts', \App\Http\Controllers\API\Post\PublishPostController::class)->only(['index', 'show']);

Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('/logout', [\App\Http\Controllers\API\Auth\AuthController::class, 'logout'])->name('logout');

    Route::apiResources([
        // Users
        '/users' => \App\Http\Controllers\API\User\UserController::class,

        // Posts
        '/posts' => \App\Http\Controllers\API\Post\PostController::class,
    ]);
});



