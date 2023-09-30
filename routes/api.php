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

// Users
Route::post('users', [\App\Http\Controllers\API\User\StoreUserController::class, 'store']);
Route::put('users/{user?}', [\App\Http\Controllers\API\User\UpdateUserController::class, 'update']);
Route::get('users', [\App\Http\Controllers\API\User\ListUserController::class, 'list']);
Route::delete('users/{user?}', [\App\Http\Controllers\API\User\DeleteUserController::class, 'delete']);
Route::put('user/change-password/{user?}', [\App\Http\Controllers\API\User\ChangePasswordUserController::class, 'changePassword']);

