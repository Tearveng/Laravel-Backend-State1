<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\TestGmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [AuthController::class, 'me']);
    Route::put('update', [AuthController::class, 'update']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::resource('blogs', BlogController::class);
    Route::resource('users', UsersController::class);
    Route::resource('posts', PostController::class);
    Route::resource('roles', RoleController::class);
});

