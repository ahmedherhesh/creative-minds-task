<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'webLogin']);
Route::post('/login', [AuthController::class, '_webLogin']);

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('deliveries', DeliveryController::class);
});
Route::get('logout', function () {
    auth()->logout();
    return redirect('/login');
});


