<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StatsController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/verify', 'verify');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('tags', TagController::class);
    Route::get('posts/trashed', [PostController::class, 'trashed'])->name('trashed');
    Route::post('posts/{id}/restore', [PostController::class, 'restore'])->name('restore');
    Route::apiResource('posts', PostController::class);
    Route::get('/stats', [StatsController::class, 'index']);

});