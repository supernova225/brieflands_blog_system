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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Register
Route::post('/register', [\App\Http\Controllers\API\Auth\AuthController::class, 'register'])->name('register');

// Login
Route::post('/login', [\App\Http\Controllers\API\Auth\AuthController::class, 'login'])->name('login');



Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('/logout', [\App\Http\Controllers\API\Auth\AuthController::class, 'logout'])->name('logout');

    Route::apiResources([
        // Users
        '/users' => \App\Http\Controllers\API\User\UserController::class,

        // Posts
        '/posts' => \App\Http\Controllers\API\Post\PostController::class
    ]);
});



