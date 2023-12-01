<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BugController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return response()->json(['api' => 'alumni-api']);
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('create-account', [UserController::class, 'create']);
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('post')->group(function(){
        Route::post('create', [PostController::class, 'create']);
        Route::post('{id}', [PostController::class, 'update']);
        Route::delete('{id}', [PostController::class, 'destroy']);
        Route::get('{id}', [PostController::class, 'show']);
        Route::get('{id}/comments', [PostController::class, 'getComments']);
    });

    Route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, 'get']);
    });

    Route::prefix('bug')->group(function(){
        Route::post('/create', [BugController::class, 'create']);
    });

    Route::prefix('events')->group(function(){
        Route::post('/', [EventController::class, 'create']);
        Route::post('{id}', [EventController::class, 'update']);
        Route::delete('{id}', [EventController::class, 'destroy']);
    });

});
