<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/{username}', [UserController::class, 'show']);
Route::put('/user/{username}', [UserController::class, 'update']);
Route::post('/user/{username}/avatar', [UserController::class, 'uploadAvatar']);

Route::post('login', [AuthController::class, 'login']);
//Api 6
Route::middleware('auth:sanctum')->get('/v2/user/{username}', [UserController::class, 'show']);
