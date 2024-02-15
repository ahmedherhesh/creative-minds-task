<?php

use App\Http\Controllers\AuthController;
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

// if user not authorized
Route::get('no-auth', [AuthController::class, 'noAuth'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::get('verify-code', [AuthController::class, 'verifyCode']);
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('profile', [AuthController::class, 'profile']);
    Route::put('change-my-password', [AuthController::class, 'changeMypassword']);
});
Route::get('logout', [AuthController::class, 'logout']);

